<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class WPLang extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'WordPress Localized Language, defaults to English.
 
 		 Change this to localize WordPress. A corresponding MO file for the chosen
 		 language must be installed to wp-content/languages. For example, install
 		 de_DE.mo to wp-content/languages and set WPLANG to \'de_DE\' to enable German
  	 language support.'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WPLANG';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

