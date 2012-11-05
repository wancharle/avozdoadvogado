<?php
  if($_POST['nome']) :

    $nome = esc_html($_POST["nome"]);
    $email = esc_html($_POST["email"]);
    if (isset($_POST["twitter"])) $twitter = esc_html($_POST["twitter"]);
    if (isset($_POST["facebook"])) $facebook = esc_html($_POST["facebook"]);
    if (isset($_POST["msg"])) $msg = esc_html($_POST["msg"]);
    
    
    if ( is_email($email)){
        $message = "<p>Nome: ".$nome. "</p>"
            ."<p>Email: ".$email. "</p>"
            ."<p>twitter: ".$twitter. "</p>"
            ."<p>Facebook: ".$facebook. "</p>"
            ."<p>Mensagem: ".$msg. "</p>";
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));

        $my_post = array(
          'post_title'    => $nome,
          'post_content'  => $msg,
          'post_status'   => 'draft',
          'post_author'   => 1,
          'post_category' => array(get_cat_ID("Depoimentos"),),
        );

        $id=wp_insert_post( $my_post );
        wp_set_post_terms($id,array(get_cat_ID("Depoimentos")),'category');
    
        $headers = 'From: Site <contato@avozdoadvogado.com.br>' . "\r\n";
        wp_mail('homeromafra2012@gmail.com', '[Apoio] '.$nome,$message,$headers );  

    };
   ?>

<script>
    alert("Recebemos sua mensagem de apoio. Em breve estará disponivel no site.");
</script>
<?php endif ;?>

				<div class="widget widget_contact_form">

					<h3 class="widget-title">Envie seu apoio</h3>

                    <p>Escreva aqui seu apoio à nossa chapa. E publique agora a sua voz!</p>
					<form action="" name="form-apoio" method="post">
						
						<p class="input-block">
							<label>Nome (obrigatório):</label>
							<input type="text" name="nome" />
						</p>
                        <p class="form-error" id="form-apoio-nome"> </p>
						<p class="input-block">
							<label>E-mail (obrigatório):</label>
							<input type="text" name="email" />
						</p>

                        <p class="form-error" id="form-apoio-email"> </p>
						<p class="input-block">
							<label>Twitter:</label>
							<input type="text" name="twitter"/>
                        	<label>Facebook:</label>
							<input type="text" name="facebook" />
						</p>


						<p class="input-block">
							<label>Mensagem:</label>
							<textarea name="msg"></textarea>
						</p>
						
						<p style="text-align:right"><button class="button default" name="submit" type="submit">Enviar</button></p>
						
					</form>

				
				</div><!--/ .widget-->
<script>
var validator = new FormValidator('form-apoio', [{ name: 'nome',  rules: 'required' }, { name: 'email', rules: 'required|valid_email'}], function(errors, event){

   $("p.form-error").html("");
   if (errors.length > 0) {
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            $("#form-apoio-"+errors[i].name).html(errors[i].message);
        }
    }   

});
validator.setMessage('required', 'O campo  %s é obrigatório.');
validator.setMessage('valid_email', 'Informe um %s válido.');
</script>
