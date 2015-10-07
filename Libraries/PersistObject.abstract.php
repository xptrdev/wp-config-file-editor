<?php
/**
* 
*/

namespace WCFE\Libraries;


use WPPFW\MVC\Model\State\IModelStateAdapter;

/**
* 
*/
abstract class PersistObject
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $stateAdapter;
	
	/**
	* put your comment there...
	* 
	* @param IModelStateAdapter $adapter
	* @return {PersistObject|IModelStateAdapter}
	*/
	public function __construct( IModelStateAdapter & $adapter )
	{
		
		$this->stateAdapter = $adapter;
		
		// Read state
		$this->readState();
		
		$this->init();
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getStateAdapter()
	{
		return $this->stateAdapter;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function init() { }
	
	/**
	* put your comment there...
	* 
	*/
	public function & readState()
	{
		
		$stateAdapter =& $this->getStateAdapter();
		
		foreach ( $stateAdapter->read() as $propName => $value ) 
		{
			
			$this->$propName = $value;
		}
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & writeState()
	{
		
		$stateVars = array();
		$stateAdapter =& $this->getStateAdapter();
		$moduleClassReflection = new \ReflectionClass( $this );
		
		# Copy all protected properties
		$statePropperties = $moduleClassReflection->getProperties( \ReflectionProperty::IS_PROTECTED );
		
		foreach ( $statePropperties as $property ) 
		{
			
			$propertyName = $property->getName();
			
			if ( strpos( $propertyName, '_' ) === 0 )
			{
				continue;
			}
			
			$stateVars[ $propertyName ] =& $this->$propertyName;
		}		
		
		$stateAdapter->write( $stateVars );
		
		return $this;
	}
	
}