<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\Editor;

# Imoprts
use WPPFW\MVC\Controller\Controller;

/**
* 
*/
class EditorController extends Controller {
	
	/**
	* put your comment there...
	* 
	*/
	protected function indexAction() {
		# Initialize
		$model =& $this->getModel();
		$input =& $this->input();
		$router =& $this->router();
		# If not posted it then one ofthf following:
		# 1. Returned from View Action with invalidated form data
		# 2. Just opening the page
		if (!$input->isPost()) {
			# We here process to #2
			if ($model->isBackForChange()) {
				# Fill form from model state.
				$model->loadFromSaveState()
				# Clear state
				->clearState();
			}
			else {
				# Force form to read data from Wordpress config file
				$model->loadFromConfigFile();
			}
		}
		else {
			# Fill form with submitted values
			$form =& $model->getForm();
			$post =& $input->post();
			$form->setValue($post->getArray());
			# Validate
			if ($model->validate($form)) {
				# generate config file from the given values
				$model->generateConfigFile();
				# Either Preview or Save config file.
				$task = $post->get('task');
				if ($task == 'Preview') {
					# Save submitted vars to be used if 
					# get back from preview to the form again.
					$model->saveSubmittedVars();
					# Go to preview action
					$this->redirect($router->routeAction('Preview'));
				}
				else if ($task == 'Save') {
					# Save config file
					$model->saveConfigFile();
				}
			}
		}
		return $model;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function previewAction() {
		# Get model
		$model =& $this->getModel();
		$input =& $this->input();
		$router =& $this->router();
		# Save submitted config file is posted
		if ($input->isPost()) {
			# Get raw inputs
			$configFileContent = filter_input(INPUT_POST, 'config-file-content', FILTER_UNSAFE_RAW);
			# Clear state
			$saved = $model->clearState()
			# Save config file
			->setConfigFileContent($configFileContent)
			->saveConfigFile();
			# Go back to index only if saved
			if ($saved) {
				$this->redirect($router->routeAction());	
			}
		}
		# Push model to view
		return $model;
	}

} # End class