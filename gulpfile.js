/**
 * Gulp tasks to produce production ready files.
 *
 * @author Calvin Koepke
 * @since 1.1.0
 */

'use strict';

// Path variables.
var PATHS = {
	js: './assets/js/',
	css: './assets/css/',
	build: {
		js: './build/js/',
		css: './build/css/'
	}
}

// Require and assign dependencies.
var gulp = require('gulp');
var concat = require('gulp-concat');
var postcss = require('gulp-postcss');
var cssnext = require('postcss-cssnext');
var cssimport = require('postcss-import');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var cssnano = require('cssnano');
var wpPot = require('gulp-wp-pot');
var zip = require('gulp-zip');

// Gulp task to run PostCSS for main stylesheet.
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

// Gulp task to run PostCSS on front page stylesheet.
gulp.task( 'css:front-page', function() {

	gulp.src( PATHS.css + 'extra/front-page.css' )
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
		.pipe(rename({ extname: '.min.css' }))
		.pipe(gulp.dest(PATHS.build.css));

});

// Gulp task to minify JS, concat, and output to theme.min.js.
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

// Watch files.
gulp.task( 'watch', function() {

	gulp.watch( PATHS.js + '**/*.js', ['scripts'] );
	gulp.watch( PATHS.css + '**/*.css', ['css','css:front-page'] );

});

// ZIP theme.
gulp.task( 'package-theme', function() {

	gulp.src( [ './**/*', '!./node_modules/', '!./node_modules/**', '!./gulpfile.js', '!./package.json' ] )
		.pipe( zip( __dirname.split("/").pop() + '.zip' ) )
		.pipe( gulp.dest( '../' ) );

});

// Translate theme.
gulp.task( 'translate-theme', function() {

	gulp.src( [ './**/*.php' ] )
		.pipe( sort() )
		.pipe( wpPot({
			domain: "startertheme",
			headers: false
		}))
		.pipe( gulp.dest( './translation/' ));

});

// Default task.
gulp.task( 'default', [
	'scripts',
	'css',
	'css:front-page',
	'watch',
] );
