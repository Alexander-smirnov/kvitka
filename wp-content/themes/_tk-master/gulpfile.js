var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var concat = require('gulp-concat');
var promise = require('es6-promise').polyfill();
var livereload = require('gulp-livereload');
function swallowError (error) {

    // If you want details of the error in the console
    console.log(error.toString());

    this.emit('end');
}

gulp.task('styles', function () {
    return gulp.src('assets/scss/*.scss')
        .pipe(autoprefixer())
        .on('error', swallowError)
        .pipe(sass().on('error', swallowError))
        .pipe(concat('style.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('.'))
        .pipe(livereload())
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(['assets/scss/*.scss'], ['styles']);
});
