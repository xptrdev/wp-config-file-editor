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
	const TASK_SAVE = 'Save';

	/**
	* put your comment there...
	* 
	* @param mixed $fields
	* @return ConfigFileForm
	*/
	public function __construct( $fields ) {
		
		# Define form parameters
		parent::__construct('configFileFields', 'stoken');
		
		# Get fields list
		$fields = array
		(
			'WCFE\Modules\Editor\Model\Forms\Fields' => $fields,
			'WCFE\Modules\Editor\Model\Forms\Fields\Others' => array
			(
				'Task', /* Special field for Controller, not part of config file vars */
			),
		);
		
		# Make sfields list
		$fields = EditorModel::makeClassesList( $fields );
		
		# Add fields
		foreach ( $fields as $fieldClass => $fieldName )
		{
			$this->addChain( new $fieldClass() );
		}
	}

}
