<?php

class Contacts_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'contacts', // Base ID
            'Contatos', // Name
            array( 'description' => __( 'Exibe informações de contato do site', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $before_widget;
        if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
        ?>
        <div class="vcard">
            <span class="contact street-address">Endereço:<?php echo $instance['street']?></span>
            <span class="contact tel">Telefone:<?php echo $instance['tel']?></span>
            <span class="contact email">E-mail:<?php echo $instance['email']?></span>						
        </div><!--/ .vcard-->
        <?php
        echo $after_widget;
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['street'] = strip_tags( $new_instance['street'] );
        $instance['tel'] = strip_tags( $new_instance['tel'] );
        $instance['email'] = strip_tags( $new_instance['email'] );

        return $instance;
    }

    public function form( $instance ) {
       
        $instance = wp_parse_args( (array) $instance, array( 
                                                'title' => '',
                                                'street' => '',
                                                'tel' => '',
                                                'email' => '',
                                                 ));

 
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'street' ); ?>"><?php _e( 'Endereço:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'street' ); ?>" name="<?php echo $this->get_field_name( 'street' ); ?>" type="text" value="<?php echo esc_attr( $instance['street'] ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'tel' ); ?>"><?php _e( 'Telefone:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'tel' ); ?>" name="<?php echo $this->get_field_name( 'tel' ); ?>" type="text" value="<?php echo esc_attr( $instance['tel'] ); ?>" />
        </p>
     
       <p>
        <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $instance['email'] ); ?>" />
        </p>
     

        <?php 
    }

} // class Foo_Widget}


