<?php
/**
* 
*/

namespace WCFE\Modules\Profiles\View\Profile;

# Imports
use WPPFW\MVC\View\TemplateView;

# Dashboard script queue
use WPPFW\Services\Queue\DashboardScriptsQueue;
use WPPFW\Services\Queue\DashboardStylesQueue;

/**
* 
*/
class ProfileHTMLView extends TemplateView {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $actionsRoute = array();

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $extraExtension = '.php';
	
	/**
	* put your comment there...
	* 
	* @var \WCFE\Libraries\ResStorage
	*/
	private $resFactory;
	
	/**
	* put your comment there...
	* 
	* @var DashboardScriptsQueue
	*/
	private $scriptsQueue;
	
	/**
	* put your comment there...
	* 
	* @var DashboardStylesQueue
	*/
	private $stylesQueue;
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {
		
		# ENQUEUE SCRIPT and STYLES
		$this->resFactory = new \WCFE\Libraries\ResStorage(  WP_PLUGIN_URL . '/wp-config-file-editor' );
		
		# Scripts and Styles queues
		$this->scriptsQueue = new DashboardScriptsQueue();
		$this->stylesQueue = new DashboardStylesQueue();
		
		# Scripts
		$this->scriptsQueue->enqueueNamedResource( \WPPFW\Services\Queue\DashboardScriptsQueue::JQUERY );
		$this->scriptsQueue->enqueueNamedResource( 'jquery-serialize-object' );
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Profiles\View\Profile\Media\EditJavaScript' ) );
		
		# Styles
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\CSS\jQuery\DarkHive\jQueryDarkHive' ) );
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Profiles\View\Profile\Media\EditCSS' ) );

	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $actionsList
	*/
	private function & setActionsRoute( $actionsList )
	{
		
		$serviceRouter =& $this->router()->findRouter( 'Editor', 'editorService' );
		
		foreach ( $actionsList as $actionName )
		{
			$this->actionsRoute[ $actionName ] = (string) $serviceRouter->routeAction( $actionName );
		}
		
		return $this;
	}
	
}