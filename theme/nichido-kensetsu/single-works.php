<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
include(TEMPLATEPATH . '/inc/head.php');
$title = $post->post_title;
$slug = $post->post_name;
$archive_cate = 'works_cate';

$post_id = $post->ID;
$post_date = $post->post_date;
$colum_date = date("M.d.Y", strtotime($post_date));
$tarm_names = array();
$tarm_names = get_the_terms($post_id, $archive_cate);
if ($tarm_names) {
	$tarm_name = $tarm_names[0]->name;
	$tarm = '<p class="cate1 bgblu white">' . $tarm_name . '</p>';
} else {
	$tarm = "";
}

$bfaf_1 = get_field('bfaf_1', $post_id);
$bfaf_1_before = get_field('bfaf_1', $post_id)['img_1'];
$bfaf_1_after = get_field('bfaf_1', $post_id)['img_2'];

$bfaf_2 = get_field('bfaf_2', $post_id);
$bfaf_2_before = get_field('bfaf_2', $post_id)['img_1'];
$bfaf_2_after = get_field('bfaf_2', $post_id)['img_2'];

$bfaf_3 = get_field('bfaf_3', $post_id);
$bfaf_3_before = get_field('bfaf_3', $post_id)['img_1'];
$bfaf_3_after = get_field('bfaf_3', $post_id)['img_2'];


// リフォームtable
$works_place = get_field('works_place', $post_id);
$works_year = get_field('works_year', $post_id);
$works_family = get_field('works_family', $post_id);
$works_detail = get_field('works_detail', $post_id);
$works_tubo = get_field('works_tubo', $post_id);


$exam_text = get_field('exam_text', $post_id);
//グループ1
$group_1 = get_field('group_1', $post_id);
$group_1_count = 0;
$work_subimg_val_1 = array();
for ($i = 1; $i < 10; $i++) {
	if (is_array($group_1)) {
		$work_subimg_val_1 = $group_1['img_' . $i];
	}
	if ($work_subimg_val_1) {
		$thumbnail_imgsub_src_1[] = array(
			'caption' => $work_subimg_val_1["caption"],
			'url' => $work_subimg_val_1["sizes"]["medium_large"]
		);
		$group_1_count++;
	} else {
		if ($group_1_count == 0) {
			$thumbnail_imgsub_src_1 = "";

			$group_1_count++;
		} else {
			$group_1_count++;
		}
	}
}


?>
<?php
include(TEMPLATEPATH . '/inc/header.php');
?>

<div class="artMvarea">
 <ul class="pankuzu cf">
  <li><a href="<?= $url ?>">TOP</a>&gt;</li>
  <li><a href="<?= $url ?>reform">リフォーム</a>&gt;</li>
  <li><a href="<?= $url ?>newhouse/works/">新築・注文住宅 施工事例</a>&gt;</li>
  <li><?= $title ?></li>
 </ul>
 <!-- cover -->
 <div class="artMv">
  <div class="mvIn">
   <h2>
    リフォーム 施工事例
   </h2>
   <span class="yugo">RENOVATION WORKS</span>
  </div>

 </div>
 <!-- /cover -->
</div>

<div id="main">
 <div class="detail01">
  <div class="artin">
   <div class="kijiBox">
    <div class="tit">
     <div class="deta">
      <p class="date lib"><?= $colum_date ?></p>
      <?= $tarm ?>
     </div>
     <div class="kijiTit">
      <?= $title ?>
     </div>
    </div>

    <div class="kiji">

     <?php
					if ($bfaf_1_before) {
					?>
     <div class="refoimg">
      <div class="befor">
       <img src="<?= $bfaf_1_before ?>" alt="before">
      </div>
      <div class="after">
       <img src="<?= $bfaf_1_after ?>" alt="after">
      </div>
     </div>
     <?php
					}
					?>

     <?php
					if ($bfaf_2_before) {
					?>
     <div class="refoimg">
      <div class="befor">
       <img src="<?= $bfaf_2_before ?>" alt="before">
      </div>
      <div class="after">
       <img src="<?= $bfaf_2_after ?>" alt="after">
      </div>
     </div>
     <?php
					}
					?>

     <?php
					if ($bfaf_3_before) {
					?>
     <div class="refoimg">
      <div class="befor">
       <img src="<?= $bfaf_3_before ?>" alt="before">
      </div>
      <div class="after">
       <img src="<?= $bfaf_3_after ?>" alt="after">
      </div>
     </div>
     <?php
					}
					?>
     <table>
      <tr>
       <th>【施工場所】</th>
       <td><?= $works_place ?></td>
      </tr>
      <tr>
       <th>【築年数】</th>
       <td><?= $works_year ?></td>
      </tr>
      <tr>
       <th>【家族構成】</th>
       <td><?= $works_family ?></td>
      </tr>
      <tr>
       <th>【物件概要】</th>
       <td><?= $works_detail ?></td>
      </tr>
      <tr>
       <th>【坪数】</th>
       <td><?= $works_tubo ?></td>
      </tr>
     </table>
     <div class="txt">
      <p>
       <?= $exam_text ?>
      </p>
     </div>

     <!-- グループ1 -->
     <?php
					if ($group_1) {
					?>
     <div class="imgBox">

      <!-- 画像グループ -->
      <?php
							if (is_array($thumbnail_imgsub_src_1)) {
							?>
      <ul>
       <?php
									foreach ($thumbnail_imgsub_src_1 as $key => $val) {
									?>
       <li>
        <div class="img">
         <a href="<?= $val['url'] ?>" data-lightbox="imgs"><img src="<?= $val['url'] ?>" alt="<?= $val['caption'] ?>"></a>
        </div>
        <p>
         <?= $val['caption'] ?>
        </p>
       </li>
       <?php
									}
									?>
      </ul>
      <?php
							}
							?>
     </div>
     <?php
					}
					?>
     <!-- グループ1終了 -->

    </div>
    <a href="<?= $url ?>reform/works" class="bgbla white btn1">戻る</a>
   </div>
  </div>
 </div>

</div><!-- /#main -->

<?php
include(TEMPLATEPATH . '/inc/contact_area.php');
?>

<?php
wp_footer();
require("inc/footer.php");
?>

</html>