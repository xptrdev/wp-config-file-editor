<?php
/**
* 
*/

namespace WCFE\SysPlugins\SysFilters\Modules;

use WCFE\SysPlugins\SysFilters\Module;

/**
* 
*/
class HTTPModule extends Module
{

	/**
	* put your comment there...
	* 
	*/
	public function getFilters()
	{
		
		$filtersToBuild = array
		( 
			'setArrayElement' => array
			(
				'timeOut' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'timeout' ) ),
				'redirectCount' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'redirection' ) ),
				'version' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'httpversion' ) ),
				'userAgent' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'user-agent' ) ),
				'rejectUnsafeUrls' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'reject_unsafe_urls' ) ),		
				'stream' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'stream' ) ),		
				'blocking' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'blocking' ) ),		
				'compress' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'compress' ) ),		
				'decompress' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'decompress' ) ),		
				'responseSizeLimit' => array( 'filter' => 'http_request_args', 'params' => array( 'element' => 'limit_response_size' ) ),		
			),
			
			'return' => array
			(
				'proxyBlockLocalRequests' => array( 'filter' => 'block_local_requests' ),
				'localSSLVerify' => array( 'filter' => 'https_local_ssl_verify' ),
				'sslVerify' => array( 'filter' => 'https_ssl_verify' ),
				'useSteamTransport' => array( 'filter' => 'use_streams_transport' ),
				'useCurlTransport' => array( 'filter' => 'use_curl_transport' ),
				'allowLocalHost' => array( 'filter' => 'http_request_host_is_external' ),
			)
		);
		
		$this->buildFiltersList( $filtersToBuild );

		return parent::getFilters();
	}
	
}
