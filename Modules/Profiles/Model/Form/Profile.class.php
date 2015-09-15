<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Profiles\Model\Forms;

# Forms framework
use WPPFW\Forms;

/**
* 
*/
class ProfileForm extends Forms\Form 
{
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() 
	{
		# Define form parameters
		parent::__construct('profileForm', 'stoken');
		# Add fields
		$this->addChain( new Forms\Fields\FormStringField( 'name' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'description' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'id' ) );
	}
	
}