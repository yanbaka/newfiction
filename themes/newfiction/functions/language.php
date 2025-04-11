<?php

function start_session() {
  if (!session_id()) {
      session_start();
  }
}
add_action('init', 'start_session', 1);

function set_language() {
  if (isset($_POST['lang'])) {
      $_SESSION['site_lang'] = sanitize_text_field($_POST['lang']);
  }
  wp_die();
}

add_action('wp_ajax_set_language', 'set_language');
add_action('wp_ajax_nopriv_set_language', 'set_language');


function get_language() {
  return isset($_SESSION['site_lang']) ? $_SESSION['site_lang'] : 'ja'; // デフォルトは日本語
}