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
use WCFE\Modules\SysFilters\Model\SysFiltersDashboardModel;

/**
* 
*/
class MiscOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_MISC_FIELDS;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'Misc';
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize()
	{
		$form =& $this->getForm();
		$module = $form->get( 'misc' );
		
		/////////////
		$this->fields[] = $queryVarsList = new Fields\PreDefinedCheckboxList( 
			$form, 
			$module->get( 'queryVars' )->get( 'value' ),
			'Query Vars', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$queryVarsList->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'misc', 'queryVars', 'value' ) );
				
	}
	
}