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
	var WCFEEditProfile = new function() 
	{
		
		/**
		* 
		*/
		var initialize = function() 
		{
			$( '#wcfe-profile-edit form input[type="submit"]' ).click(
			
				function()
				{
					
					var profileId = $( '#wcfe-profile-edit form input[name="profileForm[id]"]' ).val();
					
					if ( ! profileId && ! $( '#profile-name' ).val() )
					{
						alert( WCFEProfileL10N.msg_profileNameEmpty );
						
						return false;
					}
				}
				
			);

		};
	
		// Initialize form script when document lodaed
		$( initialize );
		
	};
	
	
})( jQuery );