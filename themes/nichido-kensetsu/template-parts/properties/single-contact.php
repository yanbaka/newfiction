<?php
    $pods = pods('properties', get_the_ID());
    $tel = $pods->field('tel');
?>

<div class="contact">
    <a href="/contact">お問い合わせ（無料）</a>
    <div class="contact-tel">TEL：<?php echo $tel ? $tel : '000-0000-0000'; ?></div>
</div>