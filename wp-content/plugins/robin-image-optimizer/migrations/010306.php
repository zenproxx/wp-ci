<?php #comp-page builds: premium

/**
 * Updates for altering the table used to store statistics data.
 * Adds new columns and renames existing ones in order to add support for the new social buttons.
 */
class WIOUpdate010306 extends Wbcr_Factory412_Update {

	/**
	 * {inherit}
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  1.3.6
	 */
	public function install() {
		WRIO_Logger::info( sprintf( 'Start plugin migration < %s', '1.3.6' ) );

		if ( ! class_exists( 'RIO_Process_Queue' ) ) {
			WRIO_Logger::error( 'Class RIO_Process_Queue is not found!' );
		} else {
			$this->clear_webp_queue_items();
			$this->clear_webp_images();
		}

		WRIO_Logger::info( 'Plugin migration was successfull!' );
	}

	/**
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  1.3.6
	 * @see    RIO_Process_Queue::fix_table_collation
	 */
	public function fix_table_collation() {
		RIO_Process_Queue::fix_table_collation();
	}

	/**
	 * This removes webp queue items from in the database. For compatibility with the new
	 * version, it will be better to remove them, so that the user can start converting
	 * and have no compatibility problems.
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  1.3.6
	 */
	public function clear_webp_queue_items() {
		global $wpdb;

		$table_name = RIO_Process_Queue::table_name();
		$wpdb->query( "DELETE FROM {$table_name} WHERE item_type='webp'" );
	}

	/**
	 * We are removing Webp dir, since the migration will be very difficult. The previous
	 * version of the plugin has serious problems in the design of webp image convertation.
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  1.3.6
	 * @return bool
	 */
	public function clear_webp_images() {

		require_once( WRIO_PLUGIN_DIR . '/includes/functions.php' );

		$upload_dirs = wp_upload_dir();

		if ( isset( $upload_dirs['error'] ) && $upload_dirs['error'] !== false ) {
			WRIO_Logger::error( sprintf( 'Plugin migration error: %s', $upload_dirs['error'] ) );

			return false;
		}

		$content_path = $upload_dirs['basedir'];

		$dir_path = wp_normalize_path( trailingslashit( $content_path ) . 'wrio-webp-uploads' );

		if ( file_exists( $dir_path ) ) {
			$this->plugin->updatePopulateOption( 'cleared_webp_images', 1 );

			wrio_rmdir( $dir_path );

			return true;
		}

		return false;
	}
}
