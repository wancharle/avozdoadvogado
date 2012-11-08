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

    $tipos = array(
        1=>"titulo",
        2=>"resumo",
        3=>"imagem destacada",
        4=>"texto extra",
        5=>"imagem extra",
        6=>"texto extra (link)",
    );

    $speeds = array(
        400=>"bem rápido",
        700=>"rápido",
        1000 => "normal",
        2000 => "lento",
        3500 => "bem lento",
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
        " "    => "",
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
input.color_picker {width:70px;}
td {text-align:center;}
input.size{ width:32px}
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

<p> <label for="leg1">Efeito do titulo:</label>
<select name="leg1" id="leg1">
<?php foreach ($text_efects as $key => $value): ?>
<option value="<?=$value?>" <?php selected( $leg1, $value);?> ><?=$key; ?></option>
<?php endforeach;?>
</select>

<label for="leg1f">Estilo:</label>
<select name="leg1f" id="leg1f">
<?php foreach ($text_css as $key => $value): ?>
<option value="<?=$value?>" <?php selected( $leg1f, $value);?> ><?=$key; ?></option>
<?php endforeach;?>
</select>
<label for="leg1x">Pos X: </label>
<input type="text" class="sliderpos" maxlength="3" name="leg1x" id="leg1x" value="<?=$leg1x?>" />

<label for="leg1y">Pos Y: </label>
<input type="text" class="sliderpos" maxlength="3" name="leg1y" id="leg1y" value="<?=$leg1y ?>" />
</p> 
 <table >
    <tr>
        <th>Efeito</th>
        <th>Aplicar a</th>
       <th>Posição x</th>
        <th>Posição y</th>
        <th>Inicia em</th>
        <th>Velocidade</th>
        <th>Cor de fundo</th>
        <th>Cor da letra</th> 
        <th>tamanho</th>
        <th>Extra</th>
    </tr>
    <?php   

    //$mcs will be a multi-dimensional array with this method

    for($i = 1; $i <= 8; $i++):?>
    <tr>

      <td><select  name="tipo<?=$i?>"> 
            <?php foreach ($text_efects as $key => $value): ?><option value="<?=$value?>" <?php selected( $values["tipo".$i][0], $value);?> ><?=$key; ?></option> <?php endforeach;?>
      </select></td>
      
      <td><select name="aplicar<?=$i?>" id="aplicar">
             <?php foreach ($tipos as $value => $key): ?><option value="<?=$value?>" <?php selected( $values["aplicar".$i][0], $value);?> ><?=$key; ?></option><?php endforeach;?>
          </select></td>

        <td><input type="text" class="sliderpos" maxlength="3" name="x<?=$i?>" value="<?=$values["x".$i][0]?>" /></td>
        <td><input type="text" class="sliderpos" maxlength="3" name="y<?=$i?>" value="<?=$values["y".$i][0]?>" /></td>
        <td><input type="text" class="sliderpos" maxlength="4" name="start<?=$i?>" value="<?=$values["start".$i][0]?>" /></td>
         <td><select name="speed<?=$i?>" id="speed">
             <?php foreach ($speeds as $value => $key): ?><option value="<?=$value?>" <?php selected( $values["speed".$i][0], $value);?> ><?=$key; ?></option><?php endforeach;?>
          </select></td>

    <td><input type="text"  maxlength="8" class="color_picker"  id="cor_fundo<?=$i?>" name="cor_fundo<?=$i?>" value="<?=isset($values['cor_fundo'.$i])?$values['cor_fundo'.$i][0]: '#363432'?>" />
     <div class="fabox" id="fabox_cor_fundo<?=$i?>"></div>    
    </td>

      <td><input type="text"  maxlength="8" class="color_picker"  id="cor<?=$i?>" name="cor<?=$i?>" value="<?=isset($values['cor'.$i])?$values['cor'.$i][0]: '#fff'?>" />
         <div class="fabox" id="fabox_cor<?=$i?>"></div>    
      </td>

      <td><input type="text"  maxlength="2"  class="size" id="size<?=$i?>" name="size<?=$i?>" value="<?=isset($values['size'.$i])?$values['size'.$i][0]: '16'?>" />px</td>



        <td><input type="text" name="extra<?=$i?>" value="<?=$values["extra".$i][0]?>" /></td>
    </tr> 
 
    <?php endfor;
    ?>
   
    <?php  ?>

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
   
    $nef = array(); 
    for  ($i = 1; $i <= 8; $i++){
             if ($_POST["tipo".$i] == "off"){
                update_post_meta( $post_id, 'tipo'.$i, esc_attr($_POST['tipo'.$i])  );  
             }else{
                $nef[$i]=intval($i);
                update_post_meta( $post_id, 'tipo'.$i, esc_attr($_POST['tipo'.$i])  );  
                update_post_meta( $post_id, 'aplicar'.$i, esc_attr($_POST['aplicar'.$i])  );  
                update_post_meta( $post_id, 'x'.$i, esc_attr($_POST['x'.$i])  );  
                update_post_meta( $post_id, 'y'.$i, esc_attr($_POST['y'.$i])  );  
                update_post_meta( $post_id, 'start'.$i, esc_attr($_POST['start'.$i])  );  
                update_post_meta( $post_id, 'extra'.$i, esc_attr($_POST['extra'.$i])  );  
                update_post_meta( $post_id, 'speed'.$i, esc_attr($_POST['speed'.$i])  );  
                update_post_meta( $post_id, 'cor_fundo'.$i, esc_attr($_POST['cor_fundo'.$i])  );  
                update_post_meta( $post_id, 'cor'.$i, esc_attr($_POST['cor'.$i])  );  
                update_post_meta( $post_id, 'size'.$i, esc_attr($_POST['size'.$i])  );  

            }
    } 
   
     update_post_meta($post_id, 'nef', $nef);
    
     update_post_meta($post_id, 'efeitos', $_POST['efeito']);

    if( isset( $_POST['kenburn_image'] ) )  
        update_post_meta( $post_id, 'kenburn_image', esc_attr($_POST['kenburn_image'])  );  
    $chk = isset( $_POST['kenburn_use_destaque'] ) ? 'on' : 'off';  
    update_post_meta( $post_id, 'kenburn_use_destaque', $chk  );  
}  


function slideradmin_js(){
 ?>
<script type="text/javascript">
 
  jQuery(document).ready(function() {
    jQuery(".color_picker").each(function(){
        if (this.id) {
            jQuery('#fabox_' + this.id).farbtastic('#' + this.id);
        };
    });
    jQuery('.fabox').hide();
    jQuery(".color_picker").focus(function(){
        jQuery(this).next().slideToggle()
    });
     jQuery(".color_picker").blur(function(){
        jQuery(this).next().hide()
    });

  });
 
</script>

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
