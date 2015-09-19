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
	* @param \DOMDocument $tabsDoc
	* @param {\DOMDocument|\DOMElement} $helpBox
	* @return {\DOMDocument|\DOMElement}
	*/
	protected function getSimpleHelpBox( \DOMDocument & $tabsDoc, \DOMElement & $helpBox )
	{
		ob_start();
		
		require 'Templates' . DIRECTORY_SEPARATOR . 'Simple-Help-Box.html.php';
		
		$helpMarkup = ob_get_clean();
		
		# Laod to DOM so we can add to tab
		$helplistEle = $tabsDoc->createDocumentFragment();
		$helplistEle->appendXML( $helpMarkup );
		
		$helpBox->appendChild( $helplistEle );
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
		
		////////// Render tab content /////////
		
		$this->renderContent( $tabsDoc, $tab );
		
		//////////////////////////////////////
		
		# Help Box
		
		$helpBoxId = "{$this->id}-Help-Box";
		
		# Help Window
		$helpBox = $tabsDoc->createElement( 'div' );
		
		$helpBox->setAttribute( 'id', $helpBoxId );
		$helpBox->setAttribute( 'class', 'help-box' );
		
		$this->renderHelpBox( $tabsDoc, $helpBox );
		
		# Add Nav
		$navigator->appendChild( $tabNav );
		
		# Add Panel
		$tabs->appendChild( $tab );
		
		# add Help box
		$tab->appendChild( $helpBox );
		
	}

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $doc
	* @param {\DOMDocument|\DOMElement} $pElement
	* @param mixed $fields
	* @param mixed $pluggableFilterName
	* @return Tab
	*/
	protected function renderFields( \DOMDocument & $doc, \DOMElement & $pElement, $fields, $pluggableFilterName ) 
	{
		# Initialize
		$form =& $this->getForm();
		
		# Make fields list
		$fields = EditorModel::makeClassesList( $fields );
		
		
		/////////////////// PLUGGABLE FILTERS ////////////////////////
			
		$fields = apply_filters( $pluggableFilterName, $fields );
		
		////////////////////////////////////////////////////////////
		
		# Create form fields.
		foreach ( $fields as $fieldClass => $name )
		{
			# Get field
			$field = $form->get( $name );
			
			# Create field render for current fiels.
			$rendererClass = "{$fieldClass}\\Field";
			$renderer = new $rendererClass( $form, $field );
		
			$inputId = "{$form->getName()}-{$field->getName()}";
			
			# Label
			$label = $doc->createElement( 'label' );
			$label->setAttribute('for', $inputId );
			$label->nodeValue = $renderer->getText();
			
			# Error 
			$error = $doc->createElement( 'span' );
			$error->setAttribute( 'class', 'field-error' );
			$error->nodeValue = $renderer->getErrorMessage();		
			
			# Field tip/help
			$tip = $doc->createElement( 'p' );
			$tip->setAttribute( 'class', 'field-tip' );
			$tip->nodeValue = $renderer->getTipText();
			
			# Constants Variables names
			$fieldGenClass = 'WCFE\Modules\Editor\Model\ConfigFile\Fields\\' . $renderer->getField()->getName();
			$fieldGenObj = new $fieldGenClass( );
			
			$name = $doc->createElement( 'p' );
			$name->setAttribute( 'class', 'field-constant-name' );
			$name->nodeValue = $fieldGenObj->getName();
			
			# Field row
			$row = $doc->createElement( 'div' );
			$row->setAttribute( 'class', 'field-row' );

			# Give the row unique id
			$row->setAttribute('id', "{$inputId}-row");	
			
			$row->appendChild( $label );
			$row->appendChild( $tip );
			$row->appendChild( $name );
			
			# Add error only if has rules
			$row->appendChild( $error );
			
			################ RENDER INPUT FIELD #################
			
			$inputElement = $renderer->render( $doc, $row, compact( 'error', 'label', 'tip' ) );
			
			$inputElement->setAttribute( 'id', $inputId );
			$inputElement->setAttribute( 'name', "{$form->getName()}[{$field->getName()}]" );
			
			# Use field type as class name
			$typeClassNameArr = explode( '\\', get_class( $renderer->getField()->type() ) );
			$inputElement->setAttribute( 'class', $inputElement->getAttribute( 'class' ) . ' ' . strtolower( array_pop( $typeClassNameArr ) ) );
			
			#####################################################
				
			$pElement->appendChild( $row );
		
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
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $tabsDoc
	* @param {\DOMDocument|\DOMElement} $tab
	* @return {\DOMDocument|\DOMElement|{\DOMDocument}
	*/
	protected function renderHelpBox( \DOMDocument & $tabsDoc, \DOMElement & $helpbox )
	{
		$this->getSimpleHelpBox( $tabsDoc, $helpbox );
	}
	
}