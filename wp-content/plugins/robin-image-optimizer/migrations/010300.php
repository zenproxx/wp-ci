<?php #comp-page builds: premium

/**
 * Updates for altering the table used to store statistics data.
 * Adds new columns and renames existing ones in order to add support for the new social buttons.
 */
class WIOUpdate010300 extends Wbcr_Factory412_Update {

	/**
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  1.3.6
	 * @throws \Exception
	 */
	public function install() {

		WRIO_Logger::info( sprintf( 'Start plugin migration < %s', '1.3.0' ) );

		$this->try_create_table();
		$this->clear_log();

		WRIO_Plugin::app()->deleteOption( 'cron_running' );

		if ( class_exists( 'WRIO_Cron' ) ) {
			WRIO_Cron::stop();
		}

		WRIO_Logger::info( 'Plugin migration was successfull!' );
	}

	/**
	 * Attempting to create a new schema in the database. Since version 1.3.0,
	 * our plugin uses a new database structure.
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  1.3.6
	 * @throws \Exception
	 */
	public function try_create_table() {

		if ( ! class_exists( 'RIO_Process_Queue' ) ) {
			WRIO_Logger::error( 'Plugin migration: Class RIO_Process_Queue is not found!' );

			return;
		}

		RIO_Process_Queue::try_create_plugin_tables();
	}

	/**
	 * Since version 1.3.0, we use a different path and a different algorithm for
	 * accumulating log files. Therefore, if there is an old log file, you need to clear it.
	 *
	 * @author Alexander Kovalev <alex.kovalevv@gmail.com>
	 * @since  1.3.6
	 */
	public function clear_log() {
		$wp_upload_dir = wp_upload_dir();

		if ( isset( $wp_upload_dir['error'] ) && $wp_upload_dir['error'] !== false ) {
			WRIO_Logger::error( sprintf( 'Plugin migration error: %s', $wp_upload_dir['error'] ) );

			return;
		}

		$file_path = wp_normalize_path( trailingslashit( $wp_upload_dir['basedir'] ) . 'wio.log' );

		if ( file_exists( $file_path ) ) {
			if ( @unlink( $file_path ) ) {
				WRIO_Logger::info( 'Plugin migration: The old error log was successfully deleted!' );
			}
		}
	}
}
