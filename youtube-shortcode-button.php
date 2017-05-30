<?php
/*
Plugin Name: Youtube Shortcode Button
Plugin URI: http://devolk.pl/
Description: This plugin adds Youtube shortcode button to visual editor.
Author: Michał Wilk
*/

function enqueue_plugin_scripts($plugin_array){
  $plugin_array["youtube_shortcode_plugin"] =  plugin_dir_url(__FILE__) . "index.js";
  return $plugin_array;
}
add_filter("mce_external_plugins", "enqueue_plugin_scripts");

function register_buttons_editor($buttons){
  array_push($buttons, "youtube_button");
  return $buttons;
}
add_filter("mce_buttons", "register_buttons_editor");

function append_iframe($atts){
  extract(shortcode_atts(array(
    'id' => false
  ), $atts));
	if( $id ){
		return '<div class="flex-video"><iframe width="1280" height="720" src="https://www.youtube.com/embed/'.$id.'?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>';
	} else {
		return '';
	}
}
add_shortcode('youtube', 'append_iframe');
