<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

/**
* 
*/
class EditorFormTabsAdapter implements ITabsFormAdapter 
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $form;
	
	/**
	* put your comment there...
	* 
	* @param \WPPFW\Forms\Form $form
	* @return {EditorFormTabsAdapter|\WPPFW\Forms\Form}
	*/
	public function __construct( \WPPFW\Forms\Form & $form )
	{
		$this->form =& $form;
	}
	
	/**
	* put your comment there...
	* 
	* @param \WPPFW\Forms\Form $form
	* @param mixed $fieldClass
	* @param mixed $fieldName
	*/
	public function & getField( $fieldClass, $fieldName )
	{
		return $this->form->get( $fieldName );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $field
	*/
	public function getFieldId( & $renderer )
	{
		return "{$this->form->getName()}-{$renderer->getField()->getName()}";
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $field
	*/
	public function getFieldName( & $renderer )
	{
		return "{$this->form->getName()}[{$renderer->getField()->getName()}]";
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $rendererClass
	*/
	public function getRendererClass( $rendererClass )
	{
		return "{$rendererClass}\\Field";
	}

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDoc
	* @param {\DOMDocument|\DOMElement} $tabElement
	* @return {\DOMDocument|\DOMElement}
	*/
	public function renderPanel( \DOMDocument & $tabsDoc, \DOMElement & $tabElement ) {}
	
	/**
	* put your comment there...
	* 
	* @param mixed $doc
	* @param mixed $row
	*/
	public function renderRow( $doc, $row, $renderer )
	{
		
		# Constants Variables names
		$fieldGenClass = 'WCFE\Modules\Editor\Model\ConfigFile\Fields\\' . $renderer->getField()->getName();
		$fieldGenObj = new $fieldGenClass( );
			
		$name = $doc->createElement( 'p' );
		$name->setAttribute( 'class', 'field-constant-name' );
		$name->nodeValue = $fieldGenObj->getName();
		
		$row->appendChild( $name );
	}
	
}