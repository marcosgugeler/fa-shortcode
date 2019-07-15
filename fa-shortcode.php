<?php
/*
Plugin Name: Easy Shortcode for Font Awesome
Plugin URI: http://wordpress.org/plugins/fa-shortcode/
Description: Adds a font awesome shortcode to your WordPress
Author: Marcos Gugeler
Version: 1.0.0
Author URI: https://www.linkedin.com/in/marcosgugeler/
*/

function fa_shortcode_scripts() {
    wp_enqueue_style( 'style-name', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'fa_shortcode_scripts' );

function overwrite_shortcode_fontawesome() {
    function get_fontawesome( $atts ){
        $a = shortcode_atts( array(
            'icon' => 'rocket',
        ), $atts );
        return '<i class="far fas fa-'.$a['icon'].'"></i>';
    }
    remove_shortcode( 'fontawesome' );
    add_shortcode( 'fontawesome', 'get_fontawesome' );
}
add_action('wp_loaded', 'overwrite_shortcode_fontawesome');
