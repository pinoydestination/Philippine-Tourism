<?php
if( is_admin() ) {

	/* Start of: WordPress Administration */

	if( function_exists( 'aioseop_get_version' ) ) {

		add_action( 'add_meta_boxes', 'woo_ai_meta_boxes' );
		add_action( 'woocommerce_process_product_meta', 'woo_ai_process_product_meta', 1, 2 );

	}

	function woo_ai_meta_boxes() {

		add_meta_box( 'woocommerce-aioseop', __( 'All in One SEO Pack', 'woo_ai' ), 'woo_ai_aioseop_box', 'product', 'normal', 'high' );

	}

	function woo_ai_aioseop_box() {

		global $post, $wpdb, $woo_ai;

		wp_nonce_field( 'woocommerce_save_data', 'woocommerce_meta_nonce' );

		$keywords = get_post_meta( $post->ID, '_aioseop_keywords', true );
		$description = get_post_meta( $post->ID, '_aioseop_description', true );
		$title = get_post_meta( $post->ID, '_aioseop_title', true );
		$title_atr = get_post_meta( $post->ID, '_aioseop_titleatr', true );
		$menu_label = get_post_meta( $post->ID, '_aioseop_menulabel', true );

		include_once( $woo_ai['abspath'] . '/templates/admin/woo-admin_ai_aioseop.php' );

	}

	function woo_ai_process_product_meta( $post_id, $post ) {

		update_post_meta( $post_id, '_aioseop_title', stripslashes( $_POST['aioseop_title'] ) );
		update_post_meta( $post_id, '_aioseop_description', stripslashes( $_POST['aioseop_description'] ) );
		update_post_meta( $post_id, '_aioseop_keywords', stripslashes( $_POST['aioseop_keywords'] ) );
		update_post_meta( $post_id, '_aioseop_titleatr', stripslashes( $_POST['aioseop_titleatr'] ) );
		update_post_meta( $post_id, '_aioseop_menulabel', stripslashes( $_POST['aioseop_menulabel'] ) );

	}

	/* End of: WordPress Administration */

}
?>