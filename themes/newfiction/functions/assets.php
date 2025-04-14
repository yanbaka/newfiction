<?php
// js
function register_js() {
  if (!is_admin()) {
    wp_register_script('js_app', get_bloginfo('template_directory').'/js/app.js', array(), false, true);
    wp_register_script('js_top', get_bloginfo('template_directory').'/js/top.js', array(), false, true);
    wp_register_script('js_work', get_bloginfo('template_directory').'/js/work.js', array(), false, true);
    wp_register_script('js_single_work', get_bloginfo('template_directory').'/js/single-work.js', array(), false, true);
  }
}

function add_javascript() {
  register_js();
  wp_enqueue_script('js_app');

  if(is_front_page()) {
    // wp_enqueue_script('js_top');
  }

  if(is_archive('work')) {
    // wp_enqueue_script('js_work');
  }


  if(is_singular(['work'])) {
    // wp_enqueue_script('js_single_work');
  }

}

add_action('wp_enqueue_scripts', 'add_javascript');

// css
function register_style() {
  if (!is_admin()) {
    wp_register_style('css_tailwind', get_bloginfo('template_directory').'/css/tailwind.css');
    wp_register_style('css_app', get_bloginfo('template_directory').'/css/app.css');
    wp_register_style('css_top', get_bloginfo('template_directory').'/css/top.css');
    wp_register_style('css_about', get_bloginfo('template_directory').'/css/about.css');
    wp_register_style('css_work', get_bloginfo('template_directory').'/css/work.css');
    wp_register_style('css_single_work', get_bloginfo('template_directory').'/css/single-work.css');
  }
}

function add_stylesheet() {
  register_style();
  wp_enqueue_style('css_tailwind');
  wp_enqueue_style('css_app');

  if(is_front_page()) {
    // wp_enqueue_style('css_top');
  }

  if(is_page('about')) {
    // wp_enqueue_style('css_about');
  }

  if(is_archive('work')) {
    // wp_enqueue_style('css_work');
  }

  if(is_singular(['work'])) {
    // wp_enqueue_style('css_single_work');
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