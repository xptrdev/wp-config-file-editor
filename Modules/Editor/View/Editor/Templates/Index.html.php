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


<?php if ($model->hasErrors()) : ?>
	<ul id="errors-bar">
<?php foreach ($model->getCleanErrors() as $errorMessage) : ?>
		<li><?php echo $errorMessage; ?></li>
<?php endforeach; ?>
	</ul>
<?php $model->writeState(); # Re-write state as this is running too late! ?>
<?php endif; ?>


	<ul id="wcfe-config-form-main-menu">

		<li>
			Profiles
			<ul id="wcfe-dmm-profiles">
				<li id="wcfe-dmm-profiles-create">Create</li>
				<li id="wcfe-dmm-profiles-list">Profiles</li>
				<li>-</li>
				<li id="wcfe-dmm-profiles-active-profile">
					Active Profile
					<ul>
						<li id="wcfe-dmm-profiles-save">Save</li>
						<li>-</li>
						<li id="wcfe-dmm-profiles-edit">Edit</li>
						<li id="wcfe-dmm-profiles-delete">Delete</li>
						<li id="wcfe-dmm-profiles-reload">Reload</li>
						<li>-</li>
						<li id="wcfe-dmm-profiles-unload">Unload</li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			Tab
			<ul id="wcfe-dmm-tab">
				<li id="wcfe-dmm-tab-help">Fields Help</li>
				<li id="wcfe-dmm-tab-constants-list">Constants List</li>
			</ul>
		</li>

		<li>
			About
			<ul id="wcfe-dmm-about">
				<li id="wcfe-dmm-about-contact">Contact</li>
				<li id="wcfe-dmm-about-website">Web Site</li>
				<li id="wcfe-dmm-about-support">Support Forum</li>
				<li id="wcfe-dmm-about-submit-review">Submit Review</li>
				<li>-</li>
				<li id="wcfe-dmm-about-online-help">Help</li>
				<li>-</li>
				<li id="wcfe-dmm-about-follow-development">Follow Development</li>
			</ul>
		</li>
			
	</ul>

	<form id="wcfe-config-editor-form" method="post" action="<?php echo $router->routeAction() ?>">
<?php
		# Output options tab
		$optionsTab = new	Tabs\Tabs( $form );
		echo $optionsTab->render();
?>
		<div id="wcfe-toolbox">
			<input type="button" class="wcfe-task-button" value="Save" id="wcfe-editor-form-save" />
			<input type="button" class="wcfe-task-button" value="Preview" id="wcfe-editor-form-preview" />
			<input type="hidden" name="configFileFields[Task]" value="" />
		</div>
		<input type="hidden" name="configFileFields[<?php echo $form->getSecurityTokenName(); ?>]" value="<?php echo $form->getSecurityToken()->getValue(); ?>" />
	</form>
</div>

<?php // Editor Services Template ?>
<?php require 'Templates' . DIRECTORY_SEPARATOR . 'EditorServices.html.php'; ?>

<?php // Client side notificaytion if there is active profile ?>
<?php 
	if ( $result[ 'activeProfile' ] !== FALSE ) :
	
		$activeProfile = $result[ 'activeProfile' ]->getArray();
		
		unset( $activeProfile[ 'vars' ] );
?>
<script type="text/javascript">
	WCFEEditorForm.profile.setActiveProfile( <?php echo json_encode( $activeProfile ) ?> )
</script>
<?php endif; ?>

<?php // Support Plugin dialog ?>
<div id="wcfe-support-plugin-dialog-popup">
	<div id="wcfe-support-plugin-dialog">
		<p>If you like this Plugin please keep it in development by <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/wp-config-file-editor/">submitting Review</a></p>
		<input type="button" class="remind-me-later" value="Remind Me Later" />
		<input type="button" class="force-dismiss" value="Don't Show Again!"  />
	</div>
</div>