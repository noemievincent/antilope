<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Noémie Vincent">
    <meta name="keywords" content="Mesure, Pollution, Qualité de l'air, Système embarqué, Capteurs">
    <meta name="description" content="Antilope, ou “Assessment of Indoor Outdoor Pollutants Exposure“, est un système low-cost de mesure des polluants atmosphériques tels que les oxydes d’azote (NO & NO2), ozone (O3) et les particules fines (PM 2.5).">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:title" content="Antilope">
    <meta property="og:description" content="Antilope, ou “Assessment of Indoor Outdoor Pollutants Exposure“, est un système low-cost de mesure des polluants atmosphériques tels que les oxydes d’azote (NO & NO2), ozone (O3) et les particules fines (PM 2.5).">
    <meta property="og:image" content="/wp-content/themes/antilope/screenshot.jpg">
    <meta property="og:site_name" content="Antilope">
    <title><?= wp_title('·', false, 'right') . 'Antilope'; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= ant_mix('css/style.css'); ?>"/>
	<?php wp_head(); ?>
</head>
<body class="<?= is_home() ? 'home' : 'sub-pages'?>">
<header id="header">
    <h1 class="header__title hidden">Antilope</h1>
    <div class="header__bar">
        <a class="header__link" href="<?= home_url() ?>">
            <svg version="1.1" class="header__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 42 48" height="48" width="42" xml:space="preserve">
                <path class="header__logo" d="M40.3,38.9c-0.2,0.1-0.3,0.2-0.5,0.2c-0.4-0.5-0.8-1-1.1-1.5c-0.6-0.8-1.5-0.9-2.3-0.3
                c-1.4,1.1-2.8,2.1-4.2,3.2c-0.8,0.6-0.9,1.5-0.3,2.3c0.4,0.5,0.7,1,1.1,1.6c-0.1,0.1-0.2,0.2-0.3,0.3c0.4,0.5,0.7,1,1.1,1.5
                c2.6-1.9,5.1-3.9,7.7-5.8C41,39.9,40.6,39.4,40.3,38.9z"/>
                <path class="header__logo" d="M35,36.4c-0.4-0.6-0.8-1.2-1.2-1.8c-0.3-0.5-0.6-0.9-0.9-1.4c-0.2-0.3-0.4-0.6-0.7-1c-0.4-0.5-0.7-1-1.1-1.6
                c-0.1-0.2-0.3-0.4-0.4-0.6c-0.3-0.4-0.6-0.8-0.9-1.2c-0.2-0.3-0.4-0.6-0.6-0.9c-0.2-0.3-0.5-0.6-0.7-0.9c0-0.1-0.1-0.1-0.2-0.2
                c-0.1-0.3-0.2-0.6-0.2-0.9c-0.2-0.9-0.5-1.8-1.2-2.3c-0.8-0.6-1.3-1.4-1.8-2.3c-1-1.7-2.5-2.9-4.1-3.4c0,0,0,0,0,0
                c-0.2-0.2-0.4-0.4-0.5-0.6c-0.2-0.2-0.4-0.5-0.7-0.7c0,0,0,0,0,0c-0.2-0.2-0.4-0.5-0.6-0.7c-0.3-0.3-0.6-0.6-0.9-0.9c0,0,0,0,0,0
                c-0.2-0.3-0.4-0.5-0.7-0.8c-0.3-0.3-0.6-0.5-0.8-0.8c-0.4-0.4-0.8-0.7-1.2-1.1c-0.3-0.4-0.7-0.6-1-1c-0.4-0.5-0.9-0.9-1.3-1.3
                c-0.7-0.6-1.4-1.2-2.1-1.8c-0.2-0.2-0.4-0.4-0.6-0.5C9.8,6.8,9,6.1,8.2,5.3c0,0-0.1,0-0.1-0.1C7.8,5.1,7.5,4.9,7.2,4.6
                C6.9,4.4,6.6,4.1,6.3,3.9c0,0,0,0,0,0c-0.3-0.2-0.7-0.5-1-0.7c0,0-0.1,0-0.1-0.1C4.9,2.9,4.7,2.7,4.4,2.6C4.2,2.4,4,2.2,3.7,2
                c0,0,0,0-0.1,0C3.4,1.8,3.2,1.7,3,1.5C2.7,1.3,2.4,1.1,2.1,0.9C1.9,0.8,1.7,0.7,1.5,0.5C1.3,0.4,1,0.2,0.7,0C0.5,0.3,0.2,0.6,0,1
                C0.1,1,0.1,1.1,0.1,1.1c0.2,0.1,0.3,0.2,0.5,0.3c0.3,0.2,0.5,0.4,0.8,0.6c0.4,0.2,0.7,0.6,1.1,0.9c0.8,0.8,1.7,1.5,2.5,2.3
                c0.2,0.2,0.3,0.3,0.4,0.5c0,0,0.1,0.1,0.1,0.1c0.5,0.5,1,1,1.5,1.5C7.1,7.5,7.4,7.7,7.6,8c0.2,0.2,0.4,0.5,0.6,0.7
                c0.2,0.2,0.5,0.5,0.7,0.7c0,0,0,0,0,0C9,9.6,9.2,9.8,9.3,10c0.2,0.3,0.5,0.5,0.7,0.8c0.2,0.3,0.4,0.6,0.6,0.8c0.3,0.4,0.6,0.8,1,1.1
                c0.3,0.4,0.7,0.8,1,1.2c0.1,0.1,0.2,0.2,0.3,0.3c0.2,0.3,0.4,0.6,0.6,0.9c0.4,0.6,0.8,1.1,1.2,1.7c0,0,0,0.1,0,0.2
                c-0.1-0.1-0.2-0.2-0.4-0.3c-0.2-0.1-0.4-0.3-0.6-0.4c-0.2-0.1-0.4-0.3-0.6-0.5c-0.2-0.1-0.3-0.2-0.5-0.3c-0.2-0.1-0.4-0.3-0.6-0.4
                c-0.2-0.1-0.4-0.3-0.6-0.5c-0.2-0.1-0.3-0.2-0.5-0.3c-0.2-0.1-0.4-0.3-0.6-0.4c-0.2-0.1-0.3-0.2-0.5-0.3c-0.3,0.4-0.6,0.7-1,1.1
                c0,0-0.1,0.1-0.1,0.2c0,0.5,0,1,0.2,1.5c0.2,0.7,0.5,1.4,0.9,2c0.1,0.1,0.2,0.2,0.3,0.3c0.2,0.3,0.4,0.6,0.7,0.8
                c0.3,0.3,0.6,0.6,1,0.9c0.1,0,0.1,0.1,0.2,0.1c0.1,0.1,0.2,0.1,0.3,0.2c-1.4,2.1-1.9,4.8-0.9,7.2c0.2,0.4,0.4,0.6,0.8,0.7
                c-0.1,0.5-0.2,0.9-0.2,1.4c-0.1,0.8-0.1,1.5-0.1,2.3c0,0.2,0,0.4,0,0.5c-0.1,0.3-0.1,0.7-0.2,1c-0.2,0.6-0.4,1.2-0.6,1.8
                c0,0,0,0.1,0,0.1c-0.3,0.6-0.6,1.2-1,1.8c-0.1,0.2-0.2,0.3-0.4,0.5c-0.1,0.2-0.3,0.5-0.4,0.6c-0.3,0.3-0.5,0.6-0.8,0.8l9.2,8.4
                c0,0,0,0,0,0c0.2-0.4,0.3-0.8,0.5-1.3c0.1-0.2,0.2-0.5,0.2-0.7c0.2-0.5,0.4-0.9,0.5-1.4c0.5-1.8,1-3.6,1.5-5.4c0,0,0-0.1,0-0.1
                c0.1-0.5,0.2-0.9,0.2-1.4c0.2-0.9,0.4-1.9,0.6-2.8c0-0.1,0.1-0.2,0.1-0.3c0.5,0.1,0.9,0.3,1.4,0.4c0.1,0,0.1,0.1,0.2,0.1
                c0.2,0,0.3,0.1,0.5,0.2c0.4,0.1,0.8,0.3,1.1,0.4c0.6,0.2,1.1,0.5,1.7,0.7c0.7,0.3,1.3,0.7,2,1c0.3,0.2,0.7,0.4,1,0.6
                c0.3,0.2,0.5,0.3,0.8,0.5c0.5,0.3,0.9,0.6,1.4,0.8c0.9,0.4,2.5-1.2,3.3-1.9C34.7,37.1,35.2,36.8,35,36.4z M26.5,27.7
                c-0.9,1-2.3,1-3.3,0.2c-1-0.9-1-2.3-0.2-3.3c0.9-1,2.3-1,3.3-0.2C27.3,25.3,27.4,26.8,26.5,27.7z"/>
            </svg>
        </a>
        <input id="toggle" class="toggle" type="checkbox">
        <div class="burgermenu">
            <label for="toggle" class="hamburger">
                <span class="top-bun"></span>
                <span class="meat"></span>
                <span class="bottom-bun"></span>
                <span class="hidden">Ouvrir le menu</span>
            </label>
        </div>
    </div>
    <div class="header__menu">
        <nav class="header__nav nav" aria-labelledby="nav">
            <h2 class="nav__title hidden" id="nav"><?= __('Navigation principale', 'ant'); ?></h2>
	        <?php wp_nav_menu([
		        'menu'       => 'primary',
		        'container'  => false,
		        'menu_class' => 'nav__container',
		        'walker'     => new PrimaryMenuWalker(),
	        ]); ?>
        </nav>
        <div class="header__lang lang">
		    <?php foreach (pll_the_languages(['raw' => true]) as $code => $locale) : ?>
                <a href="<?= $locale['url']; ?>" lang="<?= $locale['locale']; ?>" hreflang="<?= $locale['locale']; ?>"
                   class="lang__locale <?= $locale['current_lang'] ? ' lang__locale--current' : '' ?>"
                   title="<?= $locale['name']; ?>"><?= $code; ?></a>
		    <?php endforeach; ?>
        </div>
    </div>
</header>
<a href="#" class="header__scrollup">
    <svg version="1.1" class="scrollup" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 19.8 22.9" xml:space="preserve">
        <path class="up" d="M1,10.2L9.9,1l8.9,9.1 M9.9,21.9V1V21.9z"/>
    </svg>
</a>