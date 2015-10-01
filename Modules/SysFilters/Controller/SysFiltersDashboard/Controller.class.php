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
			
			# Load default if never submitted or load previously saved data
			$defaults = $model->getDefaults();

			$data = $model->isNeverSubmitted() ? array() : $model->getData();
			
			foreach ( $defaults as $moduleName => $moduleDefaultValues )
			{
				if ( ! isset( $data[ $moduleName ] ) )
				{
					$data[ $moduleName ] = $moduleDefaultValues;
				}
			}
			
			$form->setValue( array( $form->getName() => $data ) );
			
			return $result;
		}
		
		if ( 	! isset( $_POST[ 'securityToken' ] ) || 
					! $_POST[ 'securityToken' ] ||
					! wp_verify_nonce( $_POST[ 'securityToken'] ) )
		{
			
			die( 'Access Denied' );
			
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