/**
 *
 * Add .js class to body tag if JavaScript is enabled
 *
 * @since 1.0.0
 *
 */

(function($) {

	'use strict';

	$( document ).ready( function() {

		var $header      = $('.site-header'),
			$nav         = $('.nav-primary'),
			$body        = $('body'),
			$layer       = $('.layer-svg'),
			$poly 		 = $('#angled_background'),
			$polyAnimator= $('#angled_background_animator'),
			$searchWrap  = $('#header-search'),
			$searchForm  = $searchWrap.find('.search-form'),
			$searchInput = $searchForm.find('input[type="search"]'),
			searchToggle = $('a[href="#search"]'),
			searchOn     = false,
			polyValues   = $poly.attr('points'),
			navTop       = $nav.offset().top,
			bodyHeight   = $body.outerHeight(),
			layerHeight  = $layer.height(),
			$cog          = $('#cog-svg'),
			$overlay      = $('#site-overlay');

		/**
		 * Home functions.
		 */
		if ( is_home() ) {
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
		}


		searchToggle.click( function(e) {
			e.preventDefault();
			toggleSearch();
		});

		$('.site-inner,.footer-widgets,.site-footer').click( function() {
			if ( ! searchOn ) {
				return;
			}
			toggleSearch();
		});

		function focusPost( post ) {

			var html = '<article class="entry">';
				html += '<div class="entry-header"><h1 class="entry-title">' + post.title.rendered + '</h1></div>';
				html += '<div class="entry-content">' + post.content.rendered + '</div></article>';

			$body.removeClass( 'blog' ).addClass( 'single' );

			$('.archive-description').remove();
			$('.content').empty().html( html );
		}

		$('a[href="#login"]').click( function(e) {
			e.preventDefault();
			$('#login-popup').addClass( 'visible' );
			$('#overlay').addClass( 'visible' );
		});

		$('#site-overlay').click(function() {
			toggleSearch();
		});

		function toggleSearch() {
			if (!searchOn) {
				searchToggle.text('Close');
				$overlay.show();
				searchOn = true;
			} else {
				searchToggle.text('Search');
				$overlay.hide();
				searchOn = false;
			}
			$header.toggleClass('search-visible');
			if (searchOn) {
				$searchInput.focus();
			}
		}

		function is_home() {
			if ($body.hasClass('home')) {
				return true;
			} else {
				return false;
			}
		}

		function is_blog() {
			if ($body.hasClass('blog')) {
				return true;
			} else {
				return false;
			}
		}

		function is_loggedin() {
			if ($body.hasClass('admin-bar')) {
				return true;
			} else {
				return false;
			}
		}

		var scrollPos,
			$icon = $('.home-page-intro .ionicons');
		// $(window).scroll( function() {
		// 	$cog.css({
		// 		transform: 'translate3d(0,0,0) rotate(' + (window.scrollY / -30) + 'deg)'
		// 	});
		//
		// });

		var shiftTitle = null,
			$siteTitle = $('.site-title');
		var getGradientDeg = function() {
			var rand  = getRandomNumber( 0, 100 ),
				rand2 = 100 - rand,
				rand3 = getRandomNumber( 0, 360 ),
				css   = 'linear-gradient(' + rand3 + 'deg, #FFA400 ' + rand + '%, #0092DB ' + rand2 + '% )';

			return css;
		};

		// $siteTitle.hover( function() {
		// 	shiftTitle = setInterval( function() {
		// 		$siteTitle.css({
		// 			backgroundImage: getGradientDeg()
		// 		});
		// 	}, 5 );
		// }, function() {
		// 	clearInterval( shiftTitle );
		// 	$siteTitle.removeAttr( 'style' );
		// });

			// if ( value < 0 ) {
			//
			// 	$header.attr( "style", "translateY( " + value + " )");
			//
			// }
			//
			// if ( scrollTop > headerTopMax ) {
			// 	$header.addClass('fixed');
			// } else {
			// 	$header.removeClass('fixed');
			// }

			// if ( $header.hasClass('fixed') ) {
			// 	var position = $nav.offset().top,
			// 		value    = position - ( $header.height() - $nav.height() );
			//
			// 	$header.css( "top", -position );
			// }

		// $('.site-header > .wrap').on( "mouseover", function() {
		// 	$(this).mousemove( function( event ) {
		// 		var offsets       = $(this).offset(),
		// 			width         = $(this).width(),
		// 			height        = $(this).height(),
		// 			left          = Math.floor( ( event.pageX - offsets.left ) ),
		// 			top           = Math.floor( ( event.pageY - offsets.top ) ),
		// 			css           = $(this).css('transform( translate )');
		// 			skew          = "rotate3d( " + ( left / 10000 ) + ", " + ( top * 2 / 10000 ) + ", 0, .01deg )",
		// 			updatedCss    = css + skew;
		//
		// 		$(this).css( "transform", updatedCss );
		//
		// 	});
		// });
		//
		// $('.site-header').on( "mouseleave", function() {
		// 	$(this).off( "mousemove" );
		// 	$('.site-title').removeAttr('style');
		// });
		//
		function getRandomNumber (min, max) {
			return Math.floor(Math.random() * (max - min + 1) + min)
		}

	});

})( jQuery );
