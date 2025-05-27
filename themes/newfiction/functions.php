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

add_action('init', function() {
    // 国コード取得
    if (!isset($_COOKIE['myplugin_session_flag'])) {
        $token = '679bff9a0a67c4';

        $countries = [
            'US' => 'en',
            'JP' => 'ja',
        ];

        $response = file_get_contents("https://ipinfo.io/json?token=$token");
        $data = json_decode($response, true);
        if (isset($data['country'])) {
          $country = $data['country'] ?? null;
          $countryCode = $countries[$country] ?? null;
          $_SESSION['site_lang'] = $countryCode;
        }
        
        // ブラウザ閉じるまで有効
        setcookie('myplugin_session_flag', '1', 0, '/');
    }
});