<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Lib\ConfigFile;

use WPPFW\Forms;

/**
* 
*/
class Writer
{

    /**
    * put your comment there...
    * 
    * @var WriterFieldsFactory
    */
    protected $fieldsFactory;
    
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
    private $templateName = 'WriterWPConfig.php';

    /**
    * put your comment there...
    * 
    * @param Form $form
    * @param mixed $fields
    * @return Master
    */
    public function __construct(Forms\Form & $form) 
    {
        
        // Load all wp-config.php files fields
        $this->fieldsFactory = new WriterFieldsFactory($form);
        $this->fieldsFactory->fullLoad();
    }

    /**
    * put your comment there...
    * 
    */
    public function __toString() 
    {

        ob_start();

        require __DIR__ . DIRECTORY_SEPARATOR . 'Templates' .
                DIRECTORY_SEPARATOR . $this->templateName;

        return ob_get_clean();
    }

    /**
    * put your comment there...
    * 
    */
    public function & getFactory()
    {
        return $this->fieldsFactory;
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $specialFiels
    */
    public function & processSpecialFields($specialFields)
    {

        $this->specialFields = array();
        $this->templateName = 'WriterWPConfigSpecialFields.php';

        // Add special fields
        $this->specialFields = $specialFields;

        return $this;
    }

}