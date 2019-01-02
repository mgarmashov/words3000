let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
    'jquery': ['$', 'window.jQuery', 'jQuery'],
});

mix.webpackConfig({
    resolve: {
        alias: {
            'Api': path.resolve(__dirname, 'resources/assets/admin/js/api/'),
            'Components': path.resolve(__dirname, 'resources/assets/admin/js/components/'),
            'Constants': path.resolve(__dirname, 'resources/assets/admin/js/constants/'),
            'Container': path.resolve(__dirname, 'resources/assets/admin/js/container/'),
            'Views': path.resolve(__dirname, 'resources/assets/admin/js/views/'),
            'Helpers': path.resolve(__dirname, 'resources/assets/admin/js/helpers/'),
            'Themes': path.resolve(__dirname, 'resources/assets/admin/js/themes/')
        }
    }
});

mix
   // .js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/admin/js/main.js', 'public/admin/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/words.sass', 'public/css');
