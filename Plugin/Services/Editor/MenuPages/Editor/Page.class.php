<?php
/**
* 
*/

namespace WCFE\Services\Editor\MenuPages\Editor;

# Menu Page Service Framework
use WPPFW\Services\Dashboard\Menu\MenuPage;
use WPPFW\Http\Url;

/**
* 
*/
class Page extends MenuPage {
	 
	/**
	* put your comment there...
	* 
	*/
	public function __construct() 
	{
		
		parent::__construct
		( 
			'WPCF Editor', 
			'Wordpress Config File Editor', 
			( is_multisite() ? 'manage_network' : 'administrator' ),
			WP_PLUGIN_URL . '/wp-config-file-editor/Modules/Editor/View/Editor/Media/Images/dashboard-menu-icon.png'
		);
		
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
