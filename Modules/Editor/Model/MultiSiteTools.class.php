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
    * 
    */
    const SEPCIAL_FIELD_MULTISITE_TOOLS_PLUGIN_LOADER = '__sf-multisite-tools-plugin-loader__';
    
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
	public function writeConfigFileMSInitCode(
        \WCFE\Modules\Editor\Model\EditorModel & $editorModel
        )
	{
		
		$form =& $editorModel->loadFromConfigFile()->getForm();
        
        // Set allow multi site constant to true so that Wordpress
        // enable Network setup
		$allowMultiSiteField =& $form->get(ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE);
		$allowMultiSiteField->setValue(true);
		
		# Create Generator 
		$editorModel->generateConfigFile($configGenerator);
		
		# This is to add Multi Site code line at the end of the config file
		$configGenerator->processSpecialFields(
            array
            (
                self::SEPCIAL_FIELD_MULTISITE_TOOLS_PLUGIN_LOADER => ConfigFile\Fields\CustomContentField::create(
                    __DIR__ . DIRECTORY_SEPARATOR . 'ConfigFile' . 
                    DIRECTORY_SEPARATOR . 'Fields' . DIRECTORY_SEPARATOR .
                    'Templates' . DIRECTORY_SEPARATOR .
                    'MultiSiteToolPluginLoader.customcontent.php'
                )
            )
        );
		
		# Regenerate after we configured
		$editorModel->setConfigFileContent((string) $configGenerator);
		
		if (!$editorModel->saveConfigFile())
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
	public function writeMSConfigFileConstants(
        \WCFE\Modules\Editor\Model\EditorModel & $editorModel,
        $msConfigConsts
        )
	{
		
		# Cast  string 'true' and 'false' to boolean
        $configFields = array
        (
            ConfigFileNamesMap::SUBDOMAIN_INSTALL,
            ConfigFileNamesMap::MULTISITE,
        );
        
		foreach ($configFields as $constName)
		{
			if (isset($msConfigConsts[$constName]))
			{
				$msConfigConsts[$constName] = ($msConfigConsts[$constName] == 'true') ? true : false;
			}
		}
		
		# Load config file and set constants values 
		# from submitted values
		$editorModel ->loadFromConfigFile();
		$form =& $editorModel->getForm();

		foreach ($msConfigConsts as $constName => $constValue)
		{
			$form->get($constName)->setValue($msConfigConsts[$constName]);
		}
		
		# Turn WP_ALLOW_MULTISITE off
		$form->get(ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE)->setValue(false);
		
		$editorModel->generateConfigFile($configGenerator);
		$editorModel->setConfigFileContent(( string ) $configGenerator);
		
		if (!$editorModel->saveConfigFile())
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