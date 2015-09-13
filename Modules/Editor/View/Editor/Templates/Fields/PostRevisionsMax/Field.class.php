<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\PostRevisionsMax;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\InputField;

/**
* 
*/
class Field extends InputField {

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return 'Max Revisions Count';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Maximum number of revisions per post or page can be specified.';
	}

}
