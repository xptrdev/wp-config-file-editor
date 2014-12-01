<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Sections;

# Forms Framework
use WPPFW\Forms\Form;

/**
* 
*/
abstract class Section {

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
	protected $form;
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @return {Section|Form}
	*/
	public function __construct(Form & $form) {
		# initialize
		$this->form =& $form;
		# Initiiaxe renderers
		$this->initializeRenderers($form);
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
	public function & getForm() {
		return $this->form;
	}

	/**
	* put your comment there...
	* 
	* @param Form $form
	* @return Form
	*/
	protected abstract function initializeRenderers(Form & $form);
	
}