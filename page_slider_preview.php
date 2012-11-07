<?php /* Template name: preview */ ?>  
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

	

    <style>
    body {margin:0px;padding:0px;}
    </style>
	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/rs-plugin/css/settings.css" media="screen" />	
	
	<!-- HTML5 SHIV + DETECT TOUCH EVENTS -->


</head>
<body class="color-1 h-style-1 text-1">

	
    <!-- - - - - - - - - - - - - Slider - - - - - - - - - - - - - - - -->	
      <div class="fullwidthbanner-container">	
		
		<div class="fullwidthbanner" >
			
			<ul>	

                <!-- FADE -->
               <?php
                global $post;
                $post = get_post( $_GET["id"]);
                 setup_postdata($post); 
                    get_template_part("slider_loop2");    
               ?>	
			</ul>
			
		</div><!--/ .fullwidthbanner-->	
		
	</div><!--/ .fullwidthbanner-container-->
	<!-- - - - - - - - - - - - - end Slider - - - - - - - - - - - - - - -->
	<!-- GET JQUERY FROM THE GOOGLE APIS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<!--[if lt IE 9]>
	<script src="js/selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->


	

 <!-- JQUERY KENBURN SLIDER  -->	
<script src="<?php bloginfo('template_directory'); ?>/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>			
<script src="<?php bloginfo('template_directory'); ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>	
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/mediaelement-and-player.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
</body>
</html>
