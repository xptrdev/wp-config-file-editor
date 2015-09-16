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
	public function createProfileVarsTStorageAction()
	{
		if ( ! $this->_checkPermission() )
		{
			
			return;
		}
		
		$model =& $this->getModel( 'Profiles' );
		
		$vars = filter_input( INPUT_POST, 'configFileFields', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY );
		
		$storageId = $model->createProfileVarsTStorage( $vars );
		
		return array( 'id' => $storageId );
	}

	/**
	* put your comment there...
	* 
	*/
	public function setProfileVarsAction()
	{

		if ( ! $this->_checkPermission() )
		{
			
			return;

		}
		$model =& $this->getModel( 'Profiles' );
		
		$profile = new \WCFE\Modules\Profiles\Model\Profile();
		
		$profile->id = $_POST[ 'profileId' ];
		$profile->vars = filter_input( INPUT_POST, 'configFileFields', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY );
		
		return $model->updateProfileVars( $profile );
	}

} # End class