const mix = require('laravel-mix');
const glob = require('glob')
const path = require('path')

function mixAssetsDir(query, cb) {
    ;(glob.sync('resources/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/')
        cb(f, f.replace('resources', 'public'))
    })
}

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
mixAssetsDir('vendors/js/**/*.js', (src, dest) => mix.scripts(src, dest));
mixAssetsDir('vendors/js/**/*.js.map', (src, dest) => mix.scripts(src, dest));
mixAssetsDir('vendors/css/**/*.css', (src, dest) => mix.copy(src, dest));
mixAssetsDir('vendors/webfonts', (src, dest) => mix.copy(src, dest));

mix.copyDirectory('resources/images', 'public/images');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/styles.scss', 'public/css')
    .sass('resources/sass/plugins.scss', 'public/css')
    .webpackConfig(require('./webpack.config'))
    .sourceMaps();
