<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\Model\Forms;

# Forms framework
use WPPFW\Forms;

/**
* 
*/
class SysFiltersOptionsForm extends Forms\Form 
{
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct()
	{
		
		parent::__construct( 'wcfe-sysfilters' );
		
		$http = $this->add( new Forms\Fields\FormListField( 'http' ) );
		
		// Timeout
		$http->add( new Forms\Fields\FormListField( 'timeOut' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value', array( new Forms\Rules\RequiredField() ), 5 ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ), 10 ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		// Redirect count
		$http->add( new Forms\Fields\FormListField( 'redirectCount' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value', null, 5 ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ), 10 ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		// Version
		$http->add( new Forms\Fields\FormListField( 'version' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'value', array( new Forms\Rules\RequiredField() ), '1.0' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ), 10 ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 
		// User Agent
		$http->add( new Forms\Fields\FormListField( 'userAgent' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'value', array( new Forms\Rules\RequiredField() ), 'WordPress/' . $GLOBALS[ 'wp_version' ] . '; ' . get_bloginfo( 'url' ) ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ), 10 ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 
		// Reject Unsafe Urls
		$http->add( new Forms\Fields\FormListField( 'rejectUnsafeUrls' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ), 10 ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
	}
	
}
	
	