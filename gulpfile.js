/**
 *
 * Gulp task recipe to produce production ready files for a WordPress theme
 * @author Calvin Koepke
 * @version 1.0
 * @link https://twitter.com/cjkoepke
 *
 */

'use strict';

//* Store paths
var PATHS = {
	js: './assets/js/',
	css: './assets/css/',
	build: {
		js: './build/js/',
		css: './build/css/'
	}
}

//* Load and define dependencies
var gulp = require( 'gulp' );
var postcss = require('gulp-postcss');
var cssnext = require('postcss-cssnext');
var cssnano = require('cssnano');
var cssimport = require( 'postcss-import' );
var sourcemaps = require('gulp-sourcemaps');
var uglify = require( 'gulp-uglify' );
var rename = require( 'gulp-rename' );
var concat = require( 'gulp-concat' );
var wpPot = require( 'gulp-wp-pot' );
var zip = require( 'gulp-zip' );

var taskLoader = [ 'scripts', 'css', 'watch' ];

//* Gulp task to run PostCSS for main stylesheet.
gulp.task( 'css', function() {

	gulp.src( PATHS.css + 'style.css' )
		.pipe(postcss([
			cssimport(),
			cssnext(),
			cssnano({
				autoprefixer: false,
				options: {
					safe: false
				}
			})
		]))
		.pipe(gulp.dest('./'));

});

//* Gulp task to run PostCSS on extra stylesheets.
gulp.task( 'css:front-page', function() {

	gulp.src( [
		PATHS.css + 'style.css',
		PATHS.css + 'extra/front-page.css'
		])
		.pipe(postcss([
			cssimport(),
			cssnext(),
			cssnano({
				autoprefixer: false,
				options: {
					safe: false
				}
			})
		]))
		.pipe( concat( "front-page-styles.min.css" ))
		.pipe(gulp.dest(PATHS.build.css));

});

//* Gulp task to combine JS files, minify, and output to bundle.min.js
gulp.task( 'scripts', function() {

	gulp.src( [
		PATHS.js + 'prism.js',
		PATHS.js + 'jquery-light.min.js',
		PATHS.js + 'responsive-menus.js',
		PATHS.js + 'global.js' ] )
		.pipe( uglify() )
		.pipe( concat('theme.min.js') )
		.pipe( gulp.dest( PATHS.build.js ) );

});

//* Watch files
gulp.task( 'watch', function() {

	gulp.watch( PATHS.js + '**/*.js', ['scripts'] );
	gulp.watch( PATHS.css + '**/*.css', ['css','css:front-page'] );

});

//* ZIP theme
gulp.task( 'package-theme', function() {

	gulp.src( [ './**/*', '!./node_modules/', '!./node_modules/**', '!./gulpfile.js', '!./package.json' ] )
		.pipe( zip( __dirname.split("/").pop() + '.zip' ) )
		.pipe( gulp.dest( '../' ) );

});

//* Translate theme
gulp.task( 'translate-theme', function() {

	gulp.src( [ './**/*.php' ] )
		.pipe( sort() )
		.pipe( wpPot({
			domain: "startertheme",
			headers: false
		}))
		.pipe( gulp.dest( './translation/' ));

});

//* Load tasks
gulp.task( 'default', taskLoader );
