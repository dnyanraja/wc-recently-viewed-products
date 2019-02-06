<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! class_exists('rvps')){

	class rvps{
		// start session if not started already
		public function rvps_start_session(){

			if(!session_id()){
				session_start();
			}

		}
		public function rvps_session_name(){
			
			if(is_user_logged_in()){
				$user_id = get_current_user_id();				
				$rvps_session_name = 'rvps_product_'.$user_id;
			}else{
				$rvps_session_name = 'rvps_product_guest';
			}
			return $rvps_session_name;
			
		}

		//init session for current user
		public function rvps_init_session(){
			$session_name = $this->rvps_session_name();

			if(!isset($_SESSION[$session_name])){

					$_SESSION[$session_name] = serialize(array());
			}
		}

		//get current user session
		public function rvps_get_products(){

			$session_name = $this->rvps_session_name();

			if(!isset($_SESSION[$session_name])){
					return false;
			}
			return unserialize($_SESSION[$session_name]);
		}

		//update user session
		public function rvps_update_product(){

			$session_name = $this->rvps_session_name();

			if(!is_product()){
				return false;
			}

			$viewed_products = $this->rvps_get_products();		

			if(!in_array(get_the_ID(), $viewed_products)){
				
				$viewed_products[] = get_the_ID();

			}else{
				
				$current_product_key = array_search(get_the_ID(), $viewed_products);
				unset( $viewed_products[$current_product_key]);
				$viewed_products[] = get_the_ID();
			}

			$_SESSION[$session_name] = serialize($viewed_products);

		}







	}
}