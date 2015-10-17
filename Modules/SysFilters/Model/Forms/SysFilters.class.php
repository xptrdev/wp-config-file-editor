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
		$this->miscModule()
				 ->httpModule()
				 ->editorModule()
				 ->ksesModule();
				 
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function & editorModule()
	{
		
		$module = $this->add( new Forms\Fields\FormListField( 'editor' ) );
		
		/////////////
		$module->add( new Forms\Fields\FormListField( 'autoParagraph' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		/////////////
		$module->add( new Forms\Fields\FormListField( 'editorHeight' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 	 
		/////////////
		$module->add( new Forms\Fields\FormListField( 'mediaButtons' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		/////////////
		$module->add( new Forms\Fields\FormListField( 'dragDropUpload' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 	 
		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'textAreaRows' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'tabIndex' ) )
				 	 ->addChain( new Forms\Fields\FormStringField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'editorCSS' ) )
				 	 ->addChain( new Forms\Fields\FormStringField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'editorClass' ) )
				 	 ->addChain( new Forms\Fields\FormStringField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'teeny' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'tinyMCE' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'quickTags' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
				 	 ->addChain( new Forms\Fields\FormStringField( 'buttons' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		/////////////		 	 
		$module->add( new Forms\Fields\FormListField( 'plugins' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormStringField( 'plugin' ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		$module->add( new Forms\Fields\FormListField( 'buttons2' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormStringField( 'button' ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 	 				 	 				 	 				 	 				 	 				 	 
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function httpModule()
	{
		
		$module = $this->add( new Forms\Fields\FormListField( 'http' ) );
		
		// Timeout
		$module->add( new Forms\Fields\FormListField( 'timeOut' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value', array( new Forms\Rules\RequiredField() ) ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

				 
		// Redirect count
		$module->add( new Forms\Fields\FormListField( 'redirectCount' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

				 
		// Version
		$module->add( new Forms\Fields\FormListField( 'version' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'value', array( new Forms\Rules\RequiredField() ) ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
				 
		// User Agent
		$module->add( new Forms\Fields\FormListField( 'userAgent' ) )
				 ->addChain( new Forms\Fields\FormStringField( 'value', array( new Forms\Rules\RequiredField() ) ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
				 
		// Reject Unsafe Urls
		$module->add( new Forms\Fields\FormListField( 'rejectUnsafeUrls' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		$module->add( new Forms\Fields\FormListField( 'stream' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		$module->add( new Forms\Fields\FormListField( 'blocking' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 
		$module->add( new Forms\Fields\FormListField( 'compress' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );		 
	
		$module->add( new Forms\Fields\FormListField( 'decompress' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );			 
		
		$module->add( new Forms\Fields\FormListField( 'responseSizeLimit' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
			 				 
		// Proxy Block local requests
		$module->add( new Forms\Fields\FormListField( 'proxyBlockLocalRequests' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
			
		# HTTPS Local SSL verify
		$module->add( new Forms\Fields\FormListField( 'localSSLVerify' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
				 
		# HTTPS SSL verify
		$module->add( new Forms\Fields\FormListField( 'sslVerify' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		
		# Use steam transport
		$module->add( new Forms\Fields\FormListField( 'useSteamTransport' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		# Use Curl transport
		$module->add( new Forms\Fields\FormListField( 'useCurlTransport' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		$module->add( new Forms\Fields\FormListField( 'allowLocalHost' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 ->add( new Forms\Fields\FormListField( 'options' ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 
		return $this;		 
	}

	/**
	* put your comment there...
	* 
	*/
	public function ksesModule()
	{
		
		$module = $this->add( new Forms\Fields\FormListField( 'kses' ) );
		
		$module->add( new Forms\Fields\FormListField( 'protocols' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormStringField( 'protocol' ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		$module->add( new Forms\Fields\FormListField( 'postTags' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormArrayField( 'attributes', new Forms\Fields\FormStringField( 'attribute' ) ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		$module->add( new Forms\Fields\FormListField( 'commentTags' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormArrayField( 'attributes', new Forms\Fields\FormStringField( 'attribute' ) ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		$module->add( new Forms\Fields\FormListField( 'entities' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormStringField( 'entity' ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 	
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function miscModule()
	{
		
		$module = $this->add( new Forms\Fields\FormListField( 'misc' ) );
		
		$module->add( new Forms\Fields\FormListField( 'queryVars' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormStringField( 'var' ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		$module->add( new Forms\Fields\FormListField( 'quality' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
		
		$module->add( new Forms\Fields\FormListField( 'memoryLimit' ) )
				 	 ->addChain( new Forms\Fields\FormStringField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		$module->add( new Forms\Fields\FormListField( 'themesPersistCache' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'value' ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );

		$module->add( new Forms\Fields\FormListField( 'uploadAllowedMimes' ) )
				 	 ->addChain( new Forms\Fields\FormArrayField( 'value', new Forms\Fields\FormArrayField( 'extensions', new Forms\Fields\FormStringField( 'extension' ) ) ) )
					
					// Field advanced options
				 	 ->add( new Forms\Fields\FormListField( 'options' ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'priority', array( new Forms\Rules\RequiredField() ) ) )
				 	 ->addChain( new Forms\Fields\FormIntegerField( 'disabled' ) );
				 	 				 	 				 	 
		return $this;	
	}
	
}
	
	