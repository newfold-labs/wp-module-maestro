<?php

namespace NewfoldLabs\WP\Module\Maestro;

use NewfoldLabs\WP\ModuleLoader\Container;
use NewfoldLabs\WP\Module\Maestro\RestApi\RestApi;

/**
 * Maestro's container to initialize the functionality
 */
class Maestro {

	/**
	 * Dependency injection container.
	 *
	 * @var Container
	 */
	protected $container;

	/**
	 * Constructor.
	 *
	 * @param Container $container The module loader container
	 */
	public function __construct( Container $container ) {

		$this->container = $container;

		if ( is_readable( MODULE_MAESTRO_DIR . '/vendor/autoload.php' ) ) {
			require_once MODULE_MAESTRO_DIR . '/vendor/autoload.php';
		}

		new RestApi();

		// Require SSO
		require MODULE_MAESTRO_DIR . '/includes/sso.php';

		// Require the WP_CLI command if we have that function available
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			require_once MODULE_MAESTRO_DIR . '/includes/WebProCliCommand.php';
		}
	}

}
