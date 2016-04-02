<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Fields;

# Field framework
use WPPFW\Forms\Form;
use WPPFW\Forms\Fields\IField;

/**
* 
*/
class HTMLComponent {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $form;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $params;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $renderers;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $text;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tipText;

	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $renderers
	* @param mixed $text
	* @param mixed $tipText
	* @param mixed $params
	* @return HTMLComponent
	*/
	public function __construct( $form, $renderers, $text, $tipText, $params )
	{
		$this->form =& $form;
		$this->renderers =& $renderers;
		$this->text = $text;
		$this->tipText = $tipText;
		$this->params = $params;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getErrorMessage()
	{
		return null;
	}
	
	/**
	* Backward compability with FormAdapter
	* 
	*/
	public function & getField( $index = null )
	{
		return $this->renderers[ $index ? $index : 0 ]->getField();
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getRenderers()
	{
		return $this->renderers;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getForm() 
	{
		return $this->form;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function getParam( $name )
	{
		return isset( $this->params[ $name ] ) ? $this->params[ $name ] : null;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getText()
	{
		return $this->text;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText()
	{
		return $this->tipText;
	}
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $doc
	* @param {\DOMDocument|\DOMElement} $parent
	* @param mixed $elem
	* @param mixed $formAdapter
	*/
	public function render( \DOMDocument & $doc, \DOMElement & $parent, $elem, & $formAdapter )
	{
		
		$componentEle = $doc->createElement( 'div' );
		$componentEle->setAttribute( 'class', 'compound-field' );
		
		foreach ( $this->getRenderers() as $renderer )
		{
			
			$row = $doc->createElement( 'div' );
			$row->setAttribute( 'class', 'field-row' );
			
			$inputId = $formAdapter->getFieldId( $renderer );
			
			$input = $renderer->render( $doc, $row, $elem, $formAdapter );
			
			$label = $doc->createElement( 'label' );
			$label->setAttribute( 'for', $inputId );
			$label->nodeValue = $renderer->getText() ;
			
			# Error 
			$error = $doc->createElement( 'span' );
			$error->setAttribute( 'class', 'field-error' );
			$error->nodeValue = $renderer->getErrorMessage();		
			
			# Field tip/help
			$tip = $doc->createElement( 'p' );
			$tip->setAttribute( 'class', 'field-tip' );
			$tip->nodeValue = $renderer->getTipText();
			
			$row->appendChild( $label );
			$row->appendChild( $input );
			$row->appendChild( $error );
			$row->appendChild( $tip );
			
			$componentEle->appendChild( $row );
		}
		
		$parent->appendChild( $componentEle );
		
		return $componentEle;
	}

}