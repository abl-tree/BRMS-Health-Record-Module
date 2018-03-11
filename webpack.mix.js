let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('node_modules/datatables/', 'public/plugins/DataTables');
//    .copy('node_modules/popper.js/', 'public/js/popper.js')
//    .copy('node_modules/bootstrap/', 'public/js/bootstrap')
//    .copy('node_modules/chart.js/', 'public/js/chart.js')
//    .copy('node_modules/pace-progress/', 'public/js/pace-progress')
//    .sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/css/font-awesome')
//    .sass('node_modules/flag-icon-css/sass/flag-icon.scss', 'public/css/flag-icon-css')
//    .sass('node_modules/simple-line-icons/scss/simple-line-icons.scss', 'public/css/simple-line-icons');
