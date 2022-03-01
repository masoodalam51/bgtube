<?php
/*
Plugin Name: BGTube
Plugin URI: http://bloggyaani.com/speed-up-wordpress-site/
Description: Embed YouTube Video Lightly. Use [bgtube v="youtubevideoid"]
Author: Shaikh Masood Alam
Author URI: http://bloggyaani.com/
Version: 1.2
*/

//Disallow direct access
defined( 'ABSPATH' ) or die( 'No Access' );

add_action( 'wp_enqueue_scripts', 'bgtube_script' );
function bgtube_script() {
wp_register_script('bgtubejs', plugins_url( 'js/bgtube.js', __FILE__ ), '', '1.2', false );
wp_register_style('bgtubecss', plugins_url( 'css/bgtube.css', __FILE__ ) );
}

// bgtube Shortcode
function bgtube($attr) {
	wp_enqueue_script('bgtubejs');
	wp_enqueue_style('bgtubecss');
	$array = shortcode_atts(array(
	'v' => 'aqz-KE-bpKQ'
	), $attr);
	
	$output = '<div class="youtube-player" data-id="'.$array['v'].'"></div>';
	
	return $output;
}

add_shortcode( 'bgtube', 'bgtube' );
