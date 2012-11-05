<?php 

Class WP_Widget_aovivo extends WP_Widget {

    function WP_Widget_aovivo () {
        $widget_ops = array('classname' => 'widget_aovivo', 'description' => __( 'Ativa o módulo Ao Vivo UStream') );
        $this->WP_Widget('WP_Widget_aovivo', __('Ao Vivo'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        if ($instance['ligado']==1 ):
            $title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title'], $instance, $this->id_base);
            echo $before_widget;
        ?>
            <div style="margin-top:50px;"> 
                 <h1><?php echo $title ?> <span style="float:right;margin-right:10px;" class="button red small">ao vivo</span></h1>
            </div> 
            <div class="two-thirds column">
                <?php if ($instance["tipo"] == '1'): ?>  <iframe src="http://www.ustream.tv/embed/12300705" width="608" height="368" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe>
                <?php else: echo $instance["embed_video"];endif;?>
                <div class="holder" style="margin-top:0px;"><?php echo wpautop($instance["resumo"]); ?></div>
            </div>
            <div class="one-third column">
                <?php if ($instance["tipo"] == '1'): ?> <iframe width="300" scrolling="no" height="470" frameborder="0" style="border: 0px none transparent;" src="http://www.ustream.tv/socialstream/12300705"></iframe>
                 <?php else: echo $instance["embed_chat"]; endif;?>
        
            </div>
            
          <div class="column-divider"></div>
          <? 
            echo $after_widget;
        endif;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['tipo'] = ($new_instance['tipo']);
        $instance['ligado'] =strip_tags($new_instance['ligado']);
        $instance['embed_chat'] = strip_tags($new_instance['embed_chat']);
        $instance['resumo'] = esc_textarea($new_instance['resumo']);
        $instance['embed_video'] = $new_instance['embed_video'];

        return $instance;
    }

    function form( $instance ) {
        //padrões
        $instance = wp_parse_args( (array) $instance, array( 
                                                'title' => 'Transmissão Ao Vivo',
                                                'tipo' => '1',
                                                'embed_video' => '',
                                                'embed_chat' => '',
                                                'resumo' => '',
                                                'ligado' => 0 ));

?>

        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
            name="<?php echo $this->get_field_name('title'); ?>" type="text" 
            value="<?php echo $instance['title']; ?>" /></p>
            
         <p><label for="<?php echo $this->get_field_id('resumo'); ?>"><?php _e('Descrição:'); ?></label>
          <textarea class="widefat" rows="2" cols="20" id="<?php echo $this->get_field_id('resumo'); ?>" 
          name="<?php echo $this->get_field_name('resumo'); ?>"><?php echo $instance['resumo']; ?></textarea></p>
        
         <p>
        <label for="<?php echo $this->get_field_id( 'tipo' ); ?>"><?php _e('Usar código:'); ?></label><br />
        <input type="radio" class="rr" name="<?php echo $this->get_field_name( 'tipo' ); ?>" value="1"<?php echo $instance['tipo'] == 1 ? ' checked' : ''; ?> /> Padrão <br/>
        <input type="radio" class="rr"  name="<?php echo $this->get_field_name( 'tipo' ); ?>" value="0"<?php echo $instance['tipo'] == 0 ? ' checked' : ''; ?> /> Personalizado</p> 
          
        <div class="toHide-1" id="toShow-0" > 
          <p><label for="<?php echo $this->get_field_id('embed_video'); ?>"><?php _e('Código Video (opcional):'); ?></label>
          <input type="text"  class="widefat"  id="<?php echo $this->get_field_id('embed_video'); ?>" 
          name="<?php echo $this->get_field_name('embed_video'); ?>" value="<?php echo $instance['embed_video']; ?>" /></p>
           
          <p><label for="<?php echo $this->get_field_id('embed_chat'); ?>"><?php _e('Código Chat (opicional):'); ?></label>
          <input type="text"  class="widefat"  id="<?php echo $this->get_field_id('embed_chat'); ?>" 
          name="<?php echo $this->get_field_name('embed_chat'); ?>" value="<?php echo $instance['embed_chat']; ?>" /></p>
           </div>
  
            <p><input type="checkbox" id="<?php echo $this->get_field_id("ligado");?>" name="<?php echo $this->get_field_name('ligado');?>" value="1" <?php checked($instance['ligado'],1); ?> /> <label for="ligado">Ligado</label>
            </p>

<?php
    }
}



