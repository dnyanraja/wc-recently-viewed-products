<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(!function_exists('rvps_shortcode')){

function rvps_shortcode($atts, $content = null){

	extract(shortcode_atts(
		array(
		'columns' => 4,
		'num_products' => 4,
		),
		$atts, 
		'rvps'
	));

return rvps_products_view($columns, $num_products);


	}

}