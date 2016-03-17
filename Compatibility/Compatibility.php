<?php
/**
* 
*/

namespace WCFE;

/**
* 
*/
class CompatibleWordpress
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private static $instance;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $checkPoints = array
	(
		'4.3.0',
	);

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $versionBase;
	
	/**
	* put your comment there...
	* 
	* @param mixed $versionBase
	* @return CompatibleWordpress
	*/
	private function __construct( $versionBase ) 
	{
		$this->versionBase =& $versionBase;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function load()
	{
		
		foreach ( $this->checkPoints as $chkPointVersion )
		{
			
			// Include all versions that are newer than current version
			if ( version_compare( $this->versionBase, $chkPointVersion ) == -1 )
			{
				
				$versionFile = __DIR__ . DIRECTORY_SEPARATOR . "{$chkPointVersion}.php";
				
				if ( file_exists( $versionFile ) )
				{
					require $versionFile;
				}
				
			}
		}
	}

	/**
	* put your comment there...
	* 
	* @param mixed $versionBase
	* @return CompatibleWordpress
	*/
	public static function loadCompatibilityLayers( $versionBase )
	{
		if ( ! self::$instance )
		{

			self::$instance = new CompatibleWordpress( $versionBase );	
			
			// Load layers
			self::$instance->load();
		}

		return self::$instance;
	}
	
}
