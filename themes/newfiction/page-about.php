<?php get_header(); ?>
<main role="main" id="main" class="main"
	data-barba="container"
	data-barba-namespace="about"
	data-language="<?php echo get_language(); ?>"
	data-css="<?php echo get_template_directory_uri(); ?>/css/about.css"
	data-js="<?php echo get_template_directory_uri(); ?>/js/about.js"
	data-id="about"
>
	<p class="px-4 py-6 md:pt-[256px] md:pb-6 copy">
		<span class="block -enterAnimation"><span data-animation-type="y">
			<?php if (get_language() === 'ja'): ?>
				"異なる"ことは "より良い" よりもより良い。
			<?php else: ?>
				<i>Different</i> is better than <i>better</i>.
			<?php endif; ?>
		</span></span>
	</p>
	<p class="px-4 pt-4 pb-12 md:pt-6 md:pb-24 lead">
		<span class="block -enterAnimation"><span data-animation-type="opacity" class="delay-300">
			<?php if (get_language() === 'ja'): ?>
				New Fictionは、2024年に二日一宏祐が設立した、東京を拠点にグローバルに展開する独立系デザインスタジオです。私たちは、真摯なクラフトと「半分バカ」な姿勢を大切にし、目の前の課題に集中しながらも、創造的な飛躍の余地を確保します。<br />日本のブランドを世界へと送り出すときも、海外のパートナーがターゲット市場に適応する際も、それぞれの文脈に応じたアプローチを採用し、グローバルに響きつつも文化的な感受性を失わないよう心がけています。
			<?php else: ?>
				<i>Different</i> is better than <i>better</i>.
			<?php endif; ?>
		</span></span>
	</p>
	<div class="beliefs md:flex px-4 pt-12 md:pt-24 md:pb-8">
		<h2 class="md:text-5xl font-medium md:mr-4">Core Beliefs</h2>
		<div class="description">
			<dl>
				<dt>Stay Open</dt>
				<dd>Don’t shut the world out. Listening, staying open-minded, and welcoming new perspectives create space for learning and growth.</dd>
			</dl>
			<dl>
				<dt>Stay Earnest</dt>
				<dd>We approach our work with deep respect and appreciation, taking nothing for granted. We hold ourselves accountable to the craft and its enduring value. We call it earnest craft.</dd>
			</dl>
			<dl>
				<dt>Stay Half Stupid</dt>
				<dd>We embrace a ‘Half Stupid’ mindset—always leaving room to learn, adapt, and grow. Sometimes, you have to be just stupid enough to take bold, audacious leaps, push creative boundaries, and uncover new possibilities.</dd>
			</dl>
		</div>
	</div>
	<div class="flow">
		<div class="flex flex-col-reverse md:flex-row px-4 py-12 md:py-16 bg-white sticky top-0">
			<div class="summary py-8 md:py-14 md:mr-4 md:flex md:flex-col md:justify-between md:items-start">
				<p class="num">-1 → 0</p>
				<div class="mt-6 md:mt-0">
					<h3 class="text-[36px] md:text-5xl">Research & Discovery</h3>
					<p class="text mt-4">We conduct research and synthesize key findings, to build a strategic foundation that informs the process.</p>
				</div>
				<a class="see-the-work rounded-full mt-8 md:mt-0" href="">See the work</a>
			</div>
			<div class="flex-1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about/flow1.png" alt="">
			</div>
		</div>
		<div class="flex flex-col-reverse md:flex-row px-4 py-12 md:py-16 bg-white sticky top-0">
			<div class="summary py-8 md:py-14 md:mr-4 md:flex md:flex-col md:justify-between md:items-start">
				<p class="num">0 → 1</p>
				<div class="mt-6 md:mt-0">
					<h3 class="text-[36px] md:text-5xl">Design for Launch</h3>
					<p class="text mt-4">Our strength lies in 0-to-1 design. We draw from research and experience to land on a solution that makes sense.</p>
				</div>
				<a class="see-the-work rounded-full mt-8 md:mt-0" href="">See the work</a>
			</div>
			<div class="flex-1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about/flow2.png" alt="">
			</div>
		</div>
		<div class="flex flex-col-reverse md:flex-row px-4 py-12 md:py-16 bg-white sticky top-0">
			<div class="summary py-8 md:py-14 md:mr-4 md:flex md:flex-col md:justify-between md:items-start">
				<p class="num">1 → 2,3...</p>
				<div class="mt-6 md:mt-0">
					<h3 class="text-[36px] md:text-5xl">Redesign & Refinement</h3>
					<p class="text mt-4">From refinement to evolution to revolution. We operate under the belief that different is better than better.</p>
				</div>
				<a class="see-the-work rounded-full mt-8 md:mt-0" href="">See the work</a>
			</div>
			<div class="flex-1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about/flow3.png" alt="">
			</div>
		</div>
	</div>
	<div class="profile px-4 py-12 md:py-24 md:flex">
		<div class="image md:mr-4">
			<img src="<?php echo get_template_directory_uri(); ?>/images/about/profile.jpg" alt="">
		</div>
		<div class="summary mt-8 md:mt-0 md:flex-1">
			<h3 class="text-5xl font-medium">Kosuke Futsukaichi</h3>
			<p class="text-[22px] mt-8">Kosuke is a multicultural designer specializing in product and brand design. Born in Japan but raised between cities in Japan and North America, his identity was shaped in Gilbert, Arizona, where he connected with American culture.After studying design holistically in Vancouver, Canada, Kosuke launched his career as the founding designer at an early-stage startup—an experience that built a strong professional foundation. He later applied his expertise across multiple startups before moving his life to Tokyo for a new adventure.<br />Having spent much of his early life following his father's career moves, Kosuke chose to forge his own path. Recognizing Japan's evolving market—especially the opportunity for growth in corporate digital experiences—he founded his studio, New Fiction, in December 2024. Through New Fiction, Kosuke aims to inspire a new wave that amplifies Japanese excellence on the world stage.</p>
			<ul class="flex mt-8">
				<li class="mr-8"><a href="">PORTFOLIO</a></li>
				<li><a href="">LINKEDIN</a></li>
			</ul>
		</div>
	</div>
	
</main><!-- /#main -->
<?php get_footer(); ?>