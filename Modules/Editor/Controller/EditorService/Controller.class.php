<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\EditorService;

# Imoprts
use WPPFW\MVC\Controller\ServiceController;

/**
* 
*/
class EditorServiceController extends ServiceController {
	
	/**
	* put your comment there...
	* 
	*/
	private function _checkPermission()
	{
		
		# Check if permitted to take such action
		if ( 	( ! wp_verify_nonce( $_POST[ 'securityToken' ] ) ) ||
		 
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
	public function preUpdateAction() 
	{
		
		# Check permission
		if ( ! $this->_checkPermission() )
		{
			return null;			
		}

		$result = array( 'restoreUrl' => '' );
							
		# Create backup and get Restore Url back
		
		/** @var \WCFE\Modules\Editor\Model\EditorModel */
		$model =& $this->getModel( 'Editor' );
		$isBackupCreated = $model->createBackup( $result[ 'restoreUrl' ] );
		
		if ( ! $isBackupCreated ) 
		{
			
			# Return errors
			$result[ 'errors' ] = $model->getErrors();
			
			# Clear errors so that never requests won't  repeat it
			$model->clearErrors()->writeState();
			
		}	
		
		return $result;
	}

	/**
	* put your comment there...
	* 
	*/
	public function createSecureKeyAction() 
	{
		
		# Check permission
		if ( ! $this->_checkPermission() )
		{
			return null;
		}
	
		# Generate Secure key
		return wp_generate_password( 64, true, true );
	}

	/**
	* put your comment there...
	* 
	*/
	public function updateConfigFileAction()
	{
		
		# Check access
		if ( ! $this->_checkPermission() ) 
		{
			return;
		}
		
		# Initialize
		$model =& $this->getModel();
		$form =& $model->getForm();
		
		# Fill form with submitted values (Raw Values without any ' " escapes!)
		$formValues = array
		(
			$form->getName() => filter_input( INPUT_POST, $form->getName(), FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY )
		);
		
		$form->setValue( $formValues );
		
		if ( ! $model->validate() )
		{
			
		}
	
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function updateRawConfigFileAction() 
	{
		
	}

	
	/**
	* put your comment there...
	* 
	*/
	public function validateFormAction()
	{
		
		# Check permission
		if ( ! $this->_checkPermission() )
		{
			
			return;
		}
		
		
		# Initialize
		$model =& $this->getModel( 'Editor' );
		$form =& $model->getForm();
		
		# Fill form with submitted values (Raw Values without any ' " escapes!)
		$formValues = array
		(
			$form->getName() => filter_input( INPUT_POST, $form->getName(), FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY )
		);
		
		$form->setValue( $formValues );
				
		$isValid = $model->validate();
		
		# Error messages will be duplicated when redirected and revalidated 
		$model->clearErrors();
		
		return $isValid;
	}

} # End class