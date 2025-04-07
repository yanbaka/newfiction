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
    $land_rights = $pods->field('land_rights');
    $land_category = $pods->field('land_category');
    $urban_planning = $pods->field('urban_planning');
    $zoning_district = $pods->field('zoning_district');
    $bcr = $pods->field('bcr');
    $far = $pods->field('far');
    $facilities = $pods->field('facilities');
    $structure = $pods->field('structure');
    $exclusive_area = $pods->field('exclusive_area');
    $layout = $pods->field('layout');
    $balcony = $pods->field('balcony');
    $construction_date = $pods->field('construction_date');
    $client = $pods->field('client');
    $management_company = $pods->field('management_company');
    $management_system = $pods->field('management_system');
    $management_fee = $pods->field('management_fee');
    $reserve_fund_for_repairs = $pods->field('reserve_fund_for_repairs');

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
        )
    );

    switch($post_type) {
        case 'properties_new':
            array_push($table, array('title' => '土地面積', 'value' => $land_area));
            array_push($table, array('title' => '建物面積', 'value' => $floor_area));
            array_push($table, array('title' => '建築確認番号', 'value' => $building_confirmation_number));
            array_push($table, array('title' => '間取り', 'value' => $floor_plan));
            array_push($table, array('title' => '土地権利', 'value' => $land_rights));
            array_push($table, array('title' => '地目', 'value' => $land_category));
            array_push($table, array('title' => '都市計画', 'value' => $urban_planning));
            array_push($table, array('title' => '用途地域', 'value' => $zoning_district));
            array_push($table, array('title' => '建ぺい率', 'value' => $bcr));
            array_push($table, array('title' => '容積率', 'value' => $far));
            array_push($table, array('title' => '設備', 'value' => $facilities));
            array_push($table, array('title' => '販売戸数', 'value' => $number_of_units_for_sale));
            array_push($table, array('title' => '総戸数	', 'value' => $total_number_of_units));
            array_push($table, array('title' => '接道状況・私道負担', 'value' => $road_access_status));
            array_push($table, array('title' => '完成時期（築年月）	', 'value' => $completion_date));
            break;

        case 'properties_used':
            array_push($table, array('title' => '土地面積', 'value' => $land_area));
            array_push($table, array('title' => '建物面積', 'value' => $floor_area));
            array_push($table, array('title' => '間取り', 'value' => $floor_plan));
            array_push($table, array('title' => '土地権利', 'value' => $land_rights));
            array_push($table, array('title' => '地目', 'value' => $land_category));
            array_push($table, array('title' => '都市計画', 'value' => $urban_planning));
            array_push($table, array('title' => '用途地域', 'value' => $zoning_district));
            array_push($table, array('title' => '建ぺい率', 'value' => $bcr));
            array_push($table, array('title' => '容積率', 'value' => $far));
            array_push($table, array('title' => '設備', 'value' => $facilities));
            array_push($table, array('title' => '接道状況・私道負担', 'value' => $road_access_status));
            break;

        case 'properties_land':
            array_push($table, array('title' => '土地面積', 'value' => $land_area));
            array_push($table, array('title' => '土地権利', 'value' => $land_rights));
            array_push($table, array('title' => '地目', 'value' => $land_category));
            array_push($table, array('title' => '都市計画', 'value' => $urban_planning));
            array_push($table, array('title' => '用途地域', 'value' => $zoning_district));
            array_push($table, array('title' => '建ぺい率', 'value' => $bcr));
            array_push($table, array('title' => '容積率', 'value' => $far));
            array_push($table, array('title' => '設備', 'value' => $facilities));
            array_push($table, array('title' => '販売区画数', 'value' => $number_of_lots_for_sale));
            array_push($table, array('title' => '総区画数', 'value' => $total_number_of_lots));
            array_push($table, array('title' => '接道状況・私道負担', 'value' => $road_access_status));
            break;

        case 'properties_condomini':
            array_push($table, array('title' => '構造', 'value' => $structure));
            array_push($table, array('title' => '専有面積', 'value' => $exclusive_area));
            array_push($table, array('title' => '間取り', 'value' => $layout));
            array_push($table, array('title' => 'バルコニー', 'value' => $balcony));
            array_push($table, array('title' => '築年月', 'value' => $construction_date));
            array_push($table, array('title' => '施主', 'value' => $client));
            array_push($table, array('title' => '管理会社', 'value' => $management_company));
            array_push($table, array('title' => '管理形態', 'value' => $management_system));
            array_push($table, array('title' => '管理費', 'value' => $management_fee));
            array_push($table, array('title' => '修繕積立金', 'value' => $reserve_fund_for_repairs));
            array_push($table, array('title' => '土地権利', 'value' => $land_rights));
            array_push($table, array('title' => '都市計画', 'value' => $urban_planning));
            array_push($table, array('title' => '用途地域', 'value' => $zoning_district));
            array_push($table, array('title' => '設備', 'value' => $facilities));
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