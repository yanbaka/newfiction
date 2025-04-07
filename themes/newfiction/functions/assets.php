<?php
// js
function register_js() {
  if (!is_admin()) {
    wp_register_script('js_projects', get_bloginfo('template_directory').'/js/projects.js', array(), false, true);
    wp_register_script('js_single_projects', get_bloginfo('template_directory').'/js/single-projects.js', array(), false, true);
  }
}

function add_javascript() {
  register_js();

  if(is_archive('projects')) {
    wp_enqueue_script('projects');
  }


  if(is_singular(['projects'])) {
    wp_enqueue_script('js_single_projects');
  }

}

add_action('wp_enqueue_scripts', 'add_javascript');

// css
function register_style() {
  if (!is_admin()) {
    wp_register_style('css_tailwind', get_bloginfo('template_directory').'/css/tailwind.css');
    wp_register_style('css_projects', get_bloginfo('template_directory').'/css/projects.css');
    wp_register_style('css_single_projects', get_bloginfo('template_directory').'/css/single-projects.css');
    wp_register_style('css_contact', get_bloginfo('template_directory').'/css/contact.css');
  }
}

function add_stylesheet() {
  register_style();
  wp_enqueue_style('css_tailwind');

  if(is_page('contact')) {
    wp_enqueue_style('css_contact');
  }

  if(is_archive('projects')) {
    wp_enqueue_style('css_projects');
  }

  if(is_singular(['projects'])) {
    wp_enqueue_style('css_single_projects');
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