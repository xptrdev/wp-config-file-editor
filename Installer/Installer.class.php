<?php
/**
* 
*/

namespace WCFE\Installer;

use \WCFE\Modules\SysFilters\Model\SysFiltersDashboardModel;

/**
* 
*/
class Installer extends \WCFE\Libraries\InstallerService {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private static $instance;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $_upgraders = array
	(
	
		'0.5.0', /* This version never returned from $this->getInstalledVersion()
								however installer will run this as installer is always start at index 0 */	
								
		'1.4.0', 
		
		
		'1.5.0', // No upgrader
		
		
		'1.5.1', 
		
		
		'1.5.2',
        
        
        '1.6.0',
        
        
        '1.6.1',
        
        
        '1.6.2',
        
        
        '1.6.3',
        
        
        '1.6.4',
        
        
        '1.6.5',
        
        
        '1.6.6',
        
        
        '1.6.7',
		
	);
	
    /**
    * put your comment there...
    * 
    */
    protected function _getCurrentVersion()
    {
        return end( $this->_upgraders );
    }
    
	/**
	* put your comment there...
	* 
	*/
	public function getInstalledVersion()
	{		
		global $wpdb;
		
		# Backward comptability for version for version 1.4 
		
		# Return 1.4.0 if sys filters parameters option var exists

		if ( ! $installedVersion = parent::getInstalledVersion() )
		{
			
			$hasSysFilters = SysFiltersDashboardModel::getDataArray();
			
			if ( $hasSysFilters )
			{
				
				# Sys filter data will be exists if only system parameters
				# page has been visited however it will be empty if never saved!
				# We only need to do upgrade if its saved before so we avoid
				# overriding saved data, otherwise do fresh install
				
				if ( isset( $hasSysFilters[ 'sysFiltersData' ][ 'http' ] ) )
				{
					$installedVersion = '1.4.0';
				}

			}
		}
		
		return $installedVersion;
	}

    /**
    * put your comment there...
    * 
    */
	public static function run( )
	{
		
		$result = null;
		
		if ( ! self::$instance )
		{
			# Create new installer
            $factory = new Factory( __NAMESPACE__ );
            
			self::$instance = new Installer( $factory );
			
			# Install or upgrade
			$state = self::$instance->getState();
			
			switch ( $state )
			{
				
				case self::STATE_FRESH_INSTALL:
				
					$result = self::$instance->install();					
				
				break;
				
				case self::STATE_UPGRADE:

					$result = self::$instance->upgrade();
				
				break;
				
				default:
				
					// Installed
					$result = true;
					
				break;
			}
			
		}
		
		return $result;
	}
	
	/**
	* Upgrade all version < 1.4.0
	* 
	* Add default Sys Filter Parameters when as it initially added
	* in version 1.4.0
	* 
	*/
	public function upgrade_050()
	{
		
		# Sys filters parameters for all version < 1.4.0
		$sysFilterOpts = SysFiltersDashboardModel::getDataArray();
		$defaultData = SysFiltersDashboardModel::getDefaults();
		
		# Default Sys filters parameters added in version 1.5.0
		$parameters = array
		(
			'http' => array
			(
				'timeOut',
				'redirectCount',
				'version',
				'userAgent',
				'rejectUnsafeUrls',
				'proxyBlockLocalRequests',
				'localSSLVerify',
				'sslVerify',
				'useSteamTransport',
				'useCurlTransport',
			),
		);
		
		
		foreach ( $parameters as $moduleName => $moduleParams )
		{
			
			foreach ( $moduleParams as $paramName )
			{
				$sysFilterOpts[ 'sysFiltersData' ][ $moduleName ][ $paramName ] = $defaultData[ $moduleName ][ $paramName ];
			}
			
		}
		
		# Save sys filter parameters
		SysFiltersDashboardModel::setDataArray( $sysFilterOpts );
		
		return true;
	}

	/**
	* Upgrade 1.4.0 to 1.5.0
	* 
	* Add default Sysfilter parameters added in version 1.5.0
	*/
	public function upgrade_140()
	{
		
		$sysFilterOpts = SysFiltersDashboardModel::getDataArray();
		$defaultData = SysFiltersDashboardModel::getDefaults();
		
		# Default Sys filters Modules
		$modules = array
		(
			'misc',
			'editor',
			'kses',
		);
		
		foreach ( $modules as $moduleName )
		{
			$sysFilterOpts[ 'sysFiltersData' ][ $moduleName ] = $defaultData[ $moduleName ];
		}
		
		# Default Sys filters parameters
		$parameters = array
		(
			'http' => array
			(
				'stream',
				'blocking',
				'compress',
				'decompress',
				'responseSizeLimit',
				'allowLocalHost',
			),
		);
		
		
		foreach ( $parameters as $moduleName => $moduleParams )
		{
			
			foreach ( $moduleParams as $paramName )
			{
				$sysFilterOpts[ 'sysFiltersData' ][ $moduleName ][ $paramName ] = $defaultData[ $moduleName ][ $paramName ];
			}
			
		}
		
		# Save sys filter parameters
		SysFiltersDashboardModel::setDataArray( $sysFilterOpts );
		
		return true;
	}

	
	/**
	* Upgrade 1.5.1 
	* 
	* Disable all HTTP Request Parameters as it break Wordpress
	* Upgrades!!!!
	* 
	*/
	public function upgrade_151()
	{
		
		$sysFilterOpts = SysFiltersDashboardModel::getDataArray();
		$defaultData = SysFiltersDashboardModel::getDefaults();
		
		# Disable all parameters
		foreach ( $sysFilterOpts[ 'sysFiltersData' ] as $moduleName => & $moduleParams )
		{
			
			foreach ( $moduleParams as $paramsName => & $param )
			{
				
				$param[ 'options' ][ 'disabled' ] = true;
			}
		}

		# Save sys filter parameters
		SysFiltersDashboardModel::setDataArray( $sysFilterOpts );
		
		return true;
	}
	
}