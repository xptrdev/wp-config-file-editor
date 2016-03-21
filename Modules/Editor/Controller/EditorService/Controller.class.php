<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\EditorService;

# Imoprts
use WPPFW\MVC\Controller\ServiceController;
use WCFE\Modules\Editor\Model\Forms;

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
		if ( 	
					( ! isset( $_POST[ 'securityToken' ] ) ) ||
					
					( ! $_POST[ 'securityToken' ] ) ||
					
					( ! wp_verify_nonce( $_POST[ 'securityToken' ] ) ) ||
		 
					( ! is_super_admin() ) )
		{
			
			header( 'HTTP/1.0 4.3 Forbidden' );
			
			die( $this->_( 'Access Denied' ) );
		}
		
		return true;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function postUpdateAction()
	{
		
		# Check permission
		if ( ! $this->_checkPermission() )
		{
			return null;			
		}
		
		# Delete backup
		$model =& $this->getModel( 'Editor' );
		
		$model->deleteEmergencyBackup();
		
		$model->clearErrors();
		
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
			
			# avoid displayed error when redirected by making normal requetss
			$model->clearErrors();
			
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
	
		$count = $_POST[ 'count' ];
		$list  = array();
		
		while ( $count )
		{
			$list[ ] = wp_generate_password( 64, true, true );
			
			$count --;
		}
		
		# Generate Secure key
		return $list;
	}

	/**
	* put your comment there...
	* 
	*/
	public function generateCookieHashAction()
	{
		
		if ( ! $this->_checkPermission() )
		{
			return;
		}
		
		return md5( uniqid() );
	}

	/**
	* put your comment there...
	* 
	*/
	public function getSystemPathAction()
	{
		
		# Check permission
		if ( ! $this->_checkPermission() )
		{
			return null;
		}
		
		# Get dirs list for current 

		$dirsList = glob( "{$_POST[ 'path' ]}*", GLOB_ONLYDIR );
		
		return array( 'list' => $dirsList );
	}
	

	/**
	* put your comment there...
	* 
	*/
	public function setActiveProfileAction()
	{

		# Check permission
		if ( ! $this->_checkPermission() )
		{
			return null;
		}
		
		$model =& $this->getModel( 'Editor' );
		
		$model->setActiveProfile( $_POST[ 'activeProfile' ] );
		
		return true;
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
		$model =& $this->getModel( 'Editor' );
		$form =& $model->getForm();
		$result = array();
		
		# Fill form with submitted values (Raw Values without any ' " escapes!)
		$formValues = array
		(
			$form->getName() => filter_input( INPUT_POST, $form->getName(), FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY )
		);
		
		$form->setValue( $formValues );
		
		if ( $model->validate() )
		{
			
			# Generate config file from submitted fields
			$model->generateConfigFile( $configGenerator );
			$model->setConfigFileContent( (string) $configGenerator );
			
			# If failr return errors back
			if ( ! $model->saveConfigFile() )
			{
				
				$result[ 'errors' ] = $model->getErrors();
				
				# avoid displayed error when redirected by making normal requetss
				$model->clearErrors();
			}
			
		}
		
	  return $result;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function updateRawConfigFileAction() 
	{
		
		# Check access
		if ( ! $this->_checkPermission() ) 
		{
			
			return;
		}
		
		# Get model
		$model =& $this->getModel( 'Editor' );
		$form = new Forms\RawConfigFileForm();
		$result = array();
	
		# Fill form with value
		$formValues = array
		( 
			'rawConfigFile' => filter_input( INPUT_POST, 'rawConfigFile', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY ) 
		);
		
		$form->setValue( $formValues );
		
		# Load submitted raw config file 
		$model->setConfigFileContent( $form->get( 'configFileContent' )->getValue() );
		
		# Save
		if ( ! $model->saveConfigFile() )
		{
			
			$result[ 'errors' ] = $model->getErrors();
			
			# avoid displayed error when redirected by making normal requetss
			$model->clearErrors();
			
		}
	
		return $result;
		
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