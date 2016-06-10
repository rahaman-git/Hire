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

elixir(function(mix) {
    //mix.sass('app.scss');

    mix.styles([
        "normalize.css",
        "dropzone.min.css",
        "bootstrap.min.css",
        "ripples.css",
        // "bootstrap-material-design.css",
        "robot.css",
        "lightbox.css",
        "select2.min.css"
    ]);
    mix.scripts([
        "select2.full.min.js",
        "app.js"
    ]);
    mix.version(["css/all.css", "js/all.js"]);
});
