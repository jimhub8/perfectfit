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
    .js('resources/admin/admin.js', 'public/js/adminjs.js')
   .sass('resources/sass/app.scss', 'public/css');


   mix.styles([
    'public/css/app.css',
'public/css/main.css',
'public/css/font-awesome.css',
'public/css/template/colors.css',
'public/css/template/css-plugins-call.css',
'public/css/template/ionicons.min.css',
'public/css/template/main.css',
'public/css/template/responsive.css',
'public/css/template/bootstrap.min.css',
'public/css/slider/default/default.css',
'public/css/slider/light/light.css',
'public/css/slider/dark/dark.css',
'public/css/slider/bar/bar.css',
'public/css/nivo-slider.css',
'public/css/slider/style.css',


], 'public/css/all.css');


