<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

use WCFE\Modules\Editor\Model\ConfigFile\Templates\Master\Master;

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
	protected $name;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $model;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = false;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutputDeps = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutputForce = false;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $type;

    /**
    * put your comment there...
    * 
    * @param Master $model
    * @param {IField|Master} $field
    * @param mixed $type
    * @param mixed $params
    * @return Field
    */
	public function __construct( Master & $model, IField & $field, $type, $params = null )
	{
		
		$this->model =& $model;
		$this->form =& $model->getForm();
		$this->field =& $field;
		$this->type = $type;
        
        # Other parameters
        foreach ( $params as $paramName => $paramVal )
        {
            $this->{$paramName} = $paramVal;
        }
        
		# Initialize object
		$this->initialize();
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString()
	{
		
		# Got out if to suppress output
		if ( $this->suppressOutputForce )
		{
			# Return no contents
			return '';
		}
		
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
	public function & allReady()
	{
		
		$value = $this->getValue();
		
		# Got out if to suppress output
		if ( $this->suppressOutput && ( ! $value || ( $this->getValue() == $this->getSuppressionValue() ) ) )
		{
			
			$this->setSuppressOutputForce( true );
			
			# Force all deps fields to not output as well
			foreach ( $this->suppressOutputDeps as $fieldName )
			{
				$this->getModel()->getField( $fieldName )->setSuppressOutputForce( true );
			}
			
		}
		
		return $this;
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
	public function & getField()
	{
		return $this->field;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getModel() 
	{
		return $this->model;	
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getName() {
		return $this->name;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getSuppressionValue()
	{
		return null;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function & getType()
    {
        return $this->type;
    }
    
	
	/**
	* put your comment there...
	* 
	*/
	protected function getValue()
	{
		return $this->field->getValue();
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {}
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function & setSuppressOutputForce( $value) 
	{
		
		$this->suppressOutputForce = $value;
		
		return $this;
	}
	

}