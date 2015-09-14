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
		var editorSrvs = new WCFEEditorServices( 'configFileFields' );
		
		/**
		* put your comment there...
		* 
		*/
		var formEle;
		
		/**3
		* put your comment there...
		* 
		*/
		var checkboxListInput = function( event )
		{
			switch ( event.keyCode )
			{
				case 13:
				
					var input = $( event.target );
				
				  // Add to checkbox list when pressing enter
				 	var list = input.next();
				 	var listItem = $( '<li></li>' ).appendTo( list );
				 	var itemName = input.prop( 'id' ) + '[]';
				 	
				 	$( '<input type="checkbox" name="' + itemName + '" value="' + input.val() + '" checked="checked" />' ).appendTo( listItem ).change( 
				 		function()
				 		{
							listItem.remove();
				 		}
				 	 ).after( '<span>' + input.val() + '</span>' );
				  
				  // Clear input
					input.val( '' );
					
				break;
			}
		};
		
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
		* @returns {Boolean}
		*/
		var generateHelpBoxMap = function(dialogTitle, fieldClass)
		{
			
			var helpHref = event.target.href;
			
			var tabId = helpHref.substring( helpHref.indexOf( '#' ) + 1 );
			
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
		* 
		*/
		var generateFieldKey = function(event) 
		{
			// Send key generation server request
			editorSrvs.makeCall( editorSrvs.getActionRoute( 'createSecureKey' ) ).done( 
			
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
			
			// Secure keys generator
			$('.secure-key-generator-key').click( $.proxy( generateFieldKey, this ) );
			
			// Confirm SAVE
			$( '#wcfe-editor-form-save' ).click( $.proxy( confirmSave, this ) );
			
			// Preview changes
			$( '#wcfe-editor-form-preview' ).click( previewConfigFile );
			
			// Checkboxes lists
			$( '.checkbox-list-input' ).keypress( $.proxy( checkboxListInput, this ) );
			$( '.checkbox-list input:checkbox' ).change( 
				function()
				{
					$( this ).parent().remove();
				}
			 );
			 
			// Help box
			$( '.help-box-link' ).click(
				function()
				{
					generateHelpBoxMap( 'WCFE Help', 'field-tip' );
				}
			);

			// Help box
			$( '.consts-list-link' ).click(
				function()
				{
					generateHelpBoxMap( 'Constants List', 'field-constant-name' );
				}
			);
			
			$( '#wcfe-config-form-main-menu' ).menu();
		};
	
		// Initialize form script when document lodaed
		$( initialize );
		
	};
	
	
})( jQuery );