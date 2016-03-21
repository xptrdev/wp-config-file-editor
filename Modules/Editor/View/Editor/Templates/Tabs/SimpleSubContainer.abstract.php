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
	protected $containersData = array();
	
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
				$renderer = new $rendererClass( $form, $field );
                
                $renderer->extensionsInit( $this->tabs->getFormAdapter() );
                
                $renderers[ ] = $renderer;
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
			
			// Display other data if supplied
			// This is added lately so its conditionally displayed 
			// for backward compatibility
			if ( isset( $this->containersData[ $subContainerName ] ) )
			{
				$containerData = $this->containersData[ $subContainerName ];
				
				$titleEle = $tabsDoc->createElement( 'strong' );
				$titleEle->setAttribute( 'class', 'title' );
				$titleEle->nodeValue = $containerData[ 'title' ];
				
				$containerEle->appendChild( $titleEle );
			}
			
			$tab->appendChild( $containerEle );
			
			$this->renderFields( $tabsDoc, $containerEle, $subContainerFields, $this->fieldsPluggableFilterName );
		}
		
	}

	
}
	