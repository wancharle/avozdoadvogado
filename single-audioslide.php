<? get_header();?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		
	
	<section class="page-header">
		
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">


		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
        <h1><? the_title(); ?></h1>	
		 <div class="disable-really"><p><? the_excerpt();?></p></div>	
        <div style="float:right"><? echo do_shortcode('[really_simple_share]');?> </div> <div class="clearfix"></div>

		<div class="bordered disable-really" style="background-color:black">
		    <? echo hana_flv_player_template_call('video="'.strip_tags(get_the_content()).'"  width="944" height="505" player="4" autoload="true" autoplay="false" loop="false" autorewind="true" /]');?>	
		</div><!--/ .bordered-->
<?	

$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3,'post_type'=>'audioslide', 'post__not_in' => array($post->ID) ) );
if( $related ): 
echo "<h2>Assista também</h2>";
foreach( $related as $post ) :
setup_postdata($post); ?>
<div class="one-third column">
<div class="disable-really" style="width:295px;height:192px;padding-bottom:10px;margin-top:5px;">
		    <? echo hana_flv_player_template_call('video="'.strip_tags(get_the_content()).'"  width="295" height="192" player="4" autoload="true" autoplay="false" loop="false" autorewind="true" /]');?>	
</div>
<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<div class="disable-really">
<p><? the_excerpt() ?></p></div>
</div>
<?php
endforeach;endif;
wp_reset_postdata();
?>

		</section><!--/ .main -->
<? endwhile;endif?>
	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
		
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<? bloginfo("template_directory")?>/js/jquery.gmap.min.js"></script>

<? get_footer();?>
