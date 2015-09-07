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
		var previewConfigFile = function() 
		{
		
			submitConfigFileEditorForm( 'Preview' );
			
		};
		
		/**
		* put your comment there...
		* 
		* @param task
		*/
		var submitConfigFileEditorForm = function(task)
		{
			
			$( 'input[name="configFileFields[Task]"]' ).val( task );
			
			// Submit form
			$( '#wcfe-config-editor-form' ).submit();
			
		};
		
		/**
		* put your comment there...
		* 
		*/
		var updateConfigFile = function()
		{
			submitConfigFileEditorForm( 'Save' );
			
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
			
			// Preview changes
			$( '#wcfe-editor-form-preview' ).click( previewConfigFile );
			
		};
	
		// Initialize form script when document lodaed
		$( initialize );
		
	};
	
	
})( jQuery );