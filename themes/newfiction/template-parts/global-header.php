<header class="w-full px-4 fixed top-0 z-10 bg-white">
    <div class="flex justify-between items-center h-[75px]">
        <h1><a href="<?php echo esc_url(home_url('/')); ?>">
            <?php get_template_part('template-parts/logo'); ?>
        </a></h1>
        <ul class="flex">
            <li class="mr-6"><a href="<?php echo esc_url(home_url('/work')); ?>" class="p-2">Work</a></li>
            <li class="mr-6"><a href="<?php echo esc_url(home_url('/about')); ?>" class="p-2">About</a></li>
            <li><a id="trigger-contact" class="p-2">Get in touch</a></li>
        </ul>
        <div class="language flex p-2">
            <a class="ja" data-language="ja">JP</a>
            &nbsp;|&nbsp;
            <a class="en" data-language="en">EN</a>
        </div>
    </div>
</header>