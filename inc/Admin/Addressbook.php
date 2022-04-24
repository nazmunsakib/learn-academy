<?php

namespace myacademy\Admin;

/**
 *  This is address book class
 */
class Addressbook {

	public $errors = [];

	/**
	 * The method for plugin page
	 */
	function plugin_page() {
		$action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';

		switch ( $action ) {

			case 'new':
				$template = __DIR__ . '/views/Address-new.php';
				break;

			case 'edit':
				$template = __DIR__ . '/views/Address-edit.php';
				break;

			case 'view':
				$template = __DIR__ . '/views/Address-view.php';
				break;

			default:
				$template = __DIR__ . '/views/Address-list.php';
				break;
		}

		if ( file_exists( $template ) ) {
			include $template;
		}
	}

	/**
	 * Handel the form
	 *
	 * @return void
	 */
	public function form_handler() {
		if ( ! isset( $_POST['submit_address'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'new-address' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Are You Cheating?' );
		}

		$name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$address = isset( $_POST['address'] ) ? sanitize_textarea_field( $_POST['address'] ) : '';
		$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';

		if ( empty( $name ) ) {
			$this->errors['name'] = __( 'please Provide a name', 'academy' );
		}
		if ( empty( $phone ) ) {
			$this->errors['phone'] = __( 'please Provide a phone Number', 'academy' );
		}

		if ( ! empty( $this->errors ) ) {
			echo "some error";
		}

		$insert_id = ac_insert_address(
			[
				"name"    => $name,
				"address" => $address,
				"phone"   => $phone
			]
		);

		if ( is_wp_error( $insert_id ) ) {
			wp_die( $insert_id->get_error_message() );
		}

		$redirect_to = admin_url( 'admin.php?page=learn-academy&inserted=true', 'admin' );
		wp_redirect( $redirect_to );
		exit;
	}

}