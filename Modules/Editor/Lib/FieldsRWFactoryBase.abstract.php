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
abstract class RWFactoryBase
{

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $factorySuffix;

    /**
    * put your comment there...
    * 
    * @param mixed $key
    * @param mixed $params
    */
    public function create($key, $params = array())
    {
        
        $factoryMethodName = ConfigFileFactoriesFieldsNameMap::getFieldFactoryName($key);
        
        $factoryMethodName = "{$this->factorySuffix}{$factoryMethodName}";
        
        $field = $this->$factoryMethodName($params);
        
        return $field;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function getAllFactories()
    {
        
        $fieldsFactories = array();
        
        $reflection = new \ReflectionClass($this);
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
        
        /**
        * put your comment there...
        * 
        * @var \ReflectionMethod
        */
        $method;
        
        foreach ($methods as $method)
        {
            if  (   (strpos($method->getName(), $this->factorySuffix) === 0) &&
                    (strlen($method->getName()) > strlen($this->factorySuffix)))
            {
                $fieldsFactories[] = $method;
            }
        }
        
        return $fieldsFactories;
    }
    
}