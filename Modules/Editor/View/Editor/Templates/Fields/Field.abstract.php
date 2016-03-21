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
	protected $class;

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
    protected $formAdapter;
    
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
    * @param mixed $txt
    */
    protected function _( $txt )
    {
        return call_user_func_array( array( $this->formAdapter, '_' ), func_get_args() );
    }
    
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @param {Form|IField} $field
	* @param mixed $text
	* @param mixed $tipText
	* @param mixed $params
	* @return FieldBase
	*/
	public function __construct(Form & $form, IField & $field, $text = null, $tipText = null, $params = null) {
		# Initialize
		$this->field =& $field;
		$this->form =& $form;
		$this->text = $text;
		$this->tipText = $tipText;
		$this->params =& $params;
	}

    /**
    * put your comment there...
    * 
    * @param mixed $formAdapter
    */
    public function extensionsInit( & $formAdapter )
    {
        $this->formAdapter =& $formAdapter;
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
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @return {\DOMDocument|\DOMElement|InputField}
	*/
	public function render( \DOMDocument & $document, \DOMElement & $parentDOM, $elems, & $formAdapter ) 
	{
		
		$inputElement = $this->renderInput( $document, $parentDOM, $elems, $formAdapter );
					
		$inputElement->setAttribute( 'id', $formAdapter->getFieldId( $this ) );
		$inputElement->setAttribute( 'name', $formAdapter->getFieldName( $this ) );
		
		# Use field type as class name
		$typeClassNameArr = explode( '\\', get_class( $this->getField()->type() ) );
		$inputElement->setAttribute( 'class', $inputElement->getAttribute( 'class' ) . ' ' . strtolower( array_pop( $typeClassNameArr ) ) );
		
		return $inputElement;

	}

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @param mixed $elems
	*/
	protected abstract function & renderInput( \DOMDocument & $document, \DOMElement & $row, $elems, & $formAdapter ); 
	
	/**
	* put your comment there...
	* 
	* @param mixed $class
	* @return FieldBase
	*/
	public function & setClassName( $class )
	{
		$this->class = $class;
		
		return $this;
	}
}
