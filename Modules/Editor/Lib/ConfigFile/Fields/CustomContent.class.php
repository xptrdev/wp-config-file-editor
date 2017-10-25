<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class CustomContentField 
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
	*/
	public function __toString()
	{
		return $this->content;
	}
    
    /**
    * put your comment there...
    * 
    * @param mixed $path
    */
    public static function & create($template)
    {
        
        $field = new CustomContentField();
        
        $field->setTemplate($template);
        
        return $field;
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $content
    */
    public function & setContent($content)
    {
        
        $this->content = $content;
        
        return $this;
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $path
    */
    public function setTemplate($template)
    {
        
        ob_start();
        
        require $template;
        
        $content = ob_get_clean();
        
        $this->setContent($content);
        
        return $this;
    }

}

