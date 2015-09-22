<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class UpgradeAutoCore extends Constant {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $value;
	
  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'The easiest way to manipulate core updates is with the WP_AUTO_UPDATE_CORE constant'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WP_AUTO_UPDATE_CORE';

	/**
	* put your comment there...
	* 
	*/
	public function & allReady()
	{
		
		parent::allReady();
		
		# Based on the value create either BOOLEAN or STRING type 
		# and set the value
		$stringValue = $this->field->getValue();
		
		if ( $stringValue != 'minor' )  // It means either true/false
		{
			$this->type = new Types\BooleanType();
			$this->value = $stringValue == 'true' ? true : false;
		}
		else 
		{
			$this->type = new Types\StringType();
			$this->value = $stringValue;
		}
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue()
	{
		return $this->value;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getType() 
	{
		return $this->type;
	}

}

