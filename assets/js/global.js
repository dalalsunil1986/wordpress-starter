/**
 * JavaScript functions for the theme (no jQuery).
 *
 * @since 2.0.0
 *
 */
(function() {

	"use strict";

	document.addEventListener('DOMContentLoaded', function() {

		// Check for content.
		var code = document.querySelector('pre,code');

		// Load the script if there is any pre/code tags.
		if (code !== null) {

			// Prism script.
			var src  = '/wp-content/themes/calvinkoepke-com/build/js/prism.min.js';

			loadJS(src);
			
		}

		window.addEventListener('load', function() {
			stickify('.nav-primary');
			stickify('.sidebar .enews-widget');
		});

		// Setup mobile menu toggle.
		var nav = document.querySelector('.nav-primary');

		// Add toggle button.
		nav.insertAdjacentHTML('beforeBegin', '<button class="button menu-toggle">Toggle Menu</button>');

		// Setup event handler.
		document.querySelector('.menu-toggle').addEventListener('click', function() {
			nav.classList.toggle('visible');
		});

	});

	/**
	 * Helper function to make an element sticky on scroll.
	 * @param  string selector Selector to be used (uses querySelector).
	 * @since 2.0.0
	 */
	function stickify(selector) {

		var el    = document.querySelector(selector),
			elTop = getOffset(el).top;

		// Update values on window resize.
		window.addEventListener('resize', function() {
			elTop = getOffset(el).top;
			checkStickify(el, elTop);
		});

		// Update sticky element on scroll position.
		window.addEventListener('scroll', function() {
			checkStickify(el, elTop);
		});

		// Trigger scroll event on load.
		document.addEventListener('DOMContentLoaded', triggerScroll());

	}

	/**
	 * Helper function to determine sticky state.
	 *
	 * @since 2.0.0
	 */
	function checkStickify(el, offsetTarget) {

		if ( window.scrollY > offsetTarget && ! el.classList.contains('stickify') ) {
			stickifyElement(el);
		}

		if ( window.scrollY < offsetTarget && el.classList.contains('stickify') ) {
			unStickifyElement(el);
		}
	}

	/**
	 * Helper function to initiate sticky state.
	 *
	 * @since 2.0.0
	 */
	function stickifyElement(el) {
		var elWidth = el.getBoundingClientRect().width;
		el.classList.add('stickify');
		el.setAttribute('style', 'width: ' + elWidth + 'px; top: 0;');
	}

	/**
	 * Helper function to denitiate sticky state.
	 *
	 * @since 2.0.0
	 */
	function unStickifyElement(el) {
		el.classList.remove('stickify');
		el.setAttribute('style', '');
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

	/**!
	 * Helper function for loading async scripts.
	 * Load a JS file asynchronously. [c]2014 @scottjehl, Filament Group, Inc. (Based on http://goo.gl/REQGQ by Paul Irish). Licensed MIT
	 */
	function loadJS( src, cb ){
 		var ref      = document.getElementsByTagName( "script" )[ 0 ];
 		var script   = document.createElement( "script" );
 		script.src   = src;
 		script.async = true;
 		ref.parentNode.insertBefore( script, ref );
 		if (cb && typeof(cb) === "function") {
 			script.onload = cb;
 		}
 		return script;
 	};

})();
