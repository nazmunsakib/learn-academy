<?php

namespace myacademy\Frontend;

/**
 * The short code class
 */
class Shortcode {

	function __construct() {

		add_shortcode( 'learn-academy', [ $this, 'render_shortcode' ] );

	}

	/**
	 * @param $atts
	 * @param $content
	 *
	 * @return string
	 */

	function render_shortcode($atts, $content) {
		return "Hello Form ShortCode";
	}
}