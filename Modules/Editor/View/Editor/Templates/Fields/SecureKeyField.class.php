<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Fields;

# Field framework
use WPPFW\Forms\Form;
use WPPFW\Forms\Fields\IField;

/**
* 
*/
abstract class SecureKeyField extends InputField {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $maxLength = 64;

}
