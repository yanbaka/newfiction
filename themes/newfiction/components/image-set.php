<?php
$pc = $args['pc'] ?? '';
$sp = $args['sp'] ?? '';
$alt = $args['alt'] ?? '';
$class = $args['class'] ?? '';
?>

<picture class="<?= $class ?>">
    <source srcset="<?= $pc ?>" media="(min-width: 768px)">
    <img src="<?= $sp ?>" alt="<?= esc_attr($alt) ?>">
</picture>
