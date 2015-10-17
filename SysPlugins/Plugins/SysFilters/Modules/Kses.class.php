<?php
/**
* 
*/

namespace WCFE\SysPlugins\SysFilters\Modules;

use WCFE\SysPlugins\SysFilters\Module;

/**
* 
*/
class KsesModule extends Module
{

	/**
	* put your comment there...
	* 
	* @param mixed $callbackName
	* @param mixed $varName
	*/
	public function _tags( $callbackName, $varName, $tags, $context )
	{
		
		# Applying Tags filter single time will call all associated
		# handlers even those not requested by the variable name
		# So lets make sure we're returing the correct result with the requested context/varname
		if ( 	( ( $context == 'post' ) && ( $varName == 'postTags' ) ) || 
					( ( $context == 'pre_comment_content' ) && ( $varName == 'commentTags' ) ) )
		{
			
			$tags = $this->getVar( $varName );
			
		}
		
		return $tags;           
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getFilters()
	{
		
		$filtersToBuild = array
		(
			'return' => array
			(
				'protocols' => array( 'filter' => 'kses_allowed_protocols' ),
			),
			'tags' => array(
			  'postTags' => array( 'filter' => 'wp_kses_allowed_html', 'args' => 2 ),
			  'commentTags' => array( 'filter' => 'wp_kses_allowed_html', 'args' => 2 ),
			),
			'setGlobalVar' => array(
			  'entities' => array( 'filter' => 'init', 'params' => array( 'varName' => 'allowedentitynames' ) ),
			)
		);
		
		$this->buildFiltersList( $filtersToBuild );

		return parent::getFilters();
	}
	
}
