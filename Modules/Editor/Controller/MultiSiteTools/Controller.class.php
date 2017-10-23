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
	
	/**.
	* put your comment there...
	* 
	*/
	public function SetupAction()
	{
		if ( ! is_super_admin() )
		{
			
			die( $this->__( 'Access Denied' ) );
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
			
			die( $this->__( 'Access Denied' ) );
		}
		
		$model =& $this->getModel();
		
		# Write Config File WP_ALLOW_MULTISITE and Load Line!!
		$editorModel =& $this->getModel( 'Editor' );
		
		# Create Backup
		if ( ! $editorModel->createBackup( $view[ 'restoreBackupUrl' ] ) )
		{
			
			return $view;
		}
		
		# Save config file
		$view[ 'isSuccessed' ] = $model->writeConfigFileMSInitCode( $editorModel );
		
		# Deactivate all Plugins
		$model->deactivatePlugins();
		
		return $view;
	}
  
  /**
  * put your comment there...
  * 
  */
  public function SetupNetworkAction()
  {
		
		if ( ! is_super_admin() )
		{
			
			die( $this->__( 'Access Denied' ) );
		}

		$model =& $this->getModel();
		
		return array
		( 
			'htaccessCode' => $model->getHtAccessFileContent(),
			'securityNonce' => wp_create_nonce(),
		);
		
  }

} # End class