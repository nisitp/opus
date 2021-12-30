var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cleanCss = require('gulp-clean-css');
var combineMq = require('gulp-combine-mq');
var notify = require('gulp-notify');
var rename = require('gulp-rename');

gulp.task('styles', function() {
    return gulp.src('assets/scss/master.scss')
        .pipe( sass().on('error', sass.logError) )
        .pipe(autoprefixer({
			browsers: ['last 2 versions', 'Safari >= 8']
		}))
        .pipe(combineMq({beautify: false}))
        .pipe(rename('style.css'))
        .pipe(gulp.dest('assets/build'))
        .pipe(cleanCss())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/build'))
        .pipe(notify({ message: 'Styles task complete' }));
});
