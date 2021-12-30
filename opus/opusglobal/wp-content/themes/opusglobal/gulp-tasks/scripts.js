var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var notify = require('gulp-notify');

gulp.task('scripts', function () {
    gulp.src('assets/js/**/*.js')
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('assets/build'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('assets/build'))
        .pipe(notify({ message: 'Scripts task complete' }));
});
