let gulp = require('gulp')
let twig = require('gulp-twig')
let fs = require('fs')
let del = require('del')
let prettify = require('gulp-html-prettify')
let sourcemaps = require('gulp-sourcemaps')
let sass = require('gulp-sass')
const csso = require('gulp-csso')
const cleanCSS = require('gulp-clean-css')
let autoprefixer = require('gulp-autoprefixer')
let shell = require('gulp-shell')
let wait = require('gulp-wait')
let plumber = require('gulp-plumber')
let browserSync = require('browser-sync').create()

let paths = {
    resources: './resources/front/',
    static: './static/front/'
}

// ////////////////////////////////////////////////
// HTML
// ////////////////////////////////////////////////

gulp.task('html', () => {
    let data = JSON.parse(fs.readFileSync(paths.resources + 'html/data/common.json'))

    return (
        gulp
            .src(paths.resources + 'html/*.twig')
            .pipe(plumber({
                handleError: (err) => {
                    console.log(err)
                    this.emit('end')
                }
            }))
            .pipe(twig({
                data: data
            }))
            .on('error', (err) => {
                process.stderr.write(err.message + '\n')
                this.emit('end')
            })
            .pipe(gulp.dest(paths.static + 'html/'))
    )
})

gulp.task('html-prettify', gulp.series('html', () => {
    return (
        gulp
            .src(paths.static + 'html/**/*.html')
            .pipe(prettify({
                indent_char: ' ',
                indent_size: 2
            }))
            .pipe(gulp.dest(paths.static + 'html/'))
    )
}))

gulp.task('html-clean', () => {
    return (
        del(paths.static + 'html/**/*')
    )
})

gulp.task('html-refresh', gulp.series('html-clean', 'html-prettify'))

// ////////////////////////////////////////////////
// CSS
// ////////////////////////////////////////////////

gulp.task('css', () => {
    return (
        gulp
            .src(paths.resources + 'sass/app.scss')
            .pipe(wait(500))
            .pipe(sourcemaps.init())
            .pipe(
                plumber({
                    handleError: (err) => {
                        console.log(err)
                        this.emit('end')
                    }
                })
            )
            .pipe(
                sass({
                    outputStyle: 'compressed',
                    includePaths: ['./node_modules/']
                }).on('error', (err) => {
                    console.log(err.message)
                    this.emit('end')
                })
            )
            .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {
                cascade: true
            }))
            .pipe(sourcemaps.write('.'))
            .pipe(gulp.dest(paths.static + 'css/'))
    )
})

gulp.task('css-clean', () => {
    return (
        del(paths.static + 'css/**/*')
    )
})

gulp.task('css-minify', gulp.series('css-clean', 'css', () => {
    return (
        gulp
            .src(paths.static + 'css/*.css')
            .pipe(cleanCSS({
                level: {
                    1: {
                        all: true,
                        normalizeUrls: false
                    },
                    2: {
                        restructureRules: true
                    }
                }
            }))
            .pipe(csso())
            .pipe(gulp.dest(paths.static + 'css/'))
    )
}))

// ////////////////////////////////////////////////
// browser-sync
// ////////////////////////////////////////////////

gulp.task('browser-sync', () => {
    browserSync.init({
        // proxy: process.env.APP_URL,
        server: {
            baseDir: paths.static,
            directory: true
        },
        proxy: false,
        // tunnel: true,
        files: [
            paths.static + '/views/**/*.php',
            paths.static + '/html/**/*.html',
            paths.static + '/css/**/*.css',
            paths.static + '/js/**/*.js',
            paths.static + '/img/**/*'
        ],
        notify: false,
        // browser: 'google chrome',
        ghostMode: false
    })
})

// ////////////////////////////////////////////////
// Watch task
// ////////////////////////////////////////////////

gulp.task('watch', () => {
    // Html
    gulp.watch(
        [
            'html/**/*'
        ], {
            cwd: paths.resources
        },
        gulp.series('html')
    )

    // Css
    gulp.watch(
        [
            'sass/**/*.scss'
        ], {
            cwd: paths.resources
        },
        gulp.series('css')
    )
})

// ////////////////////////////////////////////////
// yarn run
// ////////////////////////////////////////////////

gulp.task('yarn-watch', shell.task('yarn watch-front'))
gulp.task('yarn-prod', shell.task('yarn prod-front'))

// ////////////////////////////////////////////////
// gulp run
// ////////////////////////////////////////////////

gulp.task('default', gulp.parallel(
    (done) => {
        process.env.NODE_ENV = 'development'
        done()
    },
    'yarn-watch',
    'watch'
    // 'browser-sync'
))

gulp.task('build', gulp.parallel(
    (done) => {
        process.env.NODE_ENV = 'production'
        done()
    },
    'yarn-prod',
    'css-minify',
    'html-refresh'
))
