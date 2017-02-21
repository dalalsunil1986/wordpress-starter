<?php

/*===========================================
=            Load Theme Defaults            =
===========================================*/

/**
 * Remove breadcrumbs.
 * @since 1.0.0
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

/**
 * Setup the current layout.
 * @since 1.0.0
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

/**
 * Modify the read more link on archives.
 * @since 1.0.0
 */
add_filter( 'excerpt_more', 'logic_more_link' );
add_filter( 'get_the_content_more_link', 'logic_more_link' );
add_filter( 'the_content_more_link', 'logic_more_link' );
function logic_more_link() {

	return sprintf( '...</p><p><a href="%s" class="more-link button button-block">%s</a></p>', get_the_permalink(), __( 'Read Full Post', TEXT_DOMAIN ) );

}

/**
 * Remove the site description.
 * @since 1.0.0
 */
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

/**
 * Modify the author bio gravatar size.
 * @since 1.0.0
 */
add_filter( 'genesis_author_box_gravatar_size', 'logic_author_box_gravatar_size' );
function logic_author_box_gravatar_size( $size ) {
	return '150';
}

/**
 * Modify the comment gravatar size.
 * @since 1.0.0
 */
add_filter( 'genesis_comment_list_args', 'logic_comment_gravatar_size' );
function logic_comment_gravatar_size( $args ) {
	$args['avatar_size'] = 100;
	return $args;
}

/**
 * Move after entry widget area.
 * @since 1.0.0
 */
remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );
add_action( 'genesis_entry_content', 'genesis_after_entry_widget_area', 10 );

/**
 * Remove the archive description boxes.
 *
 * @since 1.0.0
 */
remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title', 15 );

/**
 * Remove the default content thumbnail.
 *
 * @since 1.0.0
 */
// remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

/**
 * Unregister parent page templates
 *
 * @since 1.0.0
 */
add_filter( 'theme_page_templates', 'logic_remove_page_templates' );
function logic_remove_page_templates( $templates ) {

	unset( $templates['page_blog.php'] ); /* Default Blog Page Template */

	return $templates;

}

/**
 * Reposition the primary navigation.
 *
 * @since 1.0.0
 */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 14 );

/**
 * Get rid of sidebar markup.
 *
 * @since 1.0.0
 */
remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );

/**
 * Unregister unused widget areas.
 *
 * @since 1.0.0
 */
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'sidebar' );

/**
 * Unregister Genesis layouts.
 *
 * @since 1.0.0
 */
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar' );

/**
 * Reposition the default location of the secondary navigation to be at the very bottom.
 *
 * @since 1.0.0
 */
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after', 'genesis_do_subnav' );

/**
 * Update the post info string.
 * @return string Post read time in minutes.
 */
remove_all_actions( 'genesis_entry_footer' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_filter( 'genesis_post_info', 'logic_post_info' );
function logic_post_info( $post_info ) {

	$read = '<svg style="margin-left: 0" class="svg-icon" viewBox="0 0 20 20"><path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path></svg>';
	$comment = '<svg class="svg-icon" viewBox="0 0 20 20"><path d="M14.999,8.543c0,0.229-0.188,0.417-0.416,0.417H5.417C5.187,8.959,5,8.772,5,8.543s0.188-0.417,0.417-0.417h9.167C14.812,8.126,14.999,8.314,14.999,8.543 M12.037,10.213H5.417C5.187,10.213,5,10.4,5,10.63c0,0.229,0.188,0.416,0.417,0.416h6.621c0.229,0,0.416-0.188,0.416-0.416C12.453,10.4,12.266,10.213,12.037,10.213 M14.583,6.046H5.417C5.187,6.046,5,6.233,5,6.463c0,0.229,0.188,0.417,0.417,0.417h9.167c0.229,0,0.416-0.188,0.416-0.417C14.999,6.233,14.812,6.046,14.583,6.046 M17.916,3.542v10c0,0.229-0.188,0.417-0.417,0.417H9.373l-2.829,2.796c-0.117,0.116-0.71,0.297-0.71-0.296v-2.5H2.5c-0.229,0-0.417-0.188-0.417-0.417v-10c0-0.229,0.188-0.417,0.417-0.417h15C17.729,3.126,17.916,3.313,17.916,3.542 M17.083,3.959H2.917v9.167H6.25c0.229,0,0.417,0.187,0.417,0.416v1.919l2.242-2.215c0.079-0.077,0.184-0.12,0.294-0.12h7.881V3.959z"></path></svg>';
	$tag = '<svg class="svg-icon" viewBox="0 0 20 20"><path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path></svg>';
	$meta = '';

	if ( is_singular( 'post' ) ) {
		$content = get_the_content();
		$word_count = str_word_count( strip_tags( $content ) );
		$length = floor( $word_count / 200 );
		if ( $length > 0 ) {
			$post_info = sprintf( "<strong>About a %s minute read.</strong>", floor( $word_count / 200 ) );
		} else {
			$post_info = sprintf( "<strong>A very short read.</strong>", floor( $word_count / 200 ) );
		}
		$meta .= $read . $post_info . " [post_tags sep='&nbsp;- ' before='{$tag} ']";
	} else {
		$meta .= '[post_date]';
	}

	return $meta;

}

/**
 * Remove entry content on archive pages.
 *
 * @since 1.0.0
 */
add_action( 'genesis_before_loop', 'logic_remove_entry_content' );
function logic_remove_entry_content() {

	if ( is_archive() || is_home() || is_front_page() ) {
		remove_all_actions( 'genesis_entry_content' );
	}
}

/**
 * Move the footer outside of the container wrapper.
 *
 * @since 1.0.0
 */
remove_all_actions( 'genesis_footer' );
add_action( 'genesis_after', 'genesis_footer_markup_open', 5 );
add_action( 'genesis_after', 'genesis_do_footer' );
add_action( 'genesis_after', 'genesis_footer_markup_close', 15 );

/**
 * Modify the footer credit text.
 *
 * @param string  $creds Default HTML for credits.
 * @return string $creds Updated HTML for credits.
 *
 * @since 1.0.0
 */
add_filter( 'genesis_footer_creds_text', 'logic_footer_credtis' );
function logic_footer_credtis( $creds ) {

	$creds = sprintf( '<a target="_blank" href="https://github.com/cjkoepke/calvinkoepke-com">Fork This Theme</a> • Built on <a href="https://www.studiopress.com/features" target="_blank">Genesis</a> • Hosted on <a href="http://my.studiopress.com/plans/" target="_blank">StudioPress Sites</a><br/> <small>Credits: Background by <a href="http://www.freepik.com" follow="nofollow">FreePik</a>, Code Highlighter by <a href="http://prismjs.com" target="_blank" follow="nofollow">Prism</a></small>', date( 'Y' ) );

	return $creds;

}
