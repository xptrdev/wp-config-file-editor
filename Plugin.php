<?php
/**
* WP Config File Editor Plugin main Plugin file that is
* loaded and used once compatibility check has been passed
*/


# WCFE Namespace
namespace WCFE;

# Autoloads
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

# Constants
const NO_DIRECT_ACCESS_MESSAGE = 'Access Denied';

# Wordpres Plugin Framework
use WPPFW\Plugin\PluginBase;
use WPPFW\Plugin\Localization;

# Modules
use WCFE\Services;

/**
* 
* @author AHMeD SAiD 
*/
final class Plugin
extends PluginBase 
{
    
    /**
    * 
    */
    const DIR = __DIR__;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private $bindingHooks;
    
    /**
    * put your comment there...
    * 
    * @var Services\EditorModule
    */
    private $editorModule;

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private $extensionsFeatures;
    
    /**
    * Holds ARV Plugin instance
    * 
    * @var Plugin
    */
    private static $instance;
    
    /**
    * put your comment there...
    * 
    * @var Services\ProfilesModule
    */
    private $profilesModule;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private $sysFiltersModule;

    /**
    * put your comment there...
    * 
    * @param mixed $txt
    */
    public static function __( $txt )
    {
        return call_user_func_array( array( self::$instance->getExtension( 'l10n' ), '_' ), func_get_args() );
    }
    
    /**
    * Bootstrap WCFE Plugin
    * 
    * @param string Plugin Main File
    * return void
    */
    protected function __construct($wcfePluginFile) 
    {
        
        $this->extensionsFeatures = new Config\ExtensionsFeatures();

        # Plugin base
        parent::__construct($wcfePluginFile, new Config\Plugin());
    }

    /**
    * put your comment there...
    * 
    */
    public function _ExtensionsFeatures()
    {
        do_action(
            Hooks::ACTION_PLUGIN_EXTENSIONS_FEATURES,
            $this->extensionsFeatures
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function _initializePluggableHooks()
    {
        
        ////////////////////////////////////#$
        
        do_action( Hooks::ACTION_PLUGIN_LOADED, $this );
        
        ////////////////////////////////////#$
        
        
        ////////////////////////////////////#$
        
        if ( $this->bindingHooks ) 
        {
            do_action( Hooks::ACTION_PLUGIN_BINDING_HOOKS, $this );    
        }
        
        ////////////////////////////////////#$    
    }
    
    /**
    * put your comment there...
    * 
    */
    public function _localize()
    {
        $this->loadLocalizationExtension();
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function bootStrap()
    {
        
        # Wordpress backward compatibility
        CompatibleWordpress::loadCompatibilityLayers( $GLOBALS[ 'wp_version' ] );
        
        # Installer
        if ( ! \WCFE\Installer\Installer::run( ) )
        {
            // Could not install !!!!
            return;
        }
        
        # System Plugins
        \WCFE\SysPlugins\Plugins::load()->runPlugins();
        
        # Localization
        add_action('plugins_loaded', array($this, '_localize'), 9);
        
        # MVC components
        # Only admin side is used in this Plugin
        if ( is_admin() ) 
        {
            
            # Editor Module
            $this->editorModule = new Services\EditorModule( $this );
            $this->editorModule->start();
            
            # Profile module
            $this->profilesModule = new Services\ProfilesModule( $this );
            
            # System filters module
            $this->sysFiltersModule = new Services\SysFiltersModule( $this );
            $this->sysFiltersModule->start();
            
            # Profiles is totally relying on AJAX
            # editor Ajax should be here too however I will do that
            # in the subsequence releases
            if ( defined( 'DOING_AJAX' ) && DOING_AJAX )
            {
                $this->profilesModule->start();
            }
            
            $this->bindingHooks = true;
            
        }

        # Start using hooks at this point so that WCFE Extensions can get involved
        add_action('plugins_loaded', array($this, '_ExtensionsFeatures'), 11);
        add_action('plugins_loaded', array($this, '_initializePluggableHooks'), 11);
            
    }

    /**
    * put your comment there...
    * 
    */
    public function & getEditorModule()
    {
        return $this->editorModule;
    }

    /**
    * put your comment there...
    * 
    * @return Config\ExtensionsFeatures
    */
    public function & getExtensionsFeatures()
    {
        return $this->extensionsFeatures;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function & getProfilesModule()
    {
        return $this->profilesModule;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function & getSysFiltersModule()
    {
        return $this->sysFiltersModule;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function & loadLocalizationExtension()
    {
        
        if (!$this->getExtension('l10n'))
        {
            // Load localization extension
            $this->setExtension(
                'l10n', 
                Localization::localize(basename(__DIR__), $this)
            );            
        }
        return $this;
    }
    
    /**
    * put your comment there...
    * 
    */
    public static function & me()
    {
        return self::$instance;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function onCreateServiceFront()
    {
        $this->loadLocalizationExtension();
    }
    
    /**
    * Run WCFE Plugin if not alreayd running
    * 
    * This methos is to construct a new WCFE\Plugin instance if not already
    * instantiated.
    * 
    * @param string WCFE Plugin main file
    * @return PLugin
    */
    public static function plug($wcfePluginFile)
    {
        # Create if not yet created
        if ( ! self::$instance )
        {
            # Get Instance
            self::$instance = new Plugin($wcfePluginFile);
        
            # Load
            self::$instance->bootStrap();
        }
        
        # Return instance
        return self::$instance;
        
    }

}