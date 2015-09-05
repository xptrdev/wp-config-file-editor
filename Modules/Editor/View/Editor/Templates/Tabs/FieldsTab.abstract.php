<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

/**
* 
*/
abstract class FieldsTab extends Tab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields;
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDom
	* @param {\DOMDocument|\DOMElement} $tab
	* @return {\DOMDocument|\DOMElement}
	*/
	protected function renderContent( \DOMDocument & $tabsDom, \DOMElement & $tab )
	{
		return $this->renderFields( $tabsDom, $tab, $this->fields );
	}
	
}
	