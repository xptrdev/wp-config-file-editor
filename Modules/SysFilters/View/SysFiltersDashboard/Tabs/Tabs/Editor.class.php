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
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_EDITOR_FIELDS;
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize()
	{
		$form =& $this->getForm();
		$editorModule = $form->get( 'editor' );
		
        $this->title = $this->_( 'Editor' );
        
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'autoParagraph' )->get( 'value' ), 
			$this->_( 'Auto Paragraph' ), 
			$this->_( 'Replaces double line-breaks with paragraph elements' ),
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'editorHeight' )->get( 'value' ), 
			$this->_( 'Editor Height' ), 
			$this->_( 'Editor Height in pixels' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'mediaButtons' )->get( 'value' ), 
			$this->_( 'Media Buttons' ), 
			$this->_( 'Whether to show the Add Media/other media buttons.' ),
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);

		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'dragDropUpload' )->get( 'value' ), 
			$this->_( 'Drag and Drop Uploads' ), 
			$this->_( 'Whether to enable drag &amp; drop on the editor uploading' ),
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);

		/////////////
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'textAreaRows' )->get( 'value' ), 
			$this->_( 'TextArea Rows' ), 
			$this->_( 'Number rows in the editor textarea' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'tabIndex' )->get( 'value' ), 
			$this->_( 'Tab Index' ), 
			$this->_( 'Tabindex value to use' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\TextareaField( 
			$form, 
			$editorModule->get( 'editorCSS' )->get( 'value' ), 
			$this->_( 'Editor Style' ),
			$this->_( 'Intended for extra styles for both Visual and Text editors. Should include `&lt;style&gt;` tags, and can use "scoped"' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\InputField( 
			$form, 
			$editorModule->get( 'editorClass' )->get( 'value' ), 
			$this->_( 'Editor CSS Class' ), 
			$this->_( 'Extra classes to add to the editor textarea element' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'teeny' )->get( 'value' ), 
			$this->_( 'Teeny' ), 
			$this->_( 'Whether to output the minimal editor config. Examples include Press This and the Comment editor' ),
			1, 
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = new Fields\CheckboxField( 
			$form, 
			$editorModule->get( 'tinyMCE' )->get( 'value' ), 
			$this->_( 'TinyMCE' ), 
			$this->_( 'Whether to load TinyMCE' ),
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
					null,
					1
				),
				
				new Fields\InputField( 
					$form, 
					$editorModule->get( 'quickTags' )->get( 'buttons' ), 
					'Buttons', 
					null
				)
		
			),
			$this->_( 'Quick Tags' ),
			$this->_( 'Specify Whether to load Quicktags and what buttons to load' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		
		/////////////
		$this->fields[] = $pluginsList = new Fields\PreDefinedCheckboxList( 
			$form, 
			$editorModule->get( 'plugins' )->get( 'value' ),
			$this->_( 'Built-In Plugins' ), 
			$this->_( 'Enable / Disable TinyMCE Built in plugins' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$pluginsList->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'editor', 'plugins', 'value' ) );
		
		/////////////
		$this->fields[] = $buttons2 = new Fields\PreDefinedCheckboxList( 
			$form, 
			$editorModule->get( 'buttons2' )->get( 'value' ),
			$this->_( 'Second Row Buttons list' ), 
			$this->_( 'Show / Hide second row buttons' ),
			array( 'optionsPanel' => new AdvancedOptionsPanel() )
		);
		$buttons2->setPreDefinedList( SysFiltersDashboardModel::getDefaultsSection( 'editor', 'buttons2', 'value' ) );
				
	}
	
}