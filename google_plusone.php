<?php
/*
Plugin Name: Google +1 button
Plugin URI: http://fernando.alava.name/google-plusonegoogle-1-button-wordpress-plugin
Description:
Adds "Google +1 Button" after or before your post content. This plugin have an admin page so you can easily configure it.
Google +1 Button introduced on http://www.google.com/webmasters/+1/button/index.html
Version: 1.0.1
Author: Fernando Alava
Author URI: http://fernando.alava.name/
*/

function google_plusone_content($content) {
  $google_plusone_options = get_option('google_plusone_options');
  $position = $google_plusone_options['position'];
  if ($position == 'bottom') {
    $content .= get_google_plusone();
  } else if ($position == 'top'){
    $content = get_google_plusone() . $content;
  }
  return $content;
}
add_action('the_content', 'google_plusone_content');

function get_google_plusone() {
  global $post;
  $google_plusone_options = get_option('google_plusone_options');
  $size = $google_plusone_options['size'];
  if($size == 'standard') $size = '';
  else $size = <<< HTML
size="$size"
HTML;
  $url = get_permalink();
  $html = <<< HTML
<div class="google_plusone">
<g:plusone $size href="$url"></g:plusone>
</div>
HTML;
  return $html;
}

function google_plusone_init() {
  $google_plusone_options = array();
  $google_plusone_options['position'] = 'top';
  $google_plusone_options['size'] = 'standard';
  add_option('google_plusone_options', $google_plusone_options, 'Google +1 Options');
}
add_action('activate_google-plusone-button/google_plusone.php', 'google_plusone_init');

function google_plusone_header() {
  echo '<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>';
}
add_action('wp_head', 'google_plusone_header');

function google_plusone_config() { include('google_plusone_admin.php'); }
function google_plusone_config_page() {
  if(function_exists('add_submenu_page')) {
    add_options_page(__('Google +1'), __('Google +1'), 'manage_options', 'google_plusone_admin', 'google_plusone_config');
  }
}
add_action('admin_menu', 'google_plusone_config_page');
?>