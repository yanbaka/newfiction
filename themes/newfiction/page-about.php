<?php get_header(); ?>
<main role="main" id="main" class="main" data-barba="container" data-barba-namespace="about" data-language="<?php echo get_language(); ?>">
	<p class="px-4 pt-[256px] pb-6 text-[56px] copy">
		<?php if (get_language() === 'ja'): ?>
			"異なる"ことは "より良い" よりもより良い。
		<?php else: ?>
			<i>Different</i> is better than <i>better</i>.
		<?php endif; ?>
	</p>
	
</main><!-- /#main -->
<?php get_footer(); ?>