<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
	include( TEMPLATEPATH . '/inc/head.php' );
	$title = $post -> post_title;
?>
<?php
	include( TEMPLATEPATH . '/inc/header.php' ); 
?>

<div class="artMvarea">
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><a href="<?=$url?>properties">物件情報</a>&gt;</li><li><?=$title?></li></ul>
		<!-- cover -->
	<div class="artMv">
		<div class="mvIn">
			<h2>
			物件情報
			</h2>
			<span class="yugo">PROPERTIES</span>
		</div>

	</div>
	<!-- /cover -->
</div>

<div id="main">
	<div class="content">
		<?php
			get_template_part('template-parts/properties/property-head');
			get_template_part('template-parts/properties/single-photo');
			get_template_part('template-parts/properties/single-recommend');
			get_template_part('template-parts/properties/single-contact');
			get_template_part('template-parts/properties/single-detail');
		?>
		<a href="/properties">一覧に戻る</a>
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
