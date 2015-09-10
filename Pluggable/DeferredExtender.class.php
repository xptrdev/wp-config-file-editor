<?php
/**
* 
*/

namespace WCFE\Pluggable;

#Imports
use WCFE\Modules\Editor\Model\EditorModel;
 
/**
* 
*/
class DeferredExtender
{

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $baseNs;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $flatFields = array();
	
	/**
	* put your comment there...
	* 
	* @var \WCFE\Plugin
	*/
	protected $wcfePlugin;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $uiContainers;
	
	/**
	* put your comment there...
	* 
	* @param \WCFE\Plugin $wcfePlugin
	* @param mixed $baseNs
	* @param mixed $fields
	* @return DeferredExtender
	*/
	public function __construct( \WCFE\Plugin & $wcfePlugin, $baseNs, $fields )
	{
		# Initialize
		$this->wcfePlugin =& $wcfePlugin;
		$this->baseNs = $baseNs;
		$this->fields = $fields;
		
		# Model (model-map, form and genertor) fields registration hooks
		add_filter( \WCFE\hooks::FILTER_MODEL_EDITOR_REGISTER_FIELDS, array( $this, '_registerModelFields' ) );
		add_filter( \WCFE\hooks::FILTER_MODEL_EDITOR_FORM_FIELDS, array( $this, '_registerFormFields' ) );
		add_filter( \WCFE\hooks::FILTER_MODEL_EDITOR_GENERATOR_FIELDS, array( $this, '_registerGeneratorFields' ) );
		
		# View hooks
		foreach ( $this->fields as $fieldsViewHookName => $fieldsData )
		{
			# Register filter for every view/tab/ui-container
			add_filter( $fieldsViewHookName, array( $this, '_registerViewFields' ) );
			
			# Aggregate all field names in one array
			$this->flatFields = array_merge( $this->flatFields, $fieldsData[ 'list' ] );
		}
		
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $fields
	*/
	public function _registerFormFields( $fields )
	{
		
		$fields = $this->buildNsFields( $fields, 'Form' );
		
		return $fields;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $fields
	*/
	public function _registerGeneratorFields( $fields )
	{
		
		$fields = $this->buildNsFields( $fields, 'Generator' );
		
		return $fields;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $fields
	*/
	public function _registerModelFields( $fields )
	{
		# Reisgter all fields by its given name
		return array_merge( $fields, $this->flatFields );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $tabs
	*/
	public function _registerUIContainers( $list )
	{
		
		foreach ( $this->uiContainers as $uiContainer )
		{			
			$list = array_merge( $list, EditorModel::makeClassesList( $uiContainer ) );
		}
		
		return $list;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $fields
	*/
	public function _registerViewFields( $fields )
	{
		
		# Get requested container fields data fro\\m filter name
		$filterName = current_filter();
		$uiContainer = $this->fields[ $filterName ];
		
		# build fields list
		$namespace = $this->getUIContainerNamespace( 'Renderer', $uiContainer[ 'namespace' ] );
		
		$renderersList = EditorModel::makeClassesList( array( $namespace => $uiContainer[ 'list' ] ) );
		
		return array_merge( $fields, $renderersList );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $coreFields
	* @param mixed $namespace
	*/
	protected function buildNsFields( $coreFields, $typeNamespace )
	{
		
		$nsFields = array();
		
		foreach ( $this->fields as $fieldsData )
		{
			
			# Get full namespace for requested type (form ,generator, renderer)
			$fieldNamespace = $this->getUIContainerNamespace( $typeNamespace, $fieldsData[ 'namespace' ] );
			
			# Build full field class names (merged with the namespace)
			$fieldsList = EditorModel::makeClassesList( array( $fieldNamespace => $fieldsData[ 'list' ] ) );
			
			$nsFields = array_merge( $nsFields, $fieldsList );
			
		}
		
		$nsFields = array_merge( $coreFields, $nsFields );
		
		return $nsFields;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $typeNamespace
	* @param mixed $uiContainerNs
	*/
	protected function getUIContainerNamespace( $typeNamespace, $uiContainerNs )
	{
		
		$namespace = "{$this->baseNs}\\{$typeNamespace}\\{$uiContainerNs}";
		
		return $namespace;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $list
	*/
	public function registerUIContainers( $list )
	{
		
		$this->uiContainers = $list;
		
		# Register ui container hooks
		foreach ( $list as $filterName => $names )
		{
			add_filter( $filterName, array( $this, '_registerUIContainers' ) );
		}
		
		return $this;
	}

}
