<?php get_template_part('template-parts/contact'); ?>
<?php if ( !is_singular('work') ) : ?>
    <?php get_template_part('template-parts/global', 'footer'); ?>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
