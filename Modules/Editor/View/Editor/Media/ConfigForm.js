/**
* 
*/

/**
* 
*/
(function( $ ) 
{

	
	/**
	* 
	*/
	WCFEEditorForm = new function() 
	{
		
		/**
		* put your comment there...
		* 
		* @type WCFEEditorServices
		*/
		var editorSrvs = new WCFEEditorServices( 'configFileFields' );
		
		var autoPath = new WCFEAutoPath( 'input[type="text"].path' , editorSrvs );
		/**
		* put your comment there...
		* 
		*/
		var formEle, tab, activeTab, activeSecureKeyInput, secureKeys;
		
		/**
		* put your comment there...
		* 
		*/
		var confirmSave = function() 
		{
			
			// This is important before serializing form data
			setTask( 'Validate' );
			
			var formData = formEle.serializeObject();
			
			// Validate form parameters through AJAX
			editorSrvs.makeCall( editorSrvs.getActionRoute( 'validateForm' ), formData ).done(
			
				function( isValid ) {
					
					// If not valid post with valid task so user
					// can see error messages for each field!
					if ( ! isValid )
					{
						submitConfigFileEditorForm( 'Validate' );
						
						return false;
					}
				
					editorSrvs.updateConfigFile( 'updateConfigFile', formData );
			
				}
			);
			
		};

		/**
		* put your comment there...
		* 
		* @param event
		*/
		var doMainMenu = function( event )
		{
			switch ( event.currentTarget.id )
			{
				
				case 'wcfe-dmm-info-paths':
				
					tb_show( 'System Paths', '#TB_inline?inlineId=wcfe-info-paths&width=700&height=440' );
				
				break;
				
				case 'wcfe-dmm-profiles-list':
				
					// how profiles list dialog
					tb_show( WCFEConfigFormL10N.profiles_ListTitle, editorSrvs.getActionRoute( 'profilesList' ) + '&TB_iframe=true' ) ;
					
				break;
				
				case 'wcfe-dmm-profiles-create':
					
					// First create Profile Vars Temporary storage to be associated with
					// profile when created
					editorSrvs.makeCall( editorSrvs.getActionRoute( 'createVarsTStorage' ), formEle.serializeObject() ).done
					(
						function( temporaryStorage )
						{
							if ( ! temporaryStorage || ! temporaryStorage.id )
							{
								
								WCFEErrorsDialog.show( [ WCFEConfigFormL10N.profiles_CouldNotCreateTempStorage ] );
								
								return;
							}
							
							// Create Profile / Send Storage Id along with request
							tb_show( WCFEConfigFormL10N.profiles_createProfileTitle , editorSrvs.getActionRoute( 'editProfile' ) + '&storageId=' + temporaryStorage.id + '&caller=WCFEEditorForm&TB_iframe=true' ) ;
							
						}
					
					);
										
				break;
				case 'wcfe-dmm-profiles-save':
				case 'wcfe-dmm-profiles-edit':
				case 'wcfe-dmm-profiles-delete':
				case 'wcfe-dmm-profiles-reload':
				case 'wcfe-dmm-profiles-unload':
				case 'wcfe-dmm-profiles-close':
				
					WCFEEditorForm.profile.menuProxy( event.currentTarget.id );
					
				break;
				
				case 'wcfe-dmm-tab-help':
				
					generateHelpBoxMap( WCFEConfigFormL10N.helpDialogTitle, 'field-tip' );
					
				break;
				case 'wcfe-dmm-tab-constants-list':
				
					generateHelpBoxMap( WCFEConfigFormL10N.constantsDialogList, 'field-constant-name' );

				break;
				
				case 'wcfe-dmm-about-contact':
				
					window.open( 'http://wp-cfe.xptrdev.com/contact/' );
					
				break;
					
				case 'wcfe-dmm-about-website':
				
					window.open( 'http://wp-cfe.xptrdev.com/' );
					
				break;
				
				case 'wcfe-dmm-about-support':
				
					window.open( 'https://wordpress.org/support/plugin/wp-config-file-editor' );
					
				break;
				
				case 'wcfe-dmm-about-submit-review':
				
					window.open( 'https://wordpress.org/support/view/plugin-reviews/wp-config-file-editor' );
					
				break;
				
				case 'wcfe-dmm-about-online-help':
				
					window.open( 'http://wp-cfe.xptrdev.com/docs/' );
				
				break;
				
				case 'wcfe-dmm-about-follow-development':
				
					window.open( 'https://github.com/xptrdev/wp-config-file-editor' );
					
				break;	
				
				case 'wcfe-dmm-about-info':
				
				  window.open( 'http://wp-cfe.xptrdev.com/' );
				  
				break;
				
				case 'wcfe-dmm-cookies-generateHash':
				
				  tab.tabs( 'option', 'active', 11 );
				  
				  var prefixesList = 
				  [ 
				  	'', 
				  	'wordpressuser_', 
				  	'wordpresspass_', 
				  	'wordpress_', 
				  	'wordpress_sec_', 
				  	'wordpress_logged_in_' 
				  ];
				
				var cookiesInputs = $( '#CookiesOptionsTab input[type="text"]' );
				
				WCFEEditorForm.statusBar.showProgress( WCFEConfigFormL10N.status_generatingHash );
				
				editorSrvs.makeCall( editorSrvs.getActionRoute( 'generateCookieHash' ) ).done(				

					function ( hash )
					{
						
						$.each( prefixesList,
							
							function( index )
							{
								cookiesInputs.eq( index ).val( this + hash );
							}
						
						);
						
						WCFEEditorForm.statusBar.showLog( WCFEConfigFormL10N.status_hashGenerated )
					
					}
				
				).error(
					function()
					{
						WCFEEditorForm.statusBar.showLog( WCFEConfigFormL10N.status_couldntGenerateHash );
					}
				);
				
				break;
				
				case 'wcfe-dmm-secure-keys-generate':
				
					tab.tabs( 'option', 'active', 8 );
				  
					generateSecureKeys( [ activeSecureKeyInput ] );
					
				break;
				case 'wcfe-dmm-secure-keys-generate-all':
				
					tab.tabs( 'option', 'active', 8 );
					
        	        generateSecureKeys( secureKeys );
			
				break;
				
				case 'wcfe-dmm-systemcheck':
				
					tb_show( WCFEConfigFormL10N.systemCheckDialogTitle, editorSrvs.getActionRoute( 'systemCheckTools' ) + '&TB_iframe=true&width=600&height=380' );
				
				break;
				
				case 'wcfe-dmm-multisite-enable':
				
					tb_show( WCFEConfigFormL10N.multiSiteDialogTitle, editorSrvs.getActionRoute( 'MultiSiteSetupTools' ) + '&width=700&TB_iframe=true' );
					
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
			var rows = $( '#' + tabId ).find( '.field-row, .checkbox-row' ).each(
			
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
			
		}
	
		/**
		* put your comment there...
		* 
		*/
		var generateSecureKeys = function( inputs )
		{
			
			WCFEEditorForm.statusBar.showProgress( WCFEConfigFormL10N.status_generatingSecureKeys );
			
			// Send key generation server request
			editorSrvs.makeCall( editorSrvs.getActionRoute( 'createSecureKey' ), { count : inputs.length } ).done( 
			
				function( secureKeysList )
				{		
					$.each( inputs, 
						
						function( index )
						{
							$ ( this ).val( secureKeysList[ index ] );
						}
					
					);

					WCFEEditorForm.statusBar.showLog( WCFEConfigFormL10N.status_secureKeyGenerated );
					
				}
				
			).error(
			
				function()
				{
					WCFEEditorForm.statusBar.showLog( WCFEConfigFormL10N.status_couldntGenerateSecureKeys );
				}
			
			);
		};
		
		/**
		* put your comment there...
		* 
		*/
		var getActiveTabIndex = function()
		{
			var index = $.cookie( 'wcfe-config-form-active-tab' );
			
			if ( ! index )
			{
				index = 1;
			}
			
			return index - 1;
		};
		
		/**
		* put your comment there...
		* 
		*/
		var setActiveTabIndex = function()
		{
			$.cookie( 'wcfe-config-form-active-tab',  tab.tabs( 'option', 'active' ) + 1 )
			
			return;
		};
			
		/**
		* 
		*/
    this.getFormEle = function()
    {
			return formEle;
    };
	
		/**
		* put your comment there...
		* 
		*/
		var previewConfigFile = function() 
		{
		
			submitConfigFileEditorForm( 'Preview' );
			
		};
		
		/**
		* 
		*/
		this.ro = function()
		{
			return editorSrvs;
		};
	
		/**
		* put your comment there...
		* 
		* @param task
		*/
		var setTask = function( task )
		{
			$( 'input[name="configFileFields[Task]"]' ).val( task );
		};
	
		/**
		* put your comment there...
		* 
		* @param task
		*/
		var submitConfigFileEditorForm = function(task)
		{
			
			setTask( task );
			
			// Submit form
			formEle.submit();
			
		};
		
		/**
		* 
		*/
		var initialize = function() 
		{
			
			formEle = $( '#wcfe-config-editor-form' );
			
			// Tab
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
				activeTab = $( '#MaintenanceOptionsTab' );
			}
			
			// Confirm SAVE
			$( '#wcfe-editor-form-save' ).click( $.proxy( confirmSave, this ) );
			
			// Preview changes
			$( '#wcfe-editor-form-preview' ).click( previewConfigFile );
			
			// Checkboxes lists
			$( '.wcfe-checkbox-list-container' ).WCFECheckboxList();
			
			// Menu
			$( '#wcfe-config-form-main-menu' ).menu( 
				{ 
					position: { my: "left top", at: "left+25 bottom" }, 
					select : doMainMenu
				}
			).show();
			
			// Secure keys generator
			secureKeys = $( '#SecureKeysOptionsTab input[type="text"]' ).focus(
				function()
				{
					activeSecureKeyInput = $( this );
				}
			);
			
			// Load support WCFE Plugin form
            supportPluginDialog.run();
			
		};
	
		/**
		* 
		*/
		this._onprofilesdialogready = function()
		{
			$( '#TB_window, #TB_window iframe' ).width( '100%' ).height( '100%' ).offset( { top : 0, left : 0 } ).get( 1 ).style.top = '0px';
		};
		
		/**
		* 
		*/
		this._onprofilecreated = function( profile )
		{
			
			WCFEEditorForm.profile.setActiveProfile( profile );
			
			WCFEEditorForm.statusBar.showProgress( WCFEConfigFormL10N.status_setActiveProfile );
			
			// Set as active profile
			editorSrvs.makeCall( editorSrvs.getActionRoute( 'setActiveProfile' ), { activeProfile : profile.id } ).done(
			  function()
			  {
					WCFEEditorForm.statusBar.showLog( WCFEConfigFormL10N.status_profileActivated );
			  }
			
			).error(			
				function()
				{
					WCFEEditorForm.statusBar.showLog( WCFEConfigFormL10N.status_unhandledServerError );
				}
			);
			
			// Close create profile dialog
			tb_remove();
			
		};
		
		/**
		* 
		*/
		this._onprofileupdated = function( profile )
		{
			
			// Config Form is not displaying any editable field (e.g description)
			// so there is not need to reflect any changes, for now just close edit form
			
    	tb_remove();
			
		};
		
		/**
		* 
		*/
		this._onselectprofile = function( profileId )
		{
			// Request server to load specific profile
			// it will notify back from Javascirpt to load active profile
			// in client environment
			window.location.href += '&activeProfile=' + profileId;
		};
		
		// Initialize form script when document lodaed
		$( initialize );
		
	};



WCFEEditorForm.ballons = new function()
{
	
	/**
	* put your comment there...
	* 
	* @param id
	*/
	var setBallonPos = function( id )
	{

		var jWindow = jQuery( window );
		var ballon = $( '#' + id )
	
		ballon.offset( { 
			left : ( jWindow.width() - ( ballon.innerWidth() + 8 ) ), 
			top : ( jWindow.height() - ( ballon.innerHeight() + 8 ) ) } 
		)
		
		return ballon;
	};

	/**
	* put your comment there...
	* 
	* @param id
	*/
	this.show = function( id )
	{
				
		// Dispaly ballnon on bottom right of the window
		setBallonPos( id ).fadeIn( 1000, 
		
			// Fadout when fadin done
			function()
			{
				
				$ ( this ).fadeOut( 20000 );
				
			});
			
			
			$( window ).resize(
			
				function()
				{
					setBallonPos( id );
				}
				
			);

	};
	
};


// tatus bar
WCFEEditorForm.statusBar = new function()
{
	
	/**
	* 
	*/
	this.showLog	= function( message )
	{
		$( '#wcfe-status-bar .log-text' ).text( message ).show().fadeOut( 20000, 
			function()
			{
				$( '#wcfe-status-bar .log-text' ).text( '---' ).show();
			}
		);
	};
  
	/**
	* 
	*/
	this.showProgress	= function( message )
	{
		$( '#wcfe-status-bar .log-text' ).text( message );
	};
	
	/**
	* 
	*/
	this.showStatus = function( text )
	{
		$( '#wcfe-status-bar .status-text' ).text( text );
	};
			
};

// Profile
WCFEEditorForm.profile = new function( )
{

	/**
	* put your comment there...
	* 
	*/
	var activeProfile;
	
	/**
	* put your comment there...
	* 
	* @type Boolean
	*/
	var enabled = false;
	
	/**
	* put your comment there...
	* 
	*/
	var ro = WCFEEditorForm.ro();
	
	/**
	* put your comment there...
	* 
	* @type T_JS_FUNCTION
	*/
	var sb = WCFEEditorForm.statusBar;
	
	/**
	* 
	*/
	this._ondelete = function()
	{
		
		if ( ! confirm( WCFEConfigFormL10N.confirm_DeleteActiveProfile ) )
		{
			return;
		}
		
		sb.showProgress( WCFEConfigFormL10N.status_deleteingProfile );
		
		ro.makeCall( ro.getActionRoute( 'deleteProfile' ), { profileId : activeProfile.id } ).done(
			function()
			{
				sb.showLog( WCFEConfigFormL10N.status_profileDeleted );
				
				window.location.href += '&flags=unsetActiveProfile';
			}		
		).error(
			function()
			{
				sb.showLog( WCFEConfigFormL10N.status_unhandledServerError );
			}
		);
	};
	
	/**
	* 
	*/
	this._onedit = function()
	{
		tb_show( WCFEConfigFormL10N.title_EditActiveProfile, ro.getActionRoute( 'editProfile' ) + '&id=' + activeProfile.id + '&caller=WCFEEditorForm&TB_iframe=true' ) ;
	};
	
	/**
	* 
	*/
	this._onreload = function()
	{
		window.location.reload();
	};
	
	/**
	* 
	*/
	this._onsave = function()
	{
		// Server save
		var vars = WCFEEditorForm.getFormEle().serializeObject();
		
		vars.profileId = activeProfile.id;
		
		sb.showProgress( WCFEConfigFormL10N.status_savingProfileVars );
		
		ro.makeCall( ro.getActionRoute( 'setProfileVars' ), vars ).done(
		
			/**
			* 
			*/
			function( response )
			{
				sb.showLog( WCFEConfigFormL10N.status_profileVarsSaved  );
			}
		
		).error(
		
			function()
			{
				sb.showLog( WCFEConfigFormL10N.status_unhandledServerError );
			}
		);
		
	};	
	
	/**
	* 
	*/
	this._onunload = function()
	{
		window.location.href += '&flags=unsetActiveProfile';
	};

	/**
	* 
	* 
	*/
	this.clearActiveProfile = function()
	{
		
	};

	/**
	* 
	*/
	this.getProfile = function()
	{
		return activeProfile;
	};
	
	/**
	* 
	*/
	this.menuProxy = function( item )
	{
		var itemName = item.split( '-' ).pop();
		var callbackName = '_on' + itemName;
				
		// Call handler
		if ( enabled )
		{
			
			WCFEEditorForm.profile[ callbackName ]();
			
		}
	};

	/**
	* 
	*/
	this.setActiveProfile = function( profile )
	{
		
		activeProfile = profile;
		
		enabled = true;
		
		$( '#wcfe-dmm-profiles-active-profile, #wcfe-dmm-profiles-active-profile li' ).css( 'color', 'black' );
		
		this.reflectState();
		
		return this;
	};
	
	/**
	* 
	*/
	this.reflectState = function() 
	{
		
		WCFEEditorForm.statusBar.showStatus( WCFEConfigFormL10N.status_activeProfile + activeProfile.name );
		
		WCFEEditorForm.ballons.show( 'wcfe-active-profile-warning' );
	};

};	
	
	
	
/**
* put your comment there...
* 	
* @type T_JS_FUNCTION
*/
var supportPluginDialog = new function()
{
	
	/**
	* put your comment there...
	* 
	*/
	var forceDismiss = function()
	{
		$.cookie( 'wcfe-support-plugin-dialog-force-dismiss', true, { expires : 365 } );
	};
	
	/**
	* put your comment there...
	* 
	*/
	var getNextTime = function()
	{
		var nextTime = $.cookie( 'wcfe-support-plugin-dialog-time' );
		
		return nextTime ? nextTime : 0;
	}
	
	/**
	* put your comment there...
	* 
	*/
	var isDismiss = function()
	{
		return $.cookie( 'wcfe-support-plugin-dialog-force-dismiss' );
	};
	
	/**
	* put your comment there...
	* 
	*/
	var isFirstTime = function()
	{
		return getNextTime() ? false : true;
	};
	
	/**
	* put your comment there...
	* 
	*/
	var isTimeElapsed = function()
	{
		
		var nowTime = new Date();
		
		return nowTime.getTime() > getNextTime();
		
	};
				
	/**
	* put your comment there...
	* 
	*/
	var setNextTime = function()
	{
		
		// Display dialog every 24 hours
		var timeNow = new Date();
		var nextTime = ( new Date( timeNow.getTime() + 86486400 ) );
		
		$.cookie( 'wcfe-support-plugin-dialog-time', nextTime.getTime(), { expires : 365 } );
		
	}
	
	/**
	* 
	*/
	this.run = function()
	{
		
		// Get out if dimissed
		if ( isDismiss() )
		{
			
			return;
		}
		
		// Give user a chance to test the Pluin
		// DOnt ask once installed!
		if ( isFirstTime() )
		{
			
			setNextTime();
			
			return;
		}
						
		if ( isTimeElapsed() )
		{
			
			// Bind buttons events
			var dialog = $( '#wcfe-support-plugin-dialog-popup' );
			
			// Close dialog
			dialog.find( '.remind-me-later' ).click( tb_remove );
			
			// Dismiss and close
			dialog.find( '.force-dismiss' ).click( 
				function()
				{
					
					forceDismiss();
					
					tb_remove();
					
				}
			);

			var showDialog = function()
			{
				
				// SHow dialog
				setTimeout(
				
					function() 
					{
					
			 			if ( $( '#TB_window' ).length )
			 			{
			 				
			 				console.log( $( '#TB_window' ).length );
					    showDialog();
					    
					    return;
			 	 		}
					 
				 		tb_show( WCFEConfigFormL10N.title_supportPlugin, '#TB_inline?inlineId=wcfe-support-plugin-dialog-popup&width=620&height=180' );	
						
						// Set next time 
						setNextTime();
					
					}, 10000 );
				
			};
			
      showDialog();
		}
		
	}
	
};
			
})( jQuery );


