<?php
    $title = $args['title'];
    $taxonomy = $args['taxonomy'];

    $post_type = 'properties';

    // カスタム投稿タイプに関連付けられているタクソノミーを確認

    // NOTE カスタム投稿プラグインの競合？で取得できないため、直で指定
    // $taxonomies = get_object_taxonomies($post_type, 'names');
    $taxonomies = ["properties_type", "properties_line", "properties_area"];

    if (in_array($taxonomy, $taxonomies)) {
        // タクソノミーのタームを取得
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
        ));

        // タームが存在するかチェック
        if (!empty($terms) && !is_wp_error($terms)) {
            echo '<div class="filter-item" data-taxonomy="'.$taxonomy.'">';
            echo '<div class="filter-title">'.$title.'</div>';
            echo '<ul class="filter-list">';
            foreach ($terms as $term) {
                echo '<li data-slug="'.$term->slug.'">';
                echo '<label>';
                echo '<input type="checkbox">';
                echo $term->name;
                echo '</label>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }
?>