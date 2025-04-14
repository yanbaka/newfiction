<?php get_header(); ?>
<?php
    $args = array(
        'post_type'      => 'work',
        'posts_per_page' => 7,
        'post_status'    => 'publish',
        'orderby'        => array(
            'update_dt' => 'DESC', // 最新の日付順
        ),
    );
    
    $custom_query = new WP_Query( $args );
?>
<main role="main" id="main" class="main"
	data-barba="container"
	data-barba-namespace="work"
	data-css="<?php echo get_template_directory_uri(); ?>/css/work.css"
>
	<p class="px-4 pt-12 pb-8 text-[56px] copy">実用性と表現力を兼ね備えたプロダクト<p>
	<div class="px-4 pb-12 cards flex flex-wrap justify-between">
		<?php if($custom_query->have_posts()): ?>
			<?php while($custom_query->have_posts()): $custom_query->the_post(); ?>
				<?php
					$post_title = get_the_title();
					$post_url = get_permalink($post -> ID);
					$pods = pods(get_post_type(), get_the_ID());
					$thumbnail_data = $pods->field('thumbnail');
					$thumbnail_url = $thumbnail_data['guid'];
					$thumbnail = '<img src="' . esc_url($thumbnail_url) . '" alt="">';
					echo <<< EOM
						<a class="card mt-4" href="{$post_url}">
							{$thumbnail}
							<p class="caption mt-2">
								<span class="font-normal">{$post_title}</span>
								<span class="font-light"></span>
							</p>
						</a>
					EOM;
				?>
			<?php endwhile; ?>
		<?php else: ?>
			<p>No items</p>
		<?php endif; wp_reset_postdata(); ?>
	</div>
	<?php include get_template_directory() . '/components/flow.php'; ?>
</main><!-- /#main -->
<?php get_footer(); ?>