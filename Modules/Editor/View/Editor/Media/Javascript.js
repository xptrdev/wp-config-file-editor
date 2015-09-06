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
		*/
		var confirmSave = function() 
		{
			
			tb_show( 'UPDATING WORDPRESS CONFIG FILE ALERT!!!', '#TB_inline?width=300px&height=400px&inlineId=wcfe-confirm-save-message' );
		};
		
		/**
		* 
		*/
		var generateFieldKey = function(event) 
		{
			// Send key generation server request
			$.get( editorServiceKeyGenUrl ).done( 
			
				function( secureKey )
				{		
					// Set Input field
					$( event.target ).prev().val( secureKey );
				}
				
			);
			
			// Inactive
			return false;
		};

		/**
		* put your comment there...
		* 
		*/
		var updateConfigFile = function()
		{
			// Submit form
			$( '#wcfe-config-editor-form' ).submit();
			
		};

		/**
		* 
		*/
		var initialize = function() 
		{
			// Secure keys generator
			$('.secure-key-generator-key').click( generateFieldKey );
			
			// Confirm SAVE
			$( '#wcfe-editor-form-save' ).click( confirmSave );
			
			// Update Config File
			$( '#wcfe-update-config-file' ).click( updateConfigFile );
		};
	
		// Initialize form script when document lodaed
		$( initialize );
		
	};
	
	
})( jQuery );