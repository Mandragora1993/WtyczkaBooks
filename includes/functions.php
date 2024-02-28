<?php

function enqueue_custom_scripts_and_styles() {
    wp_enqueue_style( 'custom-style', plugin_dir_url( __FILE__ ) . 'style.css' );
    wp_enqueue_script( 'custom-script', plugin_dir_url( __FILE__ ) . 'script.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles' );