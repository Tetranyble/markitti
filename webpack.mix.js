const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

    //scripts from external library
mix.scripts([
        'resources/assets/plugins/fontawesome/js/all.min.js',
        'resources/assets/plugins/popper.min.js',
        'resources/assets/plugins/bootstrap/js/bootstrap.min.js',
        'resources/assets/plugins/chart.js/chart.min.js',
        'resources/assets/js/index-charts.js',
        'resources/assets/js/app.js',
    ], 'public/assets/js/dashboard.js')

    //styles from external library
    .styles([
        'resources/assets/css/portal.css'
    ], 'public/assets/css/portal.css');

mix.copyDirectory('resources/assets/images', 'public/assets/images');
mix.copyDirectory('resources/assets/plugins', 'public/assets/plugins');
mix.copyDirectory('resources/classic', 'public/classic');



