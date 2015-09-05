<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

# Form Framework
use WPPFW\Forms\Form;
use WPPFW\Forms\Fields\IField;

/**
* 
*/
abstract class Field {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $comments = array();
	
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
	protected $type;

	/**
	* put your comment there...
	* 
	* @param Form $form
	* @param {Form|IField} $field
	* @return {Field|Form|IField}
	*/
	public function __construct(Form & $form, IField & $field) {
		# Initialize
		$this->form =& $form;
		$this->field =& $field;
		# Get type
		$this->type = $this->getType();
		# Initialize child
		$this->initialize();
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString()
	{
		
		# Initialize
		$string = "\n";
		
		# List comments
		foreach ( $this->comments as $comment )
		{
			$string .= "\n/**\n*  " . preg_replace( "/\n\s+/", "\n*  ", $comment ) . "\n*/\n";
		}
		
		# Get model definition string
		$string .= $this->getDefString();
		
		return $string;
	}

	/**
	* put your comment there...
	* 
	*/
	protected abstract function getDefString();
	
	/**
	* put your comment there...
	* 
	*/
	protected abstract function getType();
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {;}

}