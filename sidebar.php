	
		<aside id="sidebar" class="one-third column">		

                <?php if ( is_active_sidebar( 'sidebar-1' ) ) :  dynamic_sidebar( 'sidebar-1' ); endif; ?>
            
			 <div class="widget"><?php get_template_part("likebox");?></div>
              <div class="widget"><?php get_template_part('envie_seu_apoio');?></div>				
		</aside><!--/ #sidebar-->
		
		
