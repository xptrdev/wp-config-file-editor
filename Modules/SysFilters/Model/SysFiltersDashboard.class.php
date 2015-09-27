<?php
/**
* 
*/

namespace WCFE\Modules\SysFilters\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class SysFiltersDashboardModel extends PluginModel {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $sysFiltersData = array();
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {}
	
	
	/**
	* put your comment there...
	* 
	*/
	public function getData()
	{
		return $this->sysFiltersData;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $data
	*/
	public function setData( $data )
	{
		$this->sysFiltersData =& $data;
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function validate()
	{
		return true;
	}

}