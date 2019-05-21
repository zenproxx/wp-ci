<?php

/**
 * Activator for the Robin image optimizer
 *
 * @author        Webcraftic <wordpress.webraftic@gmail.com>
 * @copyright (c) 09.09.2017, Webcraftic
 * @see           Factory412_Activator
 * @version       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WIO_Activation extends Wbcr_Factory412_Activator {

	/**
	 * Runs activation actions.
	 *
	 * @since 1.0.0
	 * @throws \Exception
	 */
	public function activate() {
		WRIO_Logger::info( 'Parent plugin start installation!' );

		WRIO_Plugin::app()->updatePopulateOption( 'image_optimization_server', 'server_1' );
		WRIO_Plugin::app()->updatePopulateOption( 'backup_origin_images', 1 );
		WRIO_Plugin::app()->updatePopulateOption( 'save_exif_data', 1 );

		if ( function_exists( 'wrio_is_license_activate' ) && wrio_is_license_activate() ) {
			WRIO_Logger::info( 'Premium plugin start installation!' );
			require_once( WRIO_PLUGIN_DIR . '/libs/addons/robin-image-optimizer-premium.php' );
			wrio_premium_activate();
			WRIO_Logger::info( 'Premium plugin installation complete!' );
		}

		RIO_Process_Queue::try_create_plugin_tables();

		WRIO_Logger::info( 'Parent plugin installation complete!' );
	}

	/**
	 * Runs activation actions.
	 *
	 * @since 1.0.0
	 */
	public function deactivate() {
		WRIO_Logger::info( 'Parent plugin start deactivation!' );

		if ( class_exists( 'WRIO_Cron' ) ) {
			WRIO_Cron::stop();
		}

		if ( function_exists( 'wrio_is_license_activate' ) && wrio_is_license_activate() ) {
			WRIO_Logger::info( 'Premium plugin start deactivation!' );
			require_once( WRIO_PLUGIN_DIR . '/libs/addons/robin-image-optimizer-premium.php' );
			wrio_premium_deactivate();
			WRIO_Logger::info( 'Premium plugin deactivation complete!' );
		}

		WRIO_Logger::info( 'Parent plugin deactivation complete!' );
	}
}
