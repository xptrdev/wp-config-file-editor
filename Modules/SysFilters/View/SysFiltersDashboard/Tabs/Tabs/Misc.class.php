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
class MiscOptionsTab extends SimpleSubContainerTab {
	
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
		
		# Query vars
		$queryVarsList = new Fields\PreDefinedCheckboxList( 
			$form, 
			$module->get( 'queryVars' )->get( 'value' ),
			'Query Vars', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$queryVarsList->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'misc', 'queryVars', 'value' ) );
		
		$uploadMimeTypes = new Misc\UploadAllowedMimeTypes( 
			$form, 
			$module->get( 'uploadAllowedMimes' )->get( 'value' ),
			'Upload Allowed Mime Types', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[ 'misc' ] = array
		(
			$queryVarsList,
			
			new Fields\CheckboxField
			(
				$form,
				$module->get( 'themesPersistCache' )->get( 'value' ),
				'Persistly Cache Themes', 
				'XXXX',
				1,
				array( 'optionsPanel' => new AdvancedOptionsPanel() )
			),
			$uploadMimeTypes
			
		);
		
		# Images Editor
		$this->fields[ 'imagesEditor' ] = array
		(
			new Fields\InputField
			(
				$form,
				$module->get( 'quality' )->get( 'value' ),
				'Quality', 
				'XXXX',
				array( 'optionsPanel' => new AdvancedOptionsPanel() )
			),

			new Fields\InputField
			(
				$form,
				$module->get( 'memoryLimit' )->get( 'value' ),
				'Memory Limit', 
				'XXXX',
				array( 'optionsPanel' => new AdvancedOptionsPanel() )
			),
						
		);
				
	}
	
}