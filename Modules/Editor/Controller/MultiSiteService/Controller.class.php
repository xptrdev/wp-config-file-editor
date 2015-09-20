<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\MultiSiteService;

# Imoprts
use WPPFW\MVC\Controller\ServiceController;

/**
* 
*/
class MultiSiteServiceController extends ServiceController {
	
	/**
	* put your comment there...
	* 
	*/
	private function _checkPermission()
	{
		
		# Check if permitted to take such action
		if ( 	( ! wp_verify_nonce( $_POST[ 'securityToken' ] ) ) ||
					
					( ! is_super_admin( 'administrator' ) ) )
		{
			
			header( 'HTTP/1.1 4.3 Forbidden' );
			
			die( );
		}
		
		return true;
	}

} # End class