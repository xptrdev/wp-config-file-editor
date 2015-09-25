/**
* 
*/
( function( $ ) {
	
	/**
	* 
	* 
	* 
	*/
	WCFEAutoPath = function( selector, ro )
	{
		
		/**
		* put your comment there...
		* 
		* @type Object
		*/
		var cached = {};
		
		/**
		* put your comment there...
		* 
		*/
		var count;
		
		/**
		* put your comment there...
		* 
		* @type Boolean
		*/
		var isDisplayed = false;
		
		/**
		* put your comment there...
		* 
		* @type Boolean
		*/
		var isWorkingOnList;
		
		/**
		* put your comment there...
		* 
		*/
		var items;
		
		/**
		* put your comment there...
		* 
		*/
		var pathsListEle;
		
		/**
		* put your comment there...
		* 
		* @type Number
		*/
		var selectedIndex = 0;
		
		/**
		* put your comment there...
		* 
		* @param path
		*/
		var doSearchPath = function( input )
		{
			
			var jInput = $( input );
			var typedPath = jInput.val();
			
			if ( ! typedPath )
			{
				return;
			}
			
			var searchPath = typedPath.substring( 0, typedPath.lastIndexOf( '/' ) + 1 );
			
			// No slashes!
			if ( ! searchPath )
			{
				
				return;
			}
			
			// We still on the same path!
			if ( isDisplayed && ( searchPath == pathsListEle.data( 'searchPath' ) ) )
			{
				
				// Quick search
				var cacheList = cached[ searchPath ];
				var filteredList = [];
				
				$.each( cacheList, 
				
					function()
					{
						if ( this.substring( 0, typedPath.length ) == typedPath )
						{
							filteredList.push( this );
						}
					}
				);
				
				showPathsList( jInput, filteredList, false );
				
				return;
			}
			
			// Check cache
			if ( cached[ searchPath ] )
			{
				
				showPathsList( jInput,  cached[ searchPath ] );
				
				pathsListEle.data( 'searchPath', searchPath );
				
				return;
			}
			
			
			// Request server
			ro.makeCall( ro.getActionRoute( 'getSystemPath' ), { path : searchPath } ).done
			(
			
				function( response )
				{
					
					// Cache path
					cached[ searchPath ] = response.list;
					
					if ( response.list )
					{
						
						pathsListEle.data( 'searchPath', searchPath );
						
						showPathsList( jInput, response.list );
					}
					
				}
				
			);
			
		};
		
		/**
		* put your comment there...
		* 
		* @param list
		*/
		var showPathsList = function( jInput, list )
		{
			
			isDisplayed = true;
			isWorkingOnList = null;
			selectedIndex = 0;
			count = 0;
			
							
			pathsListEle.empty();
			
			$.each( list, 
			
				function( )
				{
					
					var path = this;
					
					count ++;
					
					var li = $( '<li>' + path + '</li>' ).appendTo( pathsListEle ).click(
					
						function()
						{
							
							jInput.val( path );

							closePathsList();
							
						}
					
					);
					
				}
				
			);
			
			items = pathsListEle.find( 'li' );
			
			items.eq( 0 ).addClass( 'selected' );
			
			var inputPosition = jInput.position();
						
			pathsListEle.insertAfter( jInput ).width( jInput.width() + 2 )
			
			.css( 
			{ 
				left : ( ( inputPosition.left + 1 ) + 'px' ), 
				top : ( inputPosition.top + 12 )  + 'px' 
				
			} )
			
			.show();
			
		};
		
		/**
		* put your comment there...
		* 
		*/
		var closePathsList = function()
		{
			pathsListEle.empty().hide();
			
			isDisplayed = false;
			
			isWorkingOnList = false;
		};
		
		/**
		* put your comment there...
		* 
		*/
		var initialize = function()
		{
			
			pathsListEle = $( '<ul class="wcfe-auto-path-list"></ul>' );
			$( '#wcfe-body' ).append( pathsListEle );
			
			$( selector ).keyup(
			
				function( event )
				{
					switch ( event.keyCode )
					{
						
						case 38: // Up
						
							if ( isDisplayed )
							{
								selectedIndex  = ! selectedIndex ?  ( count - 1 ) : selectedIndex - 1;
								var item = items.eq( selectedIndex );
								
								items.removeClass( 'selected' );
								item.addClass( 'selected' );
								
								var itemTop = item.position().top;
								
								if ( itemTop < 0 || itemTop > pathsListEle.height() )
								{
									pathsListEle.scrollTop( pathsListEle.scrollTop() + itemTop );
								}
								
								$( this ).val( items.eq( selectedIndex ).text() );
								
							}
							
						break;
						
						case 40: // Down
						
							if ( isDisplayed )
							{
								selectedIndex  = ( selectedIndex ==  ( count - 1 ) ) ? 0 : selectedIndex + 1;
								var item = items.eq( selectedIndex );
								
								
								items.removeClass( 'selected' );
								item.addClass( 'selected' );

								var itemTop = item.position().top;
								
								if ( itemTop > pathsListEle.height() || itemTop < 0 )
								{
									
									pathsListEle.scrollTop( ( itemTop - pathsListEle.height() ) + item.height() + pathsListEle.scrollTop() );	
								}
								
								$( this ).val( items.eq( selectedIndex ).text() );
								
							}
							
						break;
						
						case 13:
						
							if ( isDisplayed && count )
							{
								$( this ).val( items.eq( selectedIndex ).text() );
								
								closePathsList();								
							}
							
						break;
						
						default:
						
							doSearchPath( this );
							
						break;
					}
					
					
				}
				
			).keydown(
			
				function( event )
				{
					if ( event.keyCode == 38 || event.keyCode == 40 )
					{
						return false;
					}
				}
			
			).focus(
			
				function()
				{
					doSearchPath( this );
				}
			
			).blur(
			
				function( event )
				{

					if ( ! isWorkingOnList )
					{
						
						closePathsList();
					}

				}
				
			);
			
			pathsListEle.mouseenter(
			
				function()
				{
					isWorkingOnList = true;
				}
				
			).mouseleave(
			
				function()
				{
					isWorkingOnList = false;
				}
				
			);
			
		};
		
		
		$( initialize );
		
	};
	
	
} ( jQuery ) )