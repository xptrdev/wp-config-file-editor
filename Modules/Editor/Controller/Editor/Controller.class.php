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
	public function indexAction() 
	{
		# Initialize
		$model =& $this->getModel();
		$input =& $this->input();
		$router =& $this->router();
		$form =& $model->getForm();
		$flags = array();
		$activeProfile = false;
		
		# If not posted it then one ofthf following:
		# 1. Returned from View Action with invalidated form data
		# 2. Just opening the page
		
		if ( ! $input->isPost() ) 
		{
			
			# Read flag
			if ( isset( $_GET[ 'flags' ] ) )
			{
				
				$flags = explode( ',', $_GET[ 'flags'] );
				
			}
			
			// Set or clear active profile
			if ( isset( $_GET[ 'activeProfile' ] ) )
			{
				$model->setActiveProfile( $_GET[ 'activeProfile' ] );
				
				$this->redirect( $router->routeAction() );
				
				return;
			}
			
			
		  if ( in_array( 'unsetActiveProfile', $flags ) )
		  {
				$model->unsetActiveProfile();
				
				$this->redirect( $router->routeAction() );
				
				return;
		  }
			
			
			# Load Active profile
			if ( $model->hasActiveProfile() )
			{
				
				$profilesModel =& $this->getModel( 'Profiles', 'Profiles' );
				$activeProfile = $profilesModel->getProfile( $model->getActiveProfileId() );
				
				# Its important to don't crash the Config Form base
				# in case active profile is not there for ANY reason! 
				if ( ! $activeProfile ) // FALLBACK
				{
					
					// Clea profile and refresh to display normal config file
					$model->unsetActiveProfile();
					
					$model->AddError( 'Unhandled Catchable Error!!! Active Profile doesnt exists!!! Confirg Form reseted back to wp-config file values!!' );
					
					$this->redirect( $router->routeAction() );
					
					return;
				}
			}
			
			
					
			# We here process to #2
			if ( $model->isBackForChange() ) 
			{
				
				# Fill form from model state.
				$model->loadFromSaveState()
				
				# Clear state
				->clearState();
				
			}
			else 
			{
				
				if ( $model->hasActiveProfile() )
				{	
					$model->loadForm( $activeProfile->vars );
				}
				else
				{
					
					# Force form to read data from Wordpress config file
					$model->loadFromConfigFile();
				}
				
			}
			
		}
		else 
		{
			
			# Fill form with submitted values (Raw Values without any ' " escapes!)
			$formValues = array
			(
				$form->getName() => filter_input( INPUT_POST, $form->getName(), FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY )
			);
			
			$form->setValue( $formValues );
			
			# Authorize
			if ( $form->isAuthorized() ) 
			{
				
				# Validate
				if ( $model->validate() ) 
				{
					
					# Version 1.0 moved save action to editor service controlle
					# Now this will always only preview action!
					$task = $form->get( 'Task' )->getValue();
					
					if ( $task == Forms\ConfigFileForm::TASK_PREVIEW )
					{
						
						# generate config file from the given values
						$model->generateConfigFile();
					  
						# Save submitted vars to be used if 
						# get back from preview to the form again.
						$model->saveSubmittedVars();
						
						# Go to preview action
						$this->redirect( $router->routeAction( 'Preview' ) );
						
					}
					else if ( $task == Forms\ConfigFileForm::TASK_VALIDATE )
					 {
						 # Nothing here, its already validated by $model->validate above!!
					 }
					
				}
				
			}
			else
			{
				# Not authorized
				$model->addError('Not authorized to take such action!! Please refrehs the page if you think this is wrong.');
			}
		}
		
		# Form security token
		$form->getSecurityToken()->setValue( $this->createSecurityToken() );
		
		$result = array
		(
			'model' => & $model, 
			'activeProfile' => $activeProfile,
			'info' => $model->getInfo(),
		);
		
		# Return model to view
		return $result;
	}

	/**
	* put your comment there...
	* 
	*/
	public function previewAction()
	{
		
		# Get model
		$model =& $this->getModel();
		$form = new Forms\RawConfigFileForm();
		
		# Form security token
		$form->getSecurityToken()->setValue( $this->createSecurityToken() );
		
		# Push model to view
		return array( 'model' => $model, 'form' => $form );
		
	}
  
} # End class