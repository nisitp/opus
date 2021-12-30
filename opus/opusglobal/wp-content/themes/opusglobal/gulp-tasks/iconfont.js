var gulp = require( 'gulp' );
var iconfont = require('gulp-iconfont');
var iconfontCss = require('gulp-iconfont-css');

var fontName = 'theme-icons';

gulp.task('iconfont', function(){
  gulp.src(['assets/svg/font/*.svg'])
    .pipe(iconfontCss({
      fontName: fontName,
      path: 'assets/svg/font/templates/_icons.scss',
      targetPath: '../scss/utilities/_icons.scss',
      fontPath: '../fonts/'
    }))
    .pipe(iconfont({
      fontName: fontName,
      normalize: true,
      formats: ['ttf', 'eot', 'woff', 'woff2', 'svg']
     }))
    .pipe(gulp.dest('assets/fonts/'));
});
