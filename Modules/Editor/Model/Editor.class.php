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
class EditorModel extends PluginModel {

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

        # Get generator instance
        $configFile = new ConfigFile\Templates\Master\Master( $this->getForm() );

        # Return generator reference
        $generator = $configFile;

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

        $values = array();

        # Auth keys
        $values[ConfigFileFieldsNameMap::AUTH_KEY] =                                defined(ConfigFileNamesMap::AUTH_KEY) ? constant(ConfigFileNamesMap::AUTH_KEY) : null;
        $values[ConfigFileFieldsNameMap::AUTH_SALT] =                               defined(ConfigFileNamesMap::AUTH_SALT) ? constant(ConfigFileNamesMap::AUTH_SALT) : null;
        $values[ConfigFileFieldsNameMap::LOGGED_IN_KEY] =                           defined(ConfigFileNamesMap::LOGGED_IN_KEY) ? constant(ConfigFileNamesMap::LOGGED_IN_KEY) : null;
        $values[ConfigFileFieldsNameMap::LOGGED_IN_SALT] =                          defined(ConfigFileNamesMap::LOGGED_IN_SALT) ? constant(ConfigFileNamesMap::LOGGED_IN_SALT) : null;
        $values[ConfigFileFieldsNameMap::NONCE_KEY] =                               defined(ConfigFileNamesMap::NONCE_KEY) ? constant(ConfigFileNamesMap::NONCE_KEY) : null;
        $values[ConfigFileFieldsNameMap::NONCE_SALT] =                              defined(ConfigFileNamesMap::NONCE_SALT) ? constant(ConfigFileNamesMap::NONCE_SALT) : null;
        $values[ConfigFileFieldsNameMap::SECURE_AUTH_KEY] =                         defined(ConfigFileNamesMap::SECURE_AUTH_KEY) ? constant(ConfigFileNamesMap::SECURE_AUTH_KEY) : null;
        $values[ConfigFileFieldsNameMap::SECURE_AUTH_SALT] =                        defined(ConfigFileNamesMap::SECURE_AUTH_SALT) ? constant(ConfigFileNamesMap::SECURE_AUTH_SALT) : null;

        # Cookies
        $values[ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH] =                       defined(ConfigFileNamesMap::ADMIN_COOKIE_PATH) ? constant(ConfigFileNamesMap::ADMIN_COOKIE_PATH) : null;
        $values[ConfigFileFieldsNameMap::AUTH_COOKIE] =                             defined(ConfigFileNamesMap::AUTH_COOKIE) ? constant(ConfigFileNamesMap::AUTH_COOKIE) : null;
        $values[ConfigFileFieldsNameMap::COOKIE_DOMAIN] =                           defined(ConfigFileNamesMap::COOKIE_DOMAIN) ? constant(ConfigFileNamesMap::COOKIE_DOMAIN) : null;
        $values[ConfigFileFieldsNameMap::COOKIEHASH] =                              defined(ConfigFileNamesMap::COOKIEHASH) ? constant(ConfigFileNamesMap::COOKIEHASH) : null;
        $values[ConfigFileFieldsNameMap::LOGGED_IN_COOKIE] =                        defined(ConfigFileNamesMap::LOGGED_IN_COOKIE) ? constant(ConfigFileNamesMap::LOGGED_IN_COOKIE) : null;
        $values[ConfigFileFieldsNameMap::PASS_COOKIE] =                             defined(ConfigFileNamesMap::PASS_COOKIE) ? constant(ConfigFileNamesMap::PASS_COOKIE) : null;
        $values[ConfigFileFieldsNameMap::COOKIEPATH] =                              defined(ConfigFileNamesMap::COOKIEPATH) ? constant(ConfigFileNamesMap::COOKIEPATH) : null;
        $values[ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH] =                     defined(ConfigFileNamesMap::PLUGINS_COOKIE_PATH) ? constant(ConfigFileNamesMap::PLUGINS_COOKIE_PATH) : null;
        $values[ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE] =                      defined(ConfigFileNamesMap::SECURE_AUTH_COOKIE) ? constant(ConfigFileNamesMap::SECURE_AUTH_COOKIE) : null;
        $values[ConfigFileFieldsNameMap::SITECOOKIEPATH] =                          defined(ConfigFileNamesMap::SITECOOKIEPATH) ? constant(ConfigFileNamesMap::SITECOOKIEPATH) : null;
        $values[ConfigFileFieldsNameMap::TEST_COOKIE] =                             defined(ConfigFileNamesMap::TEST_COOKIE) ? constant(ConfigFileNamesMap::TEST_COOKIE) : null;
        $values[ConfigFileFieldsNameMap::USER_COOKIE] =                             defined(ConfigFileNamesMap::USER_COOKIE) ? constant(ConfigFileNamesMap::USER_COOKIE) : null;

        # Cron
        $values[ConfigFileFieldsNameMap::DISABLE_WP_CRON] =                         defined(ConfigFileNamesMap::DISABLE_WP_CRON) ? constant(ConfigFileNamesMap::DISABLE_WP_CRON) : null;
        $values[ConfigFileFieldsNameMap::ALTERNATE_WP_CRON] =                       defined(ConfigFileNamesMap::ALTERNATE_WP_CRON) ? constant(ConfigFileNamesMap::ALTERNATE_WP_CRON) : null;
        $values[ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT] =                    defined(ConfigFileNamesMap::WP_CRON_LOCK_TIMEOUT) ? constant(ConfigFileNamesMap::WP_CRON_LOCK_TIMEOUT) : null;

        # Database
        $databaseHost = explode(':', constant(ConfigFileNamesMap::DB_HOST));

        $values[ConfigFileFieldsNameMap::WP_ALLOW_REPAIR] =                         defined(ConfigFileNamesMap::WP_ALLOW_REPAIR) ? constant(ConfigFileNamesMap::WP_ALLOW_REPAIR) : null;
        $values[ConfigFileFieldsNameMap::DB_CHARSET] =                              defined(ConfigFileNamesMap::DB_CHARSET) ? constant(ConfigFileNamesMap::DB_CHARSET) : null;
        $values[ConfigFileFieldsNameMap::DB_COLLATE] =                              defined(ConfigFileNamesMap::DB_COLLATE) ? constant(ConfigFileNamesMap::DB_COLLATE) : null;
        $values[ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES] =            defined(ConfigFileNamesMap::DO_NOT_UPGRADE_GLOBAL_TABLES) ? constant(ConfigFileNamesMap::DO_NOT_UPGRADE_GLOBAL_TABLES) : null;
        $values[ConfigFileFieldsNameMap::DB_HOST] =                                 $databaseHost[0];
        $values[ConfigFileFieldsNameMap::DB_PORT] =                                 isset($databaseHost[1]) ? $databaseHost[1] : null;
        $values[ConfigFileFieldsNameMap::DB_NAME] =                                 defined(ConfigFileNamesMap::DB_NAME) ? constant(ConfigFileNamesMap::DB_NAME) : null;
        $values[ConfigFileFieldsNameMap::DB_PASSWORD] =                             defined(ConfigFileNamesMap::DB_PASSWORD) ? constant(ConfigFileNamesMap::DB_PASSWORD) : null;
        $values[ConfigFileFieldsNameMap::DB_TABLE_PREFIX] =                         isset($GLOBALS[ConfigFileNamesMap::DB_TABLE_PREFIX]) ? $GLOBALS[ConfigFileNamesMap::DB_TABLE_PREFIX] : null;
        $values[ConfigFileFieldsNameMap::DB_USER] =                                 defined(ConfigFileNamesMap::DB_USER) ? constant(ConfigFileNamesMap::DB_USER) : null;

        # Debug
        $values[ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS] =                     defined(ConfigFileNamesMap::CONCATENATE_SCRIPTS) ? constant(ConfigFileNamesMap::CONCATENATE_SCRIPTS) : null;
        $values[ConfigFileFieldsNameMap::SAVEQUERIES] =                             defined(ConfigFileNamesMap::SAVEQUERIES) ? constant(ConfigFileNamesMap::SAVEQUERIES) : null;
        $values[ConfigFileFieldsNameMap::SCRIPT_DEBUG] =                            defined(ConfigFileNamesMap::SCRIPT_DEBUG) ? constant(ConfigFileNamesMap::SCRIPT_DEBUG) : null;
        $values[ConfigFileFieldsNameMap::WP_DEBUG] =                                defined(ConfigFileNamesMap::WP_DEBUG) ? constant(ConfigFileNamesMap::WP_DEBUG) : null;
        $values[ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY] =                        defined(ConfigFileNamesMap::WP_DEBUG_DISPLAY) ? constant(ConfigFileNamesMap::WP_DEBUG_DISPLAY) : null;
        $values[ConfigFileFieldsNameMap::WP_DEBUG_LOG] =                            defined(ConfigFileNamesMap::WP_DEBUG_LOG) ? constant(ConfigFileNamesMap::WP_DEBUG_LOG) : null;

        # Loclization
        $values[ConfigFileFieldsNameMap::WPLANG] =                                  defined(ConfigFileNamesMap::WPLANG) ? constant(ConfigFileNamesMap::WPLANG) : null;
        $values[ConfigFileFieldsNameMap::WPLANG_DIR] =                              defined(ConfigFileNamesMap::WPLANG_DIR) ? constant(ConfigFileNamesMap::WPLANG_DIR) : null;

        # Maintenance
        $values[ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT] =                     defined(ConfigFileNamesMap::WP_MAX_MEMORY_LIMIT) ? constant(ConfigFileNamesMap::WP_MAX_MEMORY_LIMIT) : null;
        $values[ConfigFileFieldsNameMap::WP_MEMORY_LIMIT] =                         defined(ConfigFileNamesMap::WP_MEMORY_LIMIT) ? constant(ConfigFileNamesMap::WP_MEMORY_LIMIT) : null;
        $values[ConfigFileFieldsNameMap::WP_CACHE] =                                defined(ConfigFileNamesMap::WP_CACHE) ? constant(ConfigFileNamesMap::WP_CACHE) : 0;

        # Multisites
        $values[ConfigFileFieldsNameMap::MULTISITE] =                               defined(ConfigFileNamesMap::MULTISITE) ? constant(ConfigFileNamesMap::MULTISITE) : null;
        $values[ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE] =                      defined(ConfigFileNamesMap::WP_ALLOW_MULTISITE) ? constant(ConfigFileNamesMap::WP_ALLOW_MULTISITE) : null;
        $values[ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE] =                    defined(ConfigFileNamesMap::BLOG_ID_CURRENT_SITE) ? constant(ConfigFileNamesMap::BLOG_ID_CURRENT_SITE) : null;
        $values[ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE] =                     defined(ConfigFileNamesMap::DOMAIN_CURRENT_SITE) ? constant(ConfigFileNamesMap::DOMAIN_CURRENT_SITE) : null;
        $values[ConfigFileFieldsNameMap::PATH_CURRENT_SITE] =                       defined(ConfigFileNamesMap::PATH_CURRENT_SITE) ? constant(ConfigFileNamesMap::PATH_CURRENT_SITE) : null;
        $values[ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID] =                      defined(ConfigFileNamesMap::PRIMARY_NETWORK_ID) ? constant(ConfigFileNamesMap::PRIMARY_NETWORK_ID) : null;
        $values[ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE] =                    defined(ConfigFileNamesMap::SITE_ID_CURRENT_SITE) ? constant(ConfigFileNamesMap::SITE_ID_CURRENT_SITE) : null;
        $values[ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL] =                       defined(ConfigFileNamesMap::SUBDOMAIN_INSTALL) ? constant(ConfigFileNamesMap::SUBDOMAIN_INSTALL) : null;

        # Post
        $values[ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL] =                       defined(ConfigFileNamesMap::AUTOSAVE_INTERVAL) ? constant(ConfigFileNamesMap::AUTOSAVE_INTERVAL) : null;
        $values[ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS] =                        defined(ConfigFileNamesMap::EMPTY_TRASH_DAYS) ? constant(ConfigFileNamesMap::EMPTY_TRASH_DAYS) : null;

        # This must presented as either 0 or 1 so that it will be checked if its presented as number (e.g 10, 30, etc...)
        $values[ConfigFileFieldsNameMap::WP_POST_REVISIONS] =                       defined(ConfigFileNamesMap::WP_POST_REVISIONS) ? 
                                                                                    (
                                                                                        is_bool(constant(ConfigFileNamesMap::WP_POST_REVISIONS)) ?
                                                                                        0 : constant(ConfigFileNamesMap::WP_POST_REVISIONS)
                                                                                    )
                                                                                    : null;
                                                                                    
        $values[ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS] =                defined(ConfigFileNamesMap::WP_POST_REVISIONS) ? (bool) constant(ConfigFileNamesMap::WP_POST_REVISIONS) : null;

        # Proxy
        $values[ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS] =                   (defined(ConfigFileNamesMap::WP_PROXY_BYPASS_HOSTS) && constant(ConfigFileNamesMap::WP_PROXY_BYPASS_HOSTS)) ?
                                                                                    explode(',', constant(ConfigFileNamesMap::WP_PROXY_BYPASS_HOSTS)) :
                                                                                    array();
                                                                                    
        $values[ConfigFileFieldsNameMap::WP_PROXY_HOST] =                           defined(ConfigFileNamesMap::WP_PROXY_HOST) ? constant(ConfigFileNamesMap::WP_PROXY_HOST) : null;
        $values[ConfigFileFieldsNameMap::WP_PROXY_PASSWORD] =                       defined(ConfigFileNamesMap::WP_PROXY_PASSWORD) ? constant(ConfigFileNamesMap::WP_PROXY_PASSWORD) : null;
        $values[ConfigFileFieldsNameMap::WP_PROXY_PORT] =                           defined(ConfigFileNamesMap::WP_PROXY_PORT) ? constant(ConfigFileNamesMap::WP_PROXY_PORT) : null;
        $values[ConfigFileFieldsNameMap::WP_PROXY_USERNAME] =                       defined(ConfigFileNamesMap::WP_PROXY_USERNAME) ? constant(ConfigFileNamesMap::WP_PROXY_USERNAME) : null;

        # Security
        $values[ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS] =                     (defined(ConfigFileNamesMap::WP_ACCESSIBLE_HOSTS) && constant(ConfigFileNamesMap::WP_ACCESSIBLE_HOSTS)) ?
                                                                                    explode( ',', constant(WP_ACCESSIBLE_HOSTS)) :
                                                                                    array();
                                                                                    
        $values[ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS] =                defined(ConfigFileNamesMap::ALLOW_UNFILTERED_UPLOADS) ? constant(ConfigFileNamesMap::ALLOW_UNFILTERED_UPLOADS) : null;
        $values[ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL] =                  defined(ConfigFileNamesMap::WP_HTTP_BLOCK_EXTERNAL) ? constant(ConfigFileNamesMap::WP_HTTP_BLOCK_EXTERNAL) : null;
        $values[ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT] =                      defined(ConfigFileNamesMap::DISALLOW_FILE_EDIT) ? constant(ConfigFileNamesMap::DISALLOW_FILE_EDIT) : null;
        $values[ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML] =                defined(ConfigFileNamesMap::DISALLOW_UNFILTERED_HTML) ? constant(ConfigFileNamesMap::DISALLOW_UNFILTERED_HTML) : null;
        $values[ConfigFileFieldsNameMap::FORCE_SSL_ADMIN] =                         defined(ConfigFileNamesMap::FORCE_SSL_ADMIN) ? constant(ConfigFileNamesMap::FORCE_SSL_ADMIN) : null;
        $values[ConfigFileFieldsNameMap::FORCE_SSL_LOGIN] =                         defined(ConfigFileNamesMap::FORCE_SSL_LOGIN) ? constant(ConfigFileNamesMap::FORCE_SSL_LOGIN) : null;

        # Upgrade
        # auto core
        $updateAutoCore = null;

        if (defined(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE))
        {

            # Transform the value to string 
            # (BOOL) TRUE => 'true'
            # (BOOL) FALSE => 'false'
            # (STRING) 'minor' => 'minor' -- no changes
            if (is_bool(constant(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE)))
            {
                $updateAutoCore = constant(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE) ? 'true' : 'false';
            }
            else
            {
                $updateAutoCore = constant(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE);
            }

        }

        $values[ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE] =                      $updateAutoCore;
        $values[ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED] =               defined(ConfigFileNamesMap::AUTOMATIC_UPDATER_DISABLED) ? constant(AUTOMATIC_UPDATER_DISABLED) : null;
        $values[ConfigFileFieldsNameMap::DISALLOW_FILE_MODS] =                       defined(ConfigFileNamesMap::DISALLOW_FILE_MODS) ? constant(ConfigFileNamesMap::DISALLOW_FILE_MODS) : null;
        $values[ConfigFileFieldsNameMap::FS_METHOD] =                                defined(ConfigFileNamesMap::FS_METHOD) ? constant(ConfigFileNamesMap::FS_METHOD) : null;
        $values[ConfigFileFieldsNameMap::FTP_BASE] =                                 defined(ConfigFileNamesMap::FTP_BASE) ? constant(ConfigFileNamesMap::FTP_BASE) : null;
        $values[ConfigFileFieldsNameMap::FTP_CONTENT_DIR] =                          defined(ConfigFileNamesMap::FTP_CONTENT_DIR) ? constant(ConfigFileNamesMap::FTP_CONTENT_DIR) : null;
        $values[ConfigFileFieldsNameMap::FTP_HOST] =                                 defined(ConfigFileNamesMap::FTP_HOST) ? constant(ConfigFileNamesMap::FTP_HOST) : null;
        $values[ConfigFileFieldsNameMap::FTP_PASS] =                                 defined(ConfigFileNamesMap::FTP_PASS) ? constant(ConfigFileNamesMap::FTP_PASS) : null;
        $values[ConfigFileFieldsNameMap::FTP_PLUGIN_DIR] =                           defined(ConfigFileNamesMap::FTP_PLUGIN_DIR) ? constant(ConfigFileNamesMap::FTP_PLUGIN_DIR) : null;
        $values[ConfigFileFieldsNameMap::FTP_PRIKEY] =                               defined(ConfigFileNamesMap::FTP_PRIKEY) ? constant(ConfigFileNamesMap::FTP_PRIKEY) : null;
        $values[ConfigFileFieldsNameMap::FTP_PUBKEY] =                               defined(ConfigFileNamesMap::FTP_PUBKEY) ? constant(ConfigFileNamesMap::FTP_PUBKEY) : null;
        $values[ConfigFileFieldsNameMap::FTP_SSL] =                                  defined(ConfigFileNamesMap::FTP_SSL) ? constant(ConfigFileNamesMap::FTP_SSL) : null;
        $values[ConfigFileFieldsNameMap::FTP_USER] =                                 defined(ConfigFileNamesMap::FTP_USER) ? constant(ConfigFileNamesMap::FTP_USER) : null;

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
