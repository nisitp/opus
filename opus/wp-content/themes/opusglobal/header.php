<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php gravity_form_enqueue_scripts(3, true); ?>
    <?php wp_head(); ?>
    <link rel="shortcut icon" sizes="16x16 24x24 32x32 57x57 72x72 96x96 120x120 128x128 144x144 152x152 195x195 228x228" href="<?php echo get_site_url(); ?>/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.typekit.net/amf5jth.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <script type='text/javascript'>
        (function (d, t) {
          var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
          bh.type = 'text/javascript';
          bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=it23ygiiflmx5l2vx1vb1w';
          s.parentNode.insertBefore(bh, s);
          })(document, 'script');
    </script>
   	<?php if( is_singular('post') ) { ?>
   		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59354a5842902e00112e9eb2&product=sticky-share-buttons' async='async'></script>
   	<?php } ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KJNDCHF');</script>
	<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJNDCHF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="header">
    <div class="header__contents">
        <div class="header__logo">
            <a href="/" class="hide-text icon-link"><?php bloginfo('name') ?></a>
        </div>
		<nav class="header__nav js-primary-nav">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary_navigation',
						'container' => false,
						'menu_class' => 'nav nav--primary',
						'depth' => 4,
						'walker' => new wp_ut_navwalker()
					)
				);
			?>
			<ul class="nav nav--utility">
				<li class="nav__item nav--utility__links">
					<span>
						<a href="<?php echo get_site_url(); ?>/search/" class="nav__icon icon-search"></a>
					</span>
					<span class="">
						<a href="<?php echo get_site_url(); ?>/about/contact" class="nav__link">Contact Us</a><a href="#" onClick="javascript:void(0);" data-modal="opus-modal-login" class="nav__link js-account-modal">Login</a>
					</span>
				</li>
				<li class="nav__item u-hidden-tablet">
					<button data-modal="demo-modal" class="nav__button demo-modal-open js-account-modal">Request a Demo</button>
				</li>
			</ul>
		</nav>
		<div class="header__utility">
			<button data-modal="demo-modal" class="u-hidden-mobile button demo-modal-open js-account-modal">Request a Demo</button>
			<div class="header__nav-mobile-toggle">
				<button class="hamburger hamburger--3dx" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>

    </div>
</header>
