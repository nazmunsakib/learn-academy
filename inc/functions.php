<?php

/**
 * Insert a new address
 *
 * @param array $args
 *
 * @return int
 */
function ac_insert_address( $args = [] ) {
	if ( empty( $args['name'] ) ) {
		return new \WP_Error( 'no-name', __( 'You Must Provide a name', 'academy' ) );
	}


	global $wpdb;

	$default = [
		'name'       => '',
		'address'    => '',
		'phone'      => '',
		'created_by' => get_current_user_id(),
		'created_at' => current_time( 'mysql' ),
	];
	$data    = wp_parse_args( $args, $default );

	$inserted = $wpdb->insert(
		"{$wpdb->prefix}ac_addresses",
		$data,
		[
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		]
	);

	if ( ! $inserted ) {
		require new \WP_Error( 'failed-to-insert', __( 'Failed to insert Data', 'academy' ) );
	}

	return $wpdb->insert_id;
}