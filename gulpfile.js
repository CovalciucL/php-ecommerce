var elixir = require('laravel-elixir')

elixir.config.sourcemaps = false;

var gulp = require('gulp')

elixir(function(mix){

    mix.sass('resources/assets/sass/app.scss','resources/assets/css');

    mix.styles(
        [
            'css/app.css',
            'bower/vendor/slick-carousel/slick/slick.css'

        ],
        'public/css/all.css',
        'resources/assets'
    );

    var bowerPart = 'bower/vendor';

    mix.scripts(
        [
            bowerPart + '/jquery/dist/jquery.min.js',
            bowerPart + '/chart.js/dist/Chart.bundle.js',


            bowerPart + '/foundation-sites/dist/js/foundation.min.js',
            
            bowerPart + '/slick-carousel/slick/slick.min.js',
            bowerPart + '/axios/dist/axios.min.js',


            'js/acme.js',
            'js/admin/*.js',
            'js/pages/*.js',
            'js/init.js'
            
        ],'public/js/app.js','resources/assets'
    );


});