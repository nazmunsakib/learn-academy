<?php

namespace myacademy\Admin;

/**
 *The menu heading
 */
class Menu {
	/**
	 * Initialize the class
	 */
	function __construct() {

		add_action('admin_menu', [$this, 'academy_admin_menu']);

	}

	/**
	 *Admin menu create
	 */
	function  academy_admin_menu(){
		add_menu_page(__('Learn Academy', 'academy'), __('Academy', 'academy'), 'manage_options', 'learn-academy', [$this, 'plugin_page'], 'dashicons-welcome-learn-more');
	}

	function plugin_page(){
		echo "Hello World";
	}

}
