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
		if ( 	
			    ( ! isset( $_POST[ 'securityToken' ] ) ) ||
			    
			    ( ! $_POST[ 'securityToken' ] ) ||
			    
			    ( ! wp_verify_nonce( $_POST[ 'securityToken' ] ) ) ||
     
			    ( ! is_super_admin() ) )
		{
			
			header( 'HTTP/1.0 4.3 Forbidden' );
			
			die( $this->__( 'Access Denies' ) );
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
		
		# Exclude form internal fields
		unset( $vars[ 'Task' ] );
		unset( $vars[ 'stoken' ] );
		
		$storageId = $model->createProfileVarsTStorage( $vars );
		
		return array( 'id' => $storageId );
	}

	/**
	* put your comment there...
	* 
	*/
	public function deleteProfileAction()
	{
		
		if ( ! $this->_checkPermission() )
		{
			
			return;

		}
		
		$model =& $this->getModel( 'Profiles' );
		$profileId = $_POST[ 'profileId' ];
		
		return $model->delete( array( $profileId ) );
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
		
		# Exclude form internal fields
		unset( $profile->vars[ 'Task' ] );
		unset( $profile->vars[ 'stoken' ] );
		
		return $model->updateProfileVars( $profile );
	}

} # End class