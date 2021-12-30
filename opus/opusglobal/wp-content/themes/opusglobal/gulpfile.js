/*
    npm install gulp-ruby-sass gulp-imagemin gulp-newer gulp-autoprefixer gulp-minify-css gulp-jshint jshint-stylish gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del require-dir --save-dev
*/

var gulp = require('gulp');
var requireDir = require('require-dir')('./gulp-tasks');

var scripts = ['assets/js/**/*.js', '!assets/js/plugins/**/*.js']

gulp.task('watch', function() {
    // Watch .svg files
    gulp.watch('assets/svg/font/*.svg', ['iconfont']);
    // Watch .scss files
    gulp.watch('assets/scss/**/*.scss', ['styles']);
    // Watch .js files
    gulp.watch(scripts, ['jshint']);
    gulp.watch(scripts, ['scripts']);
});

gulp.task('default', function() {
    gulp.start('iconfont','styles', 'jshint', 'scripts');
});
