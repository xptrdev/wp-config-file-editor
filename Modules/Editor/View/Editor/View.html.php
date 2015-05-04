<?php
/**
* 
*/

namespace WCFE\Modules\Editor\View\Editor;

# Imports
use WPPFW\MVC\View\TemplateView;

# Dashboard script queue
use WPPFW\Services\Queue\DashboardScriptsQueue;

/**
* 
*/
class EditorHTMLView extends TemplateView {
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {
		# Enqueue scripts
		$script = new DashboardScriptsQueue();
		$script->enqueueNamedResource(DashboardScriptsQueue::JQUERY_UI_TABS);
	}

}