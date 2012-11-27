<?php get_header(); ?>


	<!-- - - - - - - - - - - - - Slider - - - - - - - - - - - - - - - -->	
    <?php if ( is_active_sidebar( 'sidebar-slider' )): ?>
            <section class="container" ><? dynamic_sidebar( 'sidebar-slider' );?></section>
    <?php endif; 
     get_template_part('slider'); ?>
	<!-- - - - - - - - - - - - - end Slider - - - - - - - - - - - - - - -->
	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="container">	
		
		<!-- - - - - - - - - - - - - Holder - - - - - - - - - - - - - - -->
		
		<section class="holder clearfix">
			 <?php
                global $post;
                $args = array( 'numberposts' => -1, 'category' => get_cat_ID("Depoimentos") );
                $myposts = get_posts( $args );
                $tres = array_slice($myposts,0,3);    
                $resto = array_slice($myposts,3);
                foreach( $tres as $post ) :  setup_postdata($post); ?>
                        
				
			<div class="one-third column">
               <div class="detailimg">
                    <?php if (has_post_thumbnail() || (( $video_thumbnail = get_video_thumbnail() ) != null ) ):?>
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image video-icon"  href="<?php echo get_permalink();  ?>" ><?php 
                        if (has_post_thumbnail()) 
                            the_post_thumbnail("homerotv_mini");
                        else
                            echo "<img src='".$video_thumbnail."' width='285' height='135' />";

                        ?></a>
						</figure>
					</div><!--/ .bordered-->
					<?php endif;?>

                    <?php if (in_category("TV Homero")):
					     echo "<h5>TV HOMERO</h5>";
                        else:
                         echo "<h5>".get_the_title()."</h5>";
                        endif; ?>
					<p><?php the_excerpt() ?></p>
					
					<a href="<?php echo get_permalink(); ?>" class="button default">Leia Mais</a>
					
				</div><!--/ .detailimg-->
				
			</div><!--/ .one-third-->
			
            <?php endforeach; ?>
		
		
			<div class="clear"></div>
 		</section><!--/ .holder-->
        <section class="clearfix">
	<div class="full-width">
        <h3>Confira todos os apoios</h3>
        <ul id="carousel" class="elastislide-list" >
                 <?php
                foreach( $resto as $post ) : 
                    setup_postdata($post);
                    if (has_post_thumbnail() || (( $video_thumbnail = get_video_thumbnail() ) != null ) ):
                    echo "<li><a href='".get_permalink()."'>";
                        if (has_post_thumbnail()) 
                            the_post_thumbnail(array(180,180));
                        else
                            echo "<img src='".$video_thumbnail."' width='180' height='135' />";
                    ?></a><div style="width:170px;white-space:normal;height:80px;overflow:hidden;"><a href="<?the_permalink()?>"><? the_title()?></a></div></li>

                <?   endif;
                endforeach; 
                ?>
    

            </ul>

           </div>
        </section>	
<br><br><br>
		<!-- - - - - - - - - - - - end Holder - - - - - - - - - - - - - -->

		<!-- - - - - - - - - - - - - - - Bottom Sidebar - - - - - - - - - - - - - - - - -->	

		<aside id="bottom-sidebar" class="clearfix">

			<div class="one-third column">
				
				<div class="widget widget_recent_entries">

					<h3 class="widget-title">Últimas Notícias</h3>
					
					<ul>
              	 <?php
                global $post;
                $args = array( 'numberposts' => 2, 'category' => get_cat_ID("Notícias"), );
                $myposts = get_posts( $args );
                foreach( $myposts as $post ) :  setup_postdata($post); ?>
               
						<li>
							<h6><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
				
                            <?php if (has_post_thumbnail()){	?>		
							<div class="bordered alignleft">
								<figure class="add-border">
									<a class="single-image" href="<? the_permalink(); ?>"><?php the_post_thumbnail("noticias_mini");?>)</a>
								</figure>

							</div><!--/ .bordered-->
							<?php } ?>
							<p><?php the_excerpt(); ?></p>
						</li>
                    <?php endforeach; ?>
					</ul>

				</div><!--/ .widget-->				
				
			</div><!--/ .one-third-->
			
			<div class="one-third column">
				
					
            <?php get_template_part('envie_seu_apoio');?>				
			
			</div><!--/ .one-third-->
			
			<div class="one-third column">
			 <?php get_template_part("likebox");?>

			</div><!--/ .one-third-->

		</aside><!--/ #bottom-sidebar-->

		<!-- - - - - - - - - - - - - end Bottom Sidebar - - - - - - - - - - - - - - - -->	

	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
		
<?php get_footer(); ?>

