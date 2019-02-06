<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if(! function_exists('rvps_products_view')){
	
	function rvps_products_view($col_num = 0, $products_num=0){

		$products = new rvps();
		$products_ids = $products->rvps_get_products();
		
		if(! $products_ids){ return false;		}

		if(count($products_ids) <= 0){	return false;	}

		$rvps_settings = get_option('rvps_setting');

		if($products_num == 0){
	$num_of_display_products = isset($rvps_settings['rvps_numb_products']) ? $rvps_settings['rvps_numb_products'] : 4; 	
		}else{
			$num_of_display_products  = $products_num;
		}

		if(count($products_ids) > $num_of_display_products){
				$ids = array_slice($products_ids, -1*$num_of_display_products, $num_of_display_products, true);
		}else{
				$ids = $products_ids;
		}

		$rvps_query = new WP_query(array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'post__in' => array_reverse($ids),
				'orderby' => 'post__in',
			));
		if($rvps_query->have_posts()){
			echo "<section class='product'>";
			echo "<h2>".$rvps_settings['rvps_label']."</h2>";
			
			if($col_num == 0){
				$col = 4;
			}else{
				$col= $col_num;
			}
			echo '<ul class="products columns-'.$col.'">';
			while($rvps_query->have_posts()){

				$rvps_query->the_post();
				wc_get_template_part('content', 'product');

			}
		
			echo "</ul></section>";
			wp_reset_postdata();

		}else{
			return false;
		}

	}

}