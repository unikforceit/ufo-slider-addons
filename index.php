<?php
/*
Plugin Name: UFO Slider Addons
Description: A plugin to display WooCommerce products with category tabs.
Version: 1.1
Author: UnikForce IT
License: GPL2
*/

// Ensure this file is loaded within WordPress.
defined('ABSPATH') || exit;

if( !function_exists( 'ufoslider_enqueue_scripts' ) ){
    function ufoslider_enqueue_scripts(){
        wp_enqueue_style( 'ufoslider-addons-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '', 'all' );
        wp_enqueue_style( 'ufoslider-addons-style', plugins_url( '/assets/ufoslider.css' , __FILE__ ), array(), '', 'all' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'ufoslider-addons-swiper',  'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array( 'jquery'), '', true );
        wp_enqueue_script( 'ufoslider-addons-script',  plugins_url( '/assets/ufoslider.js' , __FILE__ ), array( 'jquery'), '', true );

        $ajax_url = admin_url( 'admin-ajax.php' );
        $UFO_ADDON_DATA = array(
            'ajaxurl'   => $ajax_url,
            'site_url'  => site_url(),
        );
        wp_localize_script( 'ufoslider-addons-script', 'UFO_ADDON_DATA', $UFO_ADDON_DATA );
    }
}
add_action( 'wp_enqueue_scripts', 'ufoslider_enqueue_scripts' );

add_action('elementor/frontend/after_register_scripts', 'ufo_register_frontend_scripts', 10);
function ufo_register_frontend_scripts() {
    wp_enqueue_script( 'ufoslider-addons-editor',  plugins_url( '/assets/editor.js' , __FILE__ ), array( 'jquery'), '', true );
}

require_once( __DIR__ . '/helper.php' );

// Include the Elementor widget class.
function register_new_widgets( $widgets_manager ) {
    require_once( __DIR__ . '/widget/auto-slider/index.php' );
    require_once( __DIR__ . '/widget/slider/index.php' );
}
add_action( 'elementor/widgets/register', 'register_new_widgets' );
