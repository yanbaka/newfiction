<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php 
	include( TEMPLATEPATH . '/inc/head.php' );
?>

<!-- header -->
<?php
	include( TEMPLATEPATH . '/inc/header.php' ); 
?>

<div class="artMvarea">
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li>物件情報</li></ul>
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
		<div class="filter">
			<?php
				get_template_part('template-parts/properties/filter', null, ['title' => '種類から探す', 'taxonomy' => 'properties_type']);
				get_template_part('template-parts/properties/filter', null, ['title' => '沿線から探す', 'taxonomy' => 'properties_line']);
				get_template_part('template-parts/properties/filter', null, ['title' => 'エリアから探す', 'taxonomy' => 'properties_area']);
			?>
		</div>
		<div class="property">
			<?php
				get_template_part('template-parts/properties/property');
			?>
		</div>
	</div>

</div><!-- /#main -->

<?php
	wp_footer();
    require("inc/footer.php");
?>
</html>