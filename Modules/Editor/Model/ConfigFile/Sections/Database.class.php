<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Sections;

# Forms Framework
use WPPFW\Forms\Form;

# Fields
use WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class Database extends Section {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $charset;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $collate;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $host;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $password;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tablesPrefix;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $user;
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @return Form
	*/
	protected function initializeRenderers(Form & $form) {
		# Create renderers
		$this->charset = new Fields\DbCharSet($form, $form->get('DbCharSet'));
		$this->collate = new Fields\DbCollate($form, $form->get('DbCollate'));
		$this->host = new Fields\DbHost($form, $form->get('DbHost'));
		$this->name = new Fields\DbName($form, $form->get('DbName'));
		$this->password = new Fields\DbPassword($form, $form->get('DbPassword'));
		$this->tablesPrefix = new Fields\DbTablesPrefix($form, $form->get('DbTablePrefix'));
		$this->user = new Fields\DbUser($form, $form->get('DbUser'));
	}

	/**
	* put your comment there...
	* 
	*/
	public function & charset() {
		return $this->charset;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & collate() {
		return $this->collate;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & host() {
		return $this->host;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & name() {
		return $this->name;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & password() {
		return $this->password;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & tablesPrefix() {
		return $this->tablesPrefix;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & user() {
		return $this->user;
	}
	
}
	