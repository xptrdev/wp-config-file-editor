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
	var WCFEEditorForm = new function() 
	{
		
		/**
		* put your comment there...
		* 
		* @type WCFEEditorServices
		*/
		var editorSrvs = new WCFEEditorServices( 'rawConfigFile' );
		
		/**
		* put your comment there...
		* 
		*/
		var rawEditor;
		
		/**
		* put your comment there...
		* 
		*/
		var formEle;
		
		/**
		* put your comment there...
		* 
		*/
		var confirmSave = function() 
		{

			var configFileContent = rawEditor.getSession().getValue();
			
			// Validate config form
			
			if ( ! configFileContent )
			{
				alert( WCFERawViewL10N.msg_configFileEmpty );
				
				return false;
			}
			
			if ( configFileContent.indexOf( '<?php' ) != 0 )
			{
				alert( WCFERawViewL10N.msg_configFileNotStartByPHPTag );

				return false;
		 	}
			
			// Update
			
			var formData = { 'rawConfigFile[configFileContent]' : configFileContent };
			
			editorSrvs.updateConfigFile( 'updateRawConfigFile', formData );
			
		};

		/**
		* 
		*/
		var initialize = function() 
		{
			
			//formEle = $( '#wcfe-config-editor-form' );
			
			// Confirm SAVE
			$( '#wcfe-raw-editor-save' ).click( $.proxy( confirmSave, this ) );

			// Ace Editor
			rawEditor =  ace.edit( 'config-file-content' );
			
			rawEditor.setTheme( 'ace/theme/xcode' );
			
			// Syntax Highlights mode
			var php = ace.require( 'ace/mode/php' ).Mode;
		  rawEditor.getSession().setMode( new php() );
		  
		  // auto complete
			rawEditor.setOptions( 
			{
			  enableBasicAutocompletion: true,
			  showPrintMargin : false
			} );

		};
	
		// Initialize form script when document lodaed
		$( initialize );
		
	};
	
	
})( jQuery );