<?php get_header(); ?>
<main role="main" id="main" class="main"
	data-barba="container"
	data-barba-namespace="about"
	data-css="<?php echo get_template_directory_uri(); ?>/css/about.css"
	data-js="<?php echo get_template_directory_uri(); ?>/js/about.js"
	data-id="about"
>
	<p class="px-4 py-6 md:pt-[256px] md:pb-6 copy">
		<span class="block -enterAnimation"><span data-animation-type="y">
			<?php get_template_part('template-parts/localize', null, [
					'ja' => '"異なる"ことは "より良い" よりもより良い。',
					'en' => '<i>Different</i> is better than <i>better</i>.'
			]); ?>
		</span></span>
	</p>
	<p class="px-4 pt-4 pb-12 md:pt-6 md:pb-24 lead">
		<span class="block -enterAnimation"><span data-animation-type="opacity" class="delay-300">
			<?php get_template_part('template-parts/localize', null, [
					'ja' => 'New Fictionは、2024年に二日一宏祐が設立した、東京を拠点にグローバルに展開する独立系デザインスタジオです。私たちは、真摯なクラフトと「半分バカ」な姿勢を大切にし、目の前の課題に集中しながらも、創造的な飛躍の余地を確保します。<br /><br />日本のブランドを世界へと送り出すときも、海外のパートナーがターゲット市場に適応する際も、それぞれの文脈に応じたアプローチを採用し、グローバルに響きつつも文化的な感受性を失わないよう心がけています。',
					'en' => 'New Fiction, founded by Kosuke Futsukaichi in 2024, is an independent design studio operating globally from Tokyo. Our practice is rooted in earnest craft and a half-stupid attitude, allowing us to stay focused on the task at hand while making space for creative leaps.<br /><br />Whether preparing Japanese brands for the world stage or guiding international partners into their target markets, we tailor our approach to each unique context—ensuring they resonate globally while staying culturally attuned.'
			]); ?>
		</span></span>
	</p>
	<div class="beliefs md:flex px-4 pt-12 md:pt-24 md:pb-8">
		<h2 class="md:text-5xl font-medium md:mr-4">Core Beliefs</h2>
		<div class="description">
			<dl>
				<dt>Stay Open</dt>
				<dd>
					<?php get_template_part('template-parts/localize', null, [
						'ja' => '世界を閉ざさず、耳を傾け、心を開き、新しい視点を受け入れることで、学びと成長の余白が生まれます。',
						'en' => 'Don’t shut the world out. Listening, staying open-minded, and welcoming new perspectives create space for learning and growth.'
					]); ?>
				</dd>
			</dl>
			<dl>
				<dt>Stay Earnest</dt>
				<dd>
					<?php get_template_part('template-parts/localize', null, [
						'ja' => '仕事に対して深い敬意と感謝を持ち、当たり前を疑いながら取り組みます。クラフトの価値を大切にし、その本質に向き合うことを信条としています。それを Earnest Craft と呼んでいます。',
						'en' => 'We approach our work with deep respect and appreciation, taking nothing for granted. We hold ourselves accountable to the craft and its enduring value. We call it earnest craft.'
					]); ?>
				</dd>
			</dl>
			<dl>
				<dt>Stay Half Stupid</dt>
				<dd>
					<?php get_template_part('template-parts/localize', null, [
						'ja' => '「半分バカ」の精神を大切にしています。常に学び、適応し、成長する余白を残すことが重要だと考えています。ときには、少しバカなくらいがちょうどいいのかもしれません。大胆に飛び込み、クリエイティブの限界を押し広げ、新たな可能性を切り拓いていきます。',
						'en' => 'We embrace a ‘Half Stupid’ mindset—always leaving room to learn, adapt, and grow. Sometimes, you have to be just stupid enough to take bold, audacious leaps, push creative boundaries, and uncover new possibilities.'
					]); ?>
				</dd>
			</dl>
		</div>
	</div>
	<div class="flow">
		<div class="flex flex-col-reverse md:flex-row px-4 py-12 md:py-16 bg-white sticky top-0">
			<div class="summary py-8 md:py-14 md:mr-4 md:flex md:flex-col md:justify-between md:items-start">
				<p class="num">-1 → 0</p>
				<div class="mt-6 md:mt-0">
					<h3 class="text-[36px] md:text-5xl">Research & Discovery</h3>
					<p class="text mt-4">
						<?php get_template_part('template-parts/localize', null, [
							'ja' => 'リサーチを行い、重要な知見を整理しながら、戦略的な基盤を築きます。プロセス全体を導く指針となるインサイトを見出します。',
							'en' => 'We conduct research and synthesize key findings, to build a strategic foundation that informs the process.'
						]); ?>
					</p>
				</div>
				<a href="<?php echo esc_url(home_url('/work')); ?>" class="see-the-work rounded-full mt-8 md:mt-0" href="">See the work</a>
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
					<p class="text mt-4">
						<?php get_template_part('template-parts/localize', null, [
							'ja' => '0→1のデザインを得意とし、リサーチと経験をもとに、理にかなったソリューションを導き出します。',
							'en' => 'Our strength lies in 0-to-1 design. We draw from research and experience to land on a solution that makes sense.'
						]); ?>
					</p>
				</div>
				<a href="<?php echo esc_url(home_url('/work')); ?>" class="see-the-work rounded-full mt-8 md:mt-0" href="">See the work</a>
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
					<p class="text mt-4">
						<?php get_template_part('template-parts/localize', null, [
							'ja' => '洗練から進化、そして変革へ。私たちは「より良い」よりも「異なる」ことに価値があると考えます。',
							'en' => 'From refinement to evolution to revolution. We operate under the belief that different is better than better.'
						]); ?>
					</p>
				</div>
				<a href="<?php echo esc_url(home_url('/work')); ?>" class="see-the-work rounded-full mt-8 md:mt-0" href="">See the work</a>
			</div>
			<div class="flex-1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about/flow3.png" alt="">
			</div>
		</div>
	</div>
	<div class="profile px-4 py-12 md:py-24 md:flex">
		<div class="image md:w-1/3">
			<img src="<?php echo get_template_directory_uri(); ?>/images/about/profile.jpg" alt="">
		</div>
		<div class="summary mt-8 md:mt-0 md:w-2/3 md:pr-60">
			<h3 class="text-5xl font-medium">
				<?php get_template_part('template-parts/localize', null, [
					'ja' => '二日一 宏祐',
					'en' => 'Kosuke Futsukaichi'
				]); ?>
			</h3>
			<?php if (get_language() === 'ja'): ?>
				<small class="kana text-[15px] font-medium block text-[#7A7676]">ふつかいち こうすけ</small>
			<?php endif; ?>
			<p class="mt-8">
				<?php get_template_part('template-parts/localize', null, [
					'ja' => 'デジタルプロダクトデザインとブランドデザインを専門とする多文化的なデザイナー。日本で生まれ、その後日本と北米のさまざまな都市を転々として育つ中で、特にアリゾナ州ギルバートでのアメリカ文化との出会いが彼のアイデンティティに大きな影響を与えた。<br /><br />カナダのバンクーバーでデザインを学んだ後、アーリーステージのスタートアップに創業デザイナーとして参画し、デザイナーとしての基盤を築いた。その後、複数のスタートアップで経験を重ね、新たな挑戦を求めて東京へと拠点を移した。<br /><br />父親の仕事の関係で幼少期から引越しを繰り返してきた彼は、自分自身の道を切り開くことを決意。日本市場が変化する中で、特に企業のデジタル体験の分野に成長の余地があることに注目し、2024年12月に自身のスタジオ「New Fiction」を設立した。New Fictionを通じて、日本のデジタル体験のレベルアップに貢献することを目指す。',
					'en' => 'Kosuke is a multicultural designer specializing in product and brand design. Born in Japan but raised between cities in Japan and North America, his identity was shaped in Gilbert, Arizona, where he connected with American culture. After studying design holistically in Vancouver, Canada, Kosuke launched his career as the founding designer at an early-stage startup—an experience that built a strong professional foundation. He later applied his expertise across multiple startups before moving his life to Tokyo for a new adventure.<br /><br />Having spent much of his early life following his father\'s career moves, Kosuke chose to forge his own path. Recognizing Japan\'s evolving market—especially the opportunity for growth in corporate digital experiences—he founded his studio, New Fiction, in December 2024. Through New Fiction, Kosuke aims to inspire a new wave that amplifies Japanese excellence on the world stage.'
				]); ?>
			</p>
			<ul class="flex mt-8">
				<li class="mr-8"><a href="https://thekosuke.com/" target="_blank">PORTFOLIO</a></li>
				<li><a href="https://www.linkedin.com/in/thekosuke/" target="_blank">LINKEDIN</a></li>
			</ul>
		</div>
	</div>
	
</main><!-- /#main -->
<?php get_footer(); ?>