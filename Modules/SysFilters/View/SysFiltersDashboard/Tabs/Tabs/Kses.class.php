<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\Tabs;

# Imports
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\SimpleSubContainerTab;
use WCFE\Modules\Editor\View\Editor\Fields;
use WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\AdvancedOptionsPanel;
use WCFE\Modules\SysFilters\Model\SysFiltersDashboardModel;

/**
* 
*/
class KsesOptionsTab extends SimpleSubContainerTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_KSES_FIELDS;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'Kses';
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize()
	{
		$form =& $this->getForm();
		$module = $form->get( 'kses' );
		
		# Query vars
		$allowedProtocols = new Fields\PreDefinedCheckboxList( 
			$form, 
			$module->get( 'protocols' )->get( 'value' ),
			'Allowed Protocols', 
			'Filter HTML attributes allowed protocols',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$allowedProtocols->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'kses', 'protocols', 'value' ) );
		
		$postTags = new Fields\StructuredCheckboxList( 
			$form, 
			$module->get( 'postTags' )->get( 'value' ),
			'Post Tags', 
			'Allow what HTML Tags and attributes to be inserted into post content',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
    $postTags->setClassName( 'wcfe-editable-checkbox-list' );
    
		$commentTags = new Fields\StructuredCheckboxList( 
			$form, 
			$module->get( 'commentTags' )->get( 'value' ),
			'Comment Tags', 
			'Allow what HTML Tags and attributes to be inserted into comment content',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$commentTags->setClassName( 'wcfe-editable-checkbox-list' );
			
		$this->fields[ 'allowedProtocols' ] = array
		(
			$allowedProtocols,
			$postTags,
			$commentTags,
		);
				
	}
	
}