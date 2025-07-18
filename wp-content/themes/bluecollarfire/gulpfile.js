const gulp = require('gulp');
const uglify = require('gulp-uglify'); // or use terser if installed
const terser = require('gulp-terser');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');

const jsFiles = 'js/**/*.js'; // Adjust path if your JS files are elsewhere

function jsTask() {
  return gulp.src(jsFiles)
    .pipe(sourcemaps.init())
    .pipe(concat('app.min.js'))  // Change filename as you want
    .pipe(terser())              // or .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('dist/js'));  // Destination folder inside your theme
}

function watchTask() {
  gulp.watch(jsFiles, jsTask);
}

exports.default = gulp.series(jsTask, watchTask);
exports.js = jsTask;
exports.watch = watchTask;
