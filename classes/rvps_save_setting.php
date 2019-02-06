<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! class_exists('rvps_save_settings')){
	
	class rvps_save_settings{
			public function rvps_save_admin_fields(){

				check_admin_referer('rvps_save_setting_fields_verify');
				
				if(!current_user_can('manage_options')){				
					wp_die('You are not allowed to edit settings');
				
				}else{


				}

				$rvps_label 		= sanitize_text_field($_POST['rvps_label']);
				$rvps_numb_products = sanitize_text_field($_POST['rvps_numb_products']);
				$rvps_in_shop_page 	= sanitize_text_field($_POST['rvps_in_shop_page']);
				$rvps_position 		= sanitize_text_field($_POST['rvps_position']);
				$rvps_in_cart_page 	= sanitize_text_field($_POST['rvps_in_cart_page']);

				$values = array(
						'rvps_label' => $rvps_label,
						'rvps_numb_products' => $rvps_numb_products,
						'rvps_in_shop_page' => $rvps_in_shop_page,
						'rvps_position' => $rvps_position,
						'rvps_in_cart_page' => $rvps_in_cart_page,
					);

				if($rvps_label == '' || $rvps_numb_products == '' ){
					wp_redirect(get_admin_url().'admin.php?page=rvps_settings&error='.urlencode('Error updating the options'));
				exit();	
				}

				update_option('rvps_setting', $values);				
				wp_redirect(get_admin_url().'admin.php?page=rvps_settings&success='.urlencode('settings saved'));
				exit();
			}
	}
}
?>