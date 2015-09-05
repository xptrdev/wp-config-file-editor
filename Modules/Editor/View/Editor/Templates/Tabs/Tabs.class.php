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
	protected $tabsList = array
	( 
		'WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs' => array
		(
		 	'Database',
		 	'Debugging',
		 	'Localization',
		 	'SecureKeys',
		)
	);
	
	/**
	* put your comment there...
	* 
	* @var \DOMXPath
	*/
	protected $xpath;
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @return {Tabs|Form}
	*/
	public function __construct(Form & $form) {
		# Initialize
		$this->form =& $form;
		# DOMDocument to hold tab component
		$this->tab = new \DOMDocument();
		$this->tab->loadXML(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR . 'Tabs.html'));
		$this->xpath = new \DOMXPath($this->tab);
		# Find Navigatpr and Tabs ELement
		$this->navigatorElement = $this->xpath->query('//*[@id="wcfe-options-tab-navigator"]')->item(0);
		$this->tabsElement = $this->xpath->query('//*[@id="wcfe-options-tab-tabs"]')->item(0);
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		
		# Get tabs list
		$tabsList = EditorModel::makeClassesList( $this->getTabsList() );
		
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

}
