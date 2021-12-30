<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Opus-Blog
 */

global $wp_the_query;

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<title><?php opus_title(); ?></title>

		<link rel="shortcut icon" sizes="16x16 24x24 32x32 57x57 72x72 96x96 120x120 128x128 144x144 152x152 195x195 228x228" href="<?php echo THEME; ?>/assets/img/favicon.ico">
		<script src="https://use.typekit.net/czk2ubt.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<header class="header">
			<div class="header__topbar">
				<h1 class="header__logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo THEME; ?>/assets/img/logo-opus-inside.png" height="89" width="321" alt="Opus | Inside"></a></h1>
			</div>
		</header>

<?php
if (1 || is_user_logged_in()) {
?>
		<nav class="nav">
			<?php wp_nav_menu(array(
				'theme_location' => 'primary',
				'menu_id'        => 'menu-primary',
				'menu_class'	 => 'nav__list',
				'container'		 => false,
			)); ?>
		</nav>
<?php } ?>
		<div class="container">

			<main id="main" data-items="<?php echo $wp_the_query->post_count; ?>" class="content">
