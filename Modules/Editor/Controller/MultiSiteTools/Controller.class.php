<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\MultiSiteTools;

# Imoprts
use WPPFW\MVC\Controller\Controller;

/**
* 
*/
class MultiSiteToolsController extends Controller {
	 
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
	
	
	/**.
	* put your comment there...
	* 
	*/
	public function SetupAction()
	{
		if ( ! is_super_admin() )
		{
			
			die();
		}
		
		$view = array();
		
		$view[ 'securityNonce' ] = wp_create_nonce();
		
		# Check if Multi site is enabled
		$view[ 'isMultiSite' ] = is_multisite();
			
		if ( $_SERVER[ 'REQUEST_METHOD' ] != 'POST' )
		{
			
			return $view;
		}
		
		# Security Token
		if ( 	! isset( $_POST[ 'securityNonce' ] ) ||
					! $_POST[ 'securityNonce' ] ||
					! wp_verify_nonce( $_POST[ 'securityNonce' ] ) )
		{
			
			die( 'Access Denied !!!' );
		}
		
		$model =& $this->getModel();
		
		# Deactivate all Plugins

		$activePlugins = $model->getActivePlugins();
		deactivate_plugins( $activePlugins );
		
		# Write Config File WP_ALLOW_MULTISITE and Load Line!!
		$editorModel =& $this->getModel( 'Editor' );
		
		# Add Line Generator field
		$editorModel->addField( 'MultiSiteToolPluginLoader' )
		
		# Load config file
		->loadFromConfigFile();
		
		$form =& $editorModel->getForm();
		$allowMultiSiteField =& $form->get( 'MultiSiteAllow' );
		$allowMultiSiteField->setValue( true );
		
		# Create Generator 
		$editorModel->generateConfigFile( $configGenerator );
		
		# This is to add Multi Site code line at the end of the config file
		$configGenerator->processSpecialFields( array( 'MultiSiteToolPluginLoader' ) );
		
		# Regenerate after we configured
		$editorModel->setConfigFileContent( (string) $configGenerator );
		
		# Create Backup
		if ( ! $editorModel->createBackup( $view[ 'restoreBackupUrl' ] ) )
		{
			
			return $view;
		}
		
		# Save config file
		$view[ 'isSuccessed' ] = $editorModel->saveConfigFile();
		
		return $view;
	}
  
} # End class