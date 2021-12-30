var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var newer = require('gulp-newer');

gulp.task('images', function() {
    return gulp.src('assets/img/**/*')
        .pipe(newer('assets/build/img'))
        .pipe(imagemin())
        .pipe(gulp.dest('assets/build/img'));
});
