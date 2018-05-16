<?php
global $wpdb;
$table_name = $wpdb->prefix . "mog_table";

$dados_form = filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);

$data =	$wpdb->get_row("SELECT * FROM ".$table_name);

if (isset($dados_form['mog_url_default']) && !empty($dados_form['mog_url_default'])) {
  unset($dados_form['submit']);

  if(!$data) {
    $wpdb->insert($table_name, $dados_form );

  }else {    
    $update_item = $wpdb->update( $table_name, $dados_form, array ( 'id' => $data->id ) );
    $data =	$wpdb->get_row("SELECT * FROM ".$table_name); 
  }  
} else {
  
}