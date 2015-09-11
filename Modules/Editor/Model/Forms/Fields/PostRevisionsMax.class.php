<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms\Fields;

# Field base
use WPPFW\Forms;

/**
* 
*/
class PostRevisionsMax extends Forms\Fields\FormIntegerField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() 
	{
		# Set field name and rules
		parent::__construct( 'PostRevisionsMax' );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'WP_POST_REVISIONS' ) ? ( is_bool( WP_POST_REVISIONS ) ? 0 : WP_POST_REVISIONS ) : null );
	}

}

