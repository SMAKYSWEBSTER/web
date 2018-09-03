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

var sass = 'resources/assets/sass/';
var es6 = 'resources/assets/js/';
var css = 'public/css';
var js = 'public/js';

mix.js(`${es6}app.js`, js)
    .sass(`${sass}app.scss`, css);
