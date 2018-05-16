<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

error_reporting(E_ALL);
ini_set("display_errors", 1);	
/*
	Plugin Name:  Midsen OG Plugin
	Plugin URI:   
	Description:  Adicionar Open Graph meta data nos posts
	Version:      0.1
	Author:       Gerson Arbigaus
	Author URI:   
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html		
 */

register_activation_hook( __FILE__, array ('Mog_Plugin', 'mog_install' ));

add_action( 'admin_menu', array ('Mog_Plugin','mog_register_menu'));

class Mog_Plugin  {

  static public function mog_register_menu() {
    $main = add_menu_page(
      'Midsen OG Plugin',    // page title
      'Midsen OG Plugin',     // menu title
      'manage_options',	// capability
      'Midsen OG Plugin', // menu slug
      array (__CLASS__, 'mog_render_adm' ) // callback function
    );
  }

  static public function mog_render_adm(){
    global $title;
    $mog_folder = plugin_dir_path( __FILE__ );

    $file = plugin_dir_path( __FILE__ ) . "screens/admin.php";

		if (file_exists($file)) {
			require $file;
		}
  }

  /*
		Create the table to plugin
	 */
	
	public static function mog_install(){
		global $wpdb;

		$table_name = $wpdb->prefix . "mog_table";

		$charset_collate = $wpdb->collate;

		$sql = "CREATE TABLE $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  mog_url_default text NULL,
      PRIMARY KEY  (id)
		) COLLATE {$charset_collate}";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
	}

}