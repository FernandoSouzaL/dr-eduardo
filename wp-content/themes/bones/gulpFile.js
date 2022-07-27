const gulp = require('gulp');
const { src, dest, watch, series, parallel } = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const terser = require('gulp-terser');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const browserSync = require('browser-sync').create();

const paths = {
  styles: {
    src: ['library/sass/*.scss', '!library/sass/_*.scss'],
    dest: 'public/css/',
  },
  scripts: {
    src: ['library/js/main.js'],
    dest: 'public/js/',
  },
  themename: 'new-theme',
};

function compileStyles() {
  return src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.styles.dest));
}

function minifyScripts() {
  return src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(terser().on('error', (error) => console.log(error)))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.scripts.dest));
}

function server() {
  browserSync.init({
    proxy: 'http://localhost/' + paths.themename + '/',
    port: 8000, 
    open: true
  });
 }

function watcher() {
  server();

  watch("library/sass/**/*.scss", parallel(compileStyles)).on('change', browserSync.reload);
  watch(paths.scripts.src, parallel(minifyScripts)).on('change', browserSync.reload);
  watch('**/*.php').on('change', browserSync.reload);
}

exports.compileStyles = compileStyles;
exports.minifyScripts = minifyScripts;
exports.watcher = watcher;

exports.default = series(
  parallel(compileStyles, minifyScripts),
  watcher
);