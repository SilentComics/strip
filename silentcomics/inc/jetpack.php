<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package SilentComics
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function silentcomics_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'silentcomics_infinite_scroll_setup' );

/**
 * Add or remove content filters
 *
 * During the image and gallery post format loops, we need to remove some
 * of the_excerpt filters to avoid rendering ratings because in these
 * format, the_excerpt and the_content can exist together at the same time.
 *
 * @param $mute bool Set to true to remove filters, false to add them back
 */
function silentcomics_set_content_filters( $mute = true ) {
	static $filters = false;

	if ( false == $filters ) {
		$filters = array(
			array( 'tag' => 'the_excerpt', 'callback' => 'polldaddy_show_rating', 'priority' => 10 ),
			array( 'tag' => 'the_excerpt', 'callback' => 'sharing_display', 'priority' => 19 ),
		);
	}

	if ( $mute ) {
		foreach ( $filters as $key => $filter ) {
			$filters[ $key ]['removed'] = remove_filter( $filter['tag'], $filter['callback'], $filter['priority'] );
		}
	} else {
		foreach ( $filters as $key => $filter ) {
			if ( ! empty( $filter['removed'] ) && $filter['removed'] ) {
				add_action( $filter['tag'], $filter['callback'], $filter['priority'] );
				unset( $filters[ $key ]['removed'] );
			}
		}
	}
}

/**
 * Mute content filters
 *
 * @uses silentcomics_set_content_filters
 */
function silentcomics_mute_content_filters() {
	return silentcomics_set_content_filters( true );
}

/**
 * Unmute content filters
 *
 * @uses silentcomics_set_content_filters
 */
function silentcomics_unmute_content_filters() {
	return silentcomics_set_content_filters( false );
}

// Remove content filters before formatted posts output, and add them back right after.
add_action( 'silentcomics_formatted_posts_excerpt_before', 'silentcomics_mute_content_filters' );
add_action( 'silentcomics_formatted_posts_excerpt_after', 'silentcomics_unmute_content_filters' );
