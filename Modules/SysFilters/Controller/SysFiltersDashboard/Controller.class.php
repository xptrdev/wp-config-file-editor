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
		
		if ( ! current_user_can( 'manage_options' ) )
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
		
		
		# POST: Validate data
		$form->setValue
		( 
		  array
		  ( 
		  	$form->getName() => filter_input( INPUT_POST, $form->getName(), FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY ) 
		  )
		);
		
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