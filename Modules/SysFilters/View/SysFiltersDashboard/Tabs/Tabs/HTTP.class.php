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
		
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$form->get( 'http' )->get( 'timeOut' )->get( 'value' ), 
			'Request TimeOut', 
			'Filter the timeout value for an HTTP request (seconds)',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$form->get( 'http' )->get( 'redirectCount' )->get( 'value' ), 
			'Redirect Count', 
			'Filter the number of redirects allowed during an HTTP request',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$form->get( 'http' )->get( 'version' )->get( 'value' ), 
			'HTTP Version', 
			'Filter the version of the HTTP protocol used in a request',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$userAgent = $this->fields[] = new Fields\InputField( 
			$form, 
			$form->get( 'http' )->get( 'userAgent' )->get( 'value' ), 
			'User Agent', 
			'Filter the user agent value sent with an HTTP request',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$userAgent->setClassName( 'long-input' );
		
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$form->get( 'http' )->get( 'rejectUnsafeUrls' )->get( 'value' ), 
			'Reject Unsafe Urls', 
			'Filter whether to pass URLs through wp_http_validate_url() in an HTTP request',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$form->get( 'http' )->get( 'proxyBlockLocalRequests' )->get( 'value' ), 
			'Proxy Block Local Requests', 
			'Filter whether to block local requests through the proxy',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$form->get( 'http' )->get( 'localSSLVerify' )->get( 'value' ), 
			'Local SSL Verify', 
			'Filter whether SSL should be verified for local requests',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$form->get( 'http' )->get( 'sslVerify' )->get( 'value' ), 
			'SSL Verify', 
			'Filter whether SSL should be verified for non-local requests',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$form->get( 'http' )->get( 'useSteamTransport' )->get( 'value' ), 
			'Use Steam Transport', 
			'Filter whether streams can be used as a transport',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$form->get( 'http' )->get( 'useCurlTransport' )->get( 'value' ), 
			'Use Curl Transport', 
			'Filter whether cURL can be used as a transport',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
	}
	
}