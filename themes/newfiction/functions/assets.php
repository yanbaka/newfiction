<?php
// js
function register_js() {
  if (!is_admin()) {
    wp_register_script('js_app', get_bloginfo('template_directory').'/js/app.js', array(), false, true);
  }
}

function add_javascript() {
  register_js();
  wp_enqueue_script('js_app');
}

add_action('wp_enqueue_scripts', 'add_javascript');

// css
function register_style() {
  if (!is_admin()) {
    wp_register_style('css_tailwind', get_bloginfo('template_directory').'/css/tailwind.css');
    wp_register_style('css_app', get_bloginfo('template_directory').'/css/app.css');
    wp_register_style('css_customize', get_bloginfo('template_directory').'/css/customize.css');
  }
}

function add_stylesheet() {
  register_style();
  wp_enqueue_style('css_tailwind');
  wp_enqueue_style('css_app');
  wp_enqueue_style('css_customize');
}
add_action('wp_enqueue_scripts', 'add_stylesheet');

function is_subpage() {
  global $post;
  if (is_page() && $post->post_parent) {
      return $post->post_parent;
  } else {
      return false;
  }
}

function is_parent_slug() {
  global $post;
  if ( is_null( $post ) ) { return; }
  if ($post->post_parent) {
    $post_data = get_post($post->post_parent);
    return $post_data->post_name;
  }
}