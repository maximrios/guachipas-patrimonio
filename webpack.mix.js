const mix = require('laravel-mix');
const gentelella_home = 'node_modules/gentelella/';

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
mix.copy('node_modules/gentelella/build/css/custom.css', 'public/css/gentelella.css')
    .copy('node_modules/gentelella/build/js/custom.js', 'public/js/gentelella.js');
mix.copy('node_modules/sweetalert2/dist/sweetalert2.css', 'public/css/sweetalert2.css')
    .copy('node_modules/sweetalert2/dist/sweetalert2.js', 'public/js/sweetalert2.js');
mix.copy('node_modules/datatables.net-bs/css/dataTables.bootstrap.min.css', 'public/css/dataTables.bootstrap.min.css')
    .copy('node_modules/datatables.net-bs/js/dataTables.bootstrap.min.js', 'public/js/dataTables.bootstrap.min.js')
    .copy('node_modules/datatables.net/js/jquery.dataTables.min.js', 'public/js/jquery.dataTables.min.js');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.browserSync({
    proxy: 'http://localhost:8082', // Cambia al URL donde estás sirviendo tu proyecto Laravel
    files: [
        'resources/views/**/*.blade.php', // Monitorea cambios en tus archivos Blade
        'public/js/**/*.js',              // Monitorea cambios en archivos JS
        'public/css/**/*.css'             // Monitorea cambios en archivos CSS
    ]
});

