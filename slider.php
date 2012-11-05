	<div class="fullwidthbanner-container">	
		
		<div class="fullwidthbanner" >
			
			<ul>	

               <?php
                global $post;
                $args = array( 'numberposts' => 5, 'category' => get_cat_ID("Destaque") );
                $myposts = get_posts( $args );
                foreach( $myposts as $post ) :  setup_postdata($post); 
                    get_template_part("slider_loop");    
                endforeach; ?>	
			</ul>
			
		</div><!--/ .fullwidthbanner-->	
		
	</div><!--/ .fullwidthbanner-container-->

