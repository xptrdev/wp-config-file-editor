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
    private $basePath;
    
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
    * @param mixed $basePath
    * @return ResStorage
    */
	public function __construct( $baseUrl, $basePath )
	{
		$this->baseUrl = $baseUrl;
        $this->basePath = $basePath;
	}
	
    /**
    * put your comment there...
    * 
    */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
    * put your comment there...
    * 
    */
    public function getBaseUrl()
    {
        return $this->baseUrl;
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
		$path = $this->basePath;
        
		$resClassEntities = explode( '\\', $class );
		
		# Remove base namespace as it represnt baseUrl!
		array_shift( $resClassEntities );
		
		# Remove class name
		array_pop( $resClassEntities );
		
		$urlPathToRes = implode( '/', $resClassEntities );
		$filePathToRes = implode( DIRECTORY_SEPARATOR, $resClassEntities );
        
		$resUrl = "{$url}/{$urlPathToRes}";
        $resPath = "{$path}/{$filePathToRes}";
		
		# Generate unique name for the rquested resource
		$queueName = implode( '-', explode( '\\', strtolower( $class ) ) );
		
		# Create res class
		$resObject = new $class( $queueName, $resUrl, $resPath );

		return $resObject;
	}
	
}