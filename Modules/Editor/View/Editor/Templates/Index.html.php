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
	<ul id="wcfe-config-form-main-menu">

		<li>
			Profiles
			<ul id="wcfe-dmm-profiles">
				<li id="wcfe-dmm-profiles-create" title="Create new profile from config form fields">Create</li>
				<li id="wcfe-dmm-profiles-list" title="Manage profiles">Profiles</li>
				<li>-</li>
				<li id="wcfe-dmm-profiles-active-profile">
					Active Profile
					<ul>
						<li id="wcfe-dmm-profiles-save" title="Save config form fields vars into active profile">Save</li>
						<li>-</li>
						<li id="wcfe-dmm-profiles-edit" title="Edit active profile description">Edit</li>
						<li id="wcfe-dmm-profiles-delete" title="Delete active profile, return back to config file values, discard changes">Delete</li>
						<li id="wcfe-dmm-profiles-reload" title="Reload active profile field values, discard changes">Reload</li>
						<li>-</li>
						<li id="wcfe-dmm-profiles-unload" title="Active profile deattach. Return to config file values">Unload</li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			Tab
			<ul id="wcfe-dmm-tab">
				<li id="wcfe-dmm-tab-help" title="Active tab fields help text">Fields Help</li>
				<li id="wcfe-dmm-tab-constants-list" title="Active tab fields mapped to wp-config file constants list">Constants List</li>
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

<?php // COnfig Form ?>
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
		<p>If you like this Plugin please keep it in development by <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/wp-config-file-editor/">submitting Review</a></p>
		<input type="button" class="remind-me-later" value="Remind Me Later" />
		<input type="button" class="force-dismiss" value="Don't Show Again!"  />
	</div>
</div>

<?php // Wanrings ballons ?>
<div>
	<div class="wcfe-ballon" id="wcfe-active-profile-warning">
		<h2>Warning</h2>
		<p>
			Config Form is loaded from active profile and might not reflect wp-config values
			<br><br>
			<span style="color:yellow">Nothing saved yet until using Save button</span>
		</p>
	</div>
</div>