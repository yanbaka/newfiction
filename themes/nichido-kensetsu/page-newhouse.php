<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
	include( TEMPLATEPATH . '/inc/head.php' );
	$title = $post -> post_title;
	$archive_cate = 'case_cate';
	$case = '';

	// ページ取得
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


	$args = array(
		'posts_per_page'   => 6,
		'post_type' => 'case',
		'order'           => 'DESC',
		'paged' => $paged,
		'orderby' => 'post_date'
		);
	$getTypePosts = get_posts($args);
		
	foreach( $getTypePosts as $key => $val ) {
		$columTitle = $val->post_title;
		$colum_id = $val->ID;
		$colum_guid = $val->guid;
		$post_date = $val->post_date;
		$colum_date = date("M.d.Y", strtotime($post_date));
		$colum_img = get_post_thumbnail_id($colum_id); 
		$colum_img_val = wp_get_attachment_image_src($colum_img,'large'); 
		if(!is_array($colum_img_val)){
			$columImg = $site_url.'img/noimage.png';
		}else{
			$columImg = $colum_img_val[0];
		}
		$tarm_names = array();
		$tarm_names = get_the_terms($colum_id, $archive_cate);
		if($tarm_names){
			$tarm_name = $tarm_names[0]-> name;
			$tarm ='<p class="cate1 bgblu white">'.$tarm_name.'</p>';
		}else{
			$tarm="";
		}
$case .= <<< HTML
<li>
	<a href="{$colum_guid}" class="lista" aria-label="news"></a>
	<div class="img"><img src="{$columImg}" alt="news"></div>
	{$tarm}
	<p class="title">{$columTitle}</p>
	<p class="date lib">{$colum_date}</p>
</li>
HTML;
}
//NULL対策
if ( $case == ''  ) {
		$case = '只今準備中です。';
}
?>

<!-- header -->
<?php
	include( TEMPLATEPATH . '/inc/header.php' );
?>


<div class="artMvarea">
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><?=$title?></li></ul>
		<!-- cover -->
	<div class="artMv">
		<div class="mvIn">
			<h2>
			<?=$title?>
			</h2>
			<span class="yugo"><?php the_subtitle(); ?></span>
		</div>

	</div>
	<!-- /cover -->
</div>

<div id="main">
<?=the_content();?>
	<section class="content02">
		<div class="artin">
			<h3 class="artit">
				新築・注文住宅施工事例
			</h3>
			<ul class="blog-list">
<?=$case?>
			</ul>
			<a href="<?=$url?>newhouse/case" class="bgbla white btn1">一覧を見る</a>
		</div>
	</section>

</div>

<?php
	include( TEMPLATEPATH . '/inc/contact_area.php' );
?>
<?php
	wp_footer();
	include( TEMPLATEPATH . '/inc/footer.php' );
?>
</html>