<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
	include( TEMPLATEPATH . '/inc/head.php' );
	$title = $post -> post_title;
	$page_url = get_page_link( $post -> ID );
	$newhouse = 'newhouse';
	$reform = 'reform';
?>

<!-- header -->
<?php
	include( TEMPLATEPATH . '/inc/header.php' );
?>


<div class="artMvarea">
	<?php
		if(strpos( $page_url, $newhouse ) !== false){
	?>
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><a href="<?=$url?>newhouse/">新築・注文住宅</a>&gt;</li><li><?=$title?></li></ul>
	<?php
		}elseif(strpos( $page_url, $reform ) !== false){
	?>
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><a href="<?=$url?>reform/">リフォーム</a>&gt;</li><li><?=$title?></li></ul>
	<?php
		}else{
	?>
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><?=$title?></li></ul>
	<?php
		}
	?>
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
</div>

<?php
	include( TEMPLATEPATH . '/inc/contact_area.php' );
?>
<?php
	wp_footer();
	include( TEMPLATEPATH . '/inc/footer.php' );
?>
</html>