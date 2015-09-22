<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class SecurityBlockExternalUrl extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Block external URL requests by defining WP_HTTP_BLOCK_EXTERNAL as true and this will only allow localhost and your blog to make requests'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WP_HTTP_BLOCK_EXTERNAL';

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

	/**
	* put your comment there...
	* 
	*/
	public function & allReady()
	{
		
		parent::allReady();
		
		# Suppress Accessible hosts if FALSE
		$accessibleHosts = $this->getModel()->getField( 'SecurityAccessibleHosts' );
		$accessibleHosts->setSuppressOutputForce( ! $this->getValue() );
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

