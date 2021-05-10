const mix = require('laravel-mix');
const path = require('path');
const fs = require('fs');

const normalizeData = content => {
    if (Buffer.isBuffer(content)) content = content.toString("utf8");
    content = content.replace(/^\uFEFF/, "");
    return content;
};
/*
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.options({processCssUrls: false});
mix.setPublicPath('public/assets');
mix.webpackConfig({output: {publicPath: '/assets/', chunkFilename: "[name].js"}});

mix.sass('resources/scss/portfolio.scss', 'public/assets/css')
    .sass('resources/scss/project.scss', 'public/assets/css')
    .sass('resources/scss/contact.scss', 'public/assets/css')
    .js('resources/js/portfolio.js', 'public/assets/js/portfolio-nomodule.js')
    .js('resources/js/project.js', 'public/assets/js/project-nomodule.js');

if (mix.inProduction()) {
    mix.webpackConfig({output: {publicPath: '/assets/', chunkFilename: '[name].[contenthash].js'}});
}

if (mix.inProduction()) {
    mix.version();
    mix.then(() => {
        const convertToFileHash = require("laravel-mix-make-file-hash");
        const manifestPath = path.resolve(__dirname, "public/assets/mix-manifest.json");
        const manifest = JSON.parse(normalizeData(fs.readFileSync(manifestPath)));
        const blacklist = Object.keys(manifest).filter(key => String(key).match(/(.*)\.(.*)\.js/gm));
        convertToFileHash({
            publicPath: path.resolve(__dirname, "public/assets/"),
            manifestFilePath: path.resolve(__dirname, "public/assets/mix-manifest.json"),
            blacklist: blacklist,
            keepBlacklistedEntries: true
        }).then(_ => {
            const {exec} = require('child_process');
            exec('yarn rollup:prod', ((error, stdout) => {
                console.log(stdout);
            }));
        });
    });
} else {
    mix.sourceMaps();
    mix.then(_ => {
        const {exec} = require('child_process');
        exec('yarn rollup:dev', ((error, stdout) => {
            console.log(stdout);
        }));
    })
}
