<?php get_header(); ?>

	<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		
	
	<section class="page-header">
		
		<div class="container">
			
			<h1><?php the_title();?></h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Início" href="/">Home</a>
			<span><?php the_title();?></span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
		 
		<section id="content" class="ten columns">
		 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
			<article class="entry">
				
                <?php  if ( has_post_thumbnail() ) { ?> 
                    <div class="bordered">
					<figure class="add-border">
                     <?php     the_post_thumbnail(); ?>
					</figure>
				</div><!--/ .bordered-->
				<?php }; ?>
				<div class="entry-body">
					
					<div class="entry-title">

						
						
					</div><!--/ .entry-title-->					
                        <?php the_content() ?>					

<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="10" data-width="500"></div>
				</div><!--/ .entry-body -->

			</article><!--/ .entry-->
		<?php endwhile; endif; ?>	
	    </section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
		
		<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
    <?php get_sidebar(); ?>
	<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->				
	
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			

    <?php get_footer() ?>
