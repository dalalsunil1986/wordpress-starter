/**
 * JavaScript functions for the theme (no jQuery).
 *
 * @since 2.0.0
 *
 */
(function() {

	document.addEventListener('DOMContentLoaded', function() {

		// Check for content.
		var code = document.querySelector('pre,code');

		// Prism script.
		var prismScript  = document.createElement('script');
		prismScript.src  = '/wp-content/themes/calvinkoepke-com/build/js/prism.min.js';
		prismScript.type = 'text/javascript';

		// Load the script if there is any pre/code tags.
		if (code !== null) {
			window.addEventListener('load', function() { document.body.appendChild(prismScript); });
		}

		stickify('.nav-primary');
		stickify('.sidebar .enews-widget');

	});

	/**
	 * Helper function to make an element sticky on scroll.
	 * @param  string el Selector to be used (uses querySelector).
	 * @since 2.0.0
	 */
	function stickify(el) {

		var el       = document.querySelector(el),
			elTop    = getOffset(el).top,
			elWidth  = el.getBoundingClientRect().width;

		window.addEventListener('scroll', function() {

			if ( window.scrollY > elTop && ! el.classList.contains('stickify') ) {
				el.classList.add('stickify');
				el.setAttribute('style', 'width: ' + elWidth + 'px; top: 0;');
			}

			if ( window.scrollY < elTop && el.classList.contains('stickify') ) {
				el.classList.remove('stickify');
				el.setAttribute('style', '');
			}

		});

		// Trigger scroll event on load.
		document.addEventListener('DOMContentLoaded', triggerScroll());

	}

	/**
	 * Helper function to get the offset.
	 * @param  node   el DOM Node to get the offset for.
	 * @return object    Object containing offset information.
	 * @since  2.0.0
	 */
	function getOffset(el) {
		el = el.getBoundingClientRect();
		return {
			left: el.left + window.scrollX,
			top: el.top + window.scrollY
		}
	}

	/**
	 * Manually trigger a scroll event.
	 * @return undefined
	 * @since 2.0.0
	 */
	function triggerScroll() {
		var event = new MouseEvent('scroll', {
			'view': window,
			'bubbles': true,
			'cancelable': false
		});
		window.dispatchEvent(event);
	}

})();
