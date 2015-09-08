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
	
	private $resFactory;
	private $scriptsQueue;
	private $stylesQueue;
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {
		
		# Resource factory
		$this->resFactory = new \WCFE\Libraries\ResStorage(  WP_PLUGIN_URL . '/wp-config-file-editor' );
		
		# Scripts and Styles queues
		$this->scriptsQueue = new DashboardScriptsQueue();
		$this->stylesQueue = new DashboardStylesQueue();
		
		# Scripts
		$this->scriptsQueue->enqueueNamedResource( DashboardScriptsQueue::JQUERY_UI_TABS );
		
		$this->scriptsQueue->enqueueNamedResource( 'jquery-serialize-object' );
		
		$this->scriptsQueue->enqueueNamedResource( DashboardScriptsQueue::THICK_BOX );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\ErrorsDialog' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\EditorServices' ) );
		
		# Styles
		$this->stylesQueue->enqueueNamedResource( DashboardStylesQueue::THICK_BOX );
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\CSS\jQuery\DarkHive\jQueryDarkHive' ) );
		
		$this->stylesQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\Style' )  );
		
		
		# Link action specifc resources
		$this->{"enqueue{$this->mvcTarget()->getAction()}Resources"}( );
	}
	
	/**
	* put your comment there...
	* 
	*/
	private function enqueueIndexResources()
	{
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\ConfigForm' ) );
	}

	/**
	* put your comment there...
	* 
	*/
	private function enqueuePreviewResources()
	{
		
		# ACE Editor
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEditor' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEExtSearchBox' ) );
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEExtLanguageTools' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEThemeChaos' ) );
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Libraries\JavaScript\AceEditor\ACEModePHP' ) );
		
		$this->scriptsQueue->add( $this->resFactory->getRes( 'WCFE\Modules\Editor\View\Editor\Media\RawView' ) );
		
	}
	
}