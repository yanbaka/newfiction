<?php
function investment_setup() {
  //ここに関数の中身を記述します。
  add_theme_support( 'post-thumbnails' ); //アイキャッチ画像をON
  // add_theme_support( 'menus');  //メニュー機能をON
  
}
add_action( 'after_setup_theme', 'investment_setup' );

//　サムネイルの設定 --------------------------------------------------------------------------------
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
  add_image_size( 'mid_size', 395, 235, true );
  add_image_size( 'small_size', 50, 50, true );
  add_image_size( 'top-three_size', 236, 135, true );
  add_image_size( 'top-six_size', 224, 128, true );
  add_image_size( 'column_tmb', 220, 120, true );
  add_image_size( 'column_img', 700, 514, true );
  }

$site_url =  get_template_directory_uri().'/'; 
$url = home_url( '/' );

add_theme_support( 'title-tag' );

/*
    アーカイブページで現在のカテゴリー・タグ・タームを取得する
*/
// function get_current_term(){

//     $id;
//     $tax_slug;

//     if(is_category()){
//         $tax_slug = "category";
//         $id = get_query_var('cat'); 
//     }else if(is_tag()){
//         $tax_slug = "post_tag";
//         $id = get_query_var('tag_id');  
//     }else if(is_tax()){
//         $tax_slug = get_query_var('taxonomy');  
//         $term_slug = get_query_var('term'); 
//         $term = get_term_by("slug",$term_slug,$tax_slug);
//         $id = $term->term_id;
//     }

//     return get_term($id,$tax_slug);
// }


if( current_user_can( 'editor' ) ){
  add_action( 'admin_menu', 'remove_menus' );
  function remove_menus(){
      // remove_menu_page( 'index.php' ); //ダッシュボード
      remove_menu_page( 'edit.php' ); //投稿メニュー
      // remove_menu_page( 'upload.php' ); //メディア
      // remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
      remove_menu_page( 'edit-comments.php' ); //コメントメニュー
      remove_menu_page( 'themes.php' ); //外観メニュー
      remove_menu_page( 'plugins.php' ); //プラグインメニュー
      remove_menu_page( 'tools.php' ); //ツールメニュー
      remove_menu_page( 'options-general.php' ); //設定メニュー
      // remove_menu_page( 'edit.php?post_type=mw-wp-form' ); //フォーム
  }
}


// HTMLエディタで使用できるタグを追加
add_filter( 'wp_kses_allowed_html', 'customKsesAllowedHtml', 10, 2 );

function customKsesAllowedHtml( $tags, $context ) {
    if ( $context == 'post' ) {
        $tags['script'] = true;
        $tags['button'] = array(
            'data-hoge-hoge'=>true,
            'data-piyo-piyo'=>true,
            'class'=>true
        );
        $tags['div'] = array(
            'data-hoge-hoge'=>true,
            'data-piyo-piyo'=>true,
            'class'=>true,
            'id'=>true
        );
    }
    return $tags;
}

function disable_page_wpautop() {
	if ( is_page() ) remove_filter( 'the_content', 'contact' );
}
add_action( 'wp', 'disable_page_wpautop' );


if ( ! function_exists('tinymce_init') ) {
  function tinymce_init( $init ) {
      $init['verify_html'] = false; // 空タグや属性なしのタグを消させない
      $initArray['valid_children'] = '+body[style], +div[div|span|a], +span[span]'; // 指定の子要素を消させない
      return $init;
  }
  add_filter( 'tiny_mce_before_init', 'tinymce_init', 100 );
}

add_action('wp_enqueue_scripts', 'remove_block_library_style');
 function remove_block_library_style(){
     wp_dequeue_style('wp-block-library');
     wp_dequeue_style('wp-block-library-theme');
 }


// 固定ページp,br自動挿入禁止
add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content) {
  global $post;
  $remove_filter = false;
 
  //自動整形を無効にする投稿タイプを記述 ＝固定ページ
  // $arr_types = array('page');
  // $post_type = get_post_type( $post->ID );
  // if (in_array($post_type, $arr_types)){
  //   $remove_filter = true;
  // }
 
  //投稿ページ以外の自動整形を無効にしたければ
  if (!is_single()){
    $remove_filter = true;
  }
 
  // 特定のページの自動整形を無効にしたければ*****にページIDを入れる
//   if (get_the_ID() == *****){
//     $remove_filter = true;
//   }
 
  if ( $remove_filter ) {
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
  }
 
  return $content;
}


/**
 * Contact Form 7 "フリガナ"のバリデーション追加
 */
function custom_wpcf7_validate_kana($result,$tag)
{
    $tag   = new WPCF7_Shortcode($tag);
    $name  = $tag->name;
    $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";
 
	if ($name === "kana") {
		if(!preg_match("/^[ぁ-ん\s　]+$/u", $value)) {
			$result->invalidate( $tag,"平仮名で入力してください。");
		}
    }
    return $result;
}
add_filter('wpcf7_validate_text', 'custom_wpcf7_validate_kana', 11, 2);
add_filter('wpcf7_validate_text*', 'custom_wpcf7_validate_kana', 11, 2);

/**
 * 初期設定ファイル
 */
$function_files = [
  '/functions/assets.php',
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