<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
abstract class Constant extends Field {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name;
	
	/**
	* put your comment there...
	* 
	*/
	protected function getName() {
		return $this->name;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getDefString()
	{
		# Prepare Value
		$value = $this->type->prepareValue( $this->getValue() );
		# Final statment
		return "define('{$this->getName()}', {$value});";
	}

}