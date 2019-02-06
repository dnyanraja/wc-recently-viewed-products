<?php
/**
 * Plugin Name: WC Recently Viewed Products
 * Plugin URI: 
 * Description: WC Recently Viewed Products
 * Author: 
 * Author URI: 
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain :rvps 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/***************************
Check wordpress version
***************************/
if(version_compare(get_bloginfo('version'), '4.0', '<' )){
	$message = 'Need Wordpress version 4.0 or higher'; 	
 	die($message);
}

/**************************** 
	Define Constants 
*****************************/

define('RVPS_PATH', plugin_dir_path(__FILE__));
define('RVPS_URI', plugin_dir_url(__FILE__));

/****************************************
	Check if woocommerce is active
****************************************/
if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins') ) ) ){
	if(! class_exists("RVPS_core")){
		class RVPS_core{
			public function __construct(){

					/***** Include Files *******/
					require(RVPS_PATH.'includes/activation.php');
					require(RVPS_PATH.'views/admin/settings_page.php');
					require(RVPS_PATH.'views/rvps_products_view.php');
					require(RVPS_PATH.'shortcodes/rvps_shortcode.php');

					/***** Include Classes *******/
					require(RVPS_PATH.'classes/rvps_setting_page.php');
					require(RVPS_PATH.'classes/rvps_save_setting.php');
					require(RVPS_PATH.'classes/rvps.php');
					require(RVPS_PATH.'classes/rvps_view.php');

				
					/***** Include Hooks *******/
					register_activation_hook(__FILE__, 'rvps_activation');

					add_action('init', array(new rvps(), 'rvps_start_session'), 10);					
					add_action('init', array(new rvps(), 'rvps_init_session'), 15);
					add_action('wp', array(new rvps(), 'rvps_update_product'));

					add_action('admin_menu', array(new rvps_setting_page(), 'rvps_create_settings_page'));
					add_action('admin_post_rvps_save_settings_fields', array(new rvps_save_settings(), 'rvps_save_admin_fields'));

					add_action('woocommerce_after_single_product_summary', array(new rvps_view(), 'rvps_show_after_related_products'), 21);
					add_action('woocommerce_after_single_product_summary', array(new rvps_view(), 'rvps_show_before_related_products'), 19);
					add_action('woocommerce_after_shop_loop', array(new rvps_view(), 'rvps_show_in_shop_page'));
					add_action('woocommerce_cart_collaterals', array(new rvps_view(), 'rvps_show_in_cart_page'));
					
					/***** Include Shortcodes *******/
					add_shortcode('rvps', 'rvps_shortcode');
			}
		}
		$rvsp_core = new RVPS_core();
	}

}

function test_test(){
	//$rvps = new rvps();
	//var_dump($rvps->rvps_get_products());
	//rvps_products_view();
}
add_action('wp_footer', 'test_test');