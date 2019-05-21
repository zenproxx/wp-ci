<?php
/**
 * The file contains a base class for update items of plugins.
 *
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright (c) 2018, Webcraftic Ltd
 *
 * @package factory-core
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Plugin Activator
 *
 * @since 1.0.0
 */
abstract class Wbcr_Factory412_Update {
	
	/**
	 * Current plugin
	 * @var Wbcr_Factory412_Plugin
	 */
	var $plugin;
	
	public function __construct( Wbcr_Factory412_Plugin $plugin ) {
		$this->plugin = $plugin;
	}
	
	abstract function install();
	
	//abstract function rollback();
}
