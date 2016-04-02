<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

# Imports
use WPPFW\Forms\Form;
use WCFE\Modules\Editor\Model\EditorModel;

/**
* 
*/
class Tabs {
	
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
	protected $formAdapter;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $id;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $navigatorElement;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tab;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsElement;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsFilterName;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsList;
	
	/**
	* put your comment there...
	* 
	* @var \DOMXPath
	*/
	protected $xpath;

    /**
    * put your comment there...
    * 
    * @param mixed $txt
    */
    protected function _( $txt )
    {
        return call_user_func_array( array( $this->formAdapter, '_' ), func_get_args() );
    }
    
    /**
    * put your comment there...
    * 
    * @param ITabsFormAdapter $formAdapter
    * @param {Form|ITabsFormAdapter} $form
    * @param mixed $tabsList
    * @return Tabs
    */
	public function __construct( ITabsFormAdapter $formAdapter, Form & $form, $tabsList = null) 
	{
		
		$this->formAdapter =& $formAdapter;
		$this->form = $form;
		$this->tabsList = $tabsList;
        
        $this->load();
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getForm() {
		return $this->form;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getFormAdapter() {
		return $this->formAdapter;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function & getNavigatorElement() {
		return $this->navigatorElement;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getTab() {
		return $this->tab;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getTabsElement() {
		return $this->tabsElement;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getTabsList() 
    {
		return $this->tabsList;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $id
	* @param mixed $filterName
	*/
	public function & load()
	{
		# DOMDocument to hold tab component
		$this->tab = new \DOMDocument();
		
		ob_start();
		
		require ( __DIR__ . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR . 'Tabs.html.php' );
		$this->tab->loadXML( ob_get_clean() );
				
		$this->xpath = new \DOMXPath( $this->tab );
		
		# TAB
		$this->tab->documentElement->setAttribute( 'id', $this->id );
		
		# navigator
		$this->navigatorElement = $this->xpath->query('//*[@id="navigator"]')->item( 0 );
		$this->navigatorElement->setAttribute( 'id', "{$this->id}-navigator" );
		
		# Panels
		$this->tabsElement = $this->xpath->query('//*[@id="tabs"]')->item( 0 );
		$this->tabsElement->setAttribute( 'id', "{$this->id}-tabs" );
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function render() 
    {

        $tabsList = $this->getTabsList();
        
		# Render tabs
		foreach ( $tabsList as $tab ) 
		{

			# Render Tab
			$tab->render( $this->getTab(), $this->getNavigatorElement(), $this->getTabsElement() );
		}
        
        # Save XML and Remove XML tag from the result
		$tabsHTML = $this->tab->saveXML();
		$tabsHTML = substr( $tabsHTML, ( strpos($tabsHTML, '?>' ) + 2 ) );
        
		return $tabsHTML;
	}
    
    /**
    * put your comment there...
    * 
    * @param mixed $list
    */
    public function setTabsList( $list )
    {
        
        $this->tabsList = $list;
        
        return $this;
    }

}