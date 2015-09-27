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
abstract class TabsBase {
	
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
	* @param ITabsFormAdapter $formAdapter
	* @param {Form|ITabsFormAdapter} $form
	* @return {TabsBase|Form|ITabsFormAdapter}
	*/
	public function __construct( ITabsFormAdapter $formAdapter, Form & $form ) 
	{
		
		$this->formAdapter =& $formAdapter;
		$this->form = $form;
		 
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
	protected function getTabsList() {
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
	public function render() {
		
		# Get tabs list
		$tabsList = EditorModel::makeClassesList( $this->getTabsList() );
		
		///////////////////// PLUGGABLE TABS //////////////////////#$
		
		$tabsList = apply_filters( $this->tabsFilterName, $tabsList );
		
		////////////////////////////////////////////////////////////
		
		# Render tabs
		foreach ( $tabsList as $tabClass => $tabName ) 
		{
			# Get tab class
			$tabClass = "{$tabClass}OptionsTab";
			# Instantiate tab object
			$tab = new $tabClass( $this );
			# Render Tab
			$tab->render( $this->getTab(), $this->getNavigatorElement(), $this->getTabsElement() );
		}
		# Get tab HTML string
		$tabsHTML = $this->tab->saveXML();
		# Remove XML tag from the result
		$tabsHTML = substr( $tabsHTML, ( strpos($tabsHTML, '?>' ) + 2 ) );
		# Return
		return $tabsHTML;
	}

}