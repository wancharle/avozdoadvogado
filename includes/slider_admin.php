<?php
function avoz_meta_box_add()  
{  
    add_meta_box( 'slider-kenburn', 'Efeitos do slider', 'avoz_meta_box_cb', 'post', 'normal', 'low' );  
}  

function avoz_meta_box_cb()  
{  
    global $post;  
    $transitions = array(
    "Desvanecer" => "fade",
    "Deslisar para esquerda" => "slideleft",
    "Deslisar para cima" => "slideup",
    "Deslisar para baixo" => "slidedown",
    "Deslisar para direita" => "slideright",
    "Deslisar na horizontal" => "slidehorizontal",
    "Deslisar na vertical" => "slidevertical",
    "Cortina 1" => "curtain-1",
    "Cortina 2" => "curtain-2",
    "Cortina 3" => "curtain-3", 
    "Slot Slide Horizontal" => "slotslide-horizontal",
    "Slot Slide Vertical" => "slotslide-vertical",
    "Slot Fade Horizontal" => "slotfade-horizontal",
    "Slot Fade Vertical" => "slotfade-vertical",
   ); 

    $text_efects = array(
    "Sem efeito" => "off",
    "Desvanecer" => "fade",
    "Vindo da esquerda" => "lfl",
    "Vindo da direita" => "lfr",
    "Vindo de cima" => "lft",
    "Vindo de baixo" => "lfb"
    );

    $text_css = array(
        "branco " => "small_text",
        "branco medio" => "medium_text",
        "branco grande" => "branco_grande",
        "branco gigante" => "very_big_white",
        "preto" => "black",
        "preto medio" => "medium_black",
        "preto grande" => "big_black",
        "fundo escuro medio" => "medium_dark_back",
        "fundo escuro grande" => "big_dark_back",
        "fundo branco medio" => "medium_white_back",
        "fundo branco grande" => "big_white_back",
        "fundo amarelo escuro grande" => "big_yellow_dark_back",
    );
   
  $values = get_post_custom( $post->ID );  
   $selected = isset( $values['kenburn_transition'] )? esc_attr($values['kenburn_transition'][0]): ''; 
   $leg1 = isset( $values['leg1'] )? esc_attr($values['leg1'][0]): ''; 
   $leg1x = isset( $values['leg1x'] )? esc_attr($values['leg1x'][0]): '0'; 
   $leg1y = isset( $values['leg1y'] )? esc_attr($values['leg1y'][0]): '0'; 
   $leg1f = isset( $values['leg1f'] )? esc_attr($values['leg1f'][0]): 'medium_text'; 
    $check = isset( $values['kenburn_use_destaque'] ) ? esc_attr( $values['kenburn_use_destaque'][0] ) : '';  
    // We'll use this nonce field later on when saving.  
    wp_nonce_field( 'my_slideradmin_nonce', 'slideradmin_nonce' ); 
    ?> 
    <p>Adicione efeitos ao slider. Funciona apenas para posts da categoria destaque</p> 
  
<style>
input.sliderpos { width:40px !important;}
</style>
    <p> <label for="_select">Transição:</label> 
        <select name="kenburn_transition" id="kenburn_transition"> 
            <?php foreach ($transitions as $key => $value): ?>
              <option value="<?=$value?>" <?php selected( $selected, $value);?> ><?=$key; ?></option>
             
            <?php endforeach;?>
        </select>
    </p> 
    <p><input type="checkbox" name="kenburn_use_destaque"  <?php checked( $check, 'on' ); ?> /> Usar imagem destacada como Fundo.</p>
    <p>Fundo:  
        <input id="upload_image" type="text" name="kenburn_image" value="<?php echo esc_attr($values["kenburn_image"][0])?>" />
        <input type="button" id="upload_image_button" name="upload_image_button" value="selecionar imagem" />  
    </p> 
 <table border=1>
    <tr>
        <th>Aplicar a:</th>
        <th>Efeito</th>
        <th>Estilo</th>
        <th>Posição x</th>
        <th>Posição y</th>
    </tr>
    <tr>
      <td><select name="aplicar" id="aplicar">
            <option value="1" selected>titulo</option>
            <option value="2" >resumo</option>
            <option value="3" >imagem destacada</option>
            <option value="4" >texto</option>
            <option value="5" >texto</option>
       
            </select>
        </td>
      <td> 
        <select name="leg1" id="leg1"> 
            <?php foreach ($text_efects as $key => $value): ?>
              <option value="<?=$value?>" <?php selected( $leg1, $value);?> ><?=$key; ?></option> 
            <?php endforeach;?>
        </select>
       </td>
        <td>
        <select name="leg1f" id="leg1f"> 
            <?php foreach ($text_css as $key => $value): ?>
              <option value="<?=$value?>" <?php selected( $leg1f, $value);?> ><?=$key; ?></option> 
            <?php endforeach;?>
        </select>
        </td><td>
        <input type="text" class="sliderpos" maxlength="3" name="leg1x" id="leg1x" value="<?=$leg1x?>" />
        </td><td>
        <input type="text" class="sliderpos" maxlength="3" name="leg1y" id="leg1y" value="<?=$leg1y ?>" />
    </td>
    </tr>  <?php
    //$mcs will be a multi-dimensional array with this method
    $mcs = get_post_meta($post->ID,'mcs',true);
    if ($mcs){
    //Loop through each set of saved mc data (date, media, and title per item) and output inputs so the saved values can be edited and resaved. 
    foreach ($mcs as $mc) : ?>
    <tr>
        <td><input type="text" name="mc[][date]" value="<?php echo $mc['date'] ?>" class="datepicker"/></td>
        <td><input type="text" name="mc[][media]" value="<?php echo $mc['media'] ?>" /></td>
        <td><input type="text" name="mc[][title]" value="<?php echo $mc['title'] ?>" /></td>
        <td><a href="#" class="remove">Remove</a></td>
    </tr>
    <?php endforeach;
    }
     ?>

</table> 
 
    <p><a href="javascript:mostrar_preview(<?=$post->ID?>);">Exibir Demonstração</a> </p>
    <div id="slider_preview" style="display:none;width:920px;border:1px solid black;"></div>

  <a href="#" class="add_new_media"></a>

    <?php 
}  

function slideradmin_save( $post_id )  
{  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['slideradmin_nonce'] ) || !wp_verify_nonce( $_POST['slideradmin_nonce'], 'my_slideradmin_nonce' ) ) return; 
    if( !current_user_can( 'edit_post' ) ) return;  
    $allowed = array(  
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
    // Make sure your data is set before trying to save it  
    
    if( isset( $_POST['kenburn_transition'] ) )  update_post_meta( $post_id, 'kenburn_transition', esc_attr($_POST['kenburn_transition'])  );  
    if( isset( $_POST['leg1'] ) )  update_post_meta( $post_id, 'leg1', esc_attr($_POST['leg1'])  );  
    if( isset( $_POST['leg1x'] ) )  update_post_meta( $post_id, 'leg1x', esc_attr($_POST['leg1x'])  );  
    if( isset( $_POST['leg1y'] ) )  update_post_meta( $post_id, 'leg1y', esc_attr($_POST['leg1y'])  );  
    if( isset( $_POST['leg1f'] ) )  update_post_meta( $post_id, 'leg1f', esc_attr($_POST['leg1f'])  );  

    if( isset( $_POST['kenburn_image'] ) )  
        update_post_meta( $post_id, 'kenburn_image', esc_attr($_POST['kenburn_image'])  );  
    $chk = isset( $_POST['kenburn_use_destaque'] ) ? 'on' : 'off';  
    update_post_meta( $post_id, 'kenburn_use_destaque', $chk  );  
}  


function slideradmin_js(){
?>
<script>
function mostrar_preview(post_id){

    jQuery("#slider_preview").show();
    jQuery("#slider_preview").html("<iframe src='/slider-preview/?id="+post_id+"'  width='900px' height='500px' />");
}
jQuery(document).ready(function() {
    
    var formfield;
    
    jQuery('#content-add_media').click(function() { formfield=null;})
    jQuery('#upload_image_button').click(function() {
        jQuery('html').addClass('Image');
        formfield = jQuery('#upload_image').attr('name');
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        return false;
    });
    
    // user inserts file into post. only run custom if user started process using the above process
    // window.send_to_editor(html) is how wp would normally handle the received data

    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){

        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
            
            jQuery('#upload_image').val(fileurl);

            tb_remove();
            
            jQuery('html').removeClass('Image');
            formfield= null;
            
        } else {
            window.original_send_to_editor(html);
        }
    };

});
</script>


<?php } ?>
