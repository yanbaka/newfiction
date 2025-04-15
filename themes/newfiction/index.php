<?php get_header(); ?>
<main role="main" id="main" class="main"
	data-barba="container"
	data-barba-namespace="home"
	data-css="<?php echo get_template_directory_uri(); ?>/css/top.css"
	data-js="<?php echo get_template_directory_uri(); ?>/js/top.js"
	data-id="top"
>
	<div class="relative z-[2]">
		<p class="px-4 pt-[200px] pb-8 text-[80px] bg-white flex flex-col fontSelectaMedium">
			<span class="inline-block -enterAnimation"><span data-animation-type="y">Product & Brand Design Studio.</span></span>
			<span class="inline-block -enterAnimation"><span data-animation-type="y" class="delay-100">Based in Tokyo, Working Globally.</span></span>
		<p>
		<div class="h-screen"></div>
		<div class="h-screen bg-trigger" data-bg-trigger-id="1" data-bg-type="clip"></div>
		<div class="overview px-4 py-[250px] min-h-screen bg-trigger" data-bg-trigger-id="2" data-bg-type="changer">
			<p class="lead">日本のデジタルプロダクトとブランドを世界に響く形へ。文化的な感性を大切にしながら、その価値を引き上げます</p>
			<p class="text mt-4">日本ブランドを世界基準へと磨き上げるときも、海外ブランドの日本市場進出を支援するときも、それぞれの文脈に合わせた最適なアプローチを提供します。</p>
			<a class="see-the-work rounded-full mt-8">See the work</a>
		</div>
		<div class="h-screen"></div>
		<div class="bg-trigger" data-bg-trigger-id="3" data-bg-type="changer">
			<?php include get_template_directory() . '/components/flow.php'; ?>
			<div class="overview px-4 py-40">
				<p class="lead">多様な業界経験を活かし、あらゆる規模の企業と協業。プロダクトとブランドの掛け算で価値を生み出します</p>
			</div>
		</div>
		<div class="h-screen"></div>
	</div>
	<?php get_template_part('template-parts/top/background-image'); ?>
</main><!-- /#main -->
<?php get_footer(); ?>