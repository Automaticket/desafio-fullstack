const mix = require('laravel-mix');

mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
    'node_modules/admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/admin-lte/dist/css/AdminLTE.min.css',
    'node_modules/admin-lte/dist/css/skins/_all-skins.min.css',
    'resources/assets/css/app.css'
], 'public/css/all.css');

mix.copy([
    'node_modules/admin-lte/dist/img/*'
],'public/img');

mix.copy([
    'node_modules/font-awesome/fonts/*'
],'public/fonts');


mix.copy([
    'node_modules/ionicons/dist/svg/*'
],'public/svg');

mix.js([
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/admin-lte/dist/js/adminlte.min.js',
    'resources/js/app.js'
],'public/js/all.js');