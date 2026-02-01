<?php
/**
 * Accessibility Enhancements
 *
 * Provides accessibility features to improve site usability for users
 * with disabilities, including keyboard navigation and screen reader support.
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output skip to content link for keyboard navigation.
 *
 * Adds a hidden link at the beginning of the page that allows keyboard users
 * to skip directly to the main content area, bypassing navigation menus.
 * The link is visually hidden but accessible to screen readers and becomes
 * visible when focused via keyboard navigation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function vendia_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#primary-content">'
		. esc_html__( 'Skip to content', 'vendia' )
		. '</a>';
}
add_action( 'wp_body_open', 'vendia_skip_link' );