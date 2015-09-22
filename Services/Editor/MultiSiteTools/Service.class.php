<?php
/**
* 
*/

namespace WCFE\Services\Editor\MultiSiteTools;
/**
* 
*/    
class Service extends \WPPFW\Services\ServiceBase {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected static $instance;
	
	/**
	* put your comment there...
	* 
	*/
	public function _checkIfNetworkSetupPage()
	{
		if ( defined( 'WP_INSTALLING_NETWORK' ) &&
				 WP_INSTALLING_NETWORK )
		{
			
			add_action( 'admin_print_footer_scripts', array( $this, '_printScripts' ) );
		}
	}

	/**
	* put your comment there...
	* 
	*/
	public function _printScripts( )
	{
		if ( network_domain_check() )
		{
			
			$this->hoohMap[ current_filter() ] = $this->serviceObjects[ 0 ];
			
			$this->createServiceFront( new Proxy() );
			
			$this->dispatch();
			
			$this->response();
		}
	}

	/**
	* put your comment there...
	* 
	*/
	public static function & run()
	{
		if ( ! self::$instance )
		{
			
			self::$instance = new Service( \WCFE\Plugin::me(), array( new MultiSiteNetworkPageTools() ) );
			
			self::$instance->start();
			
		}
		
		
		return self::$instance;
		
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & start() 
	{
		
		# Start service
		add_action( 'admin_init', array( & $this, '_checkIfNetworkSetupPage' ) );
		
		
		return $this;		
	}
	
}