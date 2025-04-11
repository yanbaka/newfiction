<?php get_header(); ?>
<main role="main" id="main" class="main" data-barba="container" data-barba-namespace="about" data-language="<?php echo get_language(); ?>">
	<p class="px-4 pt-[256px] pb-6 text-[56px] copy">
		<?php if (get_language() === 'ja'): ?>
			"異なる"ことは "より良い" よりもより良い。
		<?php else: ?>
			<i>Different</i> is better than <i>better</i>.
		<?php endif; ?>
	</p>
	<p class="px-4 pt-6 pb-24 lead">
		<?php if (get_language() === 'ja'): ?>
			New Fictionは、2024年に二日一宏祐が設立した、東京を拠点にグローバルに展開する独立系デザインスタジオです。私たちは、真摯なクラフトと「半分バカ」な姿勢を大切にし、目の前の課題に集中しながらも、創造的な飛躍の余地を確保します。<br />日本のブランドを世界へと送り出すときも、海外のパートナーがターゲット市場に適応する際も、それぞれの文脈に応じたアプローチを採用し、グローバルに響きつつも文化的な感受性を失わないよう心がけています。
		<?php else: ?>
			<i>Different</i> is better than <i>better</i>.
		<?php endif; ?>
	</p>
	<div class="beliefs flex px-4 py-24">
		<h2 class="text-5xl font-medium mr-4">Core Beliefs</h2>
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
		<div class="flex px-4 py-16">
			<div class="summary py-14 flex flex-col justify-between items-start">
				<p class="num">-1 → 0</p>
				<div>
					<h3 class="text-5xl">Research & Discovery</h3>
					<p class="text mt-4">We conduct research and synthesize key findings, to build a strategic foundation that informs the process.</p>
				</div>
				<a class="link rounded-full" href="">See the work</a>
			</div>
			<div class="flex-1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about/flow1.png" alt="">
			</div>
		</div>
	</div>
	
</main><!-- /#main -->
<?php get_footer(); ?>