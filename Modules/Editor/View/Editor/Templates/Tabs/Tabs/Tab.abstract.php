<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs;

# Improrts
use WPPFW\Obj\ClassName;
use WPPFW\Forms\Form;
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs;

/**
* 
*/
abstract class Tab {
	
	/**
	* put your comment there...
	* 
	* @var Form
	*/
	protected $form;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $groupsList;
	
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
	protected $tabs;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title;
	
	/**
	* put your comment there...
	* 
	* @param Tabs $tabs
	* @param {Form|Tabs} $form
	* @return {Tab|Form|Tabs}
	*/
	public function __construct(Tabs & $tabs, Form & $form) {
		# Initiaize
		$this->form =& $form;
		$this->tabs =& $tabs;
		# Tab Id
		$thisClass = new ClassName(get_class($this));
		$this->id = $thisClass->getName();
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function & getForm() {
		return $this->form;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function & getGroupsList() {
		return $this->groupsList;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getId() {
		return $this->id;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getTitle() {
		return $this->title;
	}
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tab
	* @param {\DOMDocument|\DOMElement} $navigator
	* @param {\DOMDocument|\DOMElement|\DOMElement} $tabs
	* @return {\DOMDocument|\DOMElement|\DOMElement}
	*/
	public function render(\DOMDocument & $tabsDoc, \DOMElement & $navigator, \DOMElement & $tabs) {
		# Initialize
		$templatesNamespace = '\WCFE\Modules\Editor\View\Editor\Templates';
		$groupsNamespace = "{$templatesNamespace}\\Groups";
		$fieldsNamespace = "{$templatesNamespace}\\Fields";
		# Create Tab navigator
		$tabNavLink = $tabsDoc->createElement('a');
		$tabNavLink->setAttribute('href', "#{$this->getId()}");
		$tabNavLink->nodeValue = $this->getTitle();
		$tabNav = $tabsDoc->createElement('li');
		$tabNav->appendChild($tabNavLink);
		# Create Tab Panel
		$tab = $tabsDoc->createElement('div');
		$tab->setAttribute('id', $this->getId());
		# Render tab groups
		foreach ($this->getGroupsList() as $groupName) {
			# Creating Group object
			$groupClass = "{$groupsNamespace}\\{$groupName}";
			$group = new $groupClass($fieldsNamespace, $this->getForm());
			# Render gnroup
			$group->render($tabsDoc, $tab);
		}
		# Add tab components
		$navigator->appendChild($tabNav);
		$tabs->appendChild($tab);
	}

}