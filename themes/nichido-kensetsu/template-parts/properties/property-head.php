<?php
    $post_type = get_post_type();
    $post_url = get_permalink($post -> ID);
    $post_title = get_the_title();
    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $thumbnail = '<img src="' . esc_url($thumbnail_url) . '" alt="">';
    $pods = pods($post_type, get_the_ID());
    $groupValue = $pods->field('group');
    $price = $pods->field('price');
    $price_unitValue = $pods->field('price_unit');
    $price_unitLabels = array(
        'thousand' => '万円',
        'million' => '億円',
    );
    $price_unit = $price_unitLabels[$price_unitValue] . '（税込）';
    $floor_plan = $pods->field('floor_plan');
    $land_area = $pods->field('land_area');
    $floor_area = $pods->field('floor_area');
    $address = $pods->field('address');
    $traffics = $pods->field('traffic');
    $traffic = '';
    if ( ! empty( $traffics ) ) {
        foreach ( $traffics as $index => $value ) {
            $traffic .= ($index === 0) ? $value : '<br>'.$value;
        }
    }
    if ($post_type === 'properties_new' || $post_type === 'properties_used') {
        $t = <<< HTML
            <tr>
                <th>価格</th>
                <td class="-price"><span>{$price}</span>{$price_unit}</td>
                <th>間取り</th>
                <td>{$floor_plan}</td>
            </tr>
            <tr>
                <th>土地面積</th>
                <td>{$land_area}</td>
                <th>建物面積</th>
                <td>{$floor_area}</td>
            </tr>
        HTML;
    } elseif ($post_type === 'properties_land') {
        $t = <<< HTML
            <tr>
                <th>価格</th>
                <td class="-price -colspan" colspan="2"><span>{$price}</span>{$price_unit}</td>
            </tr>
            <tr>
                <th>土地面積</th>
                <td colspan="2">{$land_area}</td>
            </tr>
        HTML;
    } else {
        $t = <<< HTML
            <tr>
                <th>価格</th>
                <td class="-price -colspan" colspan="2"><span>{$price}</span>{$price_unit}</td>
            </tr>
        HTML;
    }
    $str = <<< EOM
        <div class="item-head">
            <div class="item-group"></div>
            <div class="item-title">{$post_title}</div>
        </div>
        <div class="item-body">
            <div class="item-thumbnail">{$thumbnail}</div>
            <div class="item-description">
                <table>
                    <tbody>
                        {$t}
                        <tr>
                            <th>所在</th>
                            <td colspan="3">{$address}</td>
                        <tr>
                        <tr>
                            <th>交通</th>
                            <td colspan="3">{$traffic}</td>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    EOM;

    if (is_single()) {
        echo <<< EOM
            <div class="property-head">
                <div class="item" href="{$post_url}">
                    {$str}
                </div>
            </div>
        EOM;
    } else {
        $id = $post -> ID;
        // 種類
        $taxonomy_type = wp_get_post_terms($id, 'properties_type');
        $data_type = '';
        foreach ( $taxonomy_type as $index => $value ) {
            $data_type .= ($index === 0) ? $value->slug : ','.$value->slug;
        };
        // 沿線
        $taxonomy_line = wp_get_post_terms($id, 'properties_line');
        $data_line = '';
        foreach ( $taxonomy_line as $index => $value ) {
            $data_line .= ($index === 0) ? $value->slug : ','.$value->slug;
        };
        // エリア
        $taxonomy_area = wp_get_post_terms($id, 'properties_area');
        $data_area = '';
        foreach ( $taxonomy_area as $index => $value ) {
            $data_area .= ($index === 0) ? $value->slug : ','.$value->slug;
        };

        echo <<< EOM
            <div class="property-head" data-type="{$data_type}" data-line="{$data_line}" data-area="{$data_area}">
                <a class="item" href="{$post_url}">
                    {$str}
                </a>
            </div>
        EOM;
    }
?>