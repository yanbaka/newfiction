<header class="w-full fixed top-0 z-10">
    <div class="header-content flex justify-between md:justify-center items-center h-[75px] px-4 bg-white">
        <h1><a href="<?php echo esc_url(home_url('/')); ?>">
            <?php get_template_part('template-parts/logo'); ?>
        </a></h1>
        <div class="menu fixed top-0 left-0 w-full md:static md:w-auto">
            <img class="mb-6 md:hidden" src="<?php echo get_template_directory_uri(); ?>/images/logo_menu_sp.svg" alt="">
            <ul class="flex">
                <li class="md:hidden"><a href="<?php echo esc_url(home_url('/')); ?>" class="md:px-4 md:py-2 md:rounded-full" data-link="work">Home</a></li>
                <li class="md:mr-6"><a href="<?php echo esc_url(home_url('/work')); ?>" class="md:px-4 md:py-2 md:rounded-full" data-link="work">Work</a></li>
                <li class="md:mr-6"><a href="<?php echo esc_url(home_url('/about')); ?>" class="md:px-4 md:py-2 md:rounded-full" data-link="about">About</a></li>
                <li class="-contact"><a id="trigger-contact" class="md:p-2">
                    <?php get_template_part('template-parts/localize', null, [
                        'ja' => 'Contact',
                        'en' => 'Get in touch'
                    ]); ?>
            </a></li>
                <li class="-linkedin md:hidden"><a href="https://www.linkedin.com/in/thekosuke/" target="_blank">LinkedIn</a></li>
            </ul>
        </div>
        <div class="language flex px-4 py-2">
            <a class="ja" data-language="ja">日本語</a>
            <a class="en" data-language="en">English</a>
        </div>
        <div class="toggle w-[40px] h-[40px] fixed z-10 right-4 md:hidden">
            <span></span>
            <span></span>
        </div>
    </div>
</header>