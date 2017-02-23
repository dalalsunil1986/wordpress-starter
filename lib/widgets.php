<?php

/**
 * Register the widget area for the popup. Usually uses Genesis eNews Extended plugin.
 *
 * @since 1.0.0
 */
genesis_register_sidebar( array(
	'id' => 'popup',
	'name' => 'Popup Box',
	'description' => __( 'Put something in this box and trigger it with using .show-popup.', TEXT_DOMAIN )
));
