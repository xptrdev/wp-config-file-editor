<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs;

use WCFE\Modules\Editor\View\Editor\Fields;

/**
* 
*/
class AdvancedOptionsPanel 
{
	
	/**
	* put your comment there...
	* 
	* @var \WPPFW\Forms\Fields\FormFieldBase
	*/
	protected $renderer;
	
	/**
	* put your comment there...
	* 
	* @var \WPPFW\Forms\Form
	*/
	protected $form;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $formAdapter;
	
	/**
	* put your comment there...
	* 
	* @param \WPPFW\Forms\Form $form
	* @return \WPPFW\Forms\Form
	*/
	public function & bind( \WPPFW\Forms\Form & $form, & $formAdapter, & $renderer )
	{
		
		$this->form =& $form;
		$this->formAdapter =& $formAdapter;
		$this->renderer =& $renderer;
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param DOMDocument $doc
	* @param {DOMDocument|DOMElement} $panelRow
	* @return {DOMDocument|DOMElement}
	*/
	public function render( \DOMDocument & $doc, \DOMElement & $panelRow )
	{
		$form =& $this->form;
		$formAdapter = $this->formAdapter;
		$renderer =& $this->renderer;
		
		$containerField = $renderer->getField()->getParent();
		$optionsFields = $containerField->get( 'options' );
		
		$disabledField = new Fields\CheckboxField
		( 
			$form, 
			$optionsFields->get( 'disabled' ), 
			$formAdapter->__( 'Disable' ), 
			$formAdapter->__( 'Dont modify system parameter value' ),
			1
		);
		
		$priorityField = new Fields\InputField
		( 
			$form, 
			$optionsFields->get( 'priority' ), 
			$formAdapter->__( 'Priority' ), 
			$formAdapter->__( 'Filter Priority' ) 
		);
		
		# Section / Field name advanced options
		$optionsTitle = $doc->createElement( 'strong' );
		$optionsTitle->setAttribute( 'class', 'advanced-options-title' );
		$optionsTitle->nodeValue = $renderer->getText();
		
		$panelRow->appendChild( $optionsTitle );
		
		# FIelds containe
		$fieldsContainer = $doc->createElement( 'div' );
		$fieldsContainer->setAttribute( 'class', 'fields-container' );
		
		$panelRow->appendChild( $fieldsContainer );
			
		$optionsRenderers = array( $priorityField, $disabledField );
		
		foreach ( $optionsRenderers as $renderer )
		{
			
			# Row
			$fieldRow = $doc->createElement( 'div' );
			$fieldRow->setAttribute( 'class', 'field-row' );
			
			# Render input
			$element = $renderer->render( $doc, $fieldRow, null, $formAdapter );
			
			$elementId = $formAdapter->getFieldId( $renderer );
			
			$element->setAttribute( 'id', $elementId );
			$element->setAttribute( 'name', $formAdapter->getFieldName( $renderer ) );
			
			# Label
			$label = $doc->createElement( 'label' );
			$label->setAttribute( 'for', $elementId );
			$label->nodeValue = $renderer->getText();
						
			# Error 
			$error = $doc->createElement( 'span' );
			$error->setAttribute( 'class', 'field-error' );
			$error->nodeValue = $renderer->getErrorMessage();	
			
			$fieldRow->insertBefore( $label, $element );
			
			$fieldRow->appendChild( $error );
			
			$fieldsContainer->appendChild( $fieldRow );
		}
		
	}
	
}
