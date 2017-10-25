<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Lib;

use WPPFW\Forms;
use WCFE\Modules\Editor\Lib\ConfigFileFormFieldsFactory;


/**
* 
*/
abstract class FieldsFactoryBase
extends RWFactoryBase
{
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $factorySuffix = 'create';
    
    /**
    * put your comment there...
    * 
    */
    public function getAllFields()
    {
        
        $fields = array();
        $factories = $this->getAllFactories();
        
        foreach ($factories as $factory)
        {
            $fields[] = $factory->invoke($this);
        }
        
        return $fields;
    }
    
}