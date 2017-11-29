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
implements IWriter
{

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $content;
    
    /**
    * put your comment there...
    * 
    * @var WriterFieldsFactory
    */
    protected $fieldsFactory;

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
        return $this->content;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function & generate()
    {
        
        ob_start();

        require __DIR__ . DIRECTORY_SEPARATOR . 'Templates' .
                DIRECTORY_SEPARATOR . 'WriterWPConfig.php';

        $this->content = ob_get_clean();
        
        return $this;
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
    */
    public function & generateWithMSInitCode()
    {
        
        // Generate
        $this->generate();
        
        // Generate MS Init Code
        $initCode = $this->fieldsFactory->specialFieldCreateMSInitCodeField();
        
        $this->content .= (string) $initCode;
        
        return $this;
    }

    /**
    * put your comment there...
    * 
    */
    public function & generateWithMSInitCodeRemoved()
    {
        return $this->generate();
    }
    
}