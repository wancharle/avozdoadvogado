<?php

require_once('includes/vcard-widget.php');
require_once('includes/aovivo-widget.php');

function avoz_widgets_init() {
   wp_enqueue_style( 'farbtastic',get_template_directory_uri().'/farbtastic/farbtastic.css' );
   wp_enqueue_script("farbtastic",get_template_directory_uri()."/farbtastic/farbtastic.js" ,array('jquery')); 

    register_widget( 'Contacts_Widget' );
    register_widget( 'WP_Widget_aovivo');
    
    register_sidebar(array(
        'name'=> 'Barra entre o menu e o slider',
        'id' => 'sidebar-slider',
		'description' => __( 'Area para widgets que precisem estar entre o menu e o slider. Exemplo: widget aovivo.', 'avozdoadvogado' ),
        
		'before_widget' => '<div  class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
    ));
	register_sidebar( array(
		'name' => __( 'Barra Lateral', 'avozdoadvogado' ),
		'id' => 'sidebar-1',
		'description' => __( 'Area para widgets da barra lateral', 'avozdoadvogado' ),
		'before_widget' => '<div  class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Rodapé 1ª coluna', 'avozdoadvogado' ),
		'id' => 'sidebar-3',
		'description' => __( 'Uma area para widgets na 1ª coluna do rodape', 'avozdoadvogado' ),
		'before_widget' => '<div  class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Rodapé 2ª coluna', 'avozdoadvogado' ),
		'id' => 'sidebar-4',
		'description' => __( 'Uma area para widgets na 2ª coluna do rodape', 'avozdoadvogado' ),
		'before_widget' => '<div  class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Rodapé 3ª coluna', 'avozdoadvogado' ),
		'id' => 'sidebar-5',
		'description' => __( 'Uma area para widgets na 3ª coluna do rodape', 'avozdoadvogado' ),
		'before_widget' => '<div  class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

   	register_sidebar( array(
		'name' => __( 'Rodapé 4ª coluna', 'avozdoadvogado' ),
		'id' => 'sidebar-6',
		'description' => __( 'Uma area para widgets na 4ª coluna do rodape', 'avozdoadvogado' ),
		'before_widget' => '<div  class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'avoz_widgets_init' );


function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Menu Superior' ) )
  );
}
add_action( 'init', 'register_my_menus' );

// Freatured images/ imagens destacadas
add_theme_support( 'post-thumbnails' ); 
add_image_size( "noticias_mini" , 75, 65, true);
add_image_size( "homerotv_mini" , 285, 135, true);
add_image_size( "Post Destaque" , 570);
add_image_size( "slider" , 1400,490,true);


// mostrar links de navegacao
function avoz_content_nav( $nav_id ) {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> posts mais antigos', 'avoz' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'post mais recentes <span class="meta-nav">&rarr;</span>', 'avoz' ) ); ?></div>
		</nav><!-- #nav-above -->
    <?php 
    endif;
}

// metabox slider
require_once("includes/slider_admin.php");
add_action( 'add_meta_boxes', 'avoz_meta_box_add' );  
add_action( 'save_post', 'slideradmin_save');
add_action( 'admin_head-post.php', 'slideradmin_js' );
add_action( 'admin_head-post-new.php', 'slideradmin_js' );


function get_videointerno() {

    global $post, $posts;

    $thumb = '';

    ob_start();
    ob_end_clean();

    $output = preg_match_all('/(\<iframe.*\<\/iframe\>)/is', $post->post_content, $matches);
    $thumb = $matches [1] [0];

    return $thumb;
}
