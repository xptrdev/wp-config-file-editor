<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class SecurityAccessibleHosts extends Constant {
  
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $comments = array
	(
		'The constant WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests'
	);
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WP_ACCESSIBLE_HOSTS';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue()
	{
		return implode( ',', $this->field->getValue() );
	}
	
}

