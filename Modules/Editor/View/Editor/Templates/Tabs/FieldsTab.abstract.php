<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

use WCFE\Modules\Editor\Model\EditorModel;

/**
* 
*/
abstract class FieldsTab extends Tab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName;
	
	/**
	* put your comment there...
	* 
	* @param mixed $list
	*/  
	protected function bcCreateFieldsList( $fields )
	{
		
		$renderers = array();
		

		$fields = EditorModel::makeClassesList( $fields );
				
		$form =& $this->getForm();
		$formAdapter =& $this->getFormAdapter();
		
		# Create form fields.
		foreach ( $fields as $fieldClass => $name )
		{
			# Get field
			$field =& $formAdapter->getField( $fieldClass, $name );
			
			# Create field render for current fiels.
			$rendererClass = $formAdapter->getRendererClass( $fieldClass );
			$renderer = new $rendererClass( $form, $field );
            
            $renderer->extensionsInit( $this->tabs->getFormAdapter() );
            
            $renderers[ ] = $renderer;
            
		}
				
		return $renderers;
	}
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDom
	* @param {\DOMDocument|\DOMElement} $tab
	* @return {\DOMDocument|\DOMElement}
	*/
	protected function renderContent( \DOMDocument & $tabsDom, \DOMElement & $tab )
	{
		return $this->renderFields( $tabsDom, $tab, $this->fields, $this->fieldsPluggableFilterName );
	}
	
}
	