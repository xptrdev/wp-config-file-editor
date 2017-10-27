<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;
use WCFE\Modules\Editor\Lib\ConfigFile\Reader;
use WCFE\Modules\Editor\Lib\ConfigFile\Writer;
use WCFE\Modules\Editor\ConfigFileFieldsNameMap;


/**
* 
*/
class EditorModel
extends PluginModel
{

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $activeProfile;

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $configFileContent;

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $contentDirName;

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private $form;

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $isBackForChange = false;

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $savedVars = array();

    /**
    * put your comment there...
    * 
    */
    public function & clearState() {
        # Clear state
        $this->configFileContent = null;
        $this->savedVars = array();
        $this->isBackForChange = false;
        # Chain
        return $this;
    }

    /**
    * put your comment there...
    * 
    * @param mixed $restoreUrl
    */
    public function createBackup( & $restoreUrl )
    {

        # Create content dir if not already created or it was previously created
        # by deleted for some reason!!
        if ( ! $this->contentDirName || ! file_exists( WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $this->contentDirName ) )
        {

            # Generate unique dir name, thiss is more secure to never accessed from outside
            $contentDirName = 'wcfe-' . md5( uniqid() );

            $contentDir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $contentDirName;

            if ( ! is_writable( WP_CONTENT_DIR ) || ! mkdir( $contentDir, 0755 ) )
            {
                $this->addError( $this->__( 'Couldn\'t create Content dir:: %s. Content directory is not writable!!', $contentDir ) );

                return false;
            }

            # Create HTAccess file
            if ( ! copy( __DIR__ . DIRECTORY_SEPARATOR . 'Editor' . DIRECTORY_SEPARATOR . 'htaccess.Template', 
            $contentDir . DIRECTORY_SEPARATOR . '.htaccess' ) ) 
            {

                $this->addError( $this->__( 'Could\'t create htaccess file to protect wcfe content dir from being access by public' ) );

                return false;
            }

            # Store content dir name
            $this->contentDirName = $contentDirName;

        }


        # Initialize backup vars
        $contentDir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $this->contentDirName;
        $dataFileName = EmergencyRestore::BACKUP_DATA_FILE_NAME;
        $dataFilePath = $contentDir . DIRECTORY_SEPARATOR . $dataFileName;
        $configFileContent = base64_encode( file_get_contents( ABSPATH . DIRECTORY_SEPARATOR . 'wp-config.php' ) );
        $secureKey = md5( uniqid( ) );
        $backupFilePath = $contentDir . DIRECTORY_SEPARATOR . EmergencyRestore::BACKUP_FILE_NAME;
        $cleanAbsPath = substr( ABSPATH, 0, strlen( ABSPATH ) - 1 );

        # Create backup file
        ob_start();
        require __DIR__ . DIRECTORY_SEPARATOR . 'Editor' . DIRECTORY_SEPARATOR . 'BackupFile.Template.php';

        if ( ! file_put_contents( $backupFilePath, ob_get_clean() ) )
        {
            $this->addError( $this->__( 'Could not create backup file: %s', $backupFilePath ) );

            return false;
        }		

        $backupFileHash = md5( file_get_contents( $backupFilePath ) );

        # Create backup data file
        ob_start();
        require __DIR__ . DIRECTORY_SEPARATOR . 'Editor' . DIRECTORY_SEPARATOR . 'BackupDBFile.Template.php';

        if ( ! file_put_contents( $dataFilePath, ob_get_clean() ) )
        {
            $this->addError( $this->__( 'Could not create backup Data file: %s', $dataFilePath ) );

            return false;
        }

        # Returns Restore Url
        $restoreUrlParams = array
        (
            'absPath' => $cleanAbsPath, /* Remove extra slash at the end! */
            'contentDir' => $contentDir,
            'secureKey' => $secureKey,
            'dataFileSecure' => md5( file_get_contents( $dataFilePath ) )
        );
        $restoreUrl = WP_PLUGIN_URL . '/wp-config-file-editor/Public/Restore.php?' . http_build_query( $restoreUrlParams );

        # Successed!
        return true;
    }

    /**
    * put your comment there...
    * 
    */
    public function deleteEmergencyBackup()
    {

        $contentDir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $this->contentDirName;

        if ( ! file_exists( $contentDir ) )
        {

            $this->addError( $this->__( 'Content directory doesn\'t exists' ) );

            return false;
        }

        # Delete backup files
        $filesToDelete = array
        (
            EmergencyRestore::BACKUP_DATA_FILE_NAME,
            EmergencyRestore::BACKUP_FILE_NAME,
        );

        foreach ( $filesToDelete as $fileName )
        {

            $filePath = $contentDir . DIRECTORY_SEPARATOR . $fileName;

            if ( file_exists( $filePath ) )
            {
                unlink( $filePath );
            }

        }

        return true;
    }

    /**
    * put your comment there...
    * 
    * @param mixed $generator
    * @return EditorModel
    */
    public function & generateConfigFile( & $generator = null )
    {

        $form = $this->getForm();
        
        $configWriter = apply_filters(\WCFE\Hooks::FILTER_MODEL_EDITOR_CREATE_CONFIG_WRITER_OBJECT, null, $form);
        
        if (!$configWriter)
        {
            # Get generator instance
            $configWriter = new Writer($form);
        }        

        # Return generator reference
        $generator = $configWriter;

        return $this;
    }

    /**
    * put your comment there...
    * 
    */
    public function getActiveProfileId()
    {
        return $this->activeProfile;
    }

    /**
    * put your comment there...
    * 
    */
    public function getContentDir()
    {
        return $this->contentDirName;
    }

    /**
    * put your comment there...
    * 
    */
    public function getConfigFileContent() {
        return $this->configFileContent;
    }

    /**
    * put your comment there...
    * 
    */
    public function getInfo()
    {
        $info = array();

        # Discover paths
        $info[ 'paths' ] = array
        (
            'absPath' => ABSPATH,
            'pluginsDir' => WP_PLUGIN_DIR,
            'pluginsDirUrl' => WP_PLUGIN_URL,
            'contentDir' => WP_CONTENT_DIR,
            'contentDirUrl' => WP_CONTENT_URL,
            'adminUrl' => admin_url(),
            'siteUrl' => home_url(),
        );

        if ( is_multisite() )
        {
            $info[ 'paths' ][ 'networkAdminUrl' ] = network_admin_url();
            $info[ 'paths' ][ 'networkSiteUrl' ] = network_site_url();
        }

        return $info;
    }

    /**
    * put your comment there...
    * 
    */
    public function & getForm() {
        return $this->form;
    }

    /**
    * put your comment there...
    * 
    */
    public function hasActiveProfile()
    {
        return $this->getActiveProfileId() ? true : false;
    }

    /**
    * put your comment there...
    * 
    */
    public function isBackForChange() {
        return $this->isBackForChange;
    }

    /**
    * put your comment there...
    * 
    */
    protected function initialize()
    {
        $this->form = new Forms\ConfigFileForm();
    }

    /**
    * put your comment there...
    * 
    * @param mixed $values
    */
    public function & loadForm( $values )
    {
        $form =& $this->getForm();

        $form->setValue( array( $form->getName() => $values ) );

        return $this;
    }

    /**
    * put your comment there...
    * 
    */
    public function & loadFromConfigFile() 
    {

        // Create Config Reader object
        $configReader = apply_filters(\WCFE\Hooks::FILTER_MODEL_EDITOR_CREATE_CONFIG_READER_OBJECT, null);
        
        if (!$configReader)
        {
            $configReader = new Reader();
        }
        
        // Get values
        $values = $configReader->getValues();
        
        # Fill form
        $this->form->setValue(array($this->form->getName() => $values));

        return $this;
    }

    /**
    * put your comment there...
    * 
    */
    public function & loadFromSaveState() 
    {

        # Load model form from saved vars
        $this->getForm()->setValue( $this->savedVars );

        return $this;
    }

    /**
    * put your comment there...
    * 
    * @param mixed $fieldList
    */
    public static function makeClassesList($list)
    {

        $classesList = array();

        foreach ( $list as $ns => $nsClasses )
        {
            foreach ( $nsClasses as $name )
            {

                # Append name to namespace to get full class name
                $class = "{$ns}\\{$name}";

                $classesList[ $class ] = $name;

            }
        }

        return $classesList;
    }

    /**
    * put your comment there...
    * 
    */
    public function readWPConfigFileContent()
    {

        $configFilePath = ABSPATH . 'wp-config.php';

        if ( ! is_readable( $configFilePath ) )
        {

            $this->addError( $this->__( 'Couldn\'t read wp-config.php file' ) );

            return false;
        }

        $configContent = file_get_contents( $configFilePath );

        return $configContent;
    }

    /**
    * put your comment there...
    * 
    * @param mixed $profileId
    */
    public function & setActiveProfile( $profileId )
    {

        $this->activeProfile = $profileId;

        return $this;
    }

    /**
    * put your comment there...
    * 
    * @param mixed $content
    */
    public function & setConfigFileContent($content) 
    {
        # Set
        $this->configFileContent =& $content;
        # Chain
        return $this;
    }

    /**
    * put your comment there...
    * 
    */
    public function saveConfigFile() 
    {

        # Config File path
        $configFilePath = ABSPATH . 'wp-config.php';

        # Check config file permissions
        if ( ! is_readable( $configFilePath ) || ! is_writable( $configFilePath ) )
        {
            $this->addError( $this->__( 'Config file is not writable: %s', $configFilePath ) );

            return false;
        }

        # Save config file
        if ( ! file_put_contents( $configFilePath, $this->getConfigFileContent() ) )
        {

            $this->addError( $this->__( 'Could not write config file: %s', $configFilePath ) );

            return false;
        }

        return true;
    }

    /**
    * put your comment there...
    * 
    */
    public function & saveSubmittedVars() 
    {

        $form =& $this->getForm();

        # Set back for changes flag to true
        $this->isBackForChange = true;

        $fieldNamesToSave = ConfigFileFieldsNameMap::getAllNames();
        
        # Save form fields to be used later by 
        # Don't save all fields, just related to config file
        $vars = array_intersect_key($form->getValue(), array_flip($fieldNamesToSave));

        # Cache into model state to be used when getting back later
        $this->savedVars = array($form->getName() => $vars);

        return $this;
    }

    /**
    * put your comment there...
    * 
    */
    public function & unsetActiveProfile()
    {

        $this->activeProfile = null;

        return $this;
    }

    /**
    * put your comment there...
    * 
    */
    public function validate() 
    {

        $form =& $this->getForm();
        $valid = false;

        # Validate the form
        # If its a valid form try to open databse connection using 
        # form database parameters

        if ( $form->validate() ) 
        {

            # Get database connection parameters.
            $user       = $form->get(ConfigFileFieldsNameMap::DB_USER)->getValue();
            $password   = $form->get(ConfigFileFieldsNameMap::DB_PASSWORD)->getValue();
            $name       = $form->get(ConfigFileFieldsNameMap::DB_NAME)->getValue();
            $host       = $form->get(ConfigFileFieldsNameMap::DB_HOST)->getValue();
            $port       = $form->get(ConfigFileFieldsNameMap::DB_PORT)->getValue();

            # Test database parameters
            # using mysql extension or mysqli is mysql not available
            if ( function_exists( 'mysqli_init' ) ) 
            { # Use Mysqli

                # Connection successed
                if ( $clink = @ mysqli_connect( $host, $user, $password, null, $port ) ) 
                {
                    # Db Selection successed
                    if ( @ mysqli_select_db( $clink, $name ) ) 
                    {
                        # Return valid
                        $valid = true;
                    }
                    else 
                    {
                        # Could not select database
                        $this->addError( $this->__( 'Database doesn\' exists!' ) );
                    }
                    # Close connection
                    mysqli_close( $clink );
                }
                else 
                {
                    # Could not connect
                    $this->addError( $this->__( 'Couldn\'t connect to database server!' ) );
                }
            }
            else if ( function_exists( 'mysql_connect' ) ) 
            {
                # Connection successed
                if ( $clink = @ mysql_connect( $host, $user, $password ) )
                {
                    # Db Selection successed
                    if ( @ mysql_select_db( $name, $clink ) )
                    {
                        # Return valid
                        $valid = true;
                    }
                    else 
                    {
                        # Could not select database
                        $this->addError( $this->__( 'Database doesn\' exists!' ) );
                    }
                    # Close connection
                    mysql_close( $clink );
                }
                else 
                {
                    # Could not connect
                    $this->addError( $this->__( 'Couldn\'t connect to database server!' ) );
                }
            }
            else 
            {
                # Doesn't supported
                $this->addError( $this->__( 'Could not use mysql or mysqli extension for testing database connection! DB provider doesn\' supported!!' ) );
            }
        }
        # Return status
        return $valid;
    }

}
