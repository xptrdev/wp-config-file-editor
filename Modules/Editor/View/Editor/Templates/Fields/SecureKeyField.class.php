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
abstract class SecureKeyField extends InputField {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $maxLength = 64;
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @return {\DOMDocument|\DOMElement|InputField}
	*/
	public function render(\DOMDocument & $document, \DOMElement & $parentDOM) {
		# Render field
		parent::render($document, $parentDOM);
		# Add key generation button
		$row =& $this->getRow();
		$skGenButton = $document->createElement('a');
		$skGenButton->setAttribute('class', 'secure-key-generator-key');
		$skGenButton->setAttribute('href', '#');
		$skGenButton->nodeValue = '&nbsp;';
		# Add input field class
		$this->getInput()->setAttribute('class', 'secure-key-field');
		$row->insertBefore($skGenButton, $this->getError());
		# Chain
		return $this;
	}

}
