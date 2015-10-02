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
			)
		);
		
		$this->buildFiltersList( $filtersToBuild );

		return parent::getFilters();
	}
	
}
