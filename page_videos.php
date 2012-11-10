<?php
/*
   Template name: videos

*/

    get_header();
?>
	<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		
	
	<section class="page-header">
		
		<div class="container">
			
			<h1>TV Homero</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="/">Home</a>
			<span>TV Homero</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - Portfolio Filter - - - - - - - - - - - -->	
			
		<ul id="portfolio-filter" class="portfolio-filter">

			<li><a data-categories="*">Todos</a></li>
			<li><a data-categories="destaque">Destaque</a></li>
			<li><a data-categories="depoimentos">Depoimentos</a></li>
			<li><a data-categories="chapa">Chapa</a></li>
			<li><a data-categories="noticias">Notícias</a></li>
			<li><a data-categories="descategorizado">outros</a></li>

		</ul><!--/ #portfolio-filter -->
		
		<!-- - - - - - - - end Portfolio Filter - - - - - - - - - - -->	
		
		<section id="portfolio-items" class="portfolio-items pl-col-3">
            <?php 
               

                /* atualiza post que não possuem tag video 
                $todos=query_posts( array ( 'posts_per_page' => -1 ) );
                foreach ($todos as $p){
                    if (!has_tag('video',$p->ID)){
                        if( check_videointerno($p)){ 
                            wp_set_post_terms( $p->ID, "video", "post_tag", true ); 
                        }
                    } 
                }
                */
 
           query_posts( array ( 'tag' => 'video', 'posts_per_page' => -1 ) );    
           while (have_posts()) : the_post();
             ?>
			<article class="one-third column" data-categories="<?php $cats = wp_get_post_terms($post->ID,"category",array('fields' => 'slugs')); foreach($cats as $cat){echo $cat." ";}?>">
				
				<div class="project-thumb">
					
					<div class="bordered">
						<figure class="add-border">
							<a class="single-image video-icon play" href="<? echo get_the_iframe_src($post); ?>">
								<img src="<?=get_video_thumbnail()?>"> 
							</a>
						</figure>
					</div><!--/ .bordered-->					
					
				</div><!--/ .project-thumb-->

				<div class="project-meta">

					<h4 class="title-item"><a href="<? the_permalink()?>"><?the_title();?></a></h4>
					
					<p><?the_excerpt();?></p>
					
				</div><!--/ .project-meta-->						

			</article><!--/ .one-third-->
            <? 
            endwhile; 
            ?>
		</section><!--/ #portfolio-items-->
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
		
<?php get_footer();?>
