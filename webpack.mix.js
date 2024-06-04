const mix = require('laravel-mix');

mix.js('resources/js/main.js', 'public/js')
   .js('resources/js/app.js', 'public/js')
   .sass('resources/css/app.scss', 'public/css')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ])
   .sourceMaps();
