'use strict';
 
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    livereload = require('gulp-livereload'),
    autoprefixer = require('gulp-autoprefixer');

var resources = {
    sass: './resources/sass/**/*.scss',
    js: './resources/js/**/*.js',
};

var options = {
    sass: {
        outputStyle: 'compressed'
    },
    autoprefixer: {
        browsers: ['> 5%'],
        grid: false,
        cascade: false,
    }
}

gulp.task('js', function(){
    return gulp
        .src([
            // './node_modules/jquery/dist/jquery.min.js',
            // './node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            // './node_modules/bootstrap-select/dist/js/bootstrap-select.js',
            resources.js,
        ])
        .pipe(sourcemaps.init())
        .pipe(concat('concat.js'))
        .pipe(rename('main.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./assets/js'))
        .pipe(livereload());
});

gulp.task('sass', function () {
    return gulp
        .src(resources.sass)
        .pipe(sourcemaps.init())
        .pipe(sass(options.sass).on('error', sass.logError))
        .pipe(autoprefixer(options.autoprefixer))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(resources.sass, ['sass']);
    gulp.watch(resources.js, ['js']);
});

gulp.task('default', [
    'sass',
    'js'
]);
