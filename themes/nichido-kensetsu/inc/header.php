<?php
global $site_url;
global $url;
?>

<!-- header -->
<header>
	<div class="flex">
		<div class="left">
			<p class="lib">NICHIDO construction</p>
			<div class="hLogo"><h1><a href="<?=$url?>"><img src="<?=$site_url?>img/logo.svg" alt="日道建設株式会社" width="324" height="65"></a></h1></div>
		</div>
		<ul class="headerUl">
			<li class="menuBtn sp">
				<div class="menu-trigger">
					<span></span>
					<span></span>
					<span></span>
				</div>
	
			<nav class="gnav">
				<div class="gnav__wrap">
					<div class="gnav_div">
						<ul class="gnav__menu f700">
							<li class="gnav__menu__item"><a href="<?=$url?>">TOP</a></li>
							<li class="gnav__menu__item">
								<p class="hambtn"><span class="arrow2">日動建設について</span></p>
								<div class="hamd">
									<ul class="hamd-menu">
										<li><a href="<?=$url?>about/">日動建設について</a></li>
										<li><a href="<?=$url?>about/concept">日動建設のコンセプト</a></li>
									</ul>
								</div>
							</li>
							<li class="gnav__menu__item">
								<p class="hambtn"><span class="arrow2">新築・注文住宅</span></p>
								<div class="hamd">
									<ul class="hamd-menu">
										<li><a href="<?=$url?>newhouse/">新築・注文住宅</a></li>
										<li><a href="<?=$url?>newhouse/case">施工事例</a></li>
										<li><a href="<?=$url?>newhouse/flow">家づくりの流れ</a></li>
										<li><a href="<?=$url?>newhouse/performance">性能</a></li>
										<li><a href="<?=$url?>newhouse/after">アフターフォロー・保証</a></li>
										<li><a href="<?=$url?>newhouse/cost">費用</a></li>
									</ul>
								</div>
							</li>
							<li class="gnav__menu__item">
								<p class="hambtn"><span class="arrow2">リフォーム</span></p>
								<div class="hamd">
									<ul class="hamd-menu">
										<li><a href="<?=$url?>reform/">リフォーム</a></li>
										<li><a href="<?=$url?>reform/works">施工事例</a></li>
										<li><a href="<?=$url?>reform/flow">リフォームの流れ</a></li>
									</ul>
								</div>
							</li>
							<li class="gnav__menu__item"><a href="<?=$url?>real-estate">不動産情報</a></li>
							<li class="gnav__menu__item"><a href="<?=$url?>chintai">賃貸物件情報</a></li>
							<li class="gnav__menu__item"><a href="<?=$url?>company">会社案内</a></li>
							<li class="gnav__menu__item"><a href="<?=$url?>news">お知らせ</a></li>
						</ul>
						<a href="<?=$url?>contact" class="contact-btn white"><img src="<?=$site_url?>img/mail.svg" alt="mail" width="31" height="20">お問い合わせ</a>
						<p class="header-tel-btn white">
							お電話でのお問い合わせはこちら
							<a href="tel:0120-492-366" class="lib">0120-492-366</a>
						</p>
					</div>
				</div><!--gnav-wrap-->
			</nav>
			</li>
		</ul>
		<div class="right">
			<div class="top">
				<ul class="header-list1">
					<li><a href="<?=$url?>company" class="blue">会社案内</a></li>
					<li><a href="<?=$url?>news" class="blue">お知らせ</a></li>
					<li><a href="<?=$url?>contact" class="blue">問い合わせ</a></li>
				</ul>
				<div class="tel-box lib">
					<img src="<?=$site_url?>img/blu_tel.svg" alt="tel">
					<p class="pc blue">0120-492-366</p>
					<a href="tel:0120-492-366" class="sp blue">0120-492-366</a>
				</div>
			</div>
			<div class="bottom">
				<ul class="header-list2">
					<li><a href="<?=$url?>">TOP</a></li>
					<li>
						<a href="<?=$url?>about/about" class="arrow1">日動建設について</a>
						<div class="drop-div">
							<ul class="drop-menu">
								<li><a href="<?=$url?>about/concept">日動建設のコンセプト</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="<?=$url?>newhouse/" class="arrow1">新築・注文住宅</a>
						<div class="drop-div">
							<ul class="drop-menu">
								<li><a href="<?=$url?>newhouse/case">施工事例</a></li>
								<li><a href="<?=$url?>newhouse/flow">家づくりの流れ</a></li>
								<li><a href="<?=$url?>newhouse/performance">性能</a></li>
								<li><a href="<?=$url?>newhouse/after">アフターフォロー・保証</a></li>
								<li><a href="<?=$url?>newhouse/cost">費用</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="<?=$url?>reform/" class="arrow1">リフォーム</a>
						<div class="drop-div">
							<ul class="drop-menu">
								<li><a href="<?=$url?>reform/works">施工事例</a></li>
								<li><a href="<?=$url?>reform/flow">リフォームの流れ</a></li>
							</ul>
						</div>
					</li>
					<li><a href="<?=$url?>real-estate">不動産情報</a></li>
					<li><a href="<?=$url?>chintai">賃貸物件情報</a></li>
				</ul>
			</div>
		</div>
	</div>
</header><!-- /header -->