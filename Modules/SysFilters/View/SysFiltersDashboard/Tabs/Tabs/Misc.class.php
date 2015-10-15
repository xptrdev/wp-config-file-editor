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
			'Filter which query vars to allow Wordpress to use. For example search can be stopped by unchecking "s" variable',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$queryVarsList->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'misc', 'queryVars', 'value' ) );
		
		$uploadMimeTypes = new Fields\StructuredCheckboxList( 
			$form, 
			$module->get( 'uploadAllowedMimes' )->get( 'value' ),
			'Upload Allowed Mime Types', 
			'Allow/Disallow what type of images can be uploaded and what mime type to associate with the uploaded file.',
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
				'Filter whether to get the cache of the registered theme directories',
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
				'Filter the default image compression quality setting.',
				array( 'optionsPanel' => new AdvancedOptionsPanel() )
			),

			new Fields\InputField
			(
				$form,
				$module->get( 'memoryLimit' )->get( 'value' ),
				'Memory Limit', 
				'Filter the memory limit allocated for image manipulation',
				array( 'optionsPanel' => new AdvancedOptionsPanel() )
			),
						
		);
				
	}
	
}