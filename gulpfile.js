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

(() => {

    'use strict';

    /**************** gulpfile.js configuration ****************/

    const

        // development or production
        devBuild  = ((process.env.NODE_ENV || 'development').trim().toLowerCase() === 'development'),

        // directory locations
        dir = {
            src         : 'resources/',
            build       : 'build/'
        },

        // modules
        gulp          = require('gulp'),
        noop          = require('gulp-noop'),
        newer         = require('gulp-newer'),
        size          = require('gulp-size'),
        imagemin      = require('gulp-imagemin'),
        sass          = require('gulp-sass'),
        postcss       = require('gulp-postcss'),
        sourcemaps    = devBuild ? require('gulp-sourcemaps') : null,
        browsersync   = devBuild ? require('browser-sync').create() : null;

    console.log('Gulp', devBuild ? 'development' : 'production', 'build');

    /**************** CSS task ****************/
    const cssConfig = {

        src         : dir.src + 'scss/main.scss',
        watch       : dir.src + 'scss/**/*',
        build       : dir.build + 'css/',
        sassOpts: {
            sourceMap       : devBuild,
            imagePath       : '/images/',
            precision       : 3,
            errLogToConsole : true
        },

        postCSS: [
            require('usedcss')({
                html: ['index.html']
            }),
            require('postcss-assets')({
                loadPaths: ['images/'],
                basePath: dir.build
            }),
            require('autoprefixer')({
                browsers: ['> 1%']
            }),
            require('cssnano')
        ]

    };

    function css() {

        return gulp.src(cssConfig.src)
            .pipe(sourcemaps ? sourcemaps.init() : noop())
            .pipe(sass(cssConfig.sassOpts).on('error', sass.logError))
            .pipe(postcss(cssConfig.postCSS))
            .pipe(sourcemaps ? sourcemaps.write() : noop())
            .pipe(size({ showFiles: true }))
            .pipe(gulp.dest(cssConfig.build))
            .pipe(browsersync ? browsersync.reload({ stream: true }) : noop());

    }
    exports.css = gulp.series(images, css);


})();


    // elixir(function(mix) {
        // mix.sass('app.scss', 'resources/css');
        // mix.styles([
        //     'libs/bootstrap.min.css',
        //     'css@family=Nunito',
        //     'app.css',
        //     'libs/select2.min.css'
        // ]);
        // mix.scripts([
        //     'libs/jquery.js',
        //     'libs/select2.min.js',
        //     // 'app.js',
        //     // 'bootstrap.js'
        // ]);

    // });

