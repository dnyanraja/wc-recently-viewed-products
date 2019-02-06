<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(!class_exists('rvps_view')){

	class rvps_view{

		public function rvps_show_after_related_products(){
			$rvps_settings = get_option('rvps_setting');
			
			if(! isset($rvps_settings['rvps_position'])){
					return;
			}

			if( $rvps_settings['rvps_position'] !== 'after' ){
					return;
			}
			if(rvps_products_view()){
				rvps_products_view();
			}

			
		}
		public function rvps_show_before_related_products(){

			if(! isset($rvps_settings['rvps_position'])){
					return;				
			}

			if( $rvps_settings['rvps_position'] !== 'before' ){
					return;
			}

			if(rvps_products_view()){
				rvps_products_view();
			}

		}

		public function rvps_show_in_shop_page(){

			$rvps_settings = get_option('rvps_setting');
			
			if(!isset($rvps_settings['rvps_in_shop_page'])){
				return;
			}

			if( $rvps_settings['rvps_in_shop_page'] !== 'enabled' ){
					return;
			}

			if(rvps_products_view()){
				rvps_products_view();
			}

		}



		public function rvps_show_in_cart_page(){

			$rvps_settings = get_option('rvps_setting');
			
			if(!isset($rvps_settings['rvps_in_cart_page'])){
				return;
			}

			if( $rvps_settings['rvps_in_cart_page'] !== 'enabled' ){
					return;
			}

			if(rvps_products_view()){
				rvps_products_view();
			}
			
		}



	}
}
