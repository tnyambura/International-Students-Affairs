const mix = require('laravel-mix');
require("laravel-mix-tailwind");


mix.js('resources/js/app.js', 'public/js')
.sourceMaps()
.postCss('resources/css/app.css', 'public/css',[
    require('tailwindcss'),
]);

