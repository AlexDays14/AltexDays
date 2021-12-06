const { src, dest, watch, parallel } = require('gulp');

// CSS
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');

// Imagenes
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');

// Javascript
const terser = require('gulp-terser-js');

const paths = {
    scss: 'src/scss/**/*.scss',
    dark: 'src/scss/dark/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*.{png,jpg}'
}

function css( done ) {
    src(paths.scss) // Identificar el archivo .SCSS a compilar
        .pipe(sourcemaps.init())
        .pipe( plumber())
        .pipe( sass() ) // Compilarlo
        .pipe( postcss([ autoprefixer(), cssnano() ]) )
        .pipe(sourcemaps.write('.'))
        .pipe( dest('public/build/css') ) // Almacenarla en el disco duro
}

function imagenes(done) {
    const opciones = {
        optimizationLevel: 3
    }
    src(paths.imagenes)
        .pipe( cache( imagemin(opciones) ) )
        .pipe( dest('public/build/img') )
    done();
}

function versionWebp( done ) {
    const opciones = {
        quality: 50
    };
    src(paths.imagenes)
        .pipe( webp(opciones) )
        .pipe( dest('public/build/img') )
    done();
}

function javascript( done ) {
    src(paths.js)
        .pipe(sourcemaps.init())
        .pipe( terser() )
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/js'));

    done();
}

function dev( done ) {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, imagenes);
}

exports.css = css;
exports.js = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.default = parallel( css, javascript, imagenes, versionWebp, dev) ;

