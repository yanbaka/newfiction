<?php get_header(); ?>
<main role="main" id="main" class="main" data-barba="container" data-barba-namespace="home">
	<p class="px-4 pt-[200px] pb-16 text-[80px] fontSelectaMedium">Product & Brand Design Studio.<br />Based in Tokyo, Working Globally.<p>
	<div class="overview mt-[100vh] px-4 py-[250px]">
		<p class="lead">日本のデジタルプロダクトとブランドを世界に響く形へ。文化的な感性を大切にしながら、その価値を引き上げます</p>
		<p class="text mt-4">日本ブランドを世界基準へと磨き上げるときも、海外ブランドの日本市場進出を支援するときも、それぞれの文脈に合わせた最適なアプローチを提供します。</p>
		<a class="see-the-work rounded-full mt-8">See the work</a>
	</div>
	<div class="h-screen"></div>
	<?php include get_template_directory() . '/components/flow.php'; ?>
	<div class="overview px-4 py-40">
		<p class="lead">多様な業界経験を活かし、あらゆる規模の企業と協業。プロダクトとブランドの掛け算で価値を生み出します</p>
	</div>
</main><!-- /#main -->
<div class="background-image top-0 absolute z-[1]">
	<div class="sticky top-[87px] h-[calc(100vh-87px)]">
		<?php
			$args = [
				'pc' => 'top/top_thumbnail1_pc.jpg',
				'sp' => 'top/top_thumbnail1_sp.jpg',
				'alt' => '',
			];
			include get_template_directory() . '/components/image.php';
		?>
	</div>
</div>
<?php get_footer(); ?>