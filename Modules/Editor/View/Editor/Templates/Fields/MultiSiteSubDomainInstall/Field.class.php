<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MultiSiteSubDomainInstall;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\CheckboxField;

/**
* 
*/
class Field extends CheckboxField {

	/**
	* put your comment there...
	* 
	*/
	protected function getText() {
		return 'Enable Sub Domains';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Use sub domains for network sites';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}