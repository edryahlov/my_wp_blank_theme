'use strict';

var del = require('del'); 
var gulp = require('gulp');
var sass = require('gulp-sass');
var purge = require('gulp-css-purge');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var svgmin = require('gulp-svgmin');
var uglifycss = require('gulp-uglifycss');

gulp.task("default", function () {
   gulp.start(['sass:watch']);
});


//svg optimizer
gulp.task('svg', function () {
    return gulp.src('./in/*.svg')
        .pipe(svgmin())
        .pipe(gulp.dest('./out'));
});

//del files
/*
gulp.task('del', function () {
  del(['./1/*.min.css'], {})
});
*/

//bootstrap 4 compile
gulp.task('boot', function () {
  return gulp.src('./bootstrap-compile.scss')
    .pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
    .pipe(cleanCSS({level: 2})) //,format: 'beautify',compatibility: 'ie8',
    .pipe(uglifycss())
    .pipe(rename({basename:'bootstrap4beta',extname:'.min.css'}))
    .pipe(gulp.dest('./../css/'));
});

//sass compile
gulp.task('sass', function () {
  return gulp.src('./../scss/*.scss')
    .pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
    .pipe(cleanCSS({level: 2})) //,format: 'beautify',compatibility: 'ie8',
    .pipe(uglifycss())
    .pipe(rename({basename:'my',extname:'.min.css'})) //{suffix:".min"}
    .pipe(gulp.dest('./../css/'));
});

//watch for changes in sass 
gulp.task('sass:watch', function () {
  gulp.watch('./../scss/*.scss', ['sass']);
});

//image compression
gulp.task('img', () =>
    gulp.src('img_in/*')
        .pipe(imagemin({
          interlaced: true,
          progressive: true,
          optimizationLevel: 5
        }))
        .pipe(gulp.dest('../img'))
);





