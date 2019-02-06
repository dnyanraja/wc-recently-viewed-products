<?php
/*
*	@PACKAGE WC RECENTLY VIEWED PRODUCTS
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function rvps_setting_page_callback(){ ?>
<div id="wpbody-body">

	<div id="wpbody-content" aria-label="Main content" tabindex="0">
		
	<div class="wrap">
		<h1><?php _e('Recently Viewed Products', 'rvps'); ?></h1>
		<?php 
			if(isset($_GET['success'])){
					echo urldecode($_GET['success']);
			}elseif(isset($_GET['error'])){
				echo urldecode($_GET['error']);
			}
		?>

		<table class="form-table">
			<tbody>
		<form method="post" action="admin-post.php" novalidate="novalidate">
		<?php wp_nonce_field('rvps_save_setting_fields_verify'); ?>
		<?php $settings = get_option('rvps_setting'); ?>

			<input type="hidden" name="action" value="rvps_save_settings_fields" / >
		<tr>
			<th><label for="rvps_label"><?php _e('Recently Viewed Products Label', 'rvps'); ?></label></th>
			<th><input type="text" name="rvps_label" value="<?php if(isset($settings['rvps_label'])){echo $settings['rvps_label']; } ?>" required></th>
		</tr>	
		<tr>
			<th><label for="rvps_numb_products"><?php _e('Number of Recently Viewed Products', 'rvps'); ?></label></th>
			<th><input type="text" name="rvps_numb_products" value="<?php if(isset($settings['rvps_numb_products'])){echo $settings['rvps_numb_products']; } ?>" required></th>
		</tr>

		<tr>
			<th><label for="rvps_in_shop_page"><?php _e('Include recently viewed products in shop page', 'rvps'); ?></label></th>
			<th><input <?php if(isset($settings['rvps_in_shop_page'])){ if($settings['rvps_in_shop_page'] == "enabled"){ echo 'checked'; } } ?> type="checkbox" name="rvps_in_shop_page" value="enabled" required></th>
		</tr>
				<tr>
			<th><label for="rvps_position"><?php _e('Display product ', 'rvps'); ?></label></th>
			<th><input <?php if(isset($settings['rvps_position'])){ if($settings['rvps_position'] == "before" ){ echo 'checked'; }  } ?> type="radio" name="rvps_position" value="before" required> Before Related products
				<input <?php if(isset($settings['rvps_position'])){ if($settings['rvps_position'] == "after" ){ echo 'checked'; }  } ?> type="radio" name="rvps_position" value="after" required> After Related products
			</th>
		</tr>
		<tr>
			<th><label for="rvps_in_cart_page"><?php _e('Include recently viewed products in cart page', 'rvps'); ?></label></th>
			<th><input <?php if(isset($settings['rvps_in_cart_page'])){ if($settings['rvps_in_cart_page'] == "enabled"){ echo 'checked'; } } ?> type="checkbox" name="rvps_in_cart_page" value="enabled" required></th>
		</tr>
		<tr>
		<td class="submit">

			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes" />
		</td></tr>

		</form>
	</tbody>	
	</table>


	</div>


<div class="clear"></div></div>

</div>
<?php
	
}