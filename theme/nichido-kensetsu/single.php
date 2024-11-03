<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
	include( TEMPLATEPATH . '/inc/head.php' );
	$title = $post -> post_title;
	$slug = $post -> post_name;
	$archive_cate = 'news_cate';

	$post_id = $post->ID;
	$post_date = $post->post_date;
	$colum_date = date("M.d.Y", strtotime($post_date));
	$tarm_names = get_the_terms($post_id, $archive_cate);
	$tarm_name = $tarm_names[0]-> name;
	if($tarm_name){
		$tarm ='<p class="cate1 bgblu white">'.$tarm_name.'</p>';
	}else{
		$tarm="";
	}
?>
<?php
	include( TEMPLATEPATH . '/inc/header.php' ); 
?>

<div class="artMvarea">
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><a href="<?=$url?>news">お知らせ</a>&gt;</li><li><?=$title?></li></ul>
		<!-- cover -->
	<div class="artMv">
		<div class="mvIn">
			<h2>
				お知らせ
			</h2>
			<span class="yugo">NEWS</span>
		</div>

	</div>
	<!-- /cover -->
</div>

<div id="main">
	<div class="detail01">
		<div class="artin">
				<div class="kijiBox">
					<div class="tit">
						<div class="deta">
							<p class="date lib"><?=$colum_date?></p>
							<?=$$tarm?>
						</div>
						<div class="kijiTit">
						<?=$title?>
						</div>
					</div>

				<div class="kiji">
				<?=the_content();?>
				</div>
				<a href="<?=$url?>news" class="bgbla white btn1">戻る</a>
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
