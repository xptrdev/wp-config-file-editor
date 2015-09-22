/**
* 
*/

( function( $ )
{

	/**
	* 
	*/
	WCFEMultiSiteSetupNetworkTools = new function()
	{
		
		/**
		* put your comment there...
		* 
		* @type Object
		*/
		var discoveredConfigConsts = {};
		
		/**
		* put your comment there...
		* 
		*/
		var setupNetworkBtn, ConfigCode;
		
		/**
		* put your comment there...
		* 
		* @type WCFEEditorServices
		*/
		var ro = new WCFEEditorServices( 'WCFEMultiSitesTools' );
	
		/**
		* put your comment there...
		* 
		*/
		var setupNetworkBtn = function()
		{
			if ( ! confirm( 'Would you like to write Config andf htaccess Multi Sites configurations code?' ) )
			{
				return;
			}
			
			var postData = { 
				configConsts : discoveredConfigConsts,
				htaccessCode : $( '#wcfe-htaccess-file-final-code' ).val()
			};
			
			ro.makeCall( ro.getActionRoute( 'setupNetwork' ), postData ).done(
			
				function( response )
				{
					
					if ( response.error )
					{
						alert( response.errorMessages.join( "\n" ) );
						
						return;
					}
					
					window.location.href = response.redirectTo;
					
				}
				
			)
			.error(
							
				function()
				{
					alert( 'Internal server error!' );
				}
				
			);
			
		};
		
		/**
		* put your comment there...
		* 
		*/
		var parseConfigConstants = function()
		{
			
			var parsedConstants;
			
			var constant;
			
			var configFileDetectedCodeText = '';
			
			var ConstRegExp = /define\s*\(\s*(\'|\")([A-Z_]+)(\'|\")\s*\,\s*((\'|\")?([^\'\"]+)(\'|\")?)\s*\)\;/g;
			
			while ( constant = ConstRegExp.exec( ConfigCode ) )
			{
				discoveredConfigConsts[ constant[ 2 ] ] = constant[ 6 ];
				
				configFileDetectedCodeText += constant[ 2 ] + ' = ' + constant[ 6 ] + "\n";
			}
			
			$( '#wcfe-config-file-detected-code' ).text( configFileDetectedCodeText );
			
		};
		
		// Write File buttons
		setupNetworkBtn = $( '#wcfe-multisite-setup-tools-button' ).click( setupNetworkBtn );

		var textAreas = $( 'textarea.code' );
		
		$( '#wcfe-htaccess-file-detected-code' ).text( textAreas.eq( 1 ).val() );
		
		
		// Parse and display config code
		ConfigCode = textAreas.eq( 0 ).val();
		
		parseConfigConstants();
		
		// Display panel after htaccess textarea
		$( '#wcfe-multisite-setup-network-tools' ).insertAfter( textAreas.eq( 1 )  ).show();
	};

		
} ) ( jQuery );