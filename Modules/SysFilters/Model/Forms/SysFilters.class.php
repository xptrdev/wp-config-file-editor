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
		
		# HTTP MODULE
		$http = $this->add( new Forms\Fields\FormListField( 'http' ) );
		
		
		// Timeout
		$http->add( new Forms\Fields\FormListField( 'timeOut' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value', array( new Forms\Rules\RequiredField() ) ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

				 
		// Redirect count
		$http->add( new Forms\Fields\FormListField( 'redirectCount' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

				 
		// Version
		$http->add( new Forms\Fields\FormListField( 'version' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'value', array( new Forms\Rules\RequiredField() ) ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
				 
		// User Agent
		$http->add( new Forms\Fields\FormListField( 'userAgent' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'value', array( new Forms\Rules\RequiredField() ) ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
				 
		// Reject Unsafe Urls
		$http->add( new Forms\Fields\FormListField( 'rejectUnsafeUrls' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
				 
		// Proxy Block local requests
		$http->add( new Forms\Fields\FormListField( 'proxyBlockLocalRequests' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
			
		# HTTPS Local SSL verify
		$http->add( new Forms\Fields\FormListField( 'localSSLVerify' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
				 
		# HTTPS SSL verify
		$http->add( new Forms\Fields\FormListField( 'sslVerify' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		
		# Use steam transport
		$http->add( new Forms\Fields\FormListField( 'useSteamTransport' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		# Use Curl transport
		$http->add( new Forms\Fields\FormListField( 'useCurlTransport' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 
	}
	
}
	
	