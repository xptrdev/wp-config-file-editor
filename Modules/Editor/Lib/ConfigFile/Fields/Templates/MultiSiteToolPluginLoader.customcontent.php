<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

# No direct access
defined('ABSPATH') or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

?>
///////////////////////////////// WCFE Plugin MULTI Sites Tools Plugin Loader Code Start /////////////////////////////////////

// Load Plugin
include_once WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'wp-config-file-editor' . DIRECTORY_SEPARATOR . 'wp-config-file-editor.php';

// Load Multi Sites Tools Services
\WCFE\Services\Editor\MultiSiteTools\Service::run();

///////////////////////////////// WCFE Plugin MULTI Sites Tools Plugin Loader Code End /////////////////////////////////////
