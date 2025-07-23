const gulp = require('gulp');
const terser = require('gulp-terser');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');

// Only include YOUR scripts (not vendor)
const jsSrc = [
  'js/app.js',
  // add more files if needed, in the order you want
];

function jsTask() {
  return gulp.src(jsSrc)
    .pipe(concat('app.min.js'))     // Output filename
    .pipe(terser())                 // Minify
    .pipe(gulp.dest('dist/js'));    // Output location
}

function watchTask() {
  gulp.watch('js/**/*.js', jsTask); // Rebuild if anything in js/ changes
}

exports.default = gulp.series(jsTask, watchTask);
exports.js = jsTask;
exports.watch = watchTask;
