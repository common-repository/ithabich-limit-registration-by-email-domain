<?php
/**
 * LimitRegistrationByMailDomain
 *
 * @package           PluginPackage
 * @author            IT-Habich - Frederic Roggon
 * @copyright         2023 IT-Habich - Frederic Roggon
 * @license           GPL-2.0-or-later
 * 
 * @wordpress-plugin
 * Plugin Name: LimitRegistrationByMailDomain
 * Plugin URI: https://it-habich.de/wp-plugin-ithabich-limit-registration-by-email-domain
 * Description: Limit Registration By Mail Domain to ensure only certain users can register at your WordPress site.
 * Version: 1.0.0
 * Author: IT-Habich - Frederic Roggon
 * Author URI: https://it-habich.de
 * Text Domain: ithabich-limit-registration-by-email-domain
 * Domain Path: /languages
 * Requires at least: 6.1.1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

/*
Copyright (C) 2023 IT-Habich - Frederic Roggon

LimitRegistrationByMailDomain is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

LimitRegistrationByMailDomain is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with LimitRegistrationByMailDomain. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if(!defined('ABSPATH')) exit;

require "autoload.php";

use ITHabich\LimitRegistrationByMailDomain\Core\Container;

$limitRegistrationByMailDomainContainer = new Container();
$limitRegistrationByMailDomainInitializePlugin = $limitRegistrationByMailDomainContainer->get('initializePlugin');
$limitRegistrationByMailDomainInitializePlugin->register(__FILE__);

function ithlrbmd_load_textdomain() {
	load_plugin_textdomain( 'ithabich-limit-registration-by-email-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'ithlrbmd_load_textdomain' );