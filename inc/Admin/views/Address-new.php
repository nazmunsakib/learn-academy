<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'New Address', 'learn-academy' ); ?></h1>
    <hr class="wp-header-end">

    <form action="" method="post">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="name"><?php _e( 'name', 'learn-academy' ); ?> </label>
                </th>
                <th>
                    <input type="text" name="name" id="name" class="regular-text" value="">
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <label for="address"><?php _e( 'Address', 'learn-academy' ); ?> </label>
                </th>
                <th>
                    <textarea class="regular-text" id="address" name="address"></textarea>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <label for="phone"><?php _e( 'Phone', 'learn-academy' ); ?> </label>
                </th>
                <th>
                    <input type="text" name="phone" id="phone" class="regular-text" value="">
                </th>
            </tr>
        </table>

		<?php
		wp_nonce_field( 'new-address' );
		submit_button( __('Add Address', 'learn-academy'), 'primary', 'submit_address', );
		?>
    </form>

</div>