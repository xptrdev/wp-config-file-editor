<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\Tabs;

# Imports
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\FieldsTab;
use WCFE\Modules\Editor\View\Editor\Fields;
use WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\AdvancedOptionsPanel;

/**
* 
*/
class HTTPOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_HTTP_FIELDS;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'HTTP Requests';
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize()
	{
		$form =& $this->getForm();
		$module =& $form->get( 'http' );
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$module->get( 'timeOut' )->get( 'value' ), 
			'Request TimeOut', 
			'Filter the timeout value for an HTTP request (seconds)',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$module->get( 'redirectCount' )->get( 'value' ), 
			'Redirect Count', 
			'Filter the number of redirects allowed during an HTTP request',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$module->get( 'version' )->get( 'value' ), 
			'HTTP Version', 
			'Filter the version of the HTTP protocol used in a request',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$userAgent = $this->fields[] = new Fields\InputField( 
			$form, 
			$module->get( 'userAgent' )->get( 'value' ), 
			'User Agent', 
			'Filter the user agent value sent with an HTTP request',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$userAgent->setClassName( 'long-input' );
		
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'rejectUnsafeUrls' )->get( 'value' ), 
			'Reject Unsafe Urls', 
			'Filter whether to pass URLs through wp_http_validate_url() in an HTTP request',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'stream' )->get( 'value' ), 
			'Stream', 
			'Whether to stream to a file. If set to true and no filename was given, it will be droped it in the WP temp dir and its name will be set using the basename of the URL. Default false',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'blocking' )->get( 'value' ), 
			'Blocking', 
			'Whether the calling code requires the result of the request.
	 			If set to false, the request will be sent to the remote server,
	 			and processing returned to the calling code immediately, the caller
	 			will know if the request succeeded or failed, but will not receive
	 			any response from the remote server',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'compress' )->get( 'value' ), 
			'Compress', 
			'Whether to compress the $body when sending the request',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'decompress' )->get( 'value' ), 
			'De-Compress', 
			'Whether to decompress a compressed response. If set to false and
	 			compressed content is returned in the response anyway, it will
	 			need to be separately decompressed',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$this->fields[] = new Fields\InputField( 
			$form, 
			$module->get( 'responseSizeLimit' )->get( 'value' ), 
			'Response Size limit', 
			'Size in bytes to limit the response to',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'proxyBlockLocalRequests' )->get( 'value' ), 
			'Proxy Block Local Requests', 
			'Filter whether to block local requests through the proxy',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'localSSLVerify' )->get( 'value' ), 
			'Local SSL Verify', 
			'Filter whether SSL should be verified for local requests',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'sslVerify' )->get( 'value' ), 
			'SSL Verify', 
			'Filter whether SSL should be verified for non-local requests',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'useSteamTransport' )->get( 'value' ), 
			'Use Steam Transport', 
			'Filter whether streams can be used as a transport',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'useCurlTransport' )->get( 'value' ), 
			'Use Curl Transport', 
			'Filter whether cURL can be used as a transport',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$module->get( 'allowLocalHost' )->get( 'value' ), 
			'Allow local Host', 
			'If host appears local, reject unless specifically allowed',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
	}
	
}