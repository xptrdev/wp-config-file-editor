<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
abstract class CookieNamedBase 
{

    /**
    * put your comment there...
    * 
    * @param mixed $prefix
    */
	public static function getSuppressionValue($prefix = '')
	{
		
		# Generate cookie hash exactly as wordpress do
		$siteUrl = get_site_option('siteurl');
		$cookieHash = md5( $siteUrl ? $siteUrl : '');
		
		return "{$prefix}{$cookieHash}";
	}
	
}

