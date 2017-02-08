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
		searchToggle = $('a[href="#search"]'),
		searchOn     = false;

	/**
	 * Add 'stretch' class to code box after window has loaded.
	 *
	 * @since 1.0.0
	 */
	$( window ).load( function() {

		$('.logic-code').parent().addClass('stretch');

	});

	/**
	 * Control scroll to page section on the homepage.
	 *
	 * @since 1.0.0
	 */
	$( '.home-page-intro a[href*=#]:not([href=#])' ).click(function() {

		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $( '[name=' + this.hash.slice(1) + ']' );

			if (target.length) {

				$( 'html,body' ).animate({
					scrollTop: ( target.offset().top ) - $header.height()
				}, 750 );

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
	function toggleSearch() {

		// Handle main state actions.
		if (!searchOn) {

			searchToggle.text('Close');
			$overlay.show();
			searchOn = true;

		} else {

			searchToggle.text('Search');
			$overlay.hide();
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
