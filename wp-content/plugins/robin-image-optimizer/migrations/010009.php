<?php #comp-page builds: premium

/**
 * Updates for altering the table used to store statistics data.
 * Adds new columns and renames existing ones in order to add support for the new social buttons.
 */
class WIOUpdate010009 extends Wbcr_Factory412_Update {

	public function install() {
		WRIO_Logger::info( sprintf( 'Start plugin migration < %s', '1.1.5' ) );

		WRIO_Plugin::app()->updateOption( 'image_optimization_server', 'server_1' );

		WRIO_Logger::info( 'Plugin migration was successfull!' );
	}
}