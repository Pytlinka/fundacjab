<?php
/**
 * Plugin Name: BlockArt Blocks
 * Description: Craft your website beautifully using Gutenberg blocks like section/column, heading, button, etc. Unlimited possibilities of design with features like colors, backgrounds, typography, layouts, spacing, etc.
 * Author: WPBlockArt
 * Author URI: https://wpblockart.com/
 * Version: 2.0.9.1
 * Requires at least: 5.5
 * Requires PHP: 7.0
 * Text Domain: blockart
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package BlockArt
 */

use BlockArt\BlockArt;

defined( 'ABSPATH' ) || exit;

! defined( 'BLOCKART_VERSION' ) && define( 'BLOCKART_VERSION', '2.0.9.1' );
! defined( 'BLOCKART_PLUGIN_FILE' ) && define( 'BLOCKART_PLUGIN_FILE', __FILE__ );
! defined( 'BLOCKART_PLUGIN_DIR' ) && define( 'BLOCKART_PLUGIN_DIR', dirname( BLOCKART_PLUGIN_FILE ) );
! defined( 'BLOCKART_PLUGIN_DIR_URL' ) && define( 'BLOCKART_PLUGIN_DIR_URL', plugin_dir_url( BLOCKART_PLUGIN_FILE ) );
! defined( 'BLOCKART_DIST_DIR' ) && define( 'BLOCKART_DIST_DIR', BLOCKART_PLUGIN_DIR . '/dist' );
! defined( 'BLOCKART_ASSETS_DIR_URL' ) && define( 'BLOCKART_ASSETS_DIR_URL', BLOCKART_PLUGIN_DIR_URL . 'assets' );
! defined( 'BLOCKART_DIST_DIR_URL' ) && define( 'BLOCKART_DIST_DIR_URL', BLOCKART_PLUGIN_DIR_URL . 'dist' );
! defined( 'BLOCKART_LANGUAGES' ) && define( 'BLOCKART_LANGUAGES', BLOCKART_PLUGIN_DIR . '/languages' );
! defined( 'BLOCKART_UPLOAD_DIR' ) && define( 'BLOCKART_UPLOAD_DIR', wp_upload_dir()['basedir'] . '/blockart' );
! defined( 'BLOCKART_UPLOAD_DIR_URL' ) && define( 'BLOCKART_UPLOAD_DIR_URL', wp_upload_dir()['baseurl'] . '/blockart' );

// Check whether assets are built or not.
if (
	! file_exists( __DIR__ . '/dist/blocks.js' ) ||
	! file_exists( __DIR__ . '/dist/blocks.css' ) ||
	! file_exists( __DIR__ . '/dist/style-blocks.css' ) ||
	! file_exists( __DIR__ . '/dist/blocks.asset.php' )
) {
	add_action(
		'admin_notices',
		function() {
			printf(
				'<div class="notice notice-error is-dismissible"><p><strong>%s </strong>%s</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">%s</span></button></div>',
				esc_html( 'BlockArt:' ),
				wp_kses_post( __( 'Assets are not built. Run <code>npm install && npm run build</code> from the wp-content/plugins/blockart directory.', 'blockart' ) ),
				esc_html__( 'Dismiss this notice.', 'blockart' )
			);
		}
	);

	add_action(
		'admin_init',
		function() {
			deactivate_plugins( plugin_basename( BLOCKART_PLUGIN_FILE ) );

			// phpcs:disable WordPress.Security.NonceVerification.Recommended
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			// phpcs:enable WordPress.Security.NonceVerification.Recommended
		}
	);

	return;
}

// Load the autoloader.
require_once __DIR__ . '/vendor/autoload.php';

if ( ! function_exists( 'blockart' ) ) {
	/**
	 * Returns the main instance of BlockArt to prevent the need to use globals.
	 *
	 * @return BlockArt|null
	 */
	function blockart() {
		return BlockArt::init();
	}
}

blockart();
