let mix = require('laravel-mix');

//Core UI
mix.js('resources/assets/js/app.js', 'public/js/app.js')
    .sass('resources/assets/coreui/scss/style.scss', 'public/css/app.css')
    .version()

