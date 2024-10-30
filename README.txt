# Limit Registration by Mail Domain

* Plugin Name: LimitRegistrationByMailDomain
* Plugin URI: https://it-habich.de/wp-plugin-limitregistrationbymaildomain
* Author: IT-Habich - Frederic Roggon
* Author URI: https://it-habich.de
* Contributors: ithabich
* Tags: restrict registration, limit registration, user registration, mail restriction, registration form, security plugin 
* Tested up to: 6.5
* Requires at least: 6.1
* Requires PHP: 8.0
* Stable tag: 1.0.0
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html


This plugin allows you to limit the registration on your WordPress site to only certain eMail domains. This can be useful to only allow registration for users of your company or organization.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the `Settings -> Limit Registration limit by mail domain` screen to configure the plugin.

## Frequently Asked Questions

### How does the plugin work?

The plugin adds a check during the registration process to see if the eMail address provided by the user has an allowed domain. If the domain is not on the list of allowed domains, registration will be denied.

### Can I specify multiple allowed domains?

Yes, you can specify multiple allowed domains by separating them with commas.

### What happens if the list of allowed domains is empty?

If the list of allowed domains is empty, registration will be allowed for any eMail address.

### Can I change the config of the plugin?

Yes, you can change the configuration of the plugin via the WordPress backend, but only as an administrator.

## Plugin limits

* This plugin is not compatible with Multi-Site setups. It is only intended to be used with standard WordPress single-site installations.
* This plugin is only effective on core WordPress registration, it doesn’t affect on custom registration forms or other plugins registration forms. Other plugins, such as 2FA-plugins, BuddyPress, or WooCommerce, may alter the registration process in a way that may affect the settings and effectiveness of this plugin.

## Screenshots

1. The registration form of WordPress
2. The settings page of the plugin without a allowed mail domain
3. The settings page of the plugin with one allowed mail domain
4. The settings page of the plugin with three allowed mail domains

## Changelog

### 1.0.0

* First release

## Upgrade Notice

### 1.0.0

* First release of the plugin.

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always back up your website before installing any new plugins.

## LICENSE

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