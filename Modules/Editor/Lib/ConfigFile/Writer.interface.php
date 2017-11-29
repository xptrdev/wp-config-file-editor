<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Lib\ConfigFile;

/**
* 
*/
interface IWriter
{
    
    public function __toString();
    
    public function & generate();
    
    public function & generateWithMSInitCode();
    
    public function & generateWithMSInitCodeRemoved();
}