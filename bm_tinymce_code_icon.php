<?php
/*
Plugin Name: My New TinyMCE Button
Plugin URI: http://hekate-design.pl
Description: Adds new button to TinyMCE to add pre tag
Version: 1.0
Author: Kasi 'bastetmilo' Świderska
Author URI: http://hekate-design.pl
License: GPL
*/
 
add_action('admin_head', 'bm_add_new_tc_button');

function bm_add_new_tc_button() {
    global $typenow;
    // sprawdzamy czy user ma uprawnienia do edycji postów/podstron
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
      return;
    }
    // weryfikujemy typ wpisu
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
   // sprawdzamy czy user ma włączony edytor WYSIWYG
   if ( get_user_option('rich_editing') == 'true') {
      add_filter("mce_external_plugins", "bm_add_tinymce_plugin");
      add_filter('mce_buttons', 'bm_register_my_tc_button');
   }
}

function bm_add_tinymce_plugin($plugin_array) {
  $plugin_array['bm_tc_button'] = plugins_url( '/script.js', __FILE__ );
  return $plugin_array;
}

function bm_register_my_tc_button($buttons) {
    array_push($buttons, "bm_tc_button");
    return $buttons;
}

add_action('admin_enqueue_scripts', 'bm_tc_css');

function bm_tc_css() {
    wp_enqueue_style('bm-tc', plugins_url( '/style.css', __FILE__));
}

?>