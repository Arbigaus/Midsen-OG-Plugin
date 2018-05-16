<h1><?php echo $title; ?></h1>
<?php require_once($mog_folder . "src/submit_form.php"); ?>

<p>Insira abaixo uma imagem padrão, para quando o post não possuir nenhuma.</p>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" >
  
  <input name="mog_url_default" type="text" value="<?php echo (isset($data->mog_url_default))?$data->mog_url_default :"" ?>" />

  <?php submit_button( 'Salvar' ) ?>

</form>

<?php echo (isset($dados_form['mog_url_default']))? "Dados atualizado com sucesso." :"" ?>