<?php
/**
* 
*/

namespace WCFE\Libraries;

/**
* 
*/
class ResStorage {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $baseUrl;
	
	/**
	* put your comment there...
	* 
	* @param mixed $baseUrl
	* @return JSLibrary
	*/
	public function __construct( $baseUrl )
	{
		$this->baseUrl = $baseUrl;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function & getRes( $class ) 
	{
		
		# Get url for the requested class
		$url = $this->baseUrl;
		
		$resClassEntities = explode( '\\', $class );
		
		# Remove base namespace as it represnt baseUrl!
		array_shift( $resClassEntities );
		
		# Remove class name
		array_pop( $resClassEntities );
		
		$pathToRes = implode( '/', $resClassEntities );
		
		$resUrl = "{$url}/{$pathToRes}";
		
		# Generate unique name for the rquested resource
		$queueName = implode( '-', explode( '\\', strtolower( $class ) ) );
		
		# Create res class
		$resObject = new $class( $queueName, $resUrl );

		return $resObject;
	}
	
}