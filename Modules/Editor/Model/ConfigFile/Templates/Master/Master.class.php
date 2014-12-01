<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Templates\Master;

# Forms Framework
use WPPFW\Forms\Form;

# Sections
use WCFE\Modules\Editor\Model\ConfigFile\Sections;

/**
* 
*/
class Master {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $databaseSection;

	/**
	* put your comment there...
	* 
	* @var Sections\ExtraSection
	*/
	protected $extraSection;
	
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
	protected $secureKeysSection;
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @return {Master|Form}
	*/
	public function __construct(Form & $form) {
		# initialize
		$this->form =& $form;
		# Load sections.
		$this->secureKeysSection = new Sections\SecureKeys($form);
		$this->databaseSection = new Sections\Database($form);
		$this->extraSection = new Sections\Extra($form);
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		# Import wp-config.php template files
		ob_start();
		require 'wp-config.php';
		# Return final file
		return ob_get_clean();
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getDatabaseSection() {
		return $this->databaseSection;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getExtraSection() {
		return $this->extraSection;
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
	public function & getSecureKeysSection() {
		return $this->secureKeysSection;
	}

}