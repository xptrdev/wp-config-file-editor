<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

use WCFE\Modules\Editor\Model\EditorModel;

/**
* 
*/
abstract class SimpleSubContainerTab extends Tab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName;
	
	/**
	* put your comment there...
	* 
	* @param mixed $list
	*/  
	protected function bcCreateFieldsList( $fields )
	{
		
		$form =& $this->getForm();
		$formAdapter =& $this->getFormAdapter();
		
		foreach ( $fields as $groupName => $groupFields )
		{
			
			$groupFields = EditorModel::makeClassesList( $groupFields );	
			
			$renderers = array();
			
			# Create form fields.
			foreach ( $groupFields as $fieldClass => $name )
			{
				# Get field
				$field =& $formAdapter->getField( $fieldClass, $name );
				
				# Create field render for current fiels.
				$rendererClass = $formAdapter->getRendererClass( $fieldClass );
				$renderers[ ] = new $rendererClass( $form, $field );
			}
			
			$fields[ $groupName ] = $renderers;
		}

		return $fields;
	}

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDoc
	* @param {\DOMDocument|\DOMElement} $tab
	*/
	protected function renderContent( \DOMDocument & $tabsDoc, \DOMElement & $tab )
	{
		
		# Create container for every container found in fields list
		# Render container fields to be inside the container
		foreach ( $this->fields as $subContainerName => $subContainerFields )
		{
			
			$containerEle = $tabsDoc->createElement( 'div' );
			$containerEle->setAttribute( 'id', "subcontainer-{$subContainerName}" );
			$containerEle->setAttribute( 'class', 'simple-sub-container' );
			
			$tab->appendChild( $containerEle );
			
			$this->renderFields( $tabsDoc, $containerEle, $subContainerFields, $this->fieldsPluggableFilterName );
		}
		
	}

	
}
	