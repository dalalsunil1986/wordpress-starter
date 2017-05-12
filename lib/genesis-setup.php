<?php
/**
 * Add Genesis theme supports.
 *
 * @since 1.0.0
 */
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'html5',  array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'genesis-accessibility', array( 'search-form', 'headings' ) );
add_theme_support( 'genesis-structural-wraps', array( 'header' ) );

add_action( 'genesis_meta', 'ck_setup_layout' );
/**
 * Setup the entry layout depending on page type.
 *
 * @since 1.0.0
 */
function ck_setup_layout() {

	add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );

	if ( ! is_singular() ) {
		remove_all_actions( 'genesis_entry_footer' );
	}
}

add_filter( 'genesis_author_box_gravatar_size', 'ck_author_box_gravatar_size' );
/**
 * Set default author box gravatar size
 *
 * @since 1.0.0
 */
function ck_author_box_gravatar_size( $size ) {
	return '150';
}

add_filter( 'genesis_post_info', 'ck_post_info', 12 );
/**
 * Edit the entry meta info.
 *
 * @param  string $info String representing post meta info (includes shortcodes)/
 * @return string $info Updated string for post meta info.
 *
 * @since 2.0.0
 */
function ck_post_info( $info ) {
	$info = '[post_date]';
	return $info;
}

add_filter( 'wp_nav_menu_args', 'ck_nav_menu_args' );
/**
 * Limit the depth of primary and secondary navigations to 4 levels
 *
 * @since 1.0.0
 */
function ck_nav_menu_args( $args ) {

	if ( $args['theme_location'] == 'primary' || $args['theme_location'] == 'secondary' )
		$args['depth'] = 4;

	return $args;

}

add_filter( 'theme_page_templates', 'ck_remove_page_templates' );
/**
 * Unregister parent page templates
 *
 * @since 1.0.0
 */
function ck_remove_page_templates( $templates ) {

	unset( $templates['page_blog.php'] );
	return $templates;

}

/**
 * Move the primary nav to the header.
 *
 * @since 2.0.0
 */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 14 );

/**
 * Unregister sidebars.
 *
 * @since 2.0.0
 */
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'header-right' );

/**
 * Remove Genesis layouts.
 *
 * @since 1.0.0
 */
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

add_action( 'genesis_header', 'ck_grid_wrapper_open', 1 );
/**
 * Add grid wrapper open.
 *
 * @since 2.0.0
 */
function ck_grid_wrapper_open() {
	echo '<div class="grid-wrapper">';
}

add_action( 'genesis_footer', 'ck_grid_wrapper_close', 16 );
/**
 * Add grid wrapper close.
 *
 * @since 2.0.0
 */
function ck_grid_wrapper_close() {
	echo '</div>';
}
