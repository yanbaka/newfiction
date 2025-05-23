<?php
/**
 * 初期設定ファイル
 */
$function_files = [
  '/functions/assets.php',
  '/functions/language.php',
];

foreach ($function_files as $file) {
  if ((file_exists(__DIR__ . $file))) { // ファイルが存在する場合
    // ファイルを読み込む
    locate_template($file, true, true);
  } else { // ファイルが見つからない場合
    // エラーメッセージを表示
    trigger_error("`$file`ファイルが見つかりません", E_USER_ERROR);
  }
}

// rest url
function generate_js_params() {
  ?>
    <script>
      let ajaxUrl = '<?php echo esc_html(admin_url( 'admin-ajax.php')); ?>';
    </script>
  <?php
  }
  add_action('wp_head', 'generate_js_params');