<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

# Improrts
use WPPFW\Obj\ClassName;
use WPPFW\Forms\Form;
use WCFE\Modules\Editor\Model\EditorModel;

/**
* 
*/
abstract class Tab {

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
	* @return {Tab|Tabs}
	*/
	public function __construct(Tabs & $tabs) {
		# Initiaize
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
		return $this->tabs->getForm();
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

		# Render tab content
		$this->renderContent( $tabsDoc, $tab );
		
		# Add tab components
		$navigator->appendChild($tabNav);
		$tabs->appendChild($tab);
	}

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $doc
	* @param {\DOMDocument|\DOMElement} $element
	* @param mixed $fieldsList
	*/
	protected function renderFields( \DOMDocument & $doc, \DOMElement & $pElement, $fields ) 
	{
		# Initialize
		$form =& $this->getForm();
		
		# Make fields list
		$fields = EditorModel::makeClassesList( $fields );
		
		# Create form fields.
		foreach ( $fields as $fieldClass => $name )
		{
			# Get field
			$field = $form->get( $name );
			
			# Create field render for current fiels.
			$rendererClass = "{$fieldClass}\\Field";
			$renderer = new $rendererClass( $form, $field );
			
			$renderer->render( $doc, $pElement );
		}
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDoc
	* @param {\DOMDocument|\DOMElement} $tab
	* @return {\DOMDocument|\DOMElement}
	*/
	protected abstract function renderContent( \DOMDocument & $tabsDoc, \DOMElement & $tab );
	
}