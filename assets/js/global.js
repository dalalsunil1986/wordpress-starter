/**
 *
 * Add .js class to body tag if JavaScript is enabled
 *
 * @since 1.0.0
 *
 */

(function() {

	document.addEventListener('DOMContentLoaded', function() {

		// Trigger scroll event.
		triggerScroll();

		// Check for content.
		var code = document.querySelector('pre,code');

		// Prism script.
		var prismScript  = document.createElement('script');
		prismScript.src  = '/wp-content/themes/calvinkoepke-com/build/js/prism.min.js';
		prismScript.type = 'text/javascript';

		// Load the script if there is any pre/code tags.
		if (code !== null) {
			document.body.appendChild(prismScript);
		}

	});

	var nav      = document.querySelector('.nav-primary'),
		navTop   = getOffset(nav).top,
		navWidth = nav.getBoundingClientRect().width;

	window.addEventListener('scroll', function() {

		if ( window.scrollY > navTop && ! nav.classList.contains('fixed') ) {
			nav.classList.add('fixed');
			nav.setAttribute('style', 'width: ' + navWidth + 'px; top: 0');
		}

		if ( window.scrollY < navTop && nav.classList.contains('fixed') ) {
			nav.classList.remove('fixed');
			nav.setAttribute('style', '');
		}

	});

	function getOffset(el) {
		el = el.getBoundingClientRect();
		return {
			left: el.left + window.scrollX,
			top: el.top + window.scrollY
		}
	}

	function triggerScroll() {
		var event = new MouseEvent('scroll', {
			'view': window,
			'bubbles': true,
			'cancelable': false
		});
		window.dispatchEvent(event);
	}

})();
