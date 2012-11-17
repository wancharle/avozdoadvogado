<?php

get_header(); ?>


	<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		
	
	<section class="page-header">

        <?php $posts=query_posts($query_string . '&posts_per_page=20'); ?>	
	
		<div class="container">
			
			<h1>Resultados da pesquisa</h1>
			
		</div><!--/ .container-->
		
	</section><!--/ .page-header-->
	
	<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

	<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
		
	<section class="main container sbr clearfix">	
		
		<!-- - - - - - - - - - Breadcrumbs - - - - - - - - - - - - -->		
		
		<div class="breadcrumbs">

			<a title="Home" href="/">Home</a>
			<span>Resultados da pesquisa</span>

		</div><!--/ .breadcrumbs-->	
		
		<!-- - - - - - - - - end Breadcrumbs - - - - - - - - - - - -->	
		
		<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->	
		
		<section id="content" class="ten columns">
			
			<section class="portfolio-items pl-col-1">
            <h3>Foram encontrados <?php   global $wp_query; echo $wp_query->found_posts;?> resultados na pesquisa por '<?php the_search_query();?>'</h3>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
        
    
    			<article>

					<div class="project-meta">

						<h4 class="title-item"><a href="<?php the_permalink();?>"><?php the_title()?></a></h4>

						<p>
                        <?php the_excerpt() ?>    
						</p>

						<a href="<?php the_permalink();?>" class="button default">Leia Mais</a>

					</div><!--/ .project-meta-->						

				</article>

				<?php endwhile;?>
<?php wp_pagenavi(); ?>

	<?php else: ?>	
            <p>Nenhum resultado encontrado. Refine sua pesquisa e verifique se escreveu algum termo de forma incorreta.</p> 
	<?php endif;
 wp_reset_query();?>	
			</section><!--/ #portfolio-items-->		
			
		</section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->	
		<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
		
		<?php get_sidebar(); ?>
		<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->	
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->		

<?php get_footer(); ?>
