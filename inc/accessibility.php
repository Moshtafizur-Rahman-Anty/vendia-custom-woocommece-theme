<?php
/**
 * Accessibility enhancements
 *
 * @package Vendia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vendia_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#primary-content">'
		. esc_html__( 'Skip to content', 'vendia' ) .
	'</a>';
}
add_action( 'wp_body_open', 'vendia_skip_link' );
