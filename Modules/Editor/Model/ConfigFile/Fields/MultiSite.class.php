<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSite extends Constant {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutputDeps = array
	(
		'MultiSite',
		'MultiSiteSubDomainInstall',
		'MultiSiteDomainCurrentSite',
		'MultiSitePathCurrentSite', 
		'MultiSiteSiteId',
		'MultiSiteBlogId',
	);
	
  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Enable Multisite for current Wordpress installation'
	);

	/**
	* put your comment there...
	* 
	*/
	public function & allReady() 
	{
		
		parent::allReady();
		
		# Stop WP_ALLOW_MULTISITE if I'm true
		$this->getModel()->getField( 'MultiSiteAllow' )->setSuppressOutputForce( $this->getValue() );
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'MULTISITE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

