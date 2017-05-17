<?php

add_filter( 'body_class', 'ck_body_classes' );
/**
 * Apply common classes to the body tag, depending on the current view
 *
 * @since 1.0.0
 */
function ck_body_classes( $classes ) {

	if ( is_front_page() )
		$classes[] = 'page-front';

	if ( is_archive() || is_search() || is_home() )
		$classes[] = 'archive';

	if ( is_page_template() && get_page_template_slug() != false ) {

		$template = basename( get_page_template_slug() );
		$template_class = str_replace( '.php', '', $template );

		$classes[] = $template_class;
	}

	return $classes;

}
