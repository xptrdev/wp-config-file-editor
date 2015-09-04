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
	*/
	protected function initialize() {
		
		# Scripts and Styles queues
		$scripts = new DashboardScriptsQueue();
		$styles = new DashboardStylesQueue();
		
		# Scripts
		$scripts->enqueueNamedResource(DashboardScriptsQueue::JQUERY_UI_TABS);
		$scripts->add( new Media\JavaScript( 'wcfe-fields-editor', WP_PLUGIN_URL . '/wp-config-file-editor/Modules/Editor/View/Editor/Media/JavaScript.js' ) );
		
		# Styles
		$styles->add( new \WCFE\Libraries\CSS\jQuery\DarkHive\jQueryDarkHive( 'jquery-ui-theme-darkhive', WP_PLUGIN_URL . '/wp-config-file-editor/Libraries/CSS/jQuery/DarkHive/jquery-ui.min.css' ) );
		$styles->add( new Media\Style( 'wcfe-fields-editor', WP_PLUGIN_URL . '/wp-config-file-editor/Modules/Editor/View/Editor/Media/Style.css' ) );
		
	}

}