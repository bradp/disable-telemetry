<?php
/**
 * Plugin Name: Disable Telemetry
 * Description: Disable all HTTP requests to api.wordpress.org. Check out <a href="https://github.com/norcross/airplane-mode">Airplane Mode</a> if you need more control.
 * Version:     1.0.3
 * Author:      Brad Parbs
 * Author URI:  https://bradparbs.com/
 * License:     GPLv2
 * Text Domain: disabletelemetry
 * Domain Path: /lang/
 *
 * @package disabletelemetry
 */

namespace DisableTelemetry;

defined( 'ABSPATH' ) || die();

add_action( 'pre_http_request', __NAMESPACE__ . '\\disable_telemetry_init', 1, 3 );

/**
 * Disable telemetery.
 *
 * @param bool   $short Whether to short circuit request.
 * @param array  $args  Request args.
 * @param string $url   Request URL.
 *
 * @return bool Whether to short circuit request.
 */
function disable_telemetry_init( $short, $args, $url ) {
	return ( false !== stripos( $url, 'api.wordpress.org' ) );
}
