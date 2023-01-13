<?php

namespace NewfoldLabs\WP\Module\Maestro;

use \WP_CLI\Utils;
use NewfoldLabs\WP\Module\Maestro\Auth\WebPro;

/**
 * Implements the webPro association as a WP CLI command
 */
class WebProCliCommand {

	/**
	 * Commands for a WebPro, currently contains the functionality to associate a webPro
	 *
	 * ## OPTIONS
	 *
	 * <key>
	 * : The secret key generated for the site by the maestro panel
	 *
	 * ## EXAMPLES
	 *
	 *    wp webPro associate saksjak-asjak-askajsk
	 *
	 * @when after_wp_load
	 *
	 * @param array $args - passthrough $args from class invocation.
	 * @param array $assoc_args - passthrough $assoc_args from class invocation.
	 */
	public function associate( $args, $assoc_args ) {
		list( $secretKey ) = $args;
		$webPro            = new WebPro( $secretKey );

		$success = $webPro->connect();

		if ( ! $success ) {
			\WP_CLI::log( \WP_CLI::colorize( '%rFailed to associate webPro %n' ) );
			\WP_CLI::halt( 400 );
		}

		\WP_CLI::log( \WP_CLI::colorize( '%gAssociated webPro %n' ) );
	}
}

\WP_CLI::add_command( 'webPro', 'WebProCliCommand' );
