<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms;

# Forms framework
use WPPFW\Forms;
use WCFE\Modules\Editor\Model\EditorModel;
use WCFE\Modules\Editor\Model\ConfigFileFieldsNameMap;
use WCFE\Modules\Editor\Lib\ConfigFileFormFieldsFactory;

/**
* 
*/
class ConfigFileForm
extends Forms\SecureForm
{
	
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
    */
	public function __construct() 
	{
		
		# Define form parameters
		parent::__construct( 'configFileFields', 'stoken' );
        
        # Define config file fields
        $this->defineFields();
        
        # Request fields
        $this->add( new Forms\Fields\FormStringField( 'Task', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
	}
    
    /**
    * put your comment there...
    * 
    */
    protected function defineFields()
    {
        
        $fieldsFactory = ConfigFileFormFieldsFactory::instance();
        $fields = $fieldsFactory->getAllFields();
        
        foreach ($fields as $field)
        {
            $this->add($field);
        }
        
    }
    
}
