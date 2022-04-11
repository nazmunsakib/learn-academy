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
		$parent_sulg = 'learn-academy';
		$manege_potions = 'manage_options';

		add_menu_page(__('Learn Academy', 'academy'), __('Academy', 'academy'), $manege_potions,  $parent_sulg, [$this, 'address_book'], 'dashicons-welcome-learn-more');
		add_submenu_page($parent_sulg, __('Address Book', 'academy'), __('Address Book', 'academy'), $manege_potions, $parent_sulg, [$this, 'address_book']);
		add_submenu_page($parent_sulg, __('Settings', 'academy'), __('Settings', 'academy'), $manege_potions, 'academy-Settings', [$this, 'academy_Settings']);
	}

	/**
	 * The address book callback function
	 */
	function address_book(){
		$address_book = new Addressbook();
		$address_book->plugin_page();
	}

	/**
	 * The settigns page callback function
	 */
	function academy_Settings(){
		echo "Hello WOrld";
	}

	
}
