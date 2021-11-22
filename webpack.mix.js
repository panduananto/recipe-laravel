const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

mix
  .browserSync({
    baseDir: './',
    proxy: 'http://127.0.0.1:8000/',
    port: '9000',
    ui: false,
  })
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [tailwindcss('./tailwind.config.js')]);
