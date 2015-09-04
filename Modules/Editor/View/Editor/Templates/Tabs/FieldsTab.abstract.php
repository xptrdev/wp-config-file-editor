<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

/**
* 
*/
abstract class FieldsTab extends Tab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields;
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDom
	* @param {\DOMDocument|\DOMElement} $tab
	* @return {\DOMDocument|\DOMElement}
	*/
	protected function renderContent( \DOMDocument & $tabsDom, \DOMElement & $tab )
	{
		return $this->renderFields( $tabsDom, $tab, $this->fields );
	}
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $doc
	* @param {\DOMDocument|\DOMElement} $element
	* @param mixed $fieldsList
	*/
	protected function renderFields( \DOMDocument & $doc, \DOMElement & $pElement, $fields ) 
	{
		# Initialize
		$form =& $this->getForm();
		
		# Create form fields.
		foreach ( $fields as $namespace => $nsFields )
		{
			foreach ( $nsFields as $fieldName ) 
			{
				# Get field
				$field = $form->get( $fieldName );
				
				# Create field render for current fiels.
				$rendererClass = "{$namespace}\\{$fieldName}\\Field";
				$renderer = new $rendererClass( $form, $field );
				
				$renderer->render( $doc, $pElement );
			}
		}
		
		return $this;
	}
	
}
	