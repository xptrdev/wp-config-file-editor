<?php
/**
* 
*/

namespace WCFE\Modules\Profiles\Controller\Profiles;

# Imoprts
use WPPFW\MVC\Controller\Controller;

# Config Form
use WCFE\Modules\Editor\Model\Forms;

/**
* 
*/
class ProfilesController extends Controller {
	 
	/**
	* put your comment there...
	* 
	*/
	private function _checkPermission()
	{
		
		# Check if permitted to take such action
		if ( 	( 	is_multisite() && ! current_user_can( 'manage_network' ) ) ||
					
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
	public function editAction()
	{
		
		if ( ! $this->_checkPermission() )
		{
			
			return;
		}
		
		$form = new \WCFE\Modules\Profiles\Model\Forms\ProfileForm();
		$model =& $this->getModel();
		$result[ 'securityToken' ] = wp_create_nonce();
		$result[ 'form' ] =& $form;
		$result[ 'updated' ] = false;
		
		# Query profile to ediot or create new one
		if ( $_SERVER[ 'REQUEST_METHOD' ] != 'POST' )
		{
			
			if ( isset( $_GET[ 'id' ] ) && $_GET[ 'id' ] )
			{
				
				# Query Item
				if ( ! $profile = $model->getProfile( $_GET[ 'id' ] ) )
				{
					
					$model->addError( 'Profile doesnt exists!!' );
					
					return $result;
				}
				
				# Fill form with queried item
				$form->setValue( array( $form->getName() => $profile->getArray() ) );
			}
			
		}
		else 
		{
			
			# Check post nonce
			if ( 	! isset( $_POST[ 'securityToken' ] ) || 
						! $_POST[ 'securityToken' ] ||
						! wp_verify_nonce( $_POST[ 'securityToken' ] ) )
			{
				
				die( 'Access Denied' );
			}
			
			# Upate or insert profile
			$postData = filter_input( INPUT_POST, $form->getName(), FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY );
			
			$form->setValue( array( $form->getName() => $postData ) );
			
			$profile = new \WCFE\Modules\Profiles\Model\Profile( $form->getValue() );
			
			if ( $model->validate( $profile ) )
			{
				if ( $model->saveProfile( $profile ) )
				{
					
					$router = $this->router();
					
					$this->redirect( $router->routeAction() );
					
				}
			}
			
		}
		
		return $result;
	}

	/**
	* put your comment there...
	* 
	*/
	public function listAction()
	{
		if ( ! $this->_checkPermission() )
		{
			
			return;
		}
		
		$model =& $this->getModel();
		$router =& $this->router();
		
		$result[ 'securityNonce' ] = wp_create_nonce();
		$result[ 'profiles' ] = $model->getProfiles();
		
		# Delete
		if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
		{
			
			if ( ! isset( $_POST[ 'securityNonce'] ) || ! wp_verify_nonce( $_POST[ 'securityNonce'] ) )
			{
				$model->addError( 'Invalid security Token' );
				
				return $result;
			}
			
			if ( $model->delete( $_POST[ 'id' ] ) )
			{
				$this->redirect( $router->routeAction() );	
			}
			
		}
		
		return $result;
		
	}
  
} # End class