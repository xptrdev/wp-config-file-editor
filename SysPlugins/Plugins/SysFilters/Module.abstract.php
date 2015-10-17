<?php
/**
*
*  
*/

namespace WCFE\SysPlugins\SysFilters;

/**
* 
*/
class Module
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $data;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $filters = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $handlers = array();
	
	/**
	* put your comment there...
	* 
	* @param mixed $filters
	* @return Module
	*/
	public function __construct( $filters = null )
	{
		if ( $filters )
		{
			$this->filters = $filters;
		}
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $method
	* @param mixed $params
	*/
	public function __call( $method, $params )
	{
		
		# Get callback name
		$components = explode( '_', substr( $method, 1 ) );
		$handlerName = "_{$components[ 0 ]}";
		
		# Call with method name passed
		$components[ 0 ] = $method;
		$params = array_merge( $components, $params );
		
		return call_user_func_array( array( & $this, $handlerName ), $params ) ;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $callbackName
	*/
	public function _return( $callbackName, $varName )
	{
		return $this->getVar( $varName );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $callbackName
	* @param mixed $array
	*/
	public function _setArrayElement( $callbackName, $varName, $array )
	{
		
		$params = $this->handlers[ $callbackName ][ 'params' ];
		
		// call custom handler if specified
		$params[ 'flags' ] = isset( $params[ 'flags' ] ) ? explode( '|', $params[ 'flags' ] ) : array();
		
		$value = $this->getVar( $varName );
		
		if ( in_array( 'customHandler', $params[ 'flags' ] ) )
		{
			
			$customHandler = "get_{$varName}Value";
			
			$value = $this->$customHandler( $value );
		}
		
		$array[ $params[ 'element' ] ] = $value;
		
		return $array;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $callbackName
	* @param mixed $varName
	*/
	public function _setGlobalVar( $callbackName, $varName )
	{
		$params = $this->handlers[ $callbackName ][ 'params' ];
		
		$GLOBALS[ $params[ 'varName' ] ] = $this->getVar( $varName );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $filters
	*/
	public function & buildFiltersList( $filters )
	{
		
		foreach ( $filters as $handlerName => $handlers )
		{
			
			foreach ( $handlers as $varName => $filter )
			{
				
				$handlerCallbackName = "_{$handlerName}_{$varName}";
				
				# Map handlers to retrive associated data later when filter triggered
				$this->handlers[ $handlerCallbackName ][ 'params' ] = isset( $filter[ 'params' ] ) ? $filter[ 'params' ] : null;
				
				# Map filters to be binded
				$this->filters[ $varName ] = array
				( 
					'filter' => $filter[ 'filter' ], 
					'callback' => $handlerCallbackName, 
					'args' => isset( $filter[ 'args' ] ) ? $filter[ 'args' ] : 1
				);
			}
		}
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getFilters()
	{
		return $this->filters;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $method
	*/
	public function getHandlerVarName( $method )
	{
		return substr( $method, 1 );
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public final function getVar( $varName, $sectionName = 'value' )
	{
		return isset( $this->data[ $varName ][ 'value' ] ) ? $this->data[ $varName ][ $sectionName ] : null;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $varName
	* @param mixed $optName
	*/
	public final function getVarOption( $varName, $optName )
	{
		return isset( $this->data[ $varName ][ 'options' ][ $optName ] ) ? $this->data[ $varName ][ 'options' ][ $optName ] : null;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $data
	* @return Module
	*/
	public final function & run( $data )
	{
		
		$this->data =& $data;
		
		foreach ( $this->getFilters() as $varName => $handler )
		{
			# Don't involved if disabled
			if ( ! $this->getVarOption( $varName, 'disabled' ) )
			{
				
				add_filter( $handler[ 'filter' ], array( & $this, $handler[ 'callback' ] ), $this->getVarOption( $varName, 'priority' ), $handler[ 'args' ] );
			}
			
		}
		return $this;
	}
	
}