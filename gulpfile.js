/**
 * The main gulpfile which includes all build pipelines for the assets directory.
 *
 * @package    Uno Free
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

// Import dependencies.
const autoprefixer = require( 'gulp-autoprefixer' );
const babel        = require( 'gulp-babel' );
const concat       = require( 'gulp-concat' );
const gulp         = require( 'gulp' );
const imagemin     = require( 'gulp-imagemin' );
const rename       = require( 'gulp-rename' );
const sass         = require( 'gulp-sass' );
const sourcemaps   = require( 'gulp-sourcemaps' );
const uglify       = require( 'gulp-uglify' );
const pump         = require( 'pump' );

// Path variables.
const PATHS = {
	modules: './node_modules',
	js: './assets/js',
	scss: './assets/scss',
	images: './assets/images',
	svg: './assets/svg',
	dist: {
		js: './dist/js',
		css: './dist/css',
		images: './dist/images',
		svg: './dist/svg'
	}
};

// Compile SCSS
gulp.task( 'scss:theme', function () {
	pump([
		gulp.src( PATHS.scss + '/theme.scss' ),
		sourcemaps.init(),
		sass({
			includePaths: [
				require('bourbon').includePaths
			]
		}).on( 'error', sass.logError ),
		autoprefixer(),
		rename( {extname: '.min.css'} ),
		sourcemaps.write( '.' ),
		gulp.dest( PATHS.dist.css )
	], function(err) {
		if ( ! err ) {
			console.log( 'Finished compiling theme scss files.');
		} else {
			console.log(err);
		}
	});
} );

gulp.task( 'build', [ 'scss:theme' ] );

// Default to the build task.
gulp.task( 'default', [ 'build' ] );