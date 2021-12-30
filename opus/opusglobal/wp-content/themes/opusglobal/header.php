<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php gravity_form_enqueue_scripts(3, true); ?>
    <?php wp_head(); ?>
    <link rel="shortcut icon" sizes="16x16 24x24 32x32 57x57 72x72 96x96 120x120 128x128 144x144 152x152 195x195 228x228" href="<?php echo get_site_url(); ?>/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        (function(d) {
            var config = {
                kitId: 'bwy7ugz',
                scriptTimeout: 3000,
                async: true
            },
            h=d.documentElement,t=setTimeout(function(){h.className=h.className
            .replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),
            tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],
            a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId
            +'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this
            .readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);
            try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>
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
	<!-- Hotjar Tracking Code for https://www.opus.com -->
	<script>
	(function(h,o,t,j,a,r){
	h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	h._hjSettings={hjid:987698,hjsv:6};
	a=o.getElementsByTagName('head')[0];
	r=o.createElement('script');r.async=1;
	r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	a.appendChild(r);
	})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<!-- End Hotjar Tracking Code for https://www.opus.com -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.6.1/iframeResizer.min.js"></script>	
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

