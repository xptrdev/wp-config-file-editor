<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

use WCFE\Modules\Editor\Model\ConfigFile\Templates\Master\Master;

# Form Framework
use WPPFW\Forms\Form;
use WPPFW\Forms\Fields\IField;

/**
* 
*/
abstract class Field
{
	
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $cbInitSuppression;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $cbValue;
    
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $comments;
	
	/**
	* put your comment there...
	* 
	* @var Form
	*/
	protected $form;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $generaotor;
    
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name;
	
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $params;
    
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = false;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutputDeps = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutputForce = false;
	
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $suppressionValue = null;
    
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $type;

    /**
    * put your comment there...
    * 
    * @param mixed $form
    * @param mixed $name
    * @param mixed $type
    * @param mixed $cbValue
    * @param mixed $comments
    * @param mixed $params
    * @return Field
    */
	public function __construct(& $generator,
                                $name, 
                                $type = null, 
                                $comments = null, 
                                $params = null,
                                $cbValue = null,
                                $cbInitSuppression = null)
	{
        
        $this->generator =& $generator;
		$this->form =& $generator->getForm();
		$this->name = $name;
		$this->type = $type;
        $this->comments = $comments ? $comments : array();
        $this->cbValue = $cbValue ? $cbValue : array($this, '_cbDefaultGetValue');
        $this->cbInitSuppression = $cbInitSuppression;
        
        if (!$params)
        {
            $params = array();
        }
        
        # Other parameters
        foreach ( $params as $paramName => $paramVal )
        {
            $this->{$paramName} = $paramVal;
        }
        
		# Initialize object
		$this->initialize();
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString()
	{
		
		# Initialize
		$string = "\n";
		
		# List comments
		foreach ( $this->comments as $comment )
		{
			$string .= "\n/**\n*  " . preg_replace( "/\n\s+/", "\n*  ", $comment ) . "\n*/\n";
		}
		
		# Get model definition string
		$string .= $this->getDefString();
		
		return $string;
	}

    /**
    * put your comment there...
    * 
    */
    public function _cbDefaultGetValue()
    {
        return $this->getField()->getValue();
    }
    
	/**
	* put your comment there...
	* 
	*/
	public function & initSuppression()
	{
		
		$value = $this->getValue();
		
		# Got out if to suppress output
		if ($this->suppressOutput && (!$value || ($this->getValue() == $this->getSuppressionValue())))
		{
			
			$this->setSuppressOutputForce(true);
			
			# Force all deps fields to not output as well
			foreach ($this->suppressOutputDeps as $fieldName)
			{
				$this->getGenerator()->getField($fieldName)->setSuppressOutputForce(true);
			}
			
		}
		
        if ($cbInitSupression = $this->cbInitSuppression)
        {
            $cbInitSupression($this);
        }
        
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected abstract function getDefString();
	
	/**
	* put your comment there...
	* 
	*/
	public function & getField()
	{
		return $this->form->get($this->name);
	}
	
    /**
    * put your comment there...
    * 
    */
    public function & getForm()
    {
        return $this->form;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function & getGenerator()
    {
        return $this->generator;
    }
    
	/**
	* put your comment there...
	* 
	*/
	public function getName() 
    {
		return $this->name;
	}
	
    /**
    * put your comment there...
    * 
    * @param mixed $name
    */
    public function getParam($name)
    {
        return $this->params[$name];
    }
    
	/**
	* put your comment there...
	* 
	*/
	protected function getSuppressionValue()
	{
		return $this->suppressionValue;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getType()
    {
        return $this->type;
    }
	
	/**
	* put your comment there...
	* 
	*/
	public function getValue()
	{
        
        $cbValue = $this->cbValue;
        
		return $cbValue($this);
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {}
	
    /**
    * put your comment there...
    * 
    */
    public function isSuppressed()
    {
        return $this->suppressOutputForce;
    }

    /**
    * put your comment there...
    * 
    * @param mixed $cbValue
    * @return Field
    */
    public function & setCBValue($cbValue)
    {
        
        $this->cbValue = $cbValue;
        
        return $this;
    }
        
    /**
    * put your comment there...
    * 
    * @param mixed $name
    * @param mixed $value
    */
    public function & setParam($name, $value)
    {
        $this->params[$name] = $value;
        
        return $this;
    }
    
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function & setSuppressOutputForce( $value) 
	{
		
		$this->suppressOutputForce = $value;
		
		return $this;
	}
	
    /**
    * put your comment there...
    * 
    * @param mixed $value
    * @return Field
    */
    public function & setSuppressionValue($value)
    {
        $this->suppressionValue = $value;
        
        return $this;
    }
    
    /**
    * put your comment there...
    * 
    * @param Types\Itype $type
    * @return {Field|Types\Itype}
    */
    public function & setType(Types\Itype $type)
    {
        
        $this->type =& $type;
        
        return $this;
    }
    

}