<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
	include( TEMPLATEPATH . '/inc/head.php' );
	$archive_cate = 'case_cate';
	$archive_cate2 = 'news_cate';
	$news = "";
	$case="";
	
// work
	$args = array(
		'posts_per_page'   => 6,
		'post_type' => 'case',
		'order'           => 'DESC',
		'paged' => $paged,
		'orderby' => 'post_date'
		);
	$getTypePosts = get_posts($args);

if( $getTypePosts ) {
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
} else {
	$case = '<li>只今準備中です。。。</li>';
}	//if

// 	news
	$args = array(
		'posts_per_page'   => 3,
		'post_type' => 'news',
		'order'           => 'DESC',
		'paged' => $paged,
		'orderby' => 'post_date'
		);
	$getTypePosts = get_posts($args);

	
if( $getTypePosts ){
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
		$tarm_names = get_the_terms($colum_id, $archive_cate2);
		if($tarm_names){
			$tarm_name = $tarm_names[0]-> name;
			$tarm ='<p class="cate2 blue">'.$tarm_name.'</p>';
		}else{
			$tarm="";
		}
$news .= <<< HTML
<li>
	<a href="{$colum_guid}" class="lista" aria-label="お知らせ"></a>
	<div class="img"><img src="{$columImg}" alt="お知らせ"></div>
	{$tarm}
	<p class="title">{$columTitle}</p>
	<p class="date lib">{$colum_date}</p>
</li>
HTML;
}
} else {
	$news = '<li>只今準備中です。。。</li>';
}	//if

?>
<?php
	include( TEMPLATEPATH . '/inc/header.php' ); 
?>


<!-- cover -->
<div id="cover">
	<div class="cov-div">
		<div class="slider">
			<div class="sld-box">
				<div class="sld sld1"></div>
			</div>
			<div class="sld-box">
				<div class="sld sld2"></div>
			</div>
			<div class="sld-box">
				<div class="sld sld3"></div>
			</div>
		</div>
		<h2 class="ab-h2 white ab">
			ずっと暮らしていく家を<br>
			ずっと平穏なものに
		</h2>
		<div class="img ab"><img src="<?=$site_url?>img/mv_bnr.svg" alt="新築住宅 施工実績 2,000棟以上" class="pc" width="200" height="200"><img src="<?=$site_url?>img/mv_bnr_sp.webp" alt="新築住宅 施工実績 2,000棟以上" class="sp" width="150" height="150"></div>
	</div>
	<p class="ab abp1 ver">日動建設株式会社</p>
	<p class="ab abp2 lib ver"><span>SCROLL</span></p>
</div>
<!-- /cover -->


<div id="main">
	<section class="content01 nami1">
		<div class="inner">
			<p class="ab abp yugo ver">NICHIDO.</p>
			<div class="con1-div">
				<h2 class="mainTit">
					<span class="yugo blue">FIRST.</span>
					新築注文住宅や増改築、小さなリフォームから<br class="pc">不動産売買まで日動建設にお任せ下さい。
				</h2>
				<p>
					生活をしていく上での基盤となる「衣食住」。そのうち、「住」は気候変動の大きい昨今、外部の環境から家族を守り、健康にも影響を及ぼす重要なものです。<br>
					私たちはこの住まいを通じて、安全、安心、そして快適な暮らしを提供できるよう努力してまいります。<br>
					住まいに関する事は、どんな小さな事でもお気軽にご相談ください。
				</p>
				<a href="<?=$url?>about/" class="bgbla white btn1">日動建設について</a>
			</div>
			<div class="ab img1"><img src="<?=$site_url?>img/co1.webp" alt="初めに" width="1338" height="716"></div>
		</div>
	</section>

	<section class="content02 bgblu2">
		<div class="inner">
			<h2 class="mainTit">
				<span class="yugo blue">WORK</span>
				新築・注文住宅施工事例
			</h2>
			<ul class="blog-list">
				<?=$case?>
			</ul>
			<a href="<?=$url?>newhouse/case" class="bgbla white btn1">一覧を見る</a>
		</div>
	</section>

	<section class="content03 nami2">
		<div class="img-area">
			<div class="img"><img src="<?=$site_url?>img/co31.webp" alt="新築・注文住宅について 家族団らん" width="960" height="520"></div>
			<div class="img"><img src="<?=$site_url?>img/co32.webp" alt="新築・注文住宅について 工事風景" width="960" height="520"></div>
		</div>
		<div class="inner">
			<div class="flex">
				<div class="left">
					<h2 class="mainTit">
						家を建てるということは人生の大きなイベント。<br>
						常にしっかりした家を建てるという心構えを忘れない。
					</h2>
					<p>
						小さな平屋であろうと、建売であろうと、生きていく限り住宅は住む人にとって、<br>
						平穏な生活であるべきものです。<br>
						日本の気候の下、安心して暮らせる事をまず旨とします。
					</p>
				</div>
				<div class="right">
					<a href="<?=$url?>newhouse/" class="bgbla white btn1">新築・注文住宅について</a>
				</div>
			</div>
		</div>
	</section>

	<section class="content04 bgblu2">
		<div class="inner">
			<h2 class="mainTit center">
				お知らせ
			</h2>
			<ul class="blog-list">
				<?=$news?>
			</ul>
			<a href="<?=$url?>news" class="bgbla white btn1">一覧を見る</a>
			<p class="ab abp lib ver">BLOG.</p>
		</div>
	</section>

</div><!-- /#main -->




<?php
	include( TEMPLATEPATH . '/inc/contact_area.php' );
?>
<?php
	wp_footer();
	include( TEMPLATEPATH . '/inc/footer.php' );
?>


</html>