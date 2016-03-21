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
				
					generateHelpBoxMap( WCFESysFiltersDashboardL10N.title_helpDialog, 'field-tip' );
					
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
					
					var tipElems = row.find( 'label, ' + '.' + fieldClass );
					if ( tipElems.length ) 
					{
						
						var labelText = tipElems.eq( 0 ).text();
						var tipText = tipElems.eq( 1 ).text();
						
						if ( tipText )
						{
							helpBoxList.append( '<tr><td class="help-label-text"><span>' + labelText + '</span></td><td class="help-text"><span>' + tipText + '</span></td></tr>' );	
						}
						
					}
				}
			
			);
			
			tb_show( dialogTitle, '#TB_inline?width=400px&amp;height=500px&amp;inlineId=' + helpBoxId )
			
			return false;
			
		};
	
		/**
		* put your comment there...
		* 
		*/
		var getActiveTabIndex = function()
		{
			var index = $.cookie( 'wcfe-system-parameters-active-tab' );
			
			if ( ! index )
			{
				index = 1;
			}
			
			return index - 1;
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
						setActiveTabIndex();
						
						// Store actiove Tab object
						activeTab = ui.newPanel;
						
					}
			} )
			
			// Activate tab --> Make sure to receive activate event when loaded
			.tabs( 'option', 'active', getActiveTabIndex() )
			
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
			WCFESysFiltersFormKsesModule.load();
		}
		
		/**
		* put your comment there...
		* 
		*/
		var setActiveTabIndex = function()
		{
			
			$.cookie( 'wcfe-system-parameters-active-tab',  tab.tabs( 'option', 'active' ) + 1 );
			
			return;
		};
		
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

			//  Post Tags and Comment Tags Checkbox lists
			$( 	'#wcfe-sysfilters-misc-uploadAllowedMimes-value-row .wcfe-checkbox-list-container' ).WCFECheckboxList
			( { 
				
				addMaxLevels : 1,
				
				levels : [
					{ addText : WCFESysFiltersDashboardL10N.btn_addType },
					{ addText : WCFESysFiltersDashboardL10N.btn_associateExtension }
				],
				
				addNewMode : 'inline'
				
			} );
			
		};
		
	};
	
	
	/**
	* put your comment there...
	* 
	* @type T_JS_FUNCTION
	*/
	var WCFESysFiltersFormKsesModule = new function()
	{
		
		/**
		* put your comment there...
		* 
		*/
		this.load = function()
		{
			
			//  Post Tags and Comment Tags Checkbox lists
			$( 	'#wcfe-sysfilters-kses-postTags-value-row .wcfe-checkbox-list-container,' +
					'#wcfe-sysfilters-kses-commentTags-value-row .wcfe-checkbox-list-container' ).WCFECheckboxList
			( { 
				
				addMaxLevels : 1,
				
				levels : [
					{ addText : WCFESysFiltersDashboardL10N.btn_addTag },
					{ addText : WCFESysFiltersDashboardL10N.btn_addAttribute }
				],
				
				addNewMode : 'inline'
				
			} );
			
			//  Post Tags and Comment Tags Checkbox lists
			$( 	'#wcfe-sysfilters-kses-entities-value-row .wcfe-checkbox-list-container' ).WCFECheckboxList( { } );
			
		};
		
	}
	
} ) ( jQuery );