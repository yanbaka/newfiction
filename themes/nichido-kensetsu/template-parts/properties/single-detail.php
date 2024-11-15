<?php
    $post_type = get_post_type();
    $post_title = get_the_title();
    $pods = pods($post_type, get_the_ID());
    $price = $pods->field('price');
    $price_unitValue = $pods->field('price_unit');
    $price_unitLabels = array(
        'thousand' => '万円',
        'million' => '億円',
    );
    $price_unit = $price_unitLabels[$price_unitValue];
    $address = $pods->field('address');
    $traffics = $pods->field('traffic');
    $traffic = '';
    if ( ! empty( $traffics ) ) {
        foreach ( $traffics as $index => $value ) {
            $traffic .= ($index === 0) ? $value : '<br>'.$value;
        }
    }
    $land_area = $pods->field('land_area');
    $floor_area = $pods->field('floor_area');
    $building_confirmation_number = $pods->field('building_confirmation_number');
    $floor_plan = $pods->field('floor_plan');
    $number_of_units_for_sale = $pods->field('number_of_units_for_sale');
    $total_number_of_units = $pods->field('total_number_of_units');
    $road_access_status = $pods->field('road_access_status');
    $completion_date = $pods->field('completion_date');
    $building_age = $pods->field('building_age');
    $number_of_lots_for_sale = $pods->field('number_of_lots_for_sale');
    $total_number_of_lots = $pods->field('total_number_of_lots');
    $others = $pods->field('others');

    $group = $pods->field('group');
    $table = array(
        array(
            'title' => '物件名',
            'value' => $post_title
        ),
        array(
            'title' => '価格',
            'value' => $price.$price_unit
        ),
        array(
            'title' => '所在地',
            'value' => $address
        ),
        array(
            'title' => '交通',
            'value' => $traffic
        ),
        array(
            'title' => '土地面積',
            'value' => $land_area
        ),
    );

    switch($post_type) {
        case 'properties_new':
            array_push($table, array('title' => '建物面積', 'value' => $floor_area));
            array_push($table, array('title' => '建築確認番号', 'value' => $building_confirmation_number));
            array_push($table, array('title' => '間取り', 'value' => $floor_plan));
            array_push($table, array('title' => '販売戸数', 'value' => $number_of_units_for_sale));
            array_push($table, array('title' => '総戸数	', 'value' => $total_number_of_units));
            array_push($table, array('title' => '接道状況・私道負担', 'value' => $road_access_status));
            array_push($table, array('title' => '完成時期（築年月）	', 'value' => $completion_date));
            break;

        case 'properties_used':
            array_push($table, array('title' => '建物面積', 'value' => $floor_area));
            array_push($table, array('title' => '築年数', 'value' => $building_age));
            array_push($table, array('title' => '間取り', 'value' => $floor_plan));
            array_push($table, array('title' => '接道状況・私道負担', 'value' => $road_access_status));
            break;

        case 'properties_land':
            array_push($table, array('title' => '販売区画数', 'value' => $number_of_lots_for_sale));
            array_push($table, array('title' => '総区画数', 'value' => $total_number_of_lots));
            array_push($table, array('title' => '接道状況・私道負担', 'value' => $road_access_status));
            break;

        case 'properties_condomini':
            array_push($table, array('title' => '販売区画数', 'value' => $number_of_lots_for_sale));
            array_push($table, array('title' => '総区画数', 'value' => $total_number_of_lots));
            array_push($table, array('title' => '接道状況・私道負担', 'value' => $road_access_status));
            break;
            
        default:
            break;
    }

    array_push(
        $table,
        array(
            'title' => 'その他',
            'value' => $others
        )
    );
?>

<div class="detail">
    <table>
        <tbody>
            <?php
            foreach ($table as $value) {
                echo '<tr>';
                echo '<th>'.$value['title'].'</th>';
                echo '<td>'.$value['value'].'</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>