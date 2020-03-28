const path = require('path')
const mix = require('laravel-mix')
const resourcesBasePath = './resources/front'
const staticBasePath = './static/front'
const ImageMin = require('imagemin-webpack-plugin').default
const Webp = require('imagemin-webp')
const MozJpeg = require('imagemin-mozjpeg')
const ChunkRenamePlugin = require('webpack-chunk-rename-plugin')
const Copy = require('copy-webpack-plugin')
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin
const {
    CleanWebpackPlugin
} = require('clean-webpack-plugin')
require('laravel-mix-ignore')
require('laravel-mix-vue-svgicon')
require('laravel-mix-criticalcss')

let criticalCssPages = [
    {
        url: '/',
        template: 'home'
    }
]

mix
    .svgicon(resourcesBasePath + '/img/svg/')
    .setPublicPath(staticBasePath)
    .webpackConfig({
        resolve: {
            alias: {
                '@root': __dirname,
                '@components': path.resolve(__dirname, resourcesBasePath + '/js/components'),
                '@partials': path.resolve(__dirname, resourcesBasePath + '/js/partials'),
                '@system': path.resolve(__dirname, resourcesBasePath + '/js/system'),
                '@pages': path.resolve(__dirname, resourcesBasePath + '/js/pages'),
                '@lang': path.resolve(__dirname, resourcesBasePath + '/js/system/translations/lang')
            }
        },
        output: {
            // filename: chunkData => {
            //     if (chunkData.chunk.name === '/app') {
            //         return 'js/app.js'
            //     }

            //     if (chunkData.chunk.name === '/manifest') {
            //         return 'js/manifest.js'
            //     }

            //     return 'js/[name].js'
            // },
            chunkFilename: mix.inProduction()
                ? 'js/chunks/[name].[hash:10].js'
                : 'js/chunks/[name].js'
        },
        plugins: [
            // new ChunkRenamePlugin({
            //     initialChunksWithEntry: true,
            //     '/app': 'js/app.js',
            //     '/vendor': 'js/vendor.js'
            // }),
            new BundleAnalyzerPlugin()
        ]
    })
    .options({
        processCssUrls: false
    })
    .js(resourcesBasePath + '/js/app.js', 'js')
    .styles(resourcesBasePath + '/css/app.css', staticBasePath + '/css/app.css')
    .criticalCss({
        enabled: mix.inProduction(),
        paths: {
            base: process.env.APP_URL,
            templates: staticBasePath + '/css/critical/'
        },
        urls: criticalCssPages,
        options: {
            minify: true,
            css: resourcesBasePath + '/css/app.css'
        }
    })

// build env settings
if (mix.inProduction()) {
    mix
        .webpackConfig({
            plugins: [
                new CleanWebpackPlugin({
                    cleanOnceBeforeBuildPatterns: ['img', 'fonts']
                }),
                new Copy([{
                    from: resourcesBasePath + '/fonts',
                    to: 'fonts'
                }]),
                new Copy([{
                    from: resourcesBasePath + '/img',
                    to: 'img'
                }]),
                new ImageMin({
                    disable: process.env.NODE_ENV !== 'production',
                    pngquant: ({
                        quality: '75'
                    }),
                    svgo: {
                        plugins: [{
                            removeViewBox: false
                        },
                        {
                            removeTitle: false
                        }
                        ]
                    },
                    plugins: [
                        MozJpeg({
                            quality: '75'
                        })
                    ]
                }),
                new Copy([{
                    context: resourcesBasePath + '/img',
                    from: '**/*.+(jpg|jpeg|png)',
                    to: 'img/',
                    transformPath (targetPath, absolutePath) {
                        return targetPath.replace(/\.(jpe?g|png)$/i, '.webp')
                    }
                }]),
                new ImageMin({
                    disable: process.env.NODE_ENV !== 'production',
                    test: /\.(webp)$/i,
                    plugins: [
                        Webp({
                            quality: 75
                        })
                    ]
                })
            ]
        })
        .version()
} else {
    mix
        .webpackConfig({
            plugins: [
                new Copy([{
                    from: resourcesBasePath + '/fonts',
                    to: 'fonts'
                }]),
                new Copy([{
                    from: resourcesBasePath + '/img',
                    to: 'img'
                }]),
                new Copy([{
                    context: resourcesBasePath + '/img',
                    from: '**/*.+(jpg|jpeg|png)',
                    to: 'img/',
                    transformPath (targetPath, absolutePath) {
                        return targetPath.replace(/\.(jpe?g|png)$/i, '.webp')
                    }
                }])
            ]
        })
        .sourceMaps()
        .browserSync({
            proxy: process.env.APP_URL,
            // server: {
            //     baseDir: staticBasePath,
            //     directory: true
            // },
            // proxy: false,
            // tunnel: true,
            files: [
                resourcesBasePath + '/views/**/*.php',
                staticBasePath + '/html/**/*.html',
                staticBasePath + '/css/**/*.css',
                staticBasePath + '/js/**/*.js',
                staticBasePath + '/img/**/*'
            ],
            notify: false,
            // browser: 'google chrome',
            ghostMode: false
        })
}
