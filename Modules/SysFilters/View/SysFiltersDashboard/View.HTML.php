<?php
/**
* 
*/

namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard;

# Imports
use WPPFW\MVC\View\TemplateView;

# Dashboard script queue
use WPPFW\Services\Queue\DashboardScriptsQueue;
use WPPFW\Services\Queue\DashboardStylesQueue;

/**
* 
*/
class SysFiltersDashboardHTMLView extends TemplateView {

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
		$this->resFactory = new \WCFE\Libraries\ResStorage( 
            WP_PLUGIN_URL . '/wp-config-file-editor',
            WP_PLUGIN_DIR . '/wp-config-file-editor' 
        );
		
		# Scripts and Styles queues
		$this->scriptsQueue = new DashboardScriptsQueue( $this, 'js', 'localization.php' );
		$this->stylesQueue = new DashboardStylesQueue();
		
		# Scripts
		
		$this->scriptsQueue->enqueueNamedResource( DashboardScriptsQueue::JQUERY_UI_TABS );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\jQueryCookies' ) );
		
		$this->scriptsQueue->enqueueNamedResource( DashboardScriptsQueue::THICK_BOX );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\jQueryMenu' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\ChechboxList' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\SysFilters\View\SysFiltersDashboard\Media\SysFiltersDashboard' ), true );

		# Styles
		$this->stylesQueue->enqueueNamedResource( DashboardStylesQueue::THICK_BOX );
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\CSS\jQuery\Theme\Theme' ) );
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\Style' )  );
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Modules\SysFilters\View\SysFiltersDashboard\Media\IndexStyle' )  );
		
		
		# Link action specifc resources
		# Actions route
		//$this->setActionsRoute( );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $moduleName
	* @param mixed $serviceObjectName
	* @param mixed $actionsList
	* @return EditorHTMLView
	*/
	private function & setActionsRoute( $moduleName, $serviceObjectName, $actionsList )
	{
		
		$args = func_get_args();
		
		for ( $argIndex = 0; $argIndex < count( $args ); $argIndex += 3 )
		{
			
			$serviceRouter = $this->router()->findRouter( $args[ $argIndex ], $args[ $argIndex + 1 ] );
			
			foreach ( ( $args[ $argIndex + 2 ] ) as $key => $route )
			{
				
				$route = array_merge( array( 'action' => '', 'controller' => '', 'module' => '', 'view' => '', 'format' => '' ),  $route );
				
				$this->actionsRoute[ $key ] = (string) $serviceRouter->route
				(
					new \WPPFW\MVC\MVCViewParams
					( 
						$route[ 'module' ],
						$route[ 'controller' ],
						$route[ 'action' ],
						$route[ 'format' ],
						$route[ 'view' ]
					)
				);
				
			}
		
		}
		
		return $this;
	}
	
}