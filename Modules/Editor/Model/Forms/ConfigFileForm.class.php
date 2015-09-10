<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms;

# Forms framework
use WPPFW\Forms;
use WCFE\Modules\Editor\Model\EditorModel;

/**
* 
*/
class ConfigFileForm extends Forms\SecureForm {
	
	/**
	* 
	*/
	const TASK_PREVIEW = 'Preview';
	
	/**
	* 
	*/
	const TASK_VALIDATE = 'Validate';

	/**
	* put your comment there...
	* 
	* @param mixed $fields
	* @return ConfigFileForm
	*/
	public function __construct( $fields ) 
	{
		
		# Define form parameters
		parent::__construct( 'configFileFields', 'stoken' );
		
		# Add TASK field
		$fields[ 'WCFE\Modules\Editor\Model\Forms\Fields\Others\Task' ] = 'Task';
		
		# Add fields
		foreach ( $fields as $fieldClass => $fieldName )
		{
			$this->addChain( new $fieldClass() );
		}
		
	}

}
