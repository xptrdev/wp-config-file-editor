<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates;

# No direct access
defined('ABSPATH') or die(WCFE\NO_DIRECT_ACCESS_MESSAGE);
	
# Getting model
$result = $this->result();
$model =& $result[ 'model' ];
$form =& $model->getForm();
$router =& $this->router();

?>
<div id="wcfe-body">

<?php // Errors ?>
<?php if ($model->hasErrors()) : ?>
	<ul id="errors-bar">
<?php foreach ($model->getCleanErrors() as $errorMessage) : ?>
		<li><?php echo $errorMessage; ?></li>
<?php endforeach; ?>
	</ul>
<?php $model->writeState(); # Re-write state as this is running too late! ?>
<?php endif; ?>

<? // Dashboard Menu ?>
<?php require 'Templates' . DIRECTORY_SEPARATOR . 'ConfigFormMenu.html.php' ?>

<?php // COnfig Form ?>
	<form id="wcfe-config-editor-form" method="post" action="<?php echo $router->routeAction() ?>">
<?php
		# Output options tab
		$optionsTab = new Tabs\Tabs( new Tabs\EditorFormTabsAdapter( $form, $this ), $form );
		$optionsTab->load();
		
		echo $optionsTab->render();
?>
		<div id="wcfe-toolbox">
			<input type="button" class="wcfe-task-button" value="<?php $this->_e( 'Save' ) ?>" id="wcfe-editor-form-save" />
			<input type="button" class="wcfe-task-button" value="<?php $this->_e( 'Preview' ) ?>" id="wcfe-editor-form-preview" />
			<input type="hidden" name="configFileFields[Task]" value="" />
		</div>
		<input type="hidden" name="configFileFields[<?php echo $form->getSecurityTokenName(); ?>]" value="<?php echo $form->getSecurityToken()->getValue(); ?>" />
	</form>
</div>


<?php // Editor Services Template (save dialog, etc.) ?>
<?php require 'Templates' . DIRECTORY_SEPARATOR . 'EditorServices.html.php'; ?>


<?php // Client side notificaytion if there is active profile ?>
<?php 
	if ( $result[ 'activeProfile' ] !== FALSE ) :
	
		$activeProfile = $result[ 'activeProfile' ]->getArray();
		
		unset( $activeProfile[ 'vars' ] );
?>

<script type="text/javascript">
	jQuery( function() { WCFEEditorForm.profile.setActiveProfile( <?php echo json_encode( $activeProfile ) ?> ) } );
</script>

<?php endif; ?>


<?php // Support Plugin dialog ?>
<div id="wcfe-support-plugin-dialog-popup">
	<div id="wcfe-support-plugin-dialog">
		<p><?php $this->_e( 'If you like this Plugin please keep it in development by submitting review' ) ?> <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/wp-config-file-editor/"><?php $this->_e( '-> Submit Review' ) ?></a></p>
		<input type="button" class="remind-me-later" value="Remind Me Later" />
		<input type="button" class="force-dismiss" value="Don't Show Again!"  />
	</div>
</div>

<?php // Wanrings ballons ?>
<div id="wcfe-ballons-templates">
	<div class="wcfe-ballon" id="wcfe-active-profile-warning">
		<h2><?php $this->_e( 'Warning' ) ?></h2>
		<p>
			<?php $this->_e( 'Config Form is loaded from active profile and might not reflect wp-config values' ) ?>
			<br /><br />
			<?php $this->_e( 'Unload Profile to check-out wp-config file values' ) ?>
			<br /><br />
			<span style="color:red"><?php $this->_e( 'Nothing saved yet until using Save button' ) ?></span>
		</p>
	</div>
</div>


<?php // Info dialogs templates ?>
<div id="wcfe-info-templates">
<?php require 'Templates' . DIRECTORY_SEPARATOR . 'Info-Paths.html.php'; ?>
</div>