<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
abstract class CookieNamedBase extends Constant {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $cookiePrefix;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getSuppressionValue()
	{
		
		# Generate cookie hash exactly as wordpress do
		$siteUrl = get_site_option( 'siteurl' );
		$cookieHash = md5( $siteUrl ? $siteUrl : '' );
		
		return "{$this->cookiePrefix}{$cookieHash}";
	}
	
}

