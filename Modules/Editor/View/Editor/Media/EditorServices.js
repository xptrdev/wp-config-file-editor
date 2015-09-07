

( function( $ )
{

	/**
	* 
	*/
	WCFEEditorServices = function()
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
		* 
		*/
		this.preUpdate = function()
		{
			
			return this.makeCall( this.getActionRoute( 'preUpdate' ) ).done(
			     	 
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
					$( '.wcfe-restore-parameters .wcfe-restore-link' )
					
					.text( response.restoreUrl )
					
					.focus()
					
					[ 0 ].select();
					
					// Show update dialog
					tb_show( 'UPDATING WORDPRESS CONFIG FILE WARNING!!!', '#TB_inline?width=300px&height=400px&inlineId=wcfe-confirm-save-message' );
					
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
			
			securityToken = $( 'input[name="configFileFields[stoken]"]' ).val();
			
			// Update config file button clicked
			$( '#wcfe-update-config-file' ).click( $.proxy( onUpdateConfigFile ,this ) );
			
		};
		
		/**
		* 
		*/
		this.makeCall = function( url, params )
		{
			
			// Request parameters
			var requestParams = $.extend( {securityToken : securityToken}, ( ( params !== undefined ) ? params : {} ) );
			
			return $.post( url , requestParams )
			
		};
		
		/**
		* put your comment there...
		* 
		*/
		var onUpdateConfigFile = function()
		{
			preUpdateCallback.resolve();
		};
		
		/**
		* 
		*/
		this.updateConfigFile = function(actionName, data)
		{
			
			var updateCallback = $.Deffered();
			
			this.makeCall( this.getActionRoute( actionName ), data ).done(
			
				function(response)
				{
					
					// COuldnt save / display errors
					if ( response.errors )
					{
						alert( 'errors' );
						
						return false;
					}
					
					// Close update dialog
					tb_remove();
					
					// We're done, notify!!
					updateCallback.resolve();
					
				}
			);
			
			return updateCallback;
		};
		
		$( initialize );
		
	};
	
} ) ( jQuery );