<?php
/**
* 
*/

namespace WCFE\Services\SysFilters\Dashboard;

# Menu Page Service Framework
use WPPFW\Services\Dashboard\Menu\SubMenuPage;
use WPPFW\Http\Url;

/**
* 
*/
class Page extends SubMenuPage {
	 
	/**
	* put your comment there...
	* 
	*/
	public function __construct() 
	{
		
		parent::__construct
		( 
			'System Parameters', 
			'Change System Wide configuration - Control how Wordpress platform bahave', 
			( is_multisite() ? 'manage_network' : 'administrator' )
		);
		
		# Add under editor menu 
		$editorModel =& \WCFE\Plugin::me()->getEditorModule();
		$this->setParent( $editorModel->editor() );
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
