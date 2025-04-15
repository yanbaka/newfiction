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
<?php
	global $post;
	$args = array(
		'post_type' => get_post_type(),
		'posts_per_page' => 1,
		'orderby' => 'date',
		'order' => 'ASC',
		'post_status' => 'publish',
		'date_query' => array(
			array(
				'after' => get_the_date( 'Y-m-d H:i:s', $post ),
				'inclusive' => false,
			),
		),
	);
	$next_posts = get_posts($args);
	$next_post = !empty($next_posts) ? $next_posts[0] : null;
?>
	<div class="next pt-6 px-4">
		<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo_black.png" alt="">
		<div class="mt-8 flex">
			<dl class="w-1/2">
				<dt>Scroll for next project</dt>
				<dd>↓</dd>
			</dl>
			<dl class="w-1/2">
				<dt>Get in touch</dt>
				<dd>kosuke@newfiction.org</dd>
			</dl>
		</div>
	</div>
	<div class="nextPost px-4 pt-24 pb-4" data-url="<?php echo get_permalink($next_post->ID); ?>">
		<h2 class="text-5xl fontSelectaMedium"><?php echo $next_post->post_title; ?></h2>
		<?php
			if ($next_post) {
				$post_type = get_post_type();
				$pods = pods($post_type, $next_post->ID);
				$visual = $pods->field('visual');
				$visual_url = $visual['guid'];
				echo "<div class=\"mt-8\"><img class=\"w-full\" src=\"{$visual_url}\" alt=\"\"></div>";
			}
		?>
	</div>
</main><!-- /#main -->
<?php get_footer(); ?>