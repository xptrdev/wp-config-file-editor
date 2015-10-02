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
class EditorOptionsTab extends FieldsTab {
	
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
	protected $title = 'Editor';
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize()
	{
		$form =& $this->getForm();
		$editorModule = $form->get( 'editor' );
		
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'autoParagraph' )->get( 'value' ), 
			'Auto Paragraph', 
			'XXXX',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'editorHeight' )->get( 'value' ), 
			'Editor Height', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'mediaButtons' )->get( 'value' ), 
			'Media Buttons', 
			'XXXX',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);

		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'dragDropUpload' )->get( 'value' ), 
			'Drag and Drop Uploads', 
			'XXXX',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);

		/////////////
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'textAreaRows' )->get( 'value' ), 
			'TextArea Rows', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'tabIndex' )->get( 'value' ), 
			'Tab Index', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\TextareaField( 
			$form, 
			$editorModule->get( 'editorCSS' )->get( 'value' ), 
			'Editor Style', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'editorClass' )->get( 'value' ), 
			'Editor CSS Class', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'teeny' )->get( 'value' ), 
			'Teeny', 
			'XXXX',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'tinyMCE' )->get( 'value' ), 
			'TinyMCE', 
			'XXXX',
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\HTMLComponent( 
			$form, 
			array
			(
			 
				new Fields\CheckboxField( 
					$form, 
					$editorModule->get( 'quickTags' )->get( 'value' ), 
					'Enable', 
					'XXXX',
					1
				),
				
				new Fields\InputField( 
					$form, 
					$editorModule->get( 'quickTags' )->get( 'buttons' ), 
					'Buttons', 
					'XXXX'
				)
		
			),
			'Quick Tags',
			'ZZZZ',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = $pluginsList = new Fields\PreDefinedCheckboxList( 
			$form, 
			$editorModule->get( 'plugins' )->get( 'value' ),
			'Built-In Plugins', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$pluginsList->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'editor', 'plugins', 'value' ) );
		
		/////////////
		$this->fields[] = $buttons2 = new Fields\PreDefinedCheckboxList( 
			$form, 
			$editorModule->get( 'buttons2' )->get( 'value' ),
			'Second Row Buttons list', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$buttons2->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'editor', 'buttons2', 'value' ) );
				
	}
	
}