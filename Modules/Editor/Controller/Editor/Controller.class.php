<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Controller\Editor;

# Imoprts
use WPPFW\MVC\Controller\Controller;

# Config Form
use WCFE\Modules\Editor\Model\Forms;

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
		$form =& $model->getForm();
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
			$post =& $input->post();
			$form->setValue($post->getArray());
			# Authorize
			if ($form->isAuthorized()) {
				# Validate
				if ($model->validate($form)) {
					# generate config file from the given values
					$model->generateConfigFile();
					# Either Preview or Save config file.
					$task = $form->get('Task')->getValue();
					if ($task == Forms\ConfigFileForm::TASK_PREVIEW) {
						# Save submitted vars to be used if 
						# get back from preview to the form again.
						$model->saveSubmittedVars();
						# Go to preview action
						$this->redirect($router->routeAction('Preview'));
					}
					else if ($task == Forms\ConfigFileForm::TASK_SAVE) {
						# Save config file
						$model->saveConfigFile();
					}
				}
			}
			else {
				# Not authorized
				$model->addError('Not authorized to take such action!! Please refrehs the page if you think this is wrong.');
			}
		}
		# Form security token
		$form->getSecurityToken()->setValue($this->createSecurityToken());
		# Return model to view
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
		$form = new Forms\RawConfigFileForm();
		# Save submitted config file is posted
		if ($input->isPost()) {
			# Fill form with value
			$formValues = array('rawConfigFile' => filter_input(INPUT_POST, 'rawConfigFile', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY));
			$form->setValue($formValues);
			# Is authorized
			if ($form->isAuthorized()) {
				# Clear state
				$saved = $model->clearState()
				# Save config file
				->setConfigFileContent($form->get('configFileContent')->getValue())
				->saveConfigFile();
				# Go back to index only if saved
				if ($saved) {
					$this->redirect($router->routeAction());	
				}
			}
			else {
				# Not authorized
				$model->addError('Not authorized to take such action!! Please refrehs the page if you think this is wrong.');
			}
		}
		# Form security token
		$form->getSecurityToken()->setValue($this->createSecurityToken());
		# Push model to view
		return array('model' => $model, 'form' => $form);
	}

} # End class