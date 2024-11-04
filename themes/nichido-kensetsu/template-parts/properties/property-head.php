<?php
    $post_url = get_permalink($post -> ID);
    $post_title = get_the_title();
    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $thumbnail = '<img src="' . esc_url($thumbnail_url) . '" alt="">';
    $pods = pods('properties', get_the_ID());
    $price = $pods->field('price');
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
                        <tr>
                            <th>価格</th>
                            <td>{$price}</td>
                            <th>間取り</th>
                            <td>{$floor_plan}</td>
                        </tr>
                        <tr>
                            <th>土地面積</th>
                            <td>{$land_area}</td>
                            <th>建物面積</th>
                            <td>{$floor_area}</td>
                        </tr>
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
        echo <<< EOM
            <div class="property-head">
                <a class="item" href="{$post_url}">
                    {$str}
                </a>
            </div>
        EOM;
    }
?>