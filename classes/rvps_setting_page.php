<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! class_exists('rvps_settings_page')){
	class rvps_setting_page{

		public function rvps_create_settings_page(){
				add_submenu_page('woocommerce', 
						__('WC RVPS Settings', 'rvps'), 
						__('WC RVPS Settings', 'rvps'),
						'manage_options',
					 	'rvps_settings',
					 	'rvps_setting_page_callback'
						  );
		}


	}

}