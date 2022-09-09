'use strict';

let gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    cleanCSS = require('gulp-clean-css'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    maps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync').create(),
    cfg = require('./gulpconfig.json');

gulp.task('minify-css', function () {
    return gulp.src('css/*.css')
        .pipe(cleanCSS())
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('css/'))
});

gulp.task('sass', function () {
    return gulp.src('sass/*.scss')
        .pipe(maps.init())
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(rename('style.css'))
        .pipe(postcss([autoprefixer()]))
        .pipe(maps.write('./'))
        .pipe(gulp.dest('css/'))
        .pipe(browserSync.stream()) // Inject Styles
});

gulp.task('setup', function() {
    /* jQuery */
    gulp.src('./node_modules/jquery/dist/jquery.min.js')
        .pipe(gulp.dest('./js/jquery'));

    /* Bootstrap */
    gulp.src('./node_modules/popper.js/dist/umd/popper.min.js')
        .pipe(gulp.dest('./js/bootstrap'));
    gulp.src('./node_modules/bootstrap/dist/js/bootstrap.min.js')
        .pipe(gulp.dest('./js/bootstrap'));
    gulp.src('./node_modules/bootstrap/scss/**/*.scss')
        .pipe(gulp.dest('./sass/bootstrap4'));

    /* Glidejs */
    gulp.src('./node_modules/@glidejs/glide/dist/glide.js')
        .pipe(gulp.dest('./js/glide'));
    gulp.src('./node_modules/@glidejs/glide/dist/glide.min.js')
        .pipe(gulp.dest('./js/glide'));
    gulp.src('./node_modules/@glidejs/glide/dist/css/glide.core.min.css')
        .pipe(gulp.dest('./js/glide/css'));
    gulp.src('./node_modules/@glidejs/glide/dist/css/glide.theme.css')
        .pipe(gulp.dest('./js/glide/css'));

    /* Font Awesome */
    gulp.src('./node_modules/@fortawesome/fontawesome-pro/js/all.min.js')
        .pipe(gulp.dest('./js/fontawesome'));
});

gulp.task('browser-sync', function() {

    browserSync.init(cfg.browserSyncWatchFiles, cfg.browserSyncOptions);

});

gulp.task('watch', function () {
    gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass','browser-sync','watch']);