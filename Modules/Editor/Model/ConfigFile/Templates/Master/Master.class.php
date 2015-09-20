<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Templates\Master;

# Forms Framework
use WPPFW\Forms\Form;
use WCFE\Modules\Editor\Model\EditorModel;

/**
* 
*/
class Master {
	
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
	* @var mixed
	*/
	protected $specialFields;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $templateName = 'wp-config.php';
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @param mixed $fields
	* @return Master
	*/
	public function __construct( Form & $form, $fields ) {
		# initialize
		$this->form =& $form;
		
		# Create all fieldsw
		foreach ( $fields as $fieldClass => $fieldName )
		{
			$this->fields[ $fieldName ] = new $fieldClass( $this, $form, $form->get( $fieldName ) );
		}
		
		# Allow fields to interact and to Controler each others 
		# by making second iteration after constructions!!
		foreach ( $this->fields as $field )
		{
			
			$field->allReady();
			
		}
		
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() 
	{

		ob_start();
		
		require $this->templateName;
		
		return ob_get_clean();
	}

	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function & getField( $name ) 
	{
		return $this->fields[ $name ];
	}

	/**
	* put your comment there...
	* 
	*/
	public function getFields()
	{
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
	* @param mixed $specialFiels
	*/
	public function & processSpecialFields( $specialFields )
	{

		$this->specialFields = array();
		$this->templateName = 'wp-config-special-fields.php';
		
		# Remove special fields
		
		foreach ( $specialFields as $specialFieldName )
		{
			
			if ( isset( $this->fields[ $specialFieldName ] ) )
			{
				
				$this->specialFields[ $specialFieldName ] =& $this->fields[ $specialFieldName ];
				
				unset( $this->fields[ $specialFieldName ] );
				
			}
			
		}
		
		return $this;
	}
	
}