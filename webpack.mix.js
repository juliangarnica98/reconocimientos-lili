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
    .sass('resources/sass/app.scss', 'public/css')
    .styles(['resources/css/app.css','resources/vendor/css/all.min.css','resources/vendor/css/adminlte.min.css','resources/vendor/css/styles.css'], 'public/css/plantilla.css')
    .scripts(['resources/vendor/js/jquery.min.js','resources/vendor/js/demo.js','resources/vendor/js/adminlte.min.js','resources/vendor/js/bs-custom-file-input.min.js'],'public/js/plantilla.js')
    .copy('resources/vendor/fontawesome/webfonts','public/webfonts')
    .copy('resources/vendor/img','public/img');
