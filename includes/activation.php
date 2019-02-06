<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! function_exists('rvps_activation')){

	function rvps_activation(){
		//check if rvps settings option 
		if(! get_option('rvps_setting')){
			add_option('rvps_setting', array(
					'rvps_label' 			=> 'Recently Viewed Products',
					'rvps_numb_products' 	=> 4,
					'rvps_in_shop_page' 	=> '',
					'rvps_position' 	=> '',
					'rvps_in_cart_page' 	=> 'enabled',					
				));
		}
	}


}