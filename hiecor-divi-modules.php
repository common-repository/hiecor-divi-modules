<?php
/*
Plugin Name: HieCOR Divi Modules
Plugin URI:  https://wordpress.org/plugins/hiecor-divi-modules/
Description: Divi Modules by HieCOR
Version:     1.0.4
Author:      HieCOR
Author URI:  https://www.hiecor.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: hiecor-hiecor-divi-modules
Domain Path: /languages

HieCOR Divi Modules is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

HieCOR Divi Modules is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with HieCOR Divi Modules. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'hiecor_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function hiecor_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/HiecorDiviModules.php';
}
add_action( 'divi_extensions_init', 'hiecor_initialize_extension' );
endif;
