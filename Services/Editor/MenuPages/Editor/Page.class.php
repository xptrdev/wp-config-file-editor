<?php
/**
* 
*/

namespace WCFE\Services\Editor\MenuPages\Editor;

# Menu Page Service Framework
use WPPFW\Services\Dashboard\Menu\MenuPage;

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
			'WPConfig File Editor', 
			'Wordpress Config File Editor', 
			'administrator', 
			WP_PLUGIN_URL . '/wp-config-file-editor/Modules/Editor/View/Editor/Media/Images/dashboard-menu-icon.png'
		);
		
	}

}
