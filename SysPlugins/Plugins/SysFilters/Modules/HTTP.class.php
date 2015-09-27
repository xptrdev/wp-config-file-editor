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
		'http_request_timeout' => 'timeOut',
		'http_request_redirection_count' => 'redirectCount',
		'http_request_version' => 'version',
		'http_headers_useragent' => 'userAgent',
		'http_request_reject_unsafe_urls' => 'rejectUnsafeUrls',
	);
	
}
