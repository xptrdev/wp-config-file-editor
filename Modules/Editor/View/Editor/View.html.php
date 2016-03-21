<?php
/**
* 
*/

namespace WCFE\Modules\Editor\View\Editor;

# Imports
use WPPFW\MVC\View\TemplateView;

# Dashboard script queue
use WPPFW\Services\Queue\DashboardScriptsQueue;
use WPPFW\Services\Queue\DashboardStylesQueue;

/**
* 
*/
class EditorHTMLView extends TemplateView {

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
	* @var mixed
	*/
	private $possibleActionsResQueueMap = array
	(
		'Index' => 'Index',
		'Preview' => 'Preview',
		'RawEdit' => 'Preview',
	);
	
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
		
		$this->scriptsQueue->enqueueNamedResource( 'jquery-serialize-object' );
		
		$this->scriptsQueue->enqueueNamedResource( DashboardScriptsQueue::THICK_BOX );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\jQueryCookies' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\ErrorsDialog' ), true );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\EditorServices' ), true );
		
		# Styles
		$this->stylesQueue->enqueueNamedResource( DashboardStylesQueue::THICK_BOX );
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\CSS\jQuery\Theme\Theme' ) );
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\Style' )  );
		
		
		# Link action specifc resources
		$resQueueName = $this->possibleActionsResQueueMap[ $this->mvcTarget()->getAction() ];
		
		$this->{"enqueue{$resQueueName}Resources"}( );
	}
	
	/**
	* put your comment there...
	* 
	*/
	private function enqueueIndexResources()
	{
		
		$this->scriptsQueue->enqueueNamedResource( DashboardScriptsQueue::JQUERY_UI_TABS );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\AutoPath' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\jQueryMenu' ) );
				
		# Enqueue specifiec STYLE AND JS
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\ChechboxList' ) );
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\ConfigForm' ), true );
		
		# Actions route
		$this->setActionsRoute( 
			'Editor', 'editorService', array
				(
					'createSecureKey' 	        => 		array( 'action' => 'CreateSecureKey' ),
					'preUpdate' 				=> 		array( 'action' => 'PreUpdate' ),
					'validateForm'		 	    => 		array( 'action' => 'ValidateForm' ),
					'postUpdate' 				=> 		array( 'action' => 'PostUpdate' ),
					'updateConfigFile' 	        => 		array( 'action' => 'UpdateConfigFile' ),
					'setActiveProfile' 	        => 		array( 'action' => 'SetActiveProfile' ),
					'getSystemPath'		 	    => 		array( 'action' => 'GetSystemPath' ),
					'generateCookieHash'        => 	    array( 'action' => 'GenerateCookieHash' ),
				),
			'Editor', 'editorViews', array
			(
				'MultiSiteSetupTools'   => array(),
				'systemCheckTools'      => array( 'action' => 'SystemCheckTools', 'controller' => 'Editor', 'view' => 'SystemCheckTools' ),
			),
			'Profiles', 'profilesView', array
			(
				'profilesList'          => array(),
				'editProfile'           => array( 'action' => 'Edit', 'view' => 'Profile' ),
			),
			'Profiles', 'profilesService', array
			(
				'createVarsTStorage'    => array( 'controller' => 'ProfilesService' , 'action' => 'CreateProfileVarsTStorage' ),
				'setProfileVars'        => array( 'controller' => 'ProfilesService' , 'action' => 'SetProfileVars' ),
				'deleteProfile'         => array( 'controller' => 'ProfilesService', 'action' => 'DeleteProfile' ),
			)
		);
	}

	/**
	* put your comment there...
	* 
	*/
	private function enqueuePreviewResources()
	{
		
		# Enqueue specifiec STYLE AND JS
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEditor' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEExtSearchBox' ) );
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEExtLanguageTools' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\Theme' ) );
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEModePHP' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\RawView' ), true );
		
		# Actions route
		$this->setActionsRoute( 
			'Editor', 'editorService', array
			(
				'preUpdate' => array( 'action' => 'PreUpdate' ),
				'postUpdate' => array( 'action' => 'PostUpdate' ),
				'updateRawConfigFile' => array( 'action' => 'UpdateRawConfigFile' ),
			) 
		);
		
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