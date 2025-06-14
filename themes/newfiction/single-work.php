<?php get_header(); ?>
<?php
	$post_type = get_post_type();
	$post_title = get_the_title();
	$pods = pods($post_type, get_the_ID());
	$visual = $pods->field('visual');
	$visual_url = $visual['guid'];
	$description = $pods->field('description');
	$description_ja = $pods->field('description_ja');
	$platform = $pods->field('platform');
	$contributions = $pods->field('contributions');
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
	<div class="px-4 py-6 md:pt-[200px] md:pb-16"><h2 class="fontSelectaMedium"><?php echo $post_title; ?></h2></div>
	<div class="px-4"><img class="w-full" src="<?php echo $visual_url ?>" alt=""></div>
	<div class="px-4 py-6 md:pt-8 md:pb-24">
		<div class="md:flex">
			<p class="description flex-1 md:mr-4"><?php get_template_part('template-parts/localize', null, [
					'ja' => $description_ja,
					'en' => $description,
				]); ?></p>
			<div class="profile md:flex-1 md:ml-4">
				<dl>
					<dt>
						<?php get_template_part('template-parts/localize', null, [
							'ja' => 'カテゴリ',
							'en' => 'CATEGORY'
						]); ?>
					</dt>
					<?php
						foreach ( $platform as $value ) {
							echo "<dd>{$value}</dd>";
						}
					?>
				</dl>
				<dl>
					<dt>
						<?php get_template_part('template-parts/localize', null, [
							'ja' => '貢献',
							'en' => 'CONTRIBUTIONS'
						]); ?>
					</dt>
					<?php
						foreach ( $contributions as $value ) {
							echo "<dd>{$value}</dd>";
						}
					?>
				</dl>
				<dl>
					<dt>
						<?php get_template_part('template-parts/localize', null, [
							'ja' => 'リンク',
							'en' => 'LINK'
						]); ?>
					</dt>
					<dd class="underline"><?php echo "<a href=\"{$linkUrl}\" target=\"_blank\">{$linkLabel}</a>" ?></dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="px-4 pt-4 pb-4">
		<?php
			foreach ( $images as $value ) {
				$imageUrl = $value['guid'];
				$imageName = $value['post_title'];
				echo "<img class='w-full mt-4' src='{$imageUrl}' alt='{$imageName}' />";
			}
		?>
	</div>
<?php
	global $post;

	$current_post = get_post();
	$current_order = (int) $current_post->menu_order;

	$args = array(
		'post_type' => get_post_type(),
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_status' => 'publish',
	);

	$all_posts = get_posts($args);

	$next_post = null;
	$found = false;

	foreach ($all_posts as $post) {
		if ($found) {
			$next_post = $post;
			break;
		}
		if ($post->ID === $current_post->ID) {
			$found = true;
		}
	}
?>
<?php if ($next_post): ?>
	<div class="next pt-6 px-4 transform-bg-color" data-color-from="#16161A" data-color-to="#FFFFFF">
		<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo_black.png" alt="">
		<div class="mt-8 flex">
			<dl class="w-1/2">
				<dt class="transform-color" data-color-from="#D1C9C9" data-color-to="#16161A">Scroll for next project</dt>
				<dd class="transform-color" data-color-from="#FFFFFF" data-color-to="#16161A">↓</dd>
			</dl>
			<dl class="w-1/2">
				<dt class="transform-color" data-color-from="#D1C9C9" data-color-to="#16161A">Get in touch</dt>
				<dd class="transform-color" data-color-from="#FFFFFF" data-color-to="#16161A"><!--email_off-->kosuke@newfiction.org<!--/email_off--></dd>
			</dl>
		</div>
	</div>
	<div class="next-post px-4 pt-[200px] pb-40 transform-bg-color" data-color-from="#16161A" data-color-to="#FFFFFF" data-url="<?php echo get_permalink($next_post->ID); ?>">
		<h2 class="fontSelectaMedium transform-color" data-color-from="#FFFFFF" data-color-to="#16161A"><?php echo $next_post->post_title; ?></h2>
		<?php
			if ($next_post) {
				$post_type = get_post_type();
				$pods = pods($post_type, $next_post->ID);
				$visual = $pods->field('visual');
				$visual_url = $visual['guid'];
				echo "<div class=\"mt-16\"><img class=\"w-full\" src=\"{$visual_url}\" alt=\"\"></div>";
			}
		?>
	</div>
<?php endif; ?>
</main><!-- /#main -->
<?php get_footer(); ?>