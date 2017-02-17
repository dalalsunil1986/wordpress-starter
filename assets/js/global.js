/**
 * Calvin Koepke
 *
 * Add the global scripts to the theme.
 *
 * @since 1.0.0
 */
(function($) {

	'use strict';

	var $header      = $('.site-header'),
		$overlay     = $('#site-overlay'),
		$footer      = $('.site-footer'),
		$popup       = $('#popup'),
		searchToggle = $('a[href="#search"]'),
		searchOn     = false;

	/**
	 * Adjust footer.
	 *
	 * @since 1.0.0
	 */
	$footer.css({
		position: "fixed"
	});
	$('.site-container').css({
		marginBottom: $footer.innerHeight()
	});

	/**
	 * Trigger widget popup.
	 *
	 * @since 1.0.0
	 */
	$('.show-popup').add('#popup-overlay').click( function(e) {
		e.preventDefault();
		$popup.toggleClass( 'visible' );
		$('#popup-overlay').toggleClass('visible');
	});

	/**
	 * Add 'stretch' class to code box after window has loaded.
	 *
	 * @since 1.0.0
	 */
	$(window).load( function() {
		$('.logic-code').parent().addClass('stretch');
	});

	/**
	 * Add class to header on scroll.
	 *
	 * @since 1.0.0
	 */
	$(window).scroll( function() {
		var scrollPos = window.scrollY;

		if ( scrollPos > 15 && ! $header.hasClass( 'filled' ) ) {
			$header.addClass( 'filled' );
		} else if ( scrollPos < 15 && $header.hasClass( 'filled' ) ) {
			$header.removeClass( 'filled' );
		}

	});

	/**
	 * Adjust ID targets to include header height.
	 *
	 * @since 1.0.0
	 */
	$( 'a[href*=#]:not([href=#])' ).click(function(e) {

		e.preventDefault();

		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $( '[name=' + this.hash.slice(1) + ']' );

			if (target.length) {

				$( 'html,body' ).scrollTop( ( target.offset().top ) - $header.height() );

				return false;

			}
		}

	});

	/**
	 * Add event listener to the search toggle button.
	 *
	 * @uses toggleSearch() Function to control state change.
	 *
	 * @since 1.0.0
	 */
	searchToggle.add( $overlay ).click( function(event) {

		// Prevent adding hash to URL.
		event.preventDefault();
		// Call search toggle function.
		toggleSearch();

	});

	/**
	 * Helper function to handle search toggling and state.
	 *
	 * @since 1.0.0
	 */
	function toggleSearch(originalText) {

		// Handle main state actions.
		if (!searchOn) {
			$header.find(searchToggle).text('Close');
			$overlay.toggleClass( 'visible' );
			searchOn = true;

		} else {
			$header.find(searchToggle).text('Search');
			$overlay.toggleClass( 'visible' );
			searchOn = false;

		}

		// Toggle active class on header.
		$header.toggleClass('search-visible');

		// Focus the search input if showing.
		if (searchOn) {

			$('#header-search input[type="search"]').focus();

		}

	}

})(jQuery);
