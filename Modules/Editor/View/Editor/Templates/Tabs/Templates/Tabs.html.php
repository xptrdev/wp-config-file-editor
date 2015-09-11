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
		
			// Help box
			$( '.help-box-link' ).click(
			
				function()
				{
					
					var helpHref = this.href;
					
					var tabId = helpHref.substring( helpHref.indexOf( '#' ) + 1 );
					
					var helpBoxId = tabId + '-Help-Box';
					var helpBoxList = $( '#' + helpBoxId + ' table' );
					
					helpBoxList.empty();
					
					// Aggregate fields help tips and field titles from tab
					var rows = $( '#' + tabId ).find( '.field-row, .checkbox-row' ).each(
					
						function()
						{
						  var row = $( this );
						  
							var labelText = row.find( 'label' ).text();
							var tipText = row.find( '.field-tip' ).text();
							
							// Create help list
							
							helpBoxList.append( '<tr><td class="help-label-text"><span>' + labelText + '</span></td><td class="help-text"><span>' + tipText + '</span></td></tr>' );
						}
					
					);
					
					tb_show( 'WCFE Help', '#TB_inline?width=400px&amp;height=500px&amp;inlineId=' + helpBoxId )
					
					return false;
					
				}
			)
			
		}	);
	
	</script>
</div>