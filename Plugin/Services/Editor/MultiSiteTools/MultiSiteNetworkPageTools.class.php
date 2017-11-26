<?php
/**
* 
*/

namespace WCFE\Services\Editor\MultiSiteTools;

/**
* 
*/
class MultiSiteNetworkPageTools 
extends \WPPFW\Services\ServiceObject
implements \WPPFW\Services\IReachableServiceObject
{
	
	/**
	* put your comment there...
	* 
	*/
	public function getUrl()
	{
		return home_url( 'network.php' );
	}

}