<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * The file contains the class to register a plugin in the Factory.
 *
 * @author        Alex Kovalev <alex.kovalevv@gmail.com>
 * @since         1.0.0
 * @package       factory-core
 * @copyright (c) 2018 Webcraftic Ltd
 *
 */
abstract class Wbcr_Factory412_Plugin extends Wbcr_Factory412_Base {

	/**
	 * Instance class Wbcr_Factory412_Request, required manages http requests
	 *
	 * @var Wbcr_Factory412_Request
	 */
	public $request;

	/**
	 * @var \WBCR\Factory_412\Premium\Provider
	 */
	public $premium;

	/**
	 * The Bootstrap Manager class
	 *
	 * @var Wbcr_FactoryBootstrap412_Manager
	 */
	public $bootstrap;

	/**
	 * The Bootstrap Manager class
	 *
	 * @var Wbcr_FactoryForms412_Manager
	 */
	public $forms;

	/**
	 * A class name of an activator to activate the plugin.
	 *
	 * @var string
	 */
	protected $activator_class = [];

	/**
	 * Framework modules loaded
	 *
	 * @var array
	 */
	private $loaded_factory_modules = [];

	/**
	 * Plugin components loaded
	 *
	 * @var array[] Wbcr_Factory412_Plugin
	 */
	private $plugin_addons;

	/**
	 * Creates an instance of Factory plugin.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $data          A set of plugin data.
	 *
	 * @param string $plugin_path   A full path to the main plugin file.
	 *
	 * @throws Exception
	 */
	public function __construct( $plugin_path, $data ) {

		parent::__construct( $plugin_path, $data );

		$this->request = new Wbcr_Factory412_Request();
		//$this->route = new Wbcr_Factory412_Route();

		// INIT PLUGIN FRAMEWORK MODULES
		// Framework modules should always be loaded first,
		// since all other functions depend on them.
		$this->init_framework_modules();

		// INIT PLUGIN MIGRATIONS
		$this->init_plugin_migrations();

		// INIT PLUGIN NOTICES
		$this->init_plugin_notices();

		// INIT PLUGIN PREMIUM FEATURES
		// License manager should be installed earlier
		// so that other modules can access it.
		$this->init_plugin_premium_features();

		// INIT PLUGIN UPDATES
		$this->init_plugin_updates();

		// init actions
		$this->register_plugin_hooks();
	}

	/* Services region
	/* -------------------------------------------------------------*/

	/**
	 * @param Wbcr_FactoryBootstrap412_Manager $bootstrap
	 */
	public function setBootstap( Wbcr_FactoryBootstrap412_Manager $bootstrap ) {
		$this->bootstrap = $bootstrap;
	}

	/**
	 * @param Wbcr_FactoryForms412_Manager $forms
	 */
	public function setForms( Wbcr_FactoryForms412_Manager $forms ) {
		$this->forms = $forms;
	}

	/**
	 * Устанавливает текстовый домен для плагина
	 */
	public function set_text_domain( $domain ) {
		if ( empty( $this->plugin_text_domain ) ) {
			return;
		}

		$locale = apply_filters( 'plugin_locale', is_admin() ? get_user_locale() : get_locale(), $this->plugin_text_domain );

		$mofile = $this->plugin_text_domain . '-' . $locale . '.mo';

		if ( ! load_textdomain( $this->plugin_text_domain, $this->paths->absolute . '/languages/' . $mofile ) ) {
			load_muplugin_textdomain( $this->plugin_text_domain );
		}
	}

	/**
	 * @param $class_name
	 * @param $file_path
	 *
	 * @throws Exception
	 */
	public function registerPage( $class_name, $file_path ) {
		// todo: https://webcraftic.atlassian.net/projects/PCS/issues/PCS-88
		//		if ( $this->isNetworkActive() && ! is_network_admin() ) {
		//			return;
		//		}

		if ( ! file_exists( $file_path ) ) {
			throw new Exception( 'The page file was not found by the path {' . $file_path . '} you set.' );
		}

		require_once( $file_path );

		if ( ! class_exists( $class_name ) ) {
			throw new Exception( 'A class with this name {' . $class_name . '} does not exist.' );
		}

		if ( ! class_exists( 'Wbcr_FactoryPages412' ) ) {
			throw new Exception( 'The factory_pages_412 module is not included.' );
		}

		Wbcr_FactoryPages412::register( $this, $class_name );
	}

	/**
	 * @param string $class_name
	 * @param string $path
	 *
	 * @throws Exception
	 */
	public function registerType( $class_name, $file_path ) {

		if ( ! file_exists( $file_path ) ) {
			throw new Exception( 'The page file was not found by the path {' . $file_path . '} you set.' );
		}

		require_once( $file_path );

		if ( ! class_exists( $class_name ) ) {
			throw new Exception( 'A class with this name {' . $class_name . '} does not exist.' );
		}

		if ( ! class_exists( 'Wbcr_FactoryTypes000' ) ) {
			throw new Exception( 'The factory_types_000 module is not included.' );
		}

		Wbcr_FactoryTypes000::register( $class_name, $this );
	}

	/**
	 * Registers a class to activate the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @param string $className   class name of the plugin activator.
	 *
	 * @return void
	 */
	public function registerActivation( $className ) {
		$this->activator_class[] = $className;
	}

	/* end services region
	/* -------------------------------------------------------------*/

	/**
	 * It's invoked on plugin activation. Don't excite it directly.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function activation_hook() {

		/**
		 * @since 4.1.1 - change  hook name
		 */
		if ( apply_filters( "wbcr/factory_412/cancel_plugin_activation_{$this->plugin_name}", false ) ) {
			return;
		}

		/**
		 * @since 4.1.1 - deprecated
		 */
		wbcr_factory_412_do_action_deprecated( 'wbcr_factory_412_plugin_activation', [
			$this
		], '4.1.1', "wbcr/factory/plugin_activation" );

		/**
		 * @since 4.1.1 - added
		 */
		do_action( 'wbcr/factory/plugin_activation', $this->plugin_name );

		/**
		 * @since 4.1.1 - deprecated
		 */
		wbcr_factory_412_do_action_deprecated( 'wbcr_factory_412_plugin_activation_' . $this->plugin_name, [
			$this
		], '4.1.1', "wbcr/factory/plugin_{$this->plugin_name}_activation" );

		/**
		 * @since 4.1.1 - added
		 */
		do_action( "wbcr/factory/plugin_{$this->plugin_name}_activation" );

		if ( ! empty( $this->activator_class ) ) {
			foreach ( (array) $this->activator_class as $activator_class ) {
				$activator = new $activator_class( $this );
				$activator->activate();
			}
		}
	}

	/**
	 * Возвращает ссылку на внутреннюю страницу плагина
	 *
	 * @param string $page_id
	 *
	 * @sicne: 4.0.8
	 * @return string|void
	 * @throws Exception
	 */
	public function getPluginPageUrl( $page_id, $args = [] ) {
		if ( ! class_exists( 'Wbcr_FactoryPages412' ) ) {
			throw new Exception( 'The factory_pages_412 module is not included.' );
		}

		if ( ! is_admin() ) {
			_doing_it_wrong( __METHOD__, __( 'You cannot use this feature on the frontend.' ), '4.0.8' );

			return null;
		}

		return Wbcr_FactoryPages412::getPageUrl( $this, $page_id, $args );
	}


	/**
	 * Загружает аддоны для плагина, как часть проекта, а не как отдельный плагин
	 *
	 * @param array $addons         - массив со списком загружаемых аддонов.
	 *                              array(
	 *                              'hide_login_page' => -  ключ, идентификатора массива с информацией об аддоне
	 *                              array(
	 *                              'WHLP_Plugin', - имя основного класса аддона
	 *                              WCL_PLUGIN_DIR . '/components/hide-login-page/hide-login-page.php' - пусть к
	 *                              основному файлу аддона
	 *                              ));
	 */
	protected function loadAddons( $addons ) {
		if ( empty( $addons ) ) {
			return;
		}

		foreach ( $addons as $addon_name => $addon_path ) {
			if ( ! isset( $this->plugin_addons[ $addon_name ] ) ) {

				// При подключении аддона, мы объявляем константу, что такой аддон уже загружен
				// $addon_name индентификатор аддона в вверхнем регистре
				$const_name = strtoupper( 'LOADING_' . str_replace( '-', '_', $addon_name ) . '_AS_ADDON' );

				if ( ! defined( $const_name ) ) {
					define( $const_name, true );
				}

				require_once( $addon_path[1] );

				// Передаем аддону информацию о родительском плагине
				$plugin_data = $this->getPluginInfo();

				// Устанавливаем метку для аддона, которая указывает на то, что это аддон
				$plugin_data['as_addon'] = true;

				// Передаем класс родителя в аддон, для того,
				// чтобы аддон использовал экземпляр класса родителя, а не создавал свой собственный.
				$plugin_data['plugin_parent'] = $this;

				// Создаем экземпляр класса аддона и записываем его в список загруженных аддонов
				if ( class_exists( $addon_path[0] ) ) {
					$this->plugin_addons[ $addon_name ] = new $addon_path[0]( $this->get_paths()->main_file, $plugin_data );
				}
			}
		}
	}

	/**
	 * Загружает специальные модули для расширения Factory фреймворка.
	 * Разработчик плагина сам выбирает, какие модули ему нужны для
	 * создания плагина.
	 *
	 * Модули фреймворка хранятся в libs/factory/framework
	 *
	 * @return void
	 * @throws Exception
	 */
	private function init_framework_modules() {

		if ( ! empty( $this->load_factory_modules ) ) {
			foreach ( (array) $this->load_factory_modules as $module ) {
				$scope = isset( $module[2] ) ? $module[2] : 'all';

				if ( $scope == 'all' || ( is_admin() && $scope == 'admin' ) || ( ! is_admin() && $scope == 'public' ) ) {

					if ( ! file_exists( $this->get_paths()->absolute . '/' . $module[0] . '/boot.php' ) ) {
						throw new Exception( 'Module ' . $module[1] . ' is not included.' );
					}

					$module_boot_file = $this->get_paths()->absolute . '/' . $module[0] . '/boot.php';
					require_once $module_boot_file;

					$this->loaded_factory_modules[ $module[1] ] = $module_boot_file;

					do_action( 'wbcr_' . $module[1] . '_plugin_created', $this );
				}
			}
		}

		/**
		 * @since 4.1.1 - deprecated
		 */
		wbcr_factory_412_do_action_deprecated( 'wbcr_factory_412_core_modules_loaded-' . $this->plugin_name, [], '4.1.1', "wbcr/factory/plugin_activation" );

		/**
		 * @since 4.1.1 - add
		 */
		do_action( 'wbcr/factory_412/modules_loaded-' . $this->plugin_name );
	}


	/**
	 * Setups actions related with the Factory Plugin.
	 *
	 * @since 1.0.0
	 */
	private function register_plugin_hooks() {

		add_action( 'plugins_loaded', [ $this, 'set_text_domain' ] );

		if ( is_admin() ) {
			add_filter( 'wbcr_factory_412_core_admin_allow_multisite', '__return_true' );

			register_activation_hook( $this->get_paths()->main_file, [ $this, 'activation_hook' ] );
			register_deactivation_hook( $this->get_paths()->main_file, [ $this, 'deactivation_hook' ] );
		}
	}

	/**
	 * It's invoked on plugin deactionvation. Don't excite it directly.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function deactivation_hook() {

		/**
		 * @since 4.1.1 - change  hook name
		 */
		if ( apply_filters( "wbcr/factory_412/cancel_plugin_deactivation_{$this->plugin_name}", false ) ) {
			return;
		}

		/**
		 * @since 4.1.1 - deprecated
		 */
		wbcr_factory_412_do_action_deprecated( 'wbcr_factory_412_plugin_deactivation', [
			$this
		], '4.1.1', "wbcr/factory/plugin_deactivation" );

		/**
		 * @since 4.1.1 - added
		 */
		do_action( 'wbcr/factory/plugin_deactivation', $this->plugin_name );

		/**
		 * @since 4.1.1 - deprecated
		 */
		wbcr_factory_412_do_action_deprecated( 'wbcr_factory_412_plugin_deactivation_' . $this->plugin_name, [
			$this
		], '4.1.1', "wbcr/factory/plugin_{$this->plugin_name}_deactivation" );

		/**
		 * @since 4.1.1 - added
		 */
		do_action( "wbcr/factory/plugin_{$this->plugin_name}_deactivation" );

		if ( ! empty( $this->activator_class ) ) {
			foreach ( (array) $this->activator_class as $activator_class ) {
				$activator = new $activator_class( $this );
				$activator->deactivate();
			}
		}
	}

	/**
	 * Инициализируем миграции плагина
	 *
	 * @since 4.1.1
	 * @return void
	 * @throws Exception
	 */
	protected function init_plugin_migrations() {
		new WBCR\Factory_412\Migrations( $this );
	}

	/**
	 * Инициализируем уведомления плагина
	 *
	 * @since 4.1.1
	 * @return void
	 */
	protected function init_plugin_notices() {
		new Wbcr\Factory_412\Notices( $this );
	}

	/**
	 * Создает нового рабочего для проверки обновлений и апгрейда текущего плагина.         *
	 *
	 * @since 4.1.1
	 *
	 * @param array $data
	 *
	 * @return void
	 * @throws Exception
	 */
	protected function init_plugin_updates() {
		if ( $this->has_updates ) {
			new WBCR\Factory_412\Updates\Upgrader( $this );
		}
	}

	/**
	 * Начинает инициализацию лицензирования текущего плагина. Доступ к менеджеру лицензий можно
	 * получить через свойство license_manager.
	 *
	 * Дополнительно создает рабочего, чтобы совершить апгрейд до премиум версии
	 * и запустить проверку обновлений для этого модуля.
	 *
	 * @since 4.1.1
	 * @throws Exception
	 */
	protected function init_plugin_premium_features() {
		if ( ! $this->has_premium || ! $this->license_settings ) {
			$this->premium = null;

			return;
		}

		// Создаем экземляр премиум менеджера, мы сможем к нему обращаться глобально.
		$this->premium = WBCR\Factory_412\Premium\Manager::instance( $this, $this->license_settings );

		// Подключаем премиум апгрейдер
		if ( isset( $this->license_settings['has_updates'] ) && $this->license_settings['has_updates'] ) {
			new WBCR\Factory_412\Updates\Premium_Upgrader( $this );
		}
	}

	/**
	 * @since 4.1.1
	 *
	 * @param array | string $dependents
	 *
	 * @throws Exception
	 */
	/*protected function modules_dependent( $dependents ) {
		$modules = array();
		
		if ( is_array( $dependents ) ) {
			foreach ( $dependents as $module_name ) {
				if ( ! isset( $this->loaded_factory_modules[ $module_name ] ) ) {
					$modules[] = $module_name;
				}
			}
		} else if ( ! isset( $this->loaded_factory_modules[ $dependents ] ) ) {
			$modules[] = $dependents;
		}
		
		if ( ! empty( $modules ) ) {
			throw new Exception( "Error in factory framework. Your plugin configuration requires include of additional framework modules: " . implode( ',', $modules ) . "." );
		}
	}*/

	// ----------------------------------------------------------------------
	// Public methods
	// ----------------------------------------------------------------------

	public function newScriptList() {
		return new Wbcr_Factory412_ScriptList( $this );
	}

	public function newStyleList() {
		return new Wbcr_Factory412_StyleList( $this );
	}
}

