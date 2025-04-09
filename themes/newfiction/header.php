<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta name="google" content="notranslate">
    <title><?php bloginfo('name'); ?></title>
    <?php get_template_part('template-parts/google/tag-manager'); ?>
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og.jpg">
    <?php if(is_front_page()): ?>
        <meta property="og:url" content="<?php echo home_url();?>">
        <meta property="og:type" content="website">
    <?php else: ?>
        <meta property="og:url" content="<?php echo get_the_permalink();?>">
        <meta property="og:type" content="article">
    <?php endif; ?>
    <meta property="og:site_name" content="">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary_large_image">
    <?php wp_head(); ?>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Fragment+Mono:ital@0;1&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+JP:wght@400;500;700&display=swap');
    </style>
</head>

<body <?php body_class(); ?> data-barba="wrapper">
<?php get_template_part('template-parts/global', 'header'); ?>