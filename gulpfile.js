const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir.config.assetsPath = './Modules/BaseTheme/Assets';

elixir(mix => {
    mix.sass('front/front.scss')
        .sass('back/back.scss')
        .webpack('front/front.js')
        .webpack('back/back.js')
        .browserSync({
            proxy: 'beater.dev'
        });
        // .version([
        //    'css/front.css',
        //    'css/back.css',
        //    'js/front.js',
        //    'js/back.js',
    // ]);
});
