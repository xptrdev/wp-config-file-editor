<?php
/**
* 
*/

namespace WCFE\Libraries\Forms\Rules;

/**
* 
*/
class RequiredField extends \WPPFW\Forms\Rules\RequiredField
{
  
    /**
    * put your comment there...
    * 
    * @param mixed $message
    */
    protected function getMessageString( $message )
    {

        switch ( $message )
        {
            case self::MSG_CANNOT_EMPTY:
            
                return \WCFE\Plugin::__( 'Field Cannot be empty' );
            
            break;
            
            default:
            
            $string = false;
        }
        
        return $string;
    }
    
}
