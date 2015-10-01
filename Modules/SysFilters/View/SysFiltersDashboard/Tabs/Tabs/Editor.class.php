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
		$this->fields[] = new Editor\QuickTags( 
			\WCFE\Plugin::DIR,
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
				
				$this->fields[] = new Fields\InputField( 
					$form, 
					$editorModule->get( 'quickTags' )->get( 'buttons' ), 
					'Buttons', 
					'XXXX'
				)
		
			),
			 
			'Quick Tags', 
			'XXXX',
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		

	}
	
}