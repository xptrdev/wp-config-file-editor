<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Groups;

# Forms framework
use WPPFW\Forms\Form;

/**
* 
*/
abstract class Group {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsNamespace;
		
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $form;
	
	/**
	* put your comment there...
	* 
	* @param mixed $fieldsNamespace
	* @param Form $form
	* @return {Group|Form}
	*/
	public function __construct($fieldsNamespace, Form & $form) {
		# Initialize
		$this->fieldsNamespace =& $fieldsNamespace;
		$this->form =& $form;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getFields() {
		return $this->fields;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getName() {
		# Get class name into array
		$classNameArray = array_reverse(explode('\\', get_class($this)));
		# Return only the name
		return $classNameArray[0];
	}

	/**
	* put your comment there...
	* 
	*/
	protected abstract function getTitle();
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parentDOM
	* @return {\DOMDocument|\DOMElement}
	*/
	public function render(\DOMDocument & $document, \DOMElement & $parentDOM) {
		# Initialize
		$form =& $this->form;
		$groupDOM = new \DOMDocument();
		# Loafng Groun mark up with PHP code evalutaed
		ob_start();
		require 'Templates/Group.html';
		# Load Group markups into DOM for mainpulating
		$groupDOM->loadXML(ob_get_clean());
		# Add group markup to For doc
		$groupElement = $document->importNode($groupDOM->documentElement, true);
		$groupDOM = null;
		# Getting Group UL list
		$groupList = $groupElement->childNodes->item(3);
		# Create form fields.
		foreach ($this->getFields() as $fieldName) {
			# Get field
			$field = $form->get($fieldName);
			# Create field render for current fiels.
			$rendererClass = "{$this->fieldsNamespace}\\{$fieldName}\\Field";
			$renderer = new $rendererClass($form, $field);
			$renderer->render($document, $groupList);
		}
		# Add group to form
		$parentDOM->appendChild($groupElement);
		# Chaining
		return $this;
	}

}