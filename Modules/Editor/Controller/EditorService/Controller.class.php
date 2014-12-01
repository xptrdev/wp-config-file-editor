<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\EditorService;

# Imoprts
use WPPFW\MVC\Controller\ServiceController;

/**
* 
*/
class EditorServiceController extends ServiceController {
	
	/**
	* put your comment there...
	* 
	*/
	protected function createSecureKeyAction() {
		# Generate Secure key
		return wp_generate_password(64, true, true);
	}

	
} # End class