<?php
/**
* 
*/

namespace WCFE\SysPlugins\SysFilters\Modules;

use WCFE\SysPlugins\SysFilters\Module;

/**
* 
*/
class MiscModule extends Module
{

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
				'queryVars' => array( 'filter' => 'query_vars' ),
				'quality' => array( 'filter' => 'wp_editor_set_quality' ),
				'memoryLimit' => array( 'filter' => 'image_memory_limit' ),
				'themesPersistCache' => array( 'filter' => 'wp_cache_themes_persistently' ),
				'uploadAllowedMimes' => array( 'filter' => 'upload_mimes' ),
			),
		);
		
		$this->buildFiltersList( $filtersToBuild );

		return parent::getFilters();
	}
	
}
