/*
* Require laravel mix for ease of working with webpack.
*/
let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
