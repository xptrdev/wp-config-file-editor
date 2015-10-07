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
	
		'0.5.0', /* This version never returned from $this->installed Version 
								however installer witll run this as it always start at index 0 */	
		'1.4.0',
		
		'1.5.0',
		
	);
	
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
				$installedVersion = '1.4.0';
			}
		}
		
		return $installedVersion;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $currentVersion
	* @return Installer
	*/
	public static function run( $currentVersion )
	{
		
		if ( ! self::$instance )
		{
			# Create new installer
			self::$instance = new Installer( new Factory( __NAMESPACE__ ), $currentVersion );
			
			# Install or upgrade
			$state = self::$instance->getState();
			
			switch ( $state )
			{
				case self::STATE_FRESH_INSTALL:
				
					self::$instance->install();					
				
				break;
				case self::STATE_UPGRADE:

					self::$instance->upgrade();
				
				break;
			}
			
		}
		
		return self::$instance;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function upgrade_050()
	{
		
		# Sys filters parameters for all version < 1.4.0
		
		
		return true;
	}

	/**
	* Upgrade 1.4.0 to 1.5.0
	* 
	*/
	public function upgrade_140()
	{
		
		$sysFilterOpts = SysFiltersDashboardModel::getDataArray();
		$defaultData = SysFiltersDashboardModel::getDefaults();
		
		# Default Sys filters Modules added in version 1.5.0
		$modules = array
		(
			'misc',
			'editor',
		);
		
		foreach ( $modules as $moduleName )
		{
			$sysFilterOpts[ 'sysFiltersData' ][ $moduleName ] = $defaultData[ $moduleName ];
		}
		
		# Default Sys filters parameters added in version 1.5.0
		$parameters = array
		(
			'http' => array
			(
				'stream',
				'blocking',
				'compress',
				'decompress',
				'responseSizeLimit'
			),
		);
		
		
		foreach ( $parameters as $moduleName => $moduleParams )
		{
			
			foreach ( $moduleParams as $paramsName => $value )
			{
				$sysFilterOpts[ 'sysFiltersData' ][ $moduleName ][ $paramsName ] = $value;
			}
			
		}
		
		print_r( $sysFilterOpts );
		
		return true;
	}
	
	
}