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
		var editorSrvs = new WCFEEditorServices();
		
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
				
					editorSrvs.updateConfigFile( 'updateConfigFile' );
			
				}
			);
			
		};
	
		/**
		* put your comment there...
		* 
		* @param task
		*/
		var submitConfigFileEditorForm = function(task)
		{
			
			// Submit form
			formEle.submit();
			
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
			
			//formEle = $( '#wcfe-config-editor-form' );
			
			// Confirm SAVE
			//$( '#wcfe-editor-form-save' ).click( $.proxy( confirmSave, this ) );

			// Ace Editor
			rawEditor =  ace.edit( 'config-file-content' );
			
			rawEditor.setTheme( 'ace/theme/chaos' );
			
			// Syntax Highlights mode
			var php = ace.require( "ace/mode/php" ).Mode;
		  rawEditor.getSession().setMode( new php() );
		  
		  // auto complete
			rawEditor.setOptions({
			    enableBasicAutocompletion: true
			});

		};
	
		// Initialize form script when document lodaed
		$( initialize );
		
	};
	
	
})( jQuery );