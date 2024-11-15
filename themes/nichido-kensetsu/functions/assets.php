<?php
// js
function register_js() {
  if (!is_admin()) {
    wp_register_script('js_properties', get_bloginfo('template_directory').'/js/properties.js', array(), false, true);
  }
}

function add_javascript() {
  register_js();

  if(is_page('properties')) {
    wp_enqueue_script('js_properties');
  }

}

add_action('wp_enqueue_scripts', 'add_javascript');

// css
function register_style() {
  if (!is_admin()) {
    wp_register_style('css_properties', get_bloginfo('template_directory').'/css/properties.css');
    wp_register_style('css_single_properties', get_bloginfo('template_directory').'/css/single-property.css');
  }
}

function add_stylesheet() {
  register_style();

  if(is_page('properties')) {
    wp_enqueue_style('css_properties');
  }

  if(is_singular(['properties_new', 'properties_used', 'properties_land', 'properties_condomini'])) {
    wp_enqueue_style('css_single_properties');
  }
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