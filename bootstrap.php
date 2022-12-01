<?php

use NewfoldLabs\WP\Module\Maestro\Maestro;
use NewfoldLabs\WP\ModuleLoader\Container;
use function NewfoldLabs\WP\ModuleLoader\register;

if ( function_exists( 'add_action' ) ) {

	add_action(
		'plugins_loaded',
		function () {

			register(
				[
					'name'     => 'maestro',
					'label'    => __( 'Maestro', 'newfold-maestro-module' ),
					'callback' => function ( Container $container ) {
						new Maestro( $container );
					},
					'isActive' => true,
					'isHidden' => true,
				]
			);

		}
	);

}
