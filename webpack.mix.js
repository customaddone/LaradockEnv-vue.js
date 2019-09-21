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

/* ３　書いたソースをwebpack.mix.jsに登録する
   配列の中に書いたjQueryのファイルがコンパイルされapp.jsに保存されます
   jsがjQuery用、.scriptsがjavascript用 */
mix.js('resources/assets/js/app.js','public/js/app.js')
   .scripts('resources/assets/js/samplevue.js', 'public/js/samplevue.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
