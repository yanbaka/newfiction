<div class="contact-parent relative z-10">
    <div class="contact-background w-full h-full fixed top-0 left-0"></div>
    <div class="contact">
        <button class="close"><span></span></button>
        <div class="send">
            <h2>
                <?php get_template_part('template-parts/localize', null, [
                    'ja' => '気軽にご連絡ください',
                    'en' => 'Get in touch'
                ]); ?>
            </h2>
            <?php if (get_language() === 'ja'): ?>
                <?php echo do_shortcode('[contact-form-7 id="0d0a422" title="contact_ja"]') ?>
            <?php else: ?>
                <?php echo do_shortcode('[contact-form-7 id="3a3f390" title="contact"]') ?>
            <?php endif; ?>
        </div>
        <div class="send-complete">
            <h2>
                <?php get_template_part('template-parts/localize', null, [
                    'ja' => 'お問い合わせ<br />ありがとうございます。',
                    'en' => 'Thanks for Reaching Out!'
                ]); ?>
            </h2>
            <p class="font-light mt-8 min-h-[320px]">
                <?php get_template_part('template-parts/localize', null, [
                    'ja' => 'メッセージは正常に送信されました。<br />確認のうえ、できるだけ早くご連絡いたします。',
                    'en' => 'Your message has been sent successfully. We’ll get back to you as soon as we can.'
                ]); ?>
            <p>
        </div>
    </div>
</div>
