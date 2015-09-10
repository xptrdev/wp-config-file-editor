

( function( $ )
{

	/**
	* 
	*/
	WCFEEditorServices = function( formName )
	{

		/**
		* put your comment there...
		* 
		*/
		var preUpdateCallback;
		
		/**
		* put your comment there...
		* 
		*/
		var securityToken;
		
		/**
		* put your comment there...
		* 
		*/
		var updateButton, updateDoneButton, wanringImage, successedImage;
		
		/**
		* 
		*/
		this.postUpdate = function()
		{
			
			return this.makeCall( this.getActionRoute( 'postUpdate' ) ).done(
			
				/**
				* 
				*/
			  function( )
			  {
					
					// Close dialog
					tb_remove();
					
					// Refresh page
					window.location.reload();
					
			  }
			
			).error(
			
				function()
				{
					alert
					( 
					"WCFE Plugin couldn't reached the server after updating config file." + 
					"\nThis might be because config file causes the site to get down or some changed configuration forced Log out." +
					"\n\n This error is likly done when switching when ON/OFF Multi Site feature" + 
					"\n\nThis form will still open for you to decide if to want to restore config file or to just close the form" +
					"\n\n Its recommended to refresh the page after closing this form"
					);
				}
			
			);
			
		};
	
		/**
		* 
		*/
		this.preUpdate = function()
		{
			
			this.makeCall( this.getActionRoute( 'preUpdate' ) ).done(
			     	 
     		/**
     		* 
     		*/
     		function( response ) 
     		{
     			
					// Display errors list
					if ( response.errors )
					{
						
						WCFEErrorsDialog.show( response.errors );
						
						return;
					}
					
					// Fill update dialog with restore backup parameters
					$( '.wcfe-restore-link' )
					
					.prop( 'href', response.restoreUrl );
					
					// Hide errors list as it might be filled from previous save operation!
					$( '#wcfe-confirm-save-message-dialog .wcfe-thickbox-errors-list' ).css( 'display', 'none' );				
					
					// Reset state
					updateButton.prop( 'disabled', '' );
					updateDoneButton.prop( 'disabled', 'disabled' );
					warningImage.show();
					successedImage.hide();
					
					// Show update dialog
					tb_show( 'UPDATING CONFIG FILE WARNING!!!', '#TB_inline?inlineId=wcfe-confirm-save-message&width=650&height=400' );
					
     		}
     	
			);
			
			// eturn new deferred object and hold reference
			return preUpdateCallback = $.Deferred();
		};
		
		/**
		* put your comment there...
		* 
		* @param actionName
		*/
		this.getActionRoute = function(actionName)
		{
			return actionsRoute[ actionName ];
		};
		
		/**
		* put your comment there...
		* 
		*/
		var initialize = function()
		{
			
			securityToken = $( 'input[name="' + formName + '[stoken]"]' ).val();
			
			// Update config file button clicked
			updateButton = $( '#wcfe-update-config-file' ).click( $.proxy( onUpdateConfigFile, this ) );
			updateDoneButton = $( '#wcfe-update-done' ).click( $.proxy( onUpdateDone, this ) );
			
			warningImage = $( '.warning-status-image' );
			successedImage = $( '.success-status-image' );
		};
		
		/**
		* 
		*/
		this.makeCall = function( url, params )
		{
			
			// Request parameters
			var requestParams = $.extend( {securityToken : securityToken}, ( ( params !== undefined ) ? params : {} ) );
			
			return $.post( url , requestParams, null, 'json' );
			
		};
		
		/**
		* put your comment there...
		* 
		*/
		var onUpdateConfigFile = function()
		{

			// Allow to close only by clicking on close button
			// reduce the chance to wrongly close the dialog
			// and to lose restore link!!
			$( '#TB_overlay').unbind() 
			$( document ).unbind( 'keydown.thickbox' );
			
			// Diable update button after it has been pressed
			updateButton.prop( 'disabled', 'disabled' );
			
			// Update
			preUpdateCallback.resolve();
		};
		
		/**
		* put your comment there...
		* 
		*/
		var onUpdateDone = function()
		{
			this.postUpdate().done();
		};
		
		/**
		* 
		*/
		this.updateConfigFile = function(actionName, data)
		{
			
			// Deferred object to callbacl caller
			var updateCallback = $.Deferred();
			
			// Pre update server signal
			this.preUpdate().done( $.proxy( 
			
				// This will be called when Warning Dialog Update button is pressed
				function()
				{
					
					// Show progress
					var progressImg = $( '.ajax-loader-image' ).show();
					
					this.makeCall( this.getActionRoute( actionName ), data ).done(
					
						function(response)
						{
							
							// COuldnt save / display errors
							if ( response.errors )
							{
								
								var errorsListElement = $( '#wcfe-confirm-save-message-dialog .wcfe-thickbox-errors-list' ).empty();
								
								for ( var errIndex = 0; errIndex < response.errors.length; errIndex ++ )
								{
									errorsListElement.append( '<li>' + response.errors[ errIndex ]  + '</li>' );
								}
								
								errorsListElement.css( 'display', 'block' );
								
								// Scroll to top for errors list
								$( '#TB_ajaxContent' ).scrollTop( 0 );
								
								// Enable update button
								updateButton.prop( 'disabled', 'disabled' );
								
								return false;
							}														
							
							// We're done, notify!!
							updateCallback.resolve();
							
							// Update UI state
							updateDoneButton.prop( 'disabled', '' );
							successedImage.show();
							warningImage.hide();
							
						}
					).complete(
						function()
						{
							progressImg.hide();
						}
					);
			
				}, this )
				
			);
			
			return updateCallback;
		};
		
		$( $.proxy( initialize, this ) );
		
	};
	
} ) ( jQuery );