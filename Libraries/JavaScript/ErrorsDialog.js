

( function( $ )
{

	/**
	* 
	*/
	WCFEErrorsDialog = new function()
	{
		
		this.show = function( errorsList )
		{
			
			// Create errors list
			var errorsListEle = $( '#wcfe-errors-dialog-errors-list' ).empty();
			
			for ( var errIndex = 0; errIndex < errorsList.length; errIndex ++ )
			{
				errorsListEle.append( '<li>' + errorsList[ errIndex ] + '</li>' );
			}
			
			// Show Popup
			tb_show( WCFEErrorsDialogL10N.title , '#TB_inline?inlineId=wcfe-errors-dialog&width=500px&height=400px' )
		};
		
	}
	
} ) ( jQuery );