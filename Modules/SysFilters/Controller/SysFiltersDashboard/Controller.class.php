<?php
/**
* 
*/

namespace WCFE\Modules\SysFilters\Controller\SysFiltersDashboard;

# Imoprts
use WPPFW\MVC\Controller\Controller;

# Config Form
use WCFE\Modules\Editor\Model\Forms;

/**
* 
*/
class SysFiltersDashboardController extends Controller {
	
	/**
	* put your comment there...
	* 
	*/
	public function indexAction()
	{
		
		if ( ! is_super_admin() )
		{
			
			die( 'Access Denied' );
		}
		
		$model =& $this->getModel();
		$form = new \WCFE\Modules\SysFilters\Model\Forms\SysFiltersOptionsForm();
		
		$result[ 'model' ] =& $model;
		$result[ 'form' ] =& $form;
		$result[ 'securityToken'] = wp_create_nonce();
		
		# Display form
		if ( $_SERVER[ 'REQUEST_METHOD' ] != 'POST' )
		{
			
			$form->setValue( array( $form->getName() => $model->getData() ) );
			
			return $result;
		}
		
		if ( 	! isset( $_POST[ 'securityToken' ] ) || 
					! $_POST[ 'securityToken' ] ||
					! wp_verify_nonce( $_POST[ 'securityToken'] ) )
		{
			
			die( 'Access Denied' );
			
		}
		
		# This form is currently huge and we need to 
		# avoid PHP max_input_vars ini restriction
		# Use WCFE custom parser and parse raw post data
		$postData =& \WCFE\Libraries\ParseString::parseString( file_get_contents( 'php://input' ) );
		
		# POST: Validate data
		$form->setValue( array( $form->getName() => $postData[ $form->getName() ] ) );
		
		if ( $form->validate() && $model->validate( $data = $form->getValue() ) )
		{
			
			$model->setData( $data );
			
			$this->redirect( $this->router()->routeAction() );
			
			return $result;
		}
		
		# Unvalidated POST case
		return $result;
	}
	
}