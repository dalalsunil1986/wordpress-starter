/**
 *
 * Add .js class to body tag if JavaScript is enabled
 *
 * @since 1.0.0
 *
 */

(function() {

	document.addEventListener( 'DOMContentLoaded', function() {

		// Check for content.
		var code = document.querySelector( 'pre,code' );

		// Prism script.
		var prismScript  = document.createElement('script');
		prismScript.src  = '/wp-content/themes/calvinkoepke-com/build/js/prism.min.js';
		prismScript.type = 'text/javascript';

		// Load the script if there is any pre/code tags.
		if (code !== null) {
			document.body.appendChild(prismScript);
		}

	});

})();
