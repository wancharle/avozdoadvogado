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
			

				<?php while ( have_posts() ) : the_post(); ?>
        
    
                <div class="quoteBox five columns alpha">
				    <div class="quote-text"><?php the_excerpt() ?></div>

                    <span class="quote-author"><?;
                        preg_match('/(?P<nome>.+):.*/', get_the_title(), $matches);?><span><?=$matches['nome']?></span><a href="<?the_permalink()?>">Leia mais</a></span>

			    </div>
				<?php endwhile; ?>

<?php avoz_content_nav("nav-below",true); ?>
			
		</section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->	
	<?php endif; ?>	
		<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	
		
		<?php get_sidebar(); ?>
		<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->	
			
	</section><!--/ .main -->

	<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->		

<?php get_footer(); ?>
