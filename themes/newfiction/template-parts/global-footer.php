<footer>
    <div class="capabilities h-screen-sp px-4 py-12 md:py-24 md:flex md:justify-between w-full relative z-[2]">
        <h2 class="md:w-1/3 text-[36px] md:text-5xl fontSelectaMedium">Capabilities</h2>
        <div class="mt-12 md:mt-0 md:w-2/3">
            <h3>PRODUCT</h3>
            <div class="md:flex mt-4">
                <ul class="md:w-1/2">
                    <li>
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'プロダクト戦略',
                            'en' => 'Product Strategy'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ユーザーリサーチ',
                            'en' => 'User Research.'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => '競合分析',
                            'en' => 'Competitive Analysis'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => '情報設計',
                            'en' => 'Information Architecture'
                        ]); ?>
                    </li>
                </ul>
                <ul class="md:w-1/2">
                    <li class="mt-2 md:mt-0">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'UX/UIデザイン',
                            'en' => 'UX/UI Design'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ビジュアルデザイン',
                            'en' => 'Visual Design'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'デザインシステム',
                            'en' => 'Design System'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'プロトタイピング & テスト',
                            'en' => 'Prototype & Testing'
                        ]); ?>
                    </li>
                </ul>
            </div>
            <h3 class="mt-12">BRAND</h3>
            <div class="md:flex mt-4">
                <ul class="md:w-1/2">
                    <li class="mt-2 md:mt-0">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ブランド戦略',
                            'en' => 'Brand Strategy'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ブランド監査',
                            'en' => 'Brand Audit'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ブランドガイドライン',
                            'en' => 'Brand Guidelines'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ビジュアルアイデンティティ',
                            'en' => 'Visual Identity'
                        ]); ?>
                    </li>
                </ul>
                <ul class="md:w-1/2">
                    <li class="mt-2 md:mt-0">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ロゴデザイン',
                            'en' => 'Logo Design'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'パッケージデザイン',
                            'en' => 'Package Design'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'ウェブデザイン',
                            'en' => 'Web Design'
                        ]); ?>
                    </li>
                    <li class="mt-2">
                        <?php get_template_part('template-parts/localize', null, [
                            'ja' => 'マーケティング資料',
                            'en' => 'Marketing Materials'
                        ]); ?>
                    </li>
                </ul>
            </div>
            <a href="<?php echo esc_url(home_url('/about')); ?>" class="our-services mt-12 flex justify-center items-center w-full h-[44px] md:w-[140px] md:h-[52px] rounded-full">Our services</a>
        </div>
    </div>
    <div class="foot px-4 pt-8 md:pt-12 pb-4 fixed bottom-0">
        <h2>
            <?php get_template_part('template-parts/localize', null, [
                'ja' => '新しいプロジェクト、アイデア、またはご相談<br />いつでもご連絡ください',
                'en' => 'A new project, an idea, or an intro. <br />Shoot us a message.'
            ]); ?>
        </h2>
        <div class="logo relative flex items-center justify-center">
            <img class="-off" src="<?php echo get_template_directory_uri(); ?>/images/logo_footer.png" alt="">
            <img class="absolute -on" src="<?php echo get_template_directory_uri(); ?>/images/logo_footer_on.png" alt="">
        </div>
        <div class="md:flex md:justify-between mt-[12px] md:mt-4">
            <div class="links flex justify-between md:justify-start">
                <a class="text-[17px] underline" href="" target="_blank">business@newfiction.org</a>
                <a class="text-[17px] underline ml-6" href="https://www.linkedin.com/in/thekosuke/" target="_blank">LinkedIn</a>
            </div>
            <small class="block text-[17px] mt-[12px] md:mt-0 md:mr-[0.5em]">&copy; 2025 New Fiction</small>
        </div>
        <div class="follower absolute top-0 left-0">
            <div class="object">
                <div class="animation">
                    <?php get_template_part('template-parts/localize', null, [
                        'ja' => '連絡する',
                        'en' => 'SAY HI'
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</footer>