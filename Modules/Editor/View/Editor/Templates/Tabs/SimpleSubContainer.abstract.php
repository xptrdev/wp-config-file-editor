<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

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
	