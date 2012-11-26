<!DOCTYPE html>
<!--[if IE 7]>					<html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,400italic,600,700|Arimo|Oswald|Lato|Ubuntu' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>
	
	<meta name="description" content="">
	<meta name="author" content="">
    <meta property="fb:app_id" content="429375117124964"/>
    <meta property="fb:admins" content="100004495300226" />

	
    <link rel="shortcut" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skeleton.css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mediaelementplayer.css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox.css" media="screen" />

	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/rs-plugin/css/settings.css" media="screen" />	
	
	<!-- HTML5 SHIV + DETECT TOUCH EVENTS -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>

    <script type="text/javascript" src="<?php bloginfo("template_directory");?>/js/validate.min.js"></script>

   <?php wp_head(); ?>
</head>
<body class="color-1 h-style-1 text-1">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=429375117124964";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>	
	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	<header id="header">
		
		<div class="container" style="margin-top:50px;">
		    <div id="search-menu">

		<? get_search_form() ?>	
            </div>

	
			<!-- - - - - - - - - - - - Logo - - - - - - - - - - - - - -->	
			
                <div id="logo2">
                    <a href="/"><img width="190px" src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a>
                </div>
			<a href="/" id="logo">
				<h1><img src="<?php bloginfo('template_directory'); ?>/images/assinatura.png" width="170px"></h1>
			</a><!--/ #logo-->	
			
			<!-- - - - - - - - - - - end Logo - - - - - - - - - - - - -->
			
			<!-- - - - - - - - - - - - Social Icons - - - - - - - - - - - - - -->	
			<ul class="social-icons clearfix">
                <li><div class="fb-like" style="margin-top:7px;margin-right:10px;" data-href="http://www.facebook.com/pages/A-Voz-do-Advogado/506569536020966" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true"></div></li>
				<li class="twitter"><a href="http://twitter.com/homeromafra" target="_blank">Twitter<span></span></a></li>
				<li class="facebook"><a href="http://facebook.com/pages/Homero-Mafra/506569536020966" target="_blank">Facebook<span></span></a></li>
				<li class="dribble"><a href="http://instagram.com/homeromafra" target="_blank">Instagram<span></span></a></li>
				<li class="youtube"><a href="http://youtube.com/avozdoadvogado2012" target="_blank">YouTube<span></span></a></li>
			</ul><!--/ .social-icons-->
			
			<!-- - - - - - - - - - - end Social Icons - - - - - - - - - - - - -->	
			
			<div class="clear"></div>
			
			<!-- - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - -->	

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container'=>'nav',
 'container_class'=>'navigation clearfix',
'container_id'=> 'navigation',
'menu_class'=> 'clearfix' ) );?>
			<!-- - - - - - - - - - - - end Navigation - - - - - - - - - - - - - -->	
        		</div><!--/ .container-->
		
	</header><!--/ #header-->
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	
	
