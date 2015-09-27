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
			'Request TimeOut', 'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$form->get( 'http' )->get( 'redirectCount' )->get( 'value' ), 
			'Redirect Count', 'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$form->get( 'http' )->get( 'version' )->get( 'value' ), 
			'HTTP Version', 'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$userAgent = $this->fields[] = new Fields\InputField( 
			$form, 
			$form->get( 'http' )->get( 'userAgent' )->get( 'value' ), 
			'User Agent', 'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$userAgent->setClassName( 'long-input' );
		
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$form->get( 'http' )->get( 'rejectUnsafeUrls' )->get( 'value' ), 
			'Reject Unsafe Urls', 
			'XXXX',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
	}
	
}