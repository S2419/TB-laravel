<<<<<<< HEAD
const mix = require('laravel-mix');
=======
let mix = require('laravel-mix');
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

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

<<<<<<< HEAD
mix.js('resources/js/app.js', 'public/js').vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
=======
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
