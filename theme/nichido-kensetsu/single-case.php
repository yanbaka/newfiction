<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
include(TEMPLATEPATH . '/inc/head.php');
$title = $post->post_title;
$slug = $post->post_name;
$archive_cate = 'case_cate';

$post_id = $post->ID;
$post_date = $post->post_date;
$colum_date = date("M.d.Y", strtotime($post_date));
$tarm_names = get_the_terms($post_id, $archive_cate);
$tarm_names = array();
if ($tarm_names) {
	$tarm_name = $tarm_names[0]->name;
	$tarm = '<p class="cate1 bgblu white">' . $tarm_name . '</p>';
} else {
	$tarm = "";
}

// 新築・注文住宅table
$case_img = get_field('case_img', $post_id);
$case_place = get_field('case_place', $post_id);
$case_family = get_field('case_family', $post_id);
$case_detail = get_field('case_detail', $post_id);
$case_site = get_field('case_site', $post_id);


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
  <li><a href="<?= $url ?>newhouse">新築・注文住宅</a>&gt;</li>
  <li><a href="<?= $url ?>newhouse/case/">新築・注文住宅 施工事例</a>&gt;</li>
  <li><?= $title ?></li>
 </ul>
 <!-- cover -->
 <div class="artMv">
  <div class="mvIn">
   <h2>
    新築・注文住宅 施工事例
   </h2>
   <span class="yugo">CASE</span>
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
					if ($case_img) {
					?>
     <div class="img">
      <img src="<?= $case_img ?>" alt="画像">
     </div>
     <?php
					}
					?>
     <table>
      <tr>
       <th>【施工場所】</th>
       <td><?= $case_place ?></td>
      </tr>
      <tr>
       <th>【接道方向】</th>
       <td><?= $case_family ?></td>
      </tr>
      <tr>
       <th>【物件概要】</th>
       <td><?= $case_detail ?></td>
      </tr>
      <tr>
       <th>【建築面積・延べ面積】</th>
       <td><?= $case_site ?></td>
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
    <a href="<?= $url ?>newhouse/case" class="bgbla white btn1">戻る</a>
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