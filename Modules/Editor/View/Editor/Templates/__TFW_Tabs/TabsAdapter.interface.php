<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

/**
* 
*/
interface ITabsFormAdapter
{
	
    /**
    * 
    */
    public function __( $txt );
    
	/**
	* 
	*/
	public function & getField( $fieldClass, $fieldName );
	
	/**
	* 
	*/
	public function getFieldId( & $renderer );
	
	/**
	* 
	*/
	public function getFieldName( & $renderer );
	
	/**
	* 
	*/
	public function getRendererClass( $rendererClass );
	
	/**
	* 
	*/
	public function renderPanel( \DOMDocument & $tabsDoc, \DOMElement & $tabElement );
	
	/**
	* put your comment there...
	* 
	* @param mixed $doc
	* @param mixed $row
	*/
	public function renderRow( $doc, $row, $renderer );
	
}