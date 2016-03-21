<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

/**
* 
*/
class EditorFormTabsAdapter implements ITabsFormAdapter 
{
	
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
    public function _( $txt )
    {
        return call_user_func_array( array( $this->getView(), '_' ), func_get_args() );
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
		return $this->form->get( $fieldName );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $field
	*/
	public function getFieldId( & $renderer )
	{
		return "{$this->form->getName()}-{$renderer->getField()->getName()}";
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $field
	*/
	public function getFieldName( & $renderer )
	{
		return "{$this->form->getName()}[{$renderer->getField()->getName()}]";
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $rendererClass
	*/
	public function getRendererClass( $rendererClass )
	{
		return "{$rendererClass}\\Field";
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
	public function renderPanel( \DOMDocument & $tabsDoc, \DOMElement & $tabElement ) {}
	
	/**
	* put your comment there...
	* 
	* @param mixed $doc
	* @param mixed $row
	*/
	public function renderRow( $doc, $row, $renderer )
	{
		
		# Constants Variables names
		$fieldGenClass = 'WCFE\Modules\Editor\Model\ConfigFile\Fields\\' . $renderer->getField()->getName();
		$fieldGenObj = new $fieldGenClass( );
			
		$name = $doc->createElement( 'p' );
		$name->setAttribute( 'class', 'field-constant-name' );
		$name->nodeValue = $fieldGenObj->getName();
		
		$row->appendChild( $name );
	}
	
}