<?php
    $pods = pods('image_set', $args['id']);
    $work_id = $pods->field('work_id');
?>
<a href="<?php echo esc_url(home_url('/work/' . $work_id)); ?>" class="w-full h-full block"></a>
