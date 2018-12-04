<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Главная страница</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/libs.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css">
</head>
<body>
    <div class="wrapper">
        <header class="main-header">
            <div class="top-header">
                <div class="top-header__wrap">
                    <div class="logotype-block">
                        <div class="logo-wrap"><a href="/vp3"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.svg" alt="Логотип" class="logo-wrap__logo-img"></a></div>
                    </div>
                    <?php echo wp_nav_menu(); ?>
                </div>
            </div>
            <div class="bottom-header">
                <div class="search-form-wrap">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </header>