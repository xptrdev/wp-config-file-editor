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
	var editInput, childListToggler, addNewChildEle;
	
	/**
	* put your comment there...
	* 
	*/
	var _onediting = function( event )
	{
		
		if ( event.keyCode == 13 )
		{
			
			// End Edit
			endEdit( 'save' );

			// Dont submit
			return false;
		}
		else if ( event.keyCode == 27 )
		{			
      endEdit();
		}
	};
	
	/**
	* put your comment there...
	* 
	* @param event
	*/
	var _oninlineadd = function( event )
	{
		var link = $( this );
		
		// Get parent checkbox name
		var li = link.parent().parent();
		var parentName = li.find( '>input[type="checkbox"]' ).prop( 'name' );
		
		// Create new checkbox item from parent checkbox
		var newLi = li.clone()
		newLi.find( '>ul' ).remove();
		newLi.find( '>span' ).text( '' );
		
		newLi.find( 'input[type="checkbox"]' ).prop( 'name', parentName );
		
		li.find( '>ul' ).prepend( newLi );
		
		_onedit( { target : newLi.find( '>span' ).get( 0 ) } );
		
		link.hide();
		
		return false;
	};
	
	/**
	* put your comment there...
	* 
	*/
	var _oninputaddnew = function( event )
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
				
				$( '<input type="checkbox" name="' + itemName + '" value="' + input.val() + '" checked="checked" />' )
				
				.appendTo( listItem )
				
				.after( textEle = $( '<span>' + input.val() + '</span>' ) );
				
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
		var li = $( event.target.parentNode );
		var textEle = $( event.target );
		
		// Expand list
		li.parent().addClass( 'expanded' ).show();
		
		textEle.hide();
		
		// Show input with checkbox value
		editInput.insertBefore( textEle )
		.css( { width : '40%' } )
		.val( textEle.text() )
		.show()
		.focus();
		
	};
	
	/**                        
	* put your comment there...
	* 
	*/
	var _onunchecked = function( event )
	{
		deleteItem( event.target );
	};
	
	/**
	* put your comment there...
	* 
	* @param checkbox
	*/
	var deleteItem = function( checkbox )
	{
		editInput.detach();
		childListToggler.detach();
		
		if ( addNewChildEle ) 
		{
			addNewChildEle.detach();
		}
		
		$( checkbox ).parent().remove();
	};
	
	/**
	* put your comment there...
	* 
	*/
	var endEdit = function( action )
	{
		
		var li = editInput.parent();
		var checkbox = li.find( 'input[type="checkbox"]' );
		var textEle = li.find( '>span' );
		value = editInput.val();
		
		if ( editInput.css( 'display' ) == 'none' )
		{
			return;
		}
		
		// hide edit input element
		editInput.hide();
		
		textEle.show();
		
		// Remove if new and no value specified
		if ( ! value || action == undefined )
		{
			
			if ( ! textEle.text() )
			{
				
				deleteItem( checkbox );	
			}
			
			return;
		}
		
		// Save edit
		textEle.text( value );
			
		// Setting name
		var checkboxName = checkbox.prop( 'name' );
		var newCheckboxName = checkboxName.replace( /\[[^\]]*\]$/, '[' + value + ']' );
		
		// Add [] if current level is container (can has childs)
		/// TEMP SOLUTION TO CHECK 0
		if ( li.parent().data( 'wcfe-ui-hierarchical-component-level' ) == 0 )
		{
			newCheckboxName += '[]';
		}
		
		checkbox.prop( 'name', newCheckboxName );
	};
	
	/**
	* put your comment there...
	* 
	* @param list
	*/
	var inlineAddNew = function( list )
	{
		var checkbox = $( '<input type="checkbox" value="1" checked="checked" />' );
		var textEle = $( '<span></span>' );
		var li = $( '<li></li>' );
		var childList = $( '<ul class="checkbox-row wcfe-ui-hierarchical-component-level_1"></ul>' );
		var args = list.data( 'WCFECheckboxList' ).options;
		var baseName = list.parent().find( '#' + list.prop( 'id' ) + '-baseName' ).val() + '[]';
		
		checkbox.prop( 'name', baseName );
		
		li.append( checkbox ).append( textEle ).append( childList );
		
		list.prepend( li );
		
		_onedit( { target : textEle.get( 0 ) } );
		
	};

	
	/**
	* put your comment there...
	* 
	* @param list
	*/
	var setListLevels = function( list, level )
	{
		
		var nextLevel = level + 1;
		
		// Set list level
		list.addClass( 'wcfe-ui-hierarchical-component-level_' + level );
		list.data( 'wcfe-ui-hierarchical-component-level', level );
		
		// Find child lists
		list.find( '>li' ).each(
		
			function()
			{
				var childList = $( this ).find( '>ul' );
				
				childList.each(
				
					function()
					{
						setListLevels( $( this ), nextLevel );
					}
					
				);
				
			}
		);
		
	};
			
	/**
	* 	
	*/
	$.fn.WCFECheckboxList = function( options )
	{
		
		var args = $.extend( 
		{ 
			allowNew : true,
			addNewMode : 'input',
			allowEdit : false,
			newPlaceholder : null,
			addMaxLevels : -1
		}, options );
		
		// Add new item
		if ( args.allowNew )
		{
			switch ( args.addNewMode )
			{
				
				case 'inline':
					
					var checkboxListElement = this;
					
					$( '<a href="#"></a>' ).prependTo( this )
					.addClass( 'inline-add-button' )
					.text( args.levels[ 0 ].addText )
					.click(
					 
						function()
						{
							
							inlineAddNew( $( event.target ).next() );
							
							return false;
							
						}
					);
				
					// Allow adding child items to the max specified level
					addNewChildEle = $( '<a href="#" class="add-new-child"></a>' ).click( _oninlineadd );
					
					this.delegate( 'li>span', 'mouseenter',
					
						/**
						* 
						*/
						function()
						{
							
							var itemEle = $( this );
							var currentLevel = itemEle.parent().parent().data( 'wcfe-ui-hierarchical-component-level' );
							
							if ( currentLevel < args.addMaxLevels )
							{
								itemEle.append( addNewChildEle.show().text( args.levels[ currentLevel + 1 ].addText ) );
							}
						}
					);
					
					this.delegate( 'li>span', 'mouseleave', 
					
						function( event )
						{
							
							addNewChildEle.hide();
						}
						
					);
					
				break;
				
				default:
				
					this.find( '.checkbox-list-input' ).keydown( _oninputaddnew ).attr( 'placeholder', args.newPlaceholder );		
					
				break;
			}
			
		}
		
		// Delete
		this.delegate( 'input:checkbox', 'change', _onunchecked );
		
		// Edit
		if ( args.allowEdit )
		{
			this.find( 'li>span' ).click( _onedit );
		}
		
		// Set list levels
		var rootList = this.find( '>ul' );
		setListLevels( rootList, 0 );
		
		editInput = $( '<input type="text" />' ).hide().keydown( _onediting ).blur( endEdit );
		childListToggler = $( '<a class="child-items-toggler" href="#"></a>' ).hide().click(
		
			function()
			{
				
				var childList = childListToggler.parent().next().toggle().toggleClass( 'expanded' );
				
				if ( childList.hasClass( 'expanded' ) )
				{
					childListToggler.addClass( 'expanded' );
				}
				else 
				{
					childListToggler.removeClass( 'expanded' );
				}
				
				return false;
			}
		
		);
		
		// Child lists toggler
		$( this ).delegate( '>ul li', 'mouseover', 
		
			function()
			{
				
				var itemEle = $( this );
				var list = itemEle.parent();
				var childList = itemEle.find( '>ul' );
				var currentLevel = list.data( 'wcfe-ui-hierarchical-component-level' );
				
				if ( currentLevel < args.addMaxLevels )
				{
					childListToggler.prependTo( itemEle.find( '>span' ) );
					
					if ( childList.hasClass( 'expanded' ) )
					{
						childListToggler.addClass( 'expanded' );
					}
					else 
					{
						childListToggler.removeClass( 'expanded' );
					}
					
					childListToggler.show();
				}				

			}
			
		);
		
		$( this ).delegate( '>ul li', 'mouseleave', 
		
			function()
			{
				childListToggler.detach();
			}
			
		);		
		
		// Hold supplied instances vars for later reference
		rootList.each(
			function()
			{
				$( this ).data( 'WCFECheckboxList', { options : args } );
			}
		);
		
		return this;
	};
	
} ( jQuery ) );