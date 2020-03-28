const mix = require('laravel-mix')
var LiveReloadPlugin = require('webpack-livereload-plugin')

mix.setPublicPath('static/control')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// configuration
mix.webpackConfig({
    resolve: {
        alias: {
            '@root': __dirname,
            '@common': path.resolve(__dirname, 'resources/control/js/components/common')
        },
        extensions: [
            '.js',
            '.scss'
        ]
    }
})

// files
mix
    .combine([
        'resources/control/theme/libs/jquery/bootstrap/dist/css/bootstrap.css',
        'resources/control/theme/css/font.css',
        'resources/control/theme/css/app.css'
    ], 'static/control/theme/theme.css')
    .copy([
        'resources/control/theme/fonts',
        'resources/control/theme/libs/assets/font-awesome/fonts'
    ], 'static/control/fonts/')
    .copy('resources/control/theme/libs/assets/font-awesome/css/font-awesome.min.css', 'static/control/css/font-awesome.min.css')
    .copy([
        'resources/control/theme/js/app.min.js'
    ], 'static/control/theme/theme.js')
    .js('resources/control/js/index.js', 'js')
    // .sass('resources/control/sass/app.scss', 'css')

// build env settings
if (mix.inProduction()) {
    mix.version()
} else {
    mix.sourceMaps()
}
