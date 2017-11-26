<?php
/**
* 
*/

namespace WCFE\Services\Editor\MenuPages\Editor;

# Menu Page Service Framework
use WPPFW\Services\Dashboard\Menu\SubMenuPage;
use WPPFW\Http\Url;

/**
* 
*/
class RawEdit extends SubMenuPage {

	/**
	* put your comment there...
	* 
	* @param mixed $editFormMenu
	* @return RawEdit
	*/
	public function __construct( $editFormMenu )  
	{
		
		parent::__construct
		( 
			'Raw Editing', 
			'Independently edit wp-config.php file', 
			( is_multisite() ? 'manage_network' : 'administrator' )
		);
		
		# Add under wcfe dashboard menu 
		$this->setParent( $editFormMenu );
	}
 
  /**
  * put your comment there...
  * 
  */
  public function getUrl() 
  {
  	
	  $urlMethod = is_multisite() ?  'network_admin_url' : 'admin_url';
	  
		return new Url( $urlMethod( 'admin.php' ) , $this->getRouteParams() );
  }

}
