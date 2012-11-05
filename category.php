<?php

get_header(); ?>


	<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		
	
	<section class="page-header">
		
			<?php if ( have_posts() ) : ?>
		<div class="container">
			
			<h1><?php single_cat_title(); ?></h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="/">Home</a>
			<span><?php single_cat_title();?></span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->	
		
		<section id="content" class="ten columns">
			
			<section class="portfolio-items pl-col-1">

				<?php while ( have_posts() ) : the_post(); ?>
        
    
    			<article>

                    <?php if (has_post_thumbnail()): ?>
					<div class="project-thumb">
						
						<div class="bordered">
							<figure class="add-border">
								<a class="single-image" href="<?php the_permalink();?>"><?php the_post_thumbnail("Post Destaque"); ?></a>
							</figure>
						</div><!--/ .bordered-->

					</div><!--/ .project-thumb-->
                    <?php endif; ?>
					<div class="project-meta">

						<h4 class="title-item"><a href="<?php the_permalink();?>"><?php the_title()?></a></h4>

						<p>
                        <?php the_excerpt() ?>    
						</p>

						<a href="<?php the_permalink();?>" class="button default">Leia Mais</a>

					</div><!--/ .project-meta-->						

				</article>

				<?php endwhile; ?>
<?php avoz_content_nav("nav-below"); ?>

			</section><!--/ #portfolio-items-->		
			
		</section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->	
	<?php endif; ?>	
		<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
		
		<?php get_sidebar(); ?>
		<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->	
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->		

<?php get_footer(); ?>
