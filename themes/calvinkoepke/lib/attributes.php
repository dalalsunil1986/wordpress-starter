<?php

add_filter( 'genesis_attr_nav-secondary', 'ck_add_nav_secondary_id' );
/**
 * Add a custom ID to the secondary nav (if active)
 *
 * @since 1.0.0
 */
function ck_add_nav_secondary_id( $attributes ) {

	$attributes['id'] = 'genesis-nav-secondary';
	return $attributes;

}

add_filter( 'genesis_skip_links_output', 'ck_add_nav_secondary_skip_link' );
/**
 * Add skip-link for the secondary navigation if accessibility is turned on
 *
 * @since 1.0.0
 */
function ck_add_nav_secondary_skip_link( $links ) {

	$new_links = $links;
	array_splice( $new_links, 1 );

	if ( has_nav_menu( 'secondary' ) ) {
		$new_links['genesis-nav-secondary'] = __( 'Skip to secondary navigation', 'ck' );
	}

	return array_merge( $new_links, $links );

}
