<?php
/**
* 
*/

namespace WCFE\Modules\SysFilters\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class SysFiltersDashboardModel extends PluginModel {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $sysFiltersData = null;
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {}
	
	
	/**
	* put your comment there...
	* 
	*/
	public function getData()
	{
		return $this->sysFiltersData;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getDefaults()
	{
		$defaults = array
		(
			'http' => array(
			
			 	'timeOut' => array(
			 		'value' => 5,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'redirectCount' => array(
			 		'value' => 5,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'version' => array(
			 		'value' => '1.0',
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'userAgent' => array(
			 		'value' => ( 'WordPress/' . $GLOBALS[ 'wp_version' ] . '; ' . get_bloginfo( 'url' ) ),
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'rejectUnsafeUrls' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'proxyBlockLocalRequests' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'localSSLVerify' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'sslVerify' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'useSteamTransport' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'useCurlTransport' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			),
			
			'editor' => array(
			
			 	'autoParagraph' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'mediaButtons' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'dragDropUpload' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'textAreaRows' => array(
			 		'value' => 20,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'tabIndex' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'editorCSS' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'editorClass' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'teeny' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'tinyMCE' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			),
			
		);
		
		return $defaults;
	}

	/**
	* put your comment there...
	* 
	*/
	public function isNeverSubmitted()
	{
		return ( $this->sysFiltersData === null );
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $data
	*/
	public function setData( $data )
	{
		$this->sysFiltersData =& $data;
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function validate()
	{
		return true;
	}

}