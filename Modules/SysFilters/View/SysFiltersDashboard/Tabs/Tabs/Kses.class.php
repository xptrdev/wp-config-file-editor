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
	*/
	protected function initialize()
	{
		$form =& $this->getForm();
		$module = $form->get( 'kses' );
		
        $this->title = $this->_( 'Kses' );
        
		# Query vars
		$allowedProtocols = new Fields\PreDefinedCheckboxList( 
			$form, 
			$module->get( 'protocols' )->get( 'value' ),
			$this->_( 'Allowed Protocols' ), 
			$this->_( 'Filter HTML attributes allowed protocols' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$allowedProtocols->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'kses', 'protocols', 'value' ) );
		
		$postTags = new Fields\StructuredCheckboxList( 
			$form, 
			$module->get( 'postTags' )->get( 'value' ),
			$this->_( 'Post Tags' ), 
			$this->_( 'Allow what HTML Tags and attributes to be inserted into post content' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
    $postTags->setClassName( 'wcfe-editable-checkbox-list' );
    
		$commentTags = new Fields\StructuredCheckboxList( 
			$form, 
			$module->get( 'commentTags' )->get( 'value' ),
			$this->_( 'Comment Tags' ), 
			$this->_( 'Allow what HTML Tags and attributes to be inserted into comment content' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$commentTags->setClassName( 'wcfe-editable-checkbox-list' );

		$htmlEntities = new Fields\CheckboxListField( 
			$form, 
			$module->get( 'entities' )->get( 'value' ),
			$this->_( 'HTML Entities' ), 
			$this->_( 'Allow what HTML Entities to be inserted' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
							
		$this->fields[ 'kses' ] = array
		(
			$allowedProtocols,
			$postTags,
			$commentTags,
			$htmlEntities
		);
				
	}
	
}