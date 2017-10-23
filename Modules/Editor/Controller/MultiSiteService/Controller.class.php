<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\MultiSiteToolsService;

# Imoprts
use WPPFW\MVC\Controller\ServiceController;

/**
* 
*/
class MultiSiteToolsServiceController extends ServiceController {
	
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
			
			die( $this->__( 'Access Denied' ) );
		}
		
		return true;
	}

	/**
	* put your comment there...
	* 
	*/
	public function setupNetworkAction()
	{
		if ( ! $this->_checkPermission() )
		{
			
			return;
		}
		
		$model =& $this->getModel( 'MultiSiteTools' );
		$result = array( 'error' => true );
		
		# Read raw inputs
		$configConsts = filter_input( INPUT_POST, 'configConsts', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY );
		$htaccessCode = filter_input( INPUT_POST, 'htaccessCode', FILTER_UNSAFE_RAW );
		
		# Write config file
		$editorModel =& $this->getModel( 'Editor' );
		
		if ( ! $model->writeMSConfigFileConstants( $editorModel, $configConsts ) )
		{
			
			$result[ 'errorMessages' ] = $model->getErrors();
			
			$model->clearErrors();
			
			return $result;
		}
		
		# Reactivate plugins
		$model->reactivatePlugins();
	  
		# Write htaccess file
		if ( ! $model->writeMSHtAccessFile( $htaccessCode ) )
		{
			
			$result[ 'errorMessages' ] = $model->getErrors();
			
			$model->clearErrors();
			
			return $result;
		}
		
	    $result[ 'redirectTo' ] = home_url( 'wp-login.php' );
		$result[ 'error' ] = false;
		
		return $result;
	}

} # End class