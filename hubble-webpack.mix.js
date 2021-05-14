let mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.webpackConfig({
    "output": {
        publicPath: '/vendor/laravel-hubble/',
        chunkFilename: "[name].[contenthash].js"
    }
})

mix.options({processCssUrls: false});

mix.setPublicPath('public/vendor/laravel-hubble/');

mix.js('resources/hubble/components.js', 'public/vendor/laravel-hubble/').vue()
    .sass('resources/hubble/components.scss', 'public/vendor/laravel-hubble/');

if (!mix.inProduction()) {
    mix.sourceMaps();
}
