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
	* @param Form $form
	* @param mixed $fields
	* @return Master
	*/
	public function __construct( Form & $form, $fields ) {
		# initialize
		$this->form =& $form;
		
		# Define fields
		$fields = array
		(
			'WCFE\Modules\Editor\Model\ConfigFile\Fields' => $fields
		);
		
		# Make fields list
		$fields = EditorModel::makeClassesList( $fields );
		
		# Create all fieldsw
		foreach ( $fields as $fieldClass => $fieldName )
		{
			$this->fields[ $fieldName ] = new $fieldClass( $form, $form->get( $fieldName ) );
		}
		
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		# Import wp-config.php template files
		ob_start();
		require 'wp-config.php';
		# Return final file
		return ob_get_clean();
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

}