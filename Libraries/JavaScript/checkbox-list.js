/**
* 
*/

/**
* 
*/
( function( $ )
{

	/**
	* put your comment there...
	* 
	*/
	var _onediting = function( event )
	{
		if ( event.keyCode == 13 )
		{
			var value = $( event.target ).val();
			var li = editInput.parent();
			li.find( 'input[type="checkbox"]' ).val( value );

			// Get display text
			//console.log( li.parent().data( 'WCFECheckboxList' ) );
			li.find( 'span' ).text( li.parent().data( 'WCFECheckboxList' ).options.getEditText( value ) );
			
			editInput.hide();

			// Dont submit
			return false;
		}
		else if ( event.keyCode == 27 )
		{
			var li = editInput.parent();
			
			editInput.hide();
			li.find( 'span' ).show();
		}
	};
	
	/**
	* put your comment there...
	* 
	*/
	var _onaddnew = function( event )
	{
		switch ( event.keyCode )
		{
			case 13:
			
				var input = $( event.target );
			
				// Add to checkbox list when pressing enter
				var list = input.prev();
				var listItem = $( '<li></li>' ).appendTo( list );
				var itemName = input.prop( 'id' ) + '[]';
				var textEle;
				var options = list.data( 'WCFECheckboxList' ).options;
				
				$( '<input type="checkbox" name="' + itemName + '" value="' + input.val() + '" checked="checked" />' ).appendTo( listItem ).change( 
				 	function()
				 	{
						listItem.remove();
				 	}
				 )
				 .after( textEle = $( '<span>' + options.getAddText( input.val() ) + '</span>' ) );
				
				if ( options.allowEdit )
				{
					textEle.click( _onedit );
				}
				
				// Clear input
				input.val( '' );
				
				return false;
			break;
		}
	};
	
	/**
	* put your comment there...
	* 
	* @param event
	*/
	var _onedit = function( event )
	{
		// Hide text
		var li = $( event.target.parentNode );
		var textEle = $( event.target );
		
		textEle.hide();
		
		// Show input with checkbox value
		editInput.insertBefore( textEle )
		.css( { width : '90%' } )
		.val( li.find( 'input[type="checkbox"]' ).val() ).blur(
		
			function()
			{
				textEle.show();
				editInput.hide();
			}
		)
		.show()
		.focus();
		
	};
	
	/**                        
	* put your comment there...
	* 
	*/
	var _onunchecked = function( event )
	{
		$( event.target ).parent().remove();
	};
	
	var editInput = $( '<input type="text" />' ).keydown( _onediting );
			
	/**
	* 	
	*/
	$.fn.WCFECheckboxList = function( options )
	{
		
		var args = $.extend( 
		{ 
			allowNew : true,
			allowEdit : false,
			newPlaceholder : null,
			getAddText : function( value )
			{
				return value;
			}
		}, options );
		
		// Add new item
		if ( args.allowNew )
		{
			this.find( '.checkbox-list-input' ).keydown( _onaddnew ).attr( 'placeholder', args.newPlaceholder );	
		}
		
		// Delete
		this.find( 'input:checkbox' ).change( _onunchecked );
		
		// Edit
		if ( args.allowEdit )
		{
			this.find( 'li>span' ).click( _onedit );
		}
		
		// Hold supplied instances vars for later reference
		this.find( 'ul.checkbox-row' ).each(
			function()
			{
				$( this ).data( 'WCFECheckboxList', { options : args } );
			}
		);
		
		return this;
	};
	
} ( jQuery ) );