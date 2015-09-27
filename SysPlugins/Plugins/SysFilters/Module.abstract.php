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
	protected $data;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $filters = array();
	
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
		
		# Remove firest _ from method name to get var name
		# return it directly to the caller filter

		return $this->getVar( substr( $method, 1 ) );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function getVar( $name )
	{
		return isset( $this->data[ $name ][ 'value' ] ) ? $this->data[ $name ][ 'value' ] : null;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $varName
	* @param mixed $optName
	*/
	public function getVarOption( $varName, $optName )
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
		
		foreach ( $this->filters as $filterName => $handler )
		{
			# Don't involved if disabled
			if ( ! $this->getVarOption( $handler, 'disabled' ) )
			{
				
				add_filter( $filterName, array( & $this, "_{$handler}" ), $this->getVarOption( $handler, 'priority' ) );	
				
			}
			
		}
		return $this;
	}
	
}