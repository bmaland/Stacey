<?php
/**
 * @package WordPress
 * @subpackage Stacey
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="shortcut icon" href="http://bmaland.com/favicon.ico" type="image/vnd.microsoft.icon"/>
<link rel="icon" href="http://bmaland.com/favicon.ico" type="image/x-ico"/>
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_directory' ); ?>/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="branding">
  <hgroup>
    <h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
    <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
  </hgroup>
</header><!-- #branding -->

<div id="page" class="hfeed">
  <nav id="access">
    <h1 class="screen-reader-text"><?php _e( 'Main menu', 'themename' ); ?></h1>
    <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'themename' ); ?>"><?php _e( 'Skip to content', 'themename' ); ?></a></div>

    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  </nav><!-- #access -->

  <div id="main">
