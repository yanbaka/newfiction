<?php get_header(); ?>
<?php
    $args = array(
        'post_type'      => 'image_set',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
    );
    
    $custom_query = new WP_Query( $args );
?>
<main role="main" id="main" class="main"
	data-barba="container"
	data-barba-namespace="home"
	data-css="<?php echo get_template_directory_uri(); ?>/css/top.css"
	data-js="<?php echo get_template_directory_uri(); ?>/js/top.js"
	data-id="top"
>
	<div class="relative z-[2]">
		<p class="hero-title h-screen-sp px-4 py-6 text-4xl md:pt-[200px] md:pb-8 md:text-[80px] bg-white flex flex-col justify-between fontSelectaMedium">
			<span class="-enterAnimation pb-[0.1em] mb-[-0.1em]"><span data-animation-type="y">Product & Brand Design Studio.</span></span>
			<span class="-enterAnimation pb-[0.1em] mb-[-0.1em]"><span data-animation-type="y" class="delay-100">Based in Tokyo, Working Globally.</span></span>
		<p>
		<?php get_template_part('template-parts/top-imageset', null, [
			'id' => $custom_query->posts[0]->ID,
		]); ?>
		<?php get_template_part('template-parts/top-imageset', null, [
			'id' => $custom_query->posts[1]->ID,
			'class' => 'background-1',
		]); ?>
		<div class="h-screen md:hidden">
			<?php get_template_part('template-parts/top-link', null, [
				'id' => $custom_query->posts[0]->ID,
			]); ?>
		</div>
		<div class="h-screen bg-trigger md:hidden" data-bg-trigger-id="1" data-bg-type="clip">
			<?php get_template_part('template-parts/top-link', null, [
				'id' => $custom_query->posts[1]->ID,
			]); ?>
		</div>
		<div class="overview px-4 py-16 h-screen-sp md:py-40 bg-trigger" data-bg-trigger-id="2" data-bg-type="changer">
			<div class="md:pr-80">
				<p class="lead">
					<?php get_template_part('template-parts/localize', null, [
						'ja' => '日本のデジタルプロダクトとブランドを世界に響く形へ。文化的な感性を大切にしながら、その価値を引き上げます',
						'en' => 'We exist to elevate Japanese design in the digital space, ensuring they resonate globally while remaining culturally attuned.'
					]); ?>
				</p>
				<p class="text mt-4">
					<?php get_template_part('template-parts/localize', null, [
						'ja' => '日本ブランドを世界基準へと磨き上げるときも、海外ブランドの日本市場進出を支援するときも、それぞれの文脈に合わせた最適なアプローチを提供します。',
						'en' => 'Whether refining Japanese brands for the world stage or guiding international partners into the Japanese market, we tailor our approach to each unique context.'
					]); ?>
				</p>
			</div>
			<a href="<?php echo esc_url(home_url('/work')); ?>" class="see-the-work mt-8">See the work</a>
		</div>
		<?php get_template_part('template-parts/top-imageset', null, [
			'id' => $custom_query->posts[2]->ID,
			'class' => 'background-2',
		]); ?>
		<div class="h-screen md:hidden">
			<?php get_template_part('template-parts/top-link', null, [
				'id' => $custom_query->posts[2]->ID,
			]); ?>
		</div>
		<div class="bg-trigger" data-bg-trigger-id="3" data-bg-type="changer">
			<?php include get_template_directory() . '/components/flow.php'; ?>
			<div class="overview overview2 h-screen-sp px-4 md:py-40 md:pr-80">
				<p class="lead">
					<?php get_template_part('template-parts/localize', null, [
						'ja' => '多様な業界経験を活かし、あらゆる規模の企業と協業。プロダクトとブランドの掛け算で価値を生み出します',
						'en' => 'With diverse industry experience working with companies of all sizes across various fields, we play in the intersection of product and brand.'
					]); ?>
				</p>
			</div>
		</div>
		<div class="h-screen md:hidden">
			<?php get_template_part('template-parts/top-link', null, [
				'id' => $custom_query->posts[3]->ID,
			]); ?>
		</div>
		<?php get_template_part('template-parts/top-imageset', null, [
			'id' => $custom_query->posts[3]->ID,
			'class' => 'background-3',
		]); ?>
	</div>
</main><!-- /#main -->
<?php get_footer(); ?>