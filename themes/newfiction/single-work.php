<?php get_header(); ?>
<?php
	$post_type = get_post_type();
	$post_title = get_the_title();
	$pods = pods($post_type, get_the_ID());
	$visual = $pods->field('visual');
	$visual_url = $visual['guid'];
	$description = $pods->field('description');
	$industry = $pods->field('industry');
	$platform = $pods->field('platform');
	$contributions = $pods->field('contributions');
	$industry = $pods->field('industry');
	$linkLabel = $pods->field('link_label');
	$linkUrl = $pods->field('link_url');
	$images = $pods->field('images');
?>
<main role="main" id="main" class="main"
	data-barba="container"
	data-barba-namespace="pdp"
	data-css="<?php echo get_template_directory_uri(); ?>/css/single-work.css"
	data-js="<?php echo get_template_directory_uri(); ?>/js/single-work.js"
	data-id="pdp"
>
	<div class="px-4"><img class="w-full" src="<?php echo $visual_url ?>" alt=""></div>
	<div class="px-4 pt-8 pb-24">
		<div class="flex">
			<h2 class="w-1/2 text-5xl fontSelectaMedium"><?php echo $post_title; ?></h2>
			<p class="w-1/2 text-[22px] fontSelectaRegular"><?php echo $description; ?></p>
		</div>
		<div class="profile flex mt-8 pt-4 border-t border-[#E5E1E1]">
			<dl>
				<dt>INDUSTRY</dt>
				<?php
					foreach ( $industry as $value ) {
						echo "<dd>{$value}</dd>";
					}
				?>
			</dl>
			<dl>
				<dt>PLATFORM</dt>
				<?php
					foreach ( $platform as $value ) {
						echo "<dd>{$value}</dd>";
					}
				?>
			</dl>
			<dl>
				<dt>CONTRIBUTIONS</dt>
				<?php
					foreach ( $contributions as $value ) {
						echo "<dd>{$value}</dd>";
					}
				?>
			</dl>
			<dl>
				<dt>LINK</dt>
				<dd class="underline"><?php echo "<a href=\"{$linkUrl}\" target=\"_blank\">{$linkLabel}</a>" ?></dd>
			</dl>
		</div>
	</div>
	<div class="px-4 pt-4">
		<?php
			foreach ( $images as $value ) {
				$imageUrl = $value['guid'];
				$imageName = $value['post_title'];
				echo "<img class='w-full mt-4' src='{$imageUrl}' alt='{$imageName}' />";
			}
		?>
	</div>
</main><!-- /#main -->
<?php get_footer(); ?>