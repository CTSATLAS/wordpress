<?php

/*
Plugin Name: Blank Slate
Plugin URI: https://github.com/wp-presskit/slate-kit
Description: A very minimal clean, simplified WordPress Admin theme originally based on the work of Ryan Sommers - Completely reworked the style added CSS pre-processor LESS and some more additional stuff
Link:
Version: 1.1.0
Author URI: https://github.com/wp-presskit/slate-kit
*/

function slate_kit_theme_files() {
  wp_enqueue_style( 'slate-kit-admin-theme', plugins_url('slate-kit.css', __FILE__), array(), '1.0.8' );
  wp_enqueue_script( 'slate', plugins_url( "js/slate.js", __FILE__ ), array( 'jquery' ), '1.0.8', true );
}
add_action( 'admin_enqueue_scripts', 'slate_kit_theme_files' );
add_action( 'login_enqueue_scripts', 'slate_kit_theme_files' );

function slate_theme_add_editor_styles() {
    add_editor_style( plugins_url('editor-style.css', __FILE__ ) );
}
add_action( 'after_setup_theme', 'slate_theme_add_editor_styles' );

add_filter('admin_footer_text', 'left_admin_footer_text_output');
function left_admin_footer_text_output($text) {
  $text = 'WordPress Admin Theme <a href="http://wordpress.org/plugins/slate-admin-theme/">Slate</a> by <a href="http://ryansommers.com/">Ryan Sommers</a> at <a href="http://sevenbold.com/">Seven Bold</a>';
  return $text;
}

