<?php
/*
 * Plugin Name: WP WebApp Viewer
 * Plugin URI: http://norbat.de/plugins
 * Description: This plugin will show the mobile Version of a WebApp inside an iframe HTML element which is wrapped into two DIV containers. The outer DIV container holds an image of a mobile device (i.e. iPhone or iPad) and the inner DIV container wrapps the iframe element with the source of the WebApp.
 * Version: 1.0
 * Author: Norbert Mesch
 * Author URI: https://norbat.de
 * License: GPL2
 */

add_action('init', 'nme_register_shortcode');

function nme_register_shortcode(){
    add_shortcode('webappviewer', 'nme_webappviewer');
}

function nme_webappviewer($attr){
    
    extract(shortcode_atts(array(
        'width' => '375px',
        'height' => '667px',
        'outerstyle' => 'deviceholderflat',
        'innerstyle' => 'devicedisplayflat',
        'src'   => 'http://yourdomain.xyz'
    ), $attr));
    $webappcode = "<center><div class='{$outerstyle}'><div class='{$innerstyle}'><iframe width='{$width}' height='{$height}' src='{$src}'></iframe></div></div></center>";
    return $webappcode;    
}

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_style( 'nme-webappviewer', plugins_url( 'wp_webappviewer/css/wpwebappviewer.css' ) );
	wp_enqueue_style( 'nme-webappviewer' );
}
?>