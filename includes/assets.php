<?php

defined('ABSPATH') || exit;

/**
 * Enqueue der CSS- und JS-Dateien des Plugins.
 */
add_action( 'wp_enqueue_scripts', 'prefix_load_scripts' );
 
function prefix_load_scripts() {
    wp_register_script( 'script', plugins_url( '../assets/js/checkout.js', __FILE__ ), array(), '1.0.0', true );
    wp_enqueue_script( 'script' );
}