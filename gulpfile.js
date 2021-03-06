var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

require('laravel-elixir-imagemin');

elixir(function(mix) {
    mix.imagemin({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    });
    mix.sass('app.scss');
    mix.version('css/app.css');
});
