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
class SecureKeys extends Section {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $authKey;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $authSalt;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $loggedInKey;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $loggedInSalt;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $nonceKey;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $nonceSalt;
	
	/**
	* put your comment there...
	* 
	* @var Fields\AuthKey
	*/
	protected $secureAuthKey;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $secureAuthSalt;
	
	/**
	* put your comment there...
	* 
	* @param Form $form
	* @return Form
	*/
	protected function initializeRenderers(Form & $form) {
		# Create renderers
		$this->authKey = new Fields\AuthKey($form, $form->get('AuthKey'));
		$this->secureAuthKey = new Fields\SecureAuthKey($form, $form->get('SecureAuthKey'));
		$this->loggedInKey = new Fields\LoggedInKey($form, $form->get('LoggedInKey'));
		$this->nonceKey = new Fields\NonceKey($form, $form->get('NonceKey'));
		$this->authSalt = new Fields\AuthSalt($form, $form->get('AuthSalt'));
		$this->secureAuthSalt = new Fields\SecureAuthSalt($form, $form->get('SecureAuthSalt'));
		$this->loggedInSalt = new Fields\LoggedInSalt($form, $form->get('LoggedInSalt'));
		$this->nonceSalt = new Fields\NonceSalt($form, $form->get('NonceSalt'));
	}

	/**
	* put your comment there...
	* 
	*/
	public function & authKey() {
		return $this->authKey;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & authSalt() {
		return $this->authSalt;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loggedInKey() {
		return $this->loggedInKey;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loggedInSalt() {
		return $this->loggedInSalt;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & nonceKey() {
		return $this->nonceKey;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & nonceSalt() {
		return $this->nonceSalt;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & secureAuthKey() {
		return $this->secureAuthKey;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & secureAuthSalt() {
		return $this->secureAuthSalt;
	}

}