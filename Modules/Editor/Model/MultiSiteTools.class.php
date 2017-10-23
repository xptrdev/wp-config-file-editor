<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class MultiSiteToolsModel extends PluginModel 
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $activePlugins = array();
	
	/**
	* put your comment there...
	* 
	*/
	public function _initialize()
	{
		
	}


	/**
	* put your comment there...
	* 
	*/
	public function deactivatePlugins()
	{
		
		# Store active plugins
		$this->activePlugins = wp_get_active_and_valid_plugins();
		
		deactivate_plugins( $this->activePlugins );
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getHtAccessFileContent()
	{
		return file_get_contents( ABSPATH . '.htaccess' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function reactivatePlugins()
	{
		
		activate_plugins( $this->activePlugins );
		
		$this->activePlugins = array();
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param Editor $model
	*/
	public function writeConfigFileMSInitCode( \WCFE\Modules\Editor\Model\EditorModel & $editorModel )
	{
		
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
		
		if ( ! $editorModel->saveConfigFile() )
		{
            
			$this->addError( $this->__( 'Unable to write config file!' ) );
			
			return false;
		}
		
		return true;
		
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $editorModel
	* @param mixed $constants
	*/
	public function writeMSConfigFileConstants( \WCFE\Modules\Editor\Model\EditorModel & $editorModel, $msConfigConsts )
	{
		
		# Cast  string 'true' and 'false' to boolean
		foreach ( array( 'SUBDOMAIN_INSTALL', 'MULTISITE' ) as $constName )
		{
			if ( isset( $msConfigConsts[ $constName ] ) )
			{
				$msConfigConsts[ $constName ] = ( $msConfigConsts[ $constName ] == 'true' ) ? true : false;
			}
		}
		
		# Load config file and set constants values 
		# from submitted values
		$editorModel ->loadFromConfigFile();
		$form =& $editorModel->getForm();

		$expectedConstsMap = array(
			'MULTISITE' => 'MultiSite',
			'SUBDOMAIN_INSTALL' => 'MultiSiteSubDomainInstall',
			'DOMAIN_CURRENT_SITE' => 'MultiSiteDomainCurrentSite',
			'PATH_CURRENT_SITE' => 'MultiSitePathCurrentSite',
			'SITE_ID_CURRENT_SITE' => 'MultiSiteSiteId',
			'BLOG_ID_CURRENT_SITE' => 'MultiSiteBlogId',
		);
				
		foreach ( $expectedConstsMap as $constName => $fieldName )
		{
			
			$form->get( $fieldName )->setValue( $msConfigConsts[ $constName ] );
			
		}
		
		# Turn WP_ALLOW_MULTISITE off
		$form->get( 'MultiSiteAllow' )->setValue( false );
		
		$editorModel->generateConfigFile( $configGenerator );
		$editorModel->setConfigFileContent( ( string ) $configGenerator );
		
		if ( ! $editorModel->saveConfigFile() )
		{
			
			$this->addError( $this->__( 'Could not write config file!' ) );
			
			return false;
		}
		
		return true;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $code
	*/
	public function writeMSHtAccessFile( $code )
	{
		
		# Return true if running on IIS
		if ( stripos( $_SERVER[ 'SERVER_SOFTWARE' ], 'microsoft-iis' ) !== FALSE )
		{
			return true;
		}
		
		$htaccessFilePath = ABSPATH . '.htaccess';
		
		if ( ! is_readable( $htaccessFilePath ) || ! is_writable( $htaccessFilePath ) )
		{
			$this->addError( $this->__( 'HTAccess file is not witrable' ) );
			
			return false;
		}
		
		if ( ! file_put_contents( $htaccessFilePath, $code ) )
		{
			$this->addError( $this->__( 'Error writing htaccess file!!' ) );
			
			return false;
		}
		
		return true;
	}

}