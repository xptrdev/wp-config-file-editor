<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs;

use \WCFE\Modules\Editor\View\Editor\Templates\Tabs\ITabsFormAdapter;

/**
* 
*/
class SysFiltersFormTabsAdapter implements ITabsFormAdapter 
{
	
	/**
	* put your comment there...
	* 
	* @var \DOMElement
	*/
	protected $currentPanel;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $form;
	
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $view;

    /**
    * put your comment there...
    * 
    * @param mixed $txt
    */
    public function __( $txt )
    {
        return call_user_func_array( array( $this->getView(), '__' ), func_get_args() );
    }
    
    /**
    * put your comment there...
    * 
    * @param \WPPFW\Forms\Form $form
    * @param mixed $view
    * @return EditorFormTabsAdapter
    */
    public function __construct( \WPPFW\Forms\Form & $form, & $view )
    {
        $this->form =& $form;
        $this->view =& $view;
    }
	
	/**
	* put your comment there...
	* 
	* @param \WPPFW\Forms\Form $form
	* @param mixed $fieldClass
	* @param mixed $fieldName
	*/
	public function & getField( $fieldClass, $fieldName )
	{
		trigger_error( 'TabsFormAdapter::getField is not implemeted when using SysFilters Tabs', E_USER_ERROR );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $field
	*/
	public function getFieldId( & $renderer )
	{
		
		$id = str_replace( '/', '-', $renderer->getField()->getPath() );
		
		return $id;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $field
	*/
	public function getFieldName( & $renderer )
	{
		$fieldPath = explode( '/', $renderer->getField()->getPath() );
		
		$formName = array_shift( $fieldPath );
		
		$fieldName = implode( '][', $fieldPath );

		return "{$formName}[{$fieldName}]";
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $rendererClass
	*/
	public function getRendererClass( $rendererClass )
	{
		return $rendererClass;
	}

    /**
    * put your comment there...
    * 
    */
    public function & getView()
    {
        return $this->view;
    }

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDoc
	* @param {\DOMDocument|\DOMElement} $tabElement
	* @return {\DOMDocument|\DOMElement}
	*/
	public function renderPanel( \DOMDocument & $tabsDoc, \DOMElement & $tabElement )
	{
		
		$panelId = $tabElement->getAttribute( 'id' ) . '-advanced-panel';
		
		# Create Advanced options Panel
		$this->currentPanel = $tabsDoc->createElement( 'div' );
		$this->currentPanel->setAttribute( 'id', $panelId );
		$this->currentPanel->setAttribute( 'class', 'wcfe-sysfilters-tab-advanced-panel' );
		
		$tabElement->appendChild( $this->currentPanel );
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $doc
	* @param mixed $row
	* @param mixed $field
	*/
	public function renderRow( $doc, $tabRow, $renderer )
	{ 
		
		$panelRow = $doc->createElement( 'div' );
		
		$rendererOptionPanel = $renderer->getParam( 'optionsPanel' );
		$rendererOptionPanel->bind( $this->form, $this, $renderer );
		
		
		$rendererOptionPanel->render( $doc, $panelRow );
		
		$this->currentPanel->appendChild( $panelRow );
	}
	
}