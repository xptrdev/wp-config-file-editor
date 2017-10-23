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
		if ( ! is_super_admin() )
		{
			
			header( 'HTTP/1.0 4.3 Forbidden' );
			
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
		
		if ( ! isset( $_GET[ 'caller' ] ) )
		{
			die( $this->__( 'Invalid Caller!!!' ) );
		}
		
		$form = new \WCFE\Modules\Profiles\Model\Forms\ProfileForm();
		$model =& $this->getModel();
		$router =& $this->router();
		
		$result[ 'securityToken' ] = wp_create_nonce();
		$result[ 'form' ] =& $form;
		$result[ 'caller' ] = $_GET[ 'caller' ];
		$result[ 'storageId' ] = isset( $_GET[ 'storageId' ] ) ? $_GET[ 'storageId' ] : null;
		
		# Query profile to ediot or create new one
		if ( $_SERVER[ 'REQUEST_METHOD' ] != 'POST' )
		{
			
			$result[ 'isNew' ] = ! isset( $_GET[ 'id' ] ) || ! $_GET[ 'id' ];
			
			if ( isset( $_GET[ 'id' ] ) && $_GET[ 'id' ] )
			{
				
				# Query Item
				if ( ! $profile = $model->getProfile( $_GET[ 'id' ] ) )
				{
					
					$model->addError( $this->__( 'Profile doesnt exists!!' ) );
					
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
				
				$model->addError( $this->__( 'Invalid Access Token' ) );
				
				$this->redirect( $router->routeAction() ) ;
				
				return;
			}
			
			# Upate or insert profile
			$postData = filter_input( INPUT_POST, $form->getName(), FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY );
			
			$result[ 'isNew' ] = ! isset( $postData[ 'id' ] ) || ! $postData[ 'id' ];
			
			$form->setValue( array( $form->getName() => $postData ) );
			
			$profile = new \WCFE\Modules\Profiles\Model\Profile( $form->getValue() );
			
			if ( $model->validate( $profile ) )
			{
				if ( $model->saveProfile( $profile, $result[ 'storageId' ] ) )
				{
					
					$result[ 'profile' ] = $profile->getArray();
					
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
				$model->addError( $this->__( 'Invalid security Token' ) );
				
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