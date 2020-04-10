var gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var uglifycss = require('gulp-uglifycss');
var uglify = require('gulp-uglify-es').default;
var rename = require('gulp-rename');
var stripDebug = require('gulp-strip-debug');
var babel = require('gulp-babel');
// var browserify = require('gulp-browserify');
// const image = require('gulp-image');

function scss(){
    return gulp.src('./scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(uglifycss())
    .pipe(gulp.dest('./dist/css'));
};

function compress(){
    return gulp.src(['./dist/js/**/*.js', '!./dist/js/**/*.min.js', '!./dist/js/**/*.ie.js' ])
    //.pipe(stripDebug())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./dist/js/min/'))
};

function script(){
    return gulp.src(['./js/**/*.js'])
    // .pipe(browserify({ debug : true }))
    .pipe(gulp.dest('./dist/js'))
}

function watch (){
    gulp.watch('./scss/**/*.scss', gulp.series (scss))
    gulp.watch(['./js/**/*.js'], gulp.series(script, compress))
}

function babel_function() {
    return gulp.src('./js/**/*.js')
    .pipe(babel({
        presets: ['@babel/preset-env']
    }))
    // .pipe(uglify())
    .pipe(rename({ suffix: '.ie' }))
    .pipe(gulp.dest('./dist/js/ie'))
}

function images() {
    gulp.src('./image/*')
    .pipe(image())
    .pipe(gulp.dest('./dist/image'));
}


var build = gulp.series(scss, script, babel_function, compress, watch);

exports.scss = scss;
exports.watch = watch;
exports.default = build;