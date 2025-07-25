<?php get_header(); ?>
<?php
    $args = array(
        'post_type'      => 'work',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );
    
    $custom_query = new WP_Query( $args );
?>
<main role="main" id="main" class="main"
	data-barba="container"
	data-barba-namespace="work"
	data-css="<?php echo get_template_directory_uri(); ?>/css/work.css"
	data-js="<?php echo get_template_directory_uri(); ?>/js/work.js"
	data-id="work"
>
	<p class="px-4 py-6 md:pt-[200px] md:pb-8 copy">
		<span class="block -enterAnimation"><span data-animation-type="y">
			<?php get_template_part('template-parts/localize', null, [
				'ja' => '実用的で、スッと入ってくるプロダクトとアイデンティティのデザイン',
				'en' => 'Designing practical products and identities that communicate clearly.'
			]); ?>
		</span></span>
	<p>
	<div class="px-4 pb-12 cards flex flex-wrap justify-between">
		<?php if($custom_query->have_posts()): ?>
			<?php
				$i = 0;
				while($custom_query->have_posts()): $custom_query->the_post();
			?>
				<?php
					$post_title = get_the_title();
					$post_url = get_permalink($post -> ID);
					$pods = pods(get_post_type(), get_the_ID());
					$thumbnail_data = $pods->field('thumbnail');
					$thumbnail_url = $thumbnail_data['guid'];
					$thumbnail = '<img src="' . esc_url($thumbnail_url) . '" alt="">';
					$category = $pods->field('platform');
					$categoryDisplay = implode(', ', $category);
					$contributions = $pods->field('contributions');
					$contfibutionsDisplay = !empty($contributions[0]) ? ' / '.$contributions[0] : '';

					$delay = $i * 0.1;
					echo <<< EOM
						<a class="card mt-4 -enterAnimation" href="{$post_url}" data-animation-type="thumbnail" style="transition-delay: {$delay}s">
							{$thumbnail}
							<p class="caption mt-2 flex">
								<span class="font-normal">{$post_title}</span>
								<span class="font-light">&nbsp;{$categoryDisplay}{$contfibutionsDisplay}</span>
							</p>
						</a>
					EOM;
					$i++;
				?>
			<?php endwhile; ?>
		<?php else: ?>
			<p>No items</p>
		<?php endif; wp_reset_postdata(); ?>
	</div>
	<?php include get_template_directory() . '/components/flow.php'; ?>
</main><!-- /#main -->
<?php get_footer(); ?>