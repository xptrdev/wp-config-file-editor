<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSiteSubDomainInstall extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Use sub domains for network sites'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'SUBDOMAIN_INSTALL';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

