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
abstract class FieldBase {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $field;
	
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
	* @param Form $form
	* @param {Form|IField} $field
	* @param mixed $text
	* @param mixed $tipText
	* @return FieldBase
	*/
	public function __construct(Form & $form, IField & $field, $text = null, $tipText = null) {
		# Initialize
		$this->field =& $field;
		$this->form =& $form;
		$this->text = $text;
		$this->tipText = $tipText;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getErrorMessage() {
		# Initialize
		$errorMsg = '';
		# Search for rule with error
		foreach ($this->getField()->getRules() as $rule) {
			if ($rule->isError()) {
				# Get error message
				$errorMsg = $rule->getErrorMessage();
				# Get out
				break;
			}
		}
		# Return error message
		return $errorMsg;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getField() {
		return $this->field;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getForm() {
		return $this->form;
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
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @return {\DOMDocument|\DOMElement|InputField}
	*/
	public function render( \DOMDocument & $document, \DOMElement & $parentDOM, $elems ) 
	{
		
		return $this->renderInput( $document, $parentDOM, $elems );

	}

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @param mixed $elems
	*/
	protected abstract function & renderInput( \DOMDocument & $document, \DOMElement & $parent, $elems );
	
}
