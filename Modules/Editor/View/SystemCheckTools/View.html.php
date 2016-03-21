<?php
/**
* 
*/

namespace WCFE\Modules\Editor\View\SystemCheckTools;

# Imports
use WPPFW\MVC\View\TemplateView;

# Dashboard script queue
use WPPFW\Services\Queue\DashboardScriptsQueue;
use WPPFW\Services\Queue\DashboardStylesQueue;

/**
* 
*/
class SystemCheckToolsHTMLView extends TemplateView {

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

		# Actions route
		$this->setActionsRoute( 
			'Editor', 'editorViews', array
			(
				'systemCheckTools' => array( 'action' => 'SystemCheckTools', 'controller' => 'Editor', 'view' => 'SystemCheckTools' ),
			)
		);
		
		$this->actionsRoute[ 'systemCheckTools' ] .= "&securityNonce={$this->result[ 'securityNonce' ]}";
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