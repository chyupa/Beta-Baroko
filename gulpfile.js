var elixir = require('laravel-elixir'),
    bowerDir = 'bower_components/',
    assetsDir = 'public/assets/';

elixir(function(mix) {
    mix.styles([
            // 'bootstrap/dist/css/bootstrap.min.css',
            // 'bootstrap/dist/css/bootstrap-theme.min.css',
            'angular-ui/build/angular-ui.min.css',
            'angular-toastr/dist/angular-toastr.min.css'
        ],
        assetsDir + 'css/libs.css',
        bowerDir
    );

    mix.copy(bowerDir + 'bootstrap/dist/fonts/**.*', assetsDir + 'fonts');

    mix.scripts([
            'angular/angular.min.js',
            'angular-animate/angular-animate.min.js',
            'angular-toastr/dist/angular-toastr.tpls.min.js',
            'angular-ui/build/angular-ui.min.js',
            'ng-file-upload/ng-file-upload.min.js',
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js'
        ],
        assetsDir + 'js/libs.js',
        bowerDir
    );

    mix.scripts([
        'angular/baroko.module.js',
        'angular/filters/*.js',
        'angular/factories/*.js',
        'angular/controllers/*.js',
        'angular/directives/*.js'
        ],
    assetsDir + 'js/baroko.js'
    );

});