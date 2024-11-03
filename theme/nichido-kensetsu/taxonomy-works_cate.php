<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php 
	include( TEMPLATEPATH . '/inc/head.php' );
	$title = $post -> post_title;
	$archive_cate = 'works_cate';
	$get_term = wp_get_object_terms($post->ID, $archive_cate);
	$get_term_name = $get_term[0] -> slug; 
	$get_term_title = $get_term[0] -> name;
	$labels = get_queried_object() -> term_id;
	$labela = get_queried_object() -> name;

	// ページ取得
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	// カテゴリ取得 
	$post_type = get_post_type();
	$taxonomy = $archive_cate;		
	$args = array(
	'parent' => 0,
	'pad_counts' => true,
	'order'      => 'DESC',
	'hide_empty' => true
	);
	$terms = get_terms( $taxonomy , $args );
	foreach($terms  as $key => $val ){ 
	$term_link =  get_category_link( $val->term_id );
	$term_name =  $val->name;
	$term_active = '';
	if($labela == $term_name){
		$term_active = 'active';
	}
$cate .= <<< CATE
<a href="{$term_link}" class="{$term_active}"><span>●</span>{$term_name}</a>
CATE;		
}


$args = array(
	'posts_per_page'   => get_option('posts_per_page'),
	'post_type' => 'works',
	'order'           => 'DESC',
	'paged' => $paged,
	'orderby' => 'post_date',
	'tax_query'      => array(
array(
'taxonomy' =>$archive_cate,
'field'    => 'term_id', 
'terms'    => $labels
)));
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
		$tarm_name = $tarm_names[0]-> name;
		if($tarm_names){
			$tarm_name = $tarm_names[0]-> name;
			$tarm ='<p class="cate1 bgblu white">'.$tarm_name.'</p>';
		}else{
			$tarm="";
		}
$works .= <<< HTML
<li>
	<a href="{$colum_guid}" class="lista" aria-label="works"></a>
	<div class="img"><img src="{$columImg}" alt="works"></div>
	{$tarm}
	<p class="title">{$columTitle}</p>
	<p class="date lib">{$colum_date}</p>
</li>
HTML;
}
?>

<!-- header -->
<?php
	include( TEMPLATEPATH . '/inc/header.php' ); 
?>


<div class="artMvarea">
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><a href="<?=$url?>reform">リフォーム</a>&gt;</li><li>新築・注文住宅 施工事例</li></ul>
		<!-- cover -->
	<div class="artMv">
		<div class="mvIn">
			<h2>
			リフォーム 施工事例
			</h2>
			<span class="yugo">RENOVATION WORKS</span>
		</div>

	</div>
	<!-- /cover -->
</div>



<div id="main" class="bgwh">
	<div class="workMain">
		<div class="leftCate">
			<h3>CATEGORY</h3>
			<div class="linkArea">
				<a href="<?=$url?>reform/works/"><span>●</span>ALL</a>
				<?=$cate?>
			</div>
		</div>
			
			<div class="content02 work01">
				<div class="artin">
					<ul class="blog-list">
					<?=$works?>
					</ul>
					<div class="pager">
						<div class="pagination-list">
							<?php global $wp_rewrite;
								$paginate_base = get_pagenum_link(1);
								if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
									$paginate_format = '';
									$paginate_base = add_query_arg('paged','%#%');
								}else{
									$paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
									user_trailingslashit('page/%#%/','paged');;
									$paginate_base .= '%_%';
								}
								echo paginate_links(array(
									'base' => $paginate_base,
									'format' => $paginate_format,
									'total' => $wp_query->max_num_pages,
									'mid_size' => 2,
									'current' => ($paged ? $paged : 1),
									'prev_text' => '«',
									'next_text' => '»',
							)); ?>
						</div>
					</div>
				</div>
			</div>
		

		</div>
	</div>


</div><!-- /#main -->


<?php
	include( TEMPLATEPATH . '/inc/contact_area.php' );
?>
<?php
	wp_footer();
    require("inc/footer.php");
?>
</html>