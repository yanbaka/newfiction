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
<main role="main" id="main" class="main"  data-barba="container" data-barba-namespace="work">
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
	<div class="flow px-4 py-24 flex">
		<div class="w-1/3">
			<p class="num text-[17px]">-1 → 0</p>
			<p class="title text-4xl font-medium mt-4">Research & Discovery</p>
			<p class="text text-[22px] mt-4">We conduct research and synthesize key findings, to build a strategic foundation that informs the process.</p>
		</div>
		<div class="w-1/3 ml-12">
			<p class="num text-[17px]">0 → 1</p>
			<p class="title text-4xl font-medium mt-4">Design for Launch</p>
			<p class="text text-[22px] mt-4">Our strength lies in 0-to-1 design. We draw from research and experience to land on a solution that makes sense.</p>
		</div>
		<div class="w-1/3 ml-12">
			<p class="num text-[17px]">1 → 2,3...</p>
			<p class="title text-4xl font-medium mt-4">Redesign & Refinement</p>
			<p class="text text-[22px] mt-4">From refinement to evolution to revolution. We operate under the belief that different is better than better.</p>
		</div>
	</div>
</main><!-- /#main -->
<?php get_footer(); ?>