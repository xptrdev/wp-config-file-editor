<?php
/**
* 
*/

namespace WCFE\Modules\Profiles\Controller\ProfilesService;

# Imoprts
use WPPFW\MVC\Controller\ServiceController;

/**
* 
*/
class ProfilesServiceController extends ServiceController {
	
	/**
	* put your comment there...
	* 
	*/
	private function _checkPermission()
	{
		
		# Check if permitted to take such action
		if ( 	( ! isset( $_POST[ 'securityToken' ] ) ) ||
		
					( ! wp_verify_nonce( $_POST[ 'securityToken' ] ) ) ||
		 
					( 	is_multisite() && ! current_user_can( 'manage_network' ) ) ||
					
					( ! is_multisite() && ! current_user_can( 'administrator' ) ) )
		{
			
			header( 'HTTP/1.1 4.3 Forbidden' );
			
			die( );
		}
		
		return true;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function listAction()
	{
		if ( 0/* ! $this->_checkPermission() */ )
		{
			
			return;
		}
		
		
	}

} # End class