<?php                      
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates;

# No direct access
defined( 'ABSPATH' ) or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

# XML Declaration as WORDPRESS RESPORITORY SVN HOOK COMPLAINS!!!!! AMAZING HOOOOOOK!!!!!!
echo '<?xml version="1.0" encoding="utf-8" ?>';
?>
<div id="wcfe-options-tab">
	<ul id="wcfe-options-tab-navigator"></ul>
	<div id="wcfe-options-tab-tabs"></div>
	<script type="text/javascript">
	  
		
		jQuery ( function()
		{
			
			var $ = jQuery; 
			
			// Tab
			
			var tab = $( '#wcfe-options-tab' );
			
			tab.tabs( 
			{ 
				active : $.cookie( 'wcfe-config-form-active-tab' ),
				activate : 
					function(event, ui) 
					{
						$.cookie( 'wcfe-config-form-active-tab',  tab.tabs( 'option', 'active' ) );
					}
			} ).show( );
			
		}	);
	
	</script>
</div>