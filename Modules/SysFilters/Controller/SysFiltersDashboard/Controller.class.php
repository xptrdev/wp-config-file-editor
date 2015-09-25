<?php
/**
* 
*/

namespace WCFE\Modules\SysFilters\Controller\SysFiltersDashboard;

# Imoprts
use WPPFW\MVC\Controller\Controller;

# Config Form
use WCFE\Modules\Editor\Model\Forms;

/**
* 
*/
class SysFiltersDashboardController extends Controller {
	
	/**
	* put your comment there...
	* 
	*/
	public function indexAction()
	{
		
		if ( ! current_user_can( 'manage_options' ) )
		{
			
			die( 'Access Denied' );
		}
		
		return $this->getModel();
		
	}
	
}