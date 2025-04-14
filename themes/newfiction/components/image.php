<?php
$pc = $args['pc'] ?? '';
$sp = $args['sp'] ?? '';
$alt = $args['alt'] ?? '';
$path = $args['path'] ?? get_template_directory_uri() . '/images/';
?>

<picture>
    <source srcset="<?= esc_url($path . $pc) ?>" media="(min-width: 768px)">
    <img src="<?= esc_url($path . $sp) ?>" alt="<?= esc_attr($alt) ?>">
</picture>
