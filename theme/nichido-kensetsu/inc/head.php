<?php
global $site_url;
global $url;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<?php wp_head(); ?>

<meta name="keywords" content=",,,">

<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Shippori+Mincho+B1:wght@500;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?=$site_url?>css/default.css">
<link rel="stylesheet" href="<?=$site_url?>style.css" media="screen,print">
<link rel="stylesheet" href="<?=$site_url?>css/slick-theme.css" media="screen,print">
<link rel="stylesheet" href="<?=$site_url?>css/slick.css" media="screen,print">
<link rel="stylesheet" href="<?=$site_url?>css/lightbox.css" media="screen,print">
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=$site_url?>js/slick.min.js"></script>
<script src="<?=$site_url?>js/lightbox.js"></script>

<link rel="shortcut icon" href="<?=$site_url?>img/favicon.ico">
<link rel="icon" type="image/png" href="<?=$site_url?>img/favicon.png">
<link rel="apple-touch-icon-precomposed" href="<?=$site_url?>img/apple-touch-icon-152x152.png">

<link rel="preload" as="image" href="<?=$site_url?>img/mv1.webp" />
<link rel="preload" as="image" href="<?=$site_url?>img/mv1_sp.webp" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7JHBEE8F3H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7JHBEE8F3H');
</script>

<!--[if lt IE 9]>
<script src="<?=$site_url?>js/html5.js"></script>
<script src="<?=$site_url?>js/css3-mediaqueries.js"></script>
<![endif]-->

<?php if ( is_home() || is_front_page() ){ ?>
<body id="pTop" class="website" data-responsejs='{ "create": [ { "prop": "width", "prefix": "src", "lazy": true, "breakpoints": [0,592,1001] } ]}'>
<?php 
	} else {
// 	$title = $post -> post_title;
// 	$slug = $post -> post_name;
// 	$slugB = strtoupper( $slug );
	$class='';

// 	if( is_archive('news')  ){
// 		$slug = "news";
// 	}elseif(is_singular('news')){
// 		$slug = "news";
// 	}elseif( is_archive('work')  ){
// 		$slug = "news works";
// 	}elseif(is_singular('work')){
// 		$slug = "news works";
// 	}elseif( is_archive('recruit')){
// 		$slug = "recruit";
// 	}elseif(is_singular('recruit')){
// 		$slug = "recruit";
// 	}

// 	if($slug == "contact-confirm"){
// 		$slug="contact";
// 	}elseif($slug == "contact-thanks"){
// 		$slug="contact";
// 	}

	
?>
<body id="pTop" class="article" data-responsejs='{ "create": [ { "prop": "width", "prefix": "src", "lazy": true, "breakpoints": [0,592,1001] } ]}'>
<?php } ?>