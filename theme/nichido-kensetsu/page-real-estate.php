<!DOCTYPE html>
<html lang="ja" dir="ltr">
<?php
	include( TEMPLATEPATH . '/inc/head.php' );
	$title = $post -> post_title;
		$archive_cate = 'news_cate';
	$news = '';

$args = array(
	'posts_per_page'   => 3,
	'post_type' => 'news',
	'order'           => 'DESC',
	'paged' => $paged,
	'orderby' => 'post_date',
	'tax_query'      => array(
array(
'taxonomy' =>$archive_cate,
'field'    => 'term_id', 
'terms'    => 13
)));
$getTypePosts = get_posts($args);
		
	foreach( $getTypePosts as $key => $val ) {
		$columTitle = $val->post_title;
		$colum_id = $val->ID;
		$colum_guid = $val->guid;
		$post_date = $val->post_date;
		$colum_date = date("M.d.Y", strtotime($post_date));
		$colum_img = get_post_thumbnail_id($colum_id); 
		$colum_img_val = wp_get_attachment_image_src($colum_img,'large'); 
				if(!is_array($colum_img_val)){
			$columImg = $site_url.'img/noimage.png';
		}else{
			$columImg = $colum_img_val[0];
		}
		$tarm_names = array();
		$tarm_names = get_the_terms($colum_id, $archive_cate);
		if($tarm_names){
			$tarm_name = $tarm_names[0]-> name;
			$tarm ='<p class="cate1 bgblu white">'.$tarm_name.'</p>';
		}else{
			$tarm="";
		}
$news .= <<< HTML
<li>
	<a href="{$colum_guid}" class="lista" aria-label="土地"></a>
	<div class="img"><img src="{$columImg}" alt="土地"></div>
	{$tarm}
	<p class="title">{$columTitle}</p>
	<p class="date lib">{$colum_date}</p>
</li>
HTML;
}
$check = 1;
if ( $news== ''   ) {
	$news = '只今準備中です。';
	$check = 2;
}
?>

<!-- header -->
<?php
	include( TEMPLATEPATH . '/inc/header.php' );
?>


<div class="artMvarea">
	<ul class="pankuzu cf"><li><a href="<?=$url?>">TOP</a>&gt;</li><li><?=$title?></li></ul>
		<!-- cover -->
	<div class="artMv">
		<div class="mvIn">
			<h2>
			<?=$title?>
			</h2>
			<span class="yugo"><?php the_subtitle(); ?></span>
		</div>

	</div>
	<!-- /cover -->
</div>

<div id="main">
<div class="about01">
		<div class="artin">
			<h3 class="artit">
				不動産売買、住宅の買取もご相談ください
			</h3>
			<dl>
				<dt>
					<img src="<?=$site_url?>img/esta01_img01.jpg" alt="不動産売買、住宅の買取もご相談ください">
				</dt>
				<dd>
					<p>
						日動建設は、新築やリフォームだけでなく、不動産売買や住宅の買取も行っております。<br>
						戸建てやマンション、土地、投資用物件、住み替えを考えている、なるべく早く売りたい、少しでも高く売りたいなど、不安なことや気になること等何度でもわかりやすくご説明いたしますので、お気軽にお問い合わせください。
					</p>
					<a href="http://nichido-kensetsu.info/" target="_blank" rel="noopener">
						<img src="<?=$site_url?>img/esta_btn.png" alt="不動産の情報についてはこちら">
					</a>
				</dd>
			</dl>
		</div>
	</div>

	<section class="content02">
		<div class="artin">
			<h3 class="artit">
				分譲地情報
			</h3>
			<ul class="blog-list">
			<?=$news?>
			</ul>
			<?php
			if($check == 1){
			?>
			<a href="<?=$url?>news_cate/tochi/" class="bgbla white btn1">一覧を見る</a>
			<?php
			}
			?>
		</div>
	</section>

	
	<div class="flow01">
		<div class="artin">
			<h3 class="artit">
				売却をお考えの方
			</h3>

			<ol>
				<li>
					<span class="no">01</span>
					<div class="box">
						<div class="img">
							<img src="<?=$site_url?>img/esta02_img01.jpg" alt="お問い合わせ・ご相談">
						</div>
						<dl>
							<dt>お問い合わせ・ご相談</dt>
							<dd>
								まずはお気軽にご相談ください。<br>
								ご売却をお考えの物件の内容や希望価格、売却希望時期など、ご売却の希望条件をお伺いいたします。疑問や不安に思うことなど何でもご相談ください。
							</dd>
						</dl>
					</div>
				</li>

				<li>
					<span class="no">02</span>
					<div class="box">
						<div class="img">
							<img src="<?=$site_url?>img/esta02_img02.jpg" alt="事前調査、物件の査定">
						</div>
						<dl>
							<dt>事前調査、物件の査定</dt>
							<dd>
								お客様の物件を正確に把握させていただくために、現地の様子や役所での資料閲覧や聞き取り調査をして、査定価格をご提示させていただきます。
							</dd>
						</dl>
					</div>
				</li>

				<li>
					<span class="no">03</span>
					<div class="box">
						<div class="img">
							<img src="<?=$site_url?>img/esta02_img03.jpg" alt="買取価格、売出価格の決定">
						</div>
						<dl>
							<dt>買取価格、売出価格の決定</dt>
							<dd>
								査定価格と周辺の取引事例や販売価格を参考に、お客様のご希望をお伺いしながら売出価格や当社買取価格を提示させていただきます。
							</dd>
						</dl>
					</div>
				</li>

				<li>
					<span class="no">04</span>
					<div class="box">
						<div class="img">
							<img src="<?=$site_url?>img/esta02_img04.jpg" alt="プラン作成と打ち合わせ">
						</div>
						<dl>
							<dt>日動建設で買取させて頂く場合</dt>
							<dd>
								当社買い取りの場合、迅速な物件のご売却が可能です。物件に残っている不要な残置物の処分や建物の解体、面倒な各手続きなども当社にお任せ下さい。
							</dd>
						</dl>
					</div>
				</li>

				<li>
					<span class="no">05</span>
					<div class="box">
						<div class="img">
							<img src="<?=$site_url?>img/esta02_img05.jpg" alt="日動建設で売却における販売をさせていただく場合">
						</div>
						<dl>
							<dt>日動建設で売却における<br>
								販売をさせていただく場合</dt>
							<dd>
								お客様と当社との間で売却における販売依頼の契約をさせていただきます。様々な媒体や方法で条件にあった購入希望者を探し、定期的にお客様へ販売状況をご報告させていただきます。
							</dd>
						</dl>
					</div>
				</li>

				<li>
					<span class="no">06</span>
					<div class="box">
						<div class="img">
							<img src="<?=$site_url?>img/esta02_img06.jpg" alt="購入申込、売買契約締結">
						</div>
						<dl>
							<dt>購入申込、売買契約締結</dt>
							<dd>
								購入希望者または日動建設と書面にて売買契約を結びます。<br>
								ご契約に関して不安なことがあれば何なりとお申し付け下さい。
							</dd>
						</dl>
					</div>
				</li>

				<li>
					<span class="no">07</span>
					<div class="box">
						<div class="img">
							<img src="<?=$site_url?>img/esta02_img07.jpg" alt="ショールームへ">
						</div>
						<dl>
							<dt>物件の引き渡し</dt>
							<dd>
								買主または日動建設より売買代金全額を受領し、所有権移転などの登記申請を行いますとお取引が完了致します。<br>
								「日動建設に頼んでよかった」と思っていただけるよう、お客様のサポートをさせていただきます。
							</dd>
						</dl>
					</div>
				</li>
			</ol>
		</div>
	</div>
</div>

<?php
	include( TEMPLATEPATH . '/inc/contact_area.php' );
?>
<?php
	wp_footer();
	include( TEMPLATEPATH . '/inc/footer.php' );
?>
</html>