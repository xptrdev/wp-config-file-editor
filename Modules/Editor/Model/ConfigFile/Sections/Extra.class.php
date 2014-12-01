<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Sections;

# Forms Framework
use WPPFW\Forms\Form;

# Fields
use WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class Extra extends Section {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $debug;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $lang;
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @return Form
	*/
	protected function initializeRenderers(Form & $form) {
		# Create renderers
		$this->debug = new Fields\WPDebug($form, $form->get('WPDebug'));
		$this->lang = new Fields\WPLang($form, $form->get('WPLang'));
	}

	/**
	* put your comment there...
	* 
	*/
	public function & debug() {
		return $this->debug;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & lang() {
		return $this->lang;
	}
	
}