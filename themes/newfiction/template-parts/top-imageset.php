<?php
    $pods = pods('image_set', $args['id']);
    $work_id = $pods->field('work_id');
    $pc_image = $pods->field('pc_image');
    $pc_image_url = $pc_image['guid'];
    $sp_image = $pods->field('sp_image');
    $sp_image_url = $sp_image['guid'];
?>
<a href="<?php echo esc_url(home_url('/work/' . $work_id)); ?>" class="bg-image h-screen-sp">
    <?php
        $args = [
            'pc' => $pc_image_url,
            'sp' => $sp_image_url,
            'alt' => '',
        ];
        include get_template_directory() . '/components/image-set.php';
    ?>
</a>
