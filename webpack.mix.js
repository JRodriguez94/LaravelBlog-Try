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
    //-- Co pilando con sass
    mix.js('resources/assets/js/app.js', 'public/js')
        .sass('resources/assets/sass/app.scss', 'public/css');
    
        //--Compilando con less
//    

    mix.scripts(
        [
            'node_modules/jquery/dist/jquery.js',
            'node_modules/boostrap/dist/js/bootstrap.js',
        ], 'public/js/all.js', 'node_modules'
    );

    mix.browserSync(
        {
            proxy: 'blog.test'
        }
    );