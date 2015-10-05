/**
* 
*/


/**
* 
*/
( function( $ )
{
	
	var WCFESysFiltersForm = new function()
	{
		
		/***
		* put your comment there...
		* 
		*/
		var tab, activeTab;
		
		
		/**
		* put your comment there...
		* 
		* @param event
		*/
		var doMainMenu = function( event )
		{
			
			switch ( event.currentTarget.id )
			{
				
				case 'wcfe-dmm-tab-help':
				
					generateHelpBoxMap( 'WCFE Help', 'field-tip' );
					
				break;
				
				case 'wcfe-dmm-tab-control-options':
				
					var activeTabId = activeTab.prop( 'id' );
					
					var activeTabControlPanelId = activeTabId + '-advanced-panel';
					
					$( '#' + activeTabControlPanelId ).toggle( { duration: 500 } );
					
				break;
				
			}
		};
		
		
		/**
		* put your comment there...
		* 
		* @returns {Boolean}
		*/
		var generateHelpBoxMap = function(dialogTitle, fieldClass)
		{
			
			var tabId = activeTab.prop( 'id' );
			
			var helpBoxId = tabId + '-Help-Box';
			var helpBoxList = $( '#' + helpBoxId + ' table' );
			
			helpBoxList.empty();
			
			// Aggregate fields help tips and field titles from tab
			var rows = $( '#' + tabId ).find( '.wcfe-builtin-fields-container .field-row, .wcfe-builtin-fields-container .checkbox-row' ).each(
			
				function()
				{
					var row = $( this );
					
					var labelText = row.find( 'label' ).text();
					var tipText = row.find( '.' + fieldClass ).text();
					
					// Create help list
					
					helpBoxList.append( '<tr><td class="help-label-text"><span>' + labelText + '</span></td><td class="help-text"><span>' + tipText + '</span></td></tr>' );
				}
			
			);
			
			tb_show( dialogTitle, '#TB_inline?width=400px&amp;height=500px&amp;inlineId=' + helpBoxId )
			
			return false;
			
		};
	
		/**
		* 
		*/
		var initialize = function()
		{
			
			// Tabs
			tab = $( '#wcfe-options-tab' );
			
			tab.tabs( 
			{ 
				activate : 
				
					function(event, ui) 
					{
						// Save active tab index into cookies
						//setActiveTabIndex();
						
						// Store actiove Tab object
						activeTab = ui.newPanel;
						
					}
			} )
			
			// Activate tab --> Make sure to receive activate event when loaded
			.tabs( 'option', 'active', 0 )
			
			// Show Tab
			.show( );
			
			// Activate event won't fired if the ctive index is 0 as its already
			// the default
			if ( ! activeTab )
			{
				activeTab = $( '#MiscOptionsTab' );
			}
			
			// Menu
			$( '#wcfe-config-form-main-menu' ).menu( 
				{ 
					position: { my: "left top", at: "left+25 bottom" },
					select : doMainMenu
				}
			).show();
			
			// Modules
			WCFESysFiltersFormMiscModule.load();
		}
		
		// initialize component when doc ready
		$ ( initialize );
	
	};
	
	
	/**
	* put your comment there...
	* 
	* @type T_JS_FUNCTION
	*/
	var WCFESysFiltersFormMiscModule = new function()
	{
		
		/**
		* put your comment there...
		* 
		*/
		this.load = function()
		{
			// Upload Mime types list
			
			$( '#wcfe-sysfilters-misc-uploadAllowedMimes-value-row .wcfe-checkbox-list-container' ).WCFECheckboxList
			( { 
				allowEdit : true,
				getEditText : function( value ) 
				{
					return value.split( ',' )[ 0 ];
				},
				newPlaceholder : 'e.g jpg|jpeg , image/jpg'
			} );
	
		};
		
	};
	
} ) ( jQuery );