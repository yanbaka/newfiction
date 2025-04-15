<header class="w-full px-4 fixed top-0 z-10 bg-white">
    <div class="flex justify-between items-center h-[75px]">
        <h1><a href="<?php echo esc_url(home_url('/')); ?>">
            <?php get_template_part('template-parts/logo'); ?>
        </a></h1>
        <ul class="flex menu">
            <li class="mr-6"><a href="<?php echo esc_url(home_url('/work')); ?>" class="px-4 py-2 rounded-full" data-link="work">Work</a></li>
            <li class="mr-6"><a href="<?php echo esc_url(home_url('/about')); ?>" class="px-4 py-2 rounded-full" data-link="about">About</a></li>
            <li><a id="trigger-contact" class="p-2">Get in touch</a></li>
        </ul>
        <div class="language flex px-4 py-2">
            <a class="ja" data-language="ja">JP</a>
            &nbsp;|&nbsp;
            <a class="en" data-language="en">EN</a>
        </div>
    </div>
</header>