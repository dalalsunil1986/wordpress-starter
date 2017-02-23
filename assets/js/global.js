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
		searchOn     = false,
		$popupClose  = $( '<button />', {
			id: 'popup-close'
		}).prepend( '<svg class="svg-icon" viewBox="0 0 20 20"><path d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z"></path></svg>' );

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
	$('.show-popup').add( $popupClose ).click( function(e) {
		e.preventDefault();
		$popup.toggleClass( 'visible' );
		$popup.find( '.widget-wrap' ).prepend( $popupClose );
	});

	/**
	 * Add 'stretch' class to code box after window has loaded.
	 *
	 * @since 1.0.0
	 */
	$(window).load( function() {
		$('.ck-code').parent().addClass('stretch');
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
