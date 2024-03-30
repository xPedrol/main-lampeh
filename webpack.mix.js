let mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/tinymce.js', 'public/js')
    .js('resources/js/navbar.js','public/js')
    .js('resources/js/projetos.js','public/js')
    .js('resources/js/home.js','public/js')



    .sass('resources/scss/tinymceTable.scss', 'public/css')
    .sass('resources/scss/app.scss','public/css')
    .sass('resources/scss/navbar.scss','public/css')
    .sass('resources/scss/home.scss','public/css')
    .sass('resources/scss/grid.scss','public/css')
    .sass('resources/scss/form.scss','public/css')
    .sass('resources/scss/fonts.scss','public/css')
    .sass('resources/scss/quem-somos.scss','public/css')
    .sass('resources/scss/publicacoes.scss','public/css')
    .sass('resources/scss/contato.scss','public/css')



    .copy('resources/fonts', 'public/fonts')
    .copy('resources/fonts', 'storage/fonts')
    .copy('node_modules/tinymce/models', 'public/js/models')
    .copy('node_modules/tinymce/skins', 'public/js/skins')
    .copy('node_modules/tinymce/icons', 'public/js/icons');
mix.browserSync('127.0.0.1:8000');
