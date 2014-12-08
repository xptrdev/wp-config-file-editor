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
	protected $error;
	
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
	protected $input;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $lbl;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $row;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tip;
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @param {Form|IField} $field
	* @return {InputField|Form|IField}
	*/
	public function __construct(Form & $form, IField & $field) {
		# Initialize
		$this->field =& $field;
		$this->form =& $form;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getError() {
		return $this->error;
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
	protected function & getInput() {
		return $this->input;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function & getLabel() {
		return $this->lbl;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function & getRow() {
		return $this->row;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function & getTip() {
		return $this->tip;
	}

	/**
	* put your comment there...
	* 
	*/
	protected abstract function getText();

	/**
	* put your comment there...
	* 
	*/
	protected abstract function getTipText();

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @return {\DOMDocument|\DOMElement|InputField}
	*/
	public function render(\DOMDocument & $document, \DOMElement & $parentDOM) {
		# Initialize
		$form =& $this->getForm();
		$field =& $this->getField();
		$inputId = "{$form->getName()}-{$field->getName()}";
		
		# Label
		$this->lbl = $document->createElement('label');
		$this->lbl->setAttribute('for', $inputId);
		$this->lbl->nodeValue = $this->getText();
		
		# Error 
		$this->error = $document->createElement('span');
		$this->error->setAttribute('class', 'field-error');
		$this->error->nodeValue = $this->getErrorMessage();		
		
		# Field tip/help
		$this->tip = $document->createElement('p');
		$this->tip->setAttribute('class', 'field-tip');
		$this->tip->nodeValue = $this->getTipText();
		
		# Field row
		$this->row = $document->createElement('li');

		# Give the row unique id
		$this->row->setAttribute('id', "{$inputId}-row");
		
		# Input text
		$this->input =& $this->renderInput($document);
		$this->input->setAttribute('id', $inputId);
		$this->input->setAttribute('name', "{$form->getName()}[{$field->getName()}]");
	
		$this->row->appendChild($this->lbl);
		$this->row->appendChild($this->input);
		# Add error only if has rules
		if ($field->hasRules()) {
			$this->row->appendChild($this->error);
		}
		$this->row->appendChild($this->tip);
			
		$parentDOM->appendChild($this->row);
		
		# Chaining
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @return \DOMDocument
	*/
	protected abstract function & renderInput(\DOMDocument & $document);
	
}
