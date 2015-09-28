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
	* @var mixed
	*/
	protected $filters = array
	(
		'timeOut' => 'http_request_args',
		'redirectCount' => 'http_request_args',
		'version' => 'http_request_args',
		'userAgent' => 'http_request_args',
		'rejectUnsafeUrls' => 'http_request_args',
		
		'proxyBlockLocalRequests' => 'block_local_requests',
		'localSSLVerify' => 'https_local_ssl_verify',
		'sslVerify' => 'https_ssl_verify',
		'useSteamTransport' => 'use_streams_transport',
		'useCurlTransport' => 'use_curl_transport',
	);

	/**
	* put your comment there...
	* 
	* @param mixed $r
	*/
	public function _redirectCount( $r )
	{
		
		$r[ 'redirection' ] = $this->getVar( $this->getHandlerVarName( __FUNCTION__ ) );
		
		return $r;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $r
	*/
	public function _rejectUnsafeUrls( $r )	
	{
		
		$r[ 'reject_unsafe_urls' ] = $this->getVar( $this->getHandlerVarName( __FUNCTION__ ) );
		
		return $r;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $r
	*/
	public function _timeOut( $r )
	{
		
		$r[ 'timeout' ] = $this->getVar( $this->getHandlerVarName( __FUNCTION__ ) );
		
		return $r;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $r
	*/
	public function _userAgent( $r )
	{
		
		$r[ 'user-agent' ] = $this->getVar( $this->getHandlerVarName( __FUNCTION__ ) );
		
		return $r;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $r
	*/
	public function _version( $r )
	{
		
		$r[ 'httpversion' ] = $this->getVar( $this->getHandlerVarName( __FUNCTION__ ) );
		
		return $r;
	}
	
}
