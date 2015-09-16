<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates;

# No direct access
defined('ABSPATH') or die(WCFE\NO_DIRECT_ACCESS_MESSAGE);
	
# Getting model
$model =& $this->result();
$form =& $model->getForm();
$router =& $this->router();

?>
<div id="wcfe-body">
	<ul id="wcfe-config-form-main-menu">

		<li>
			Profiles
			<ul id="wcfe-dmm-profiles">
				<li id="wcfe-dmm-profiles-create">Create</li>
				<li id="wcfe-dmm-profiles-list">Profiles</li>
				<li id="wcfe-dmm-profiles-save">Save</li>
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
				<li id="wcfe-dmm-about-contact">Contact Us</li>
				<li id="wcfe-dmm-about-website">Web Site</li>
				<li id="wcfe-dmm-about-support">Support Forum</li>
				<li id="wcfe-dmm-about-submit-review">Submit Review</li>
			</ul>
		</li>
			
	</ul>
	<div class="wcfe-support-forums-link">
	  <a target="_blank" href="http://wp-cfe.xptrdev.com/">Support Forums</a> | <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/wp-config-file-editor/">Submit Review</a>
	</div>
<?php if ($model->hasErrors()) : ?>
	<ul id="errors-bar">
<?php foreach ($model->getCleanErrors() as $errorMessage) : ?>
		<li><?php echo $errorMessage; ?></li>
<?php endforeach; ?>
	</ul>
<?php $model->writeState(); # Re-write state as this is running too late! ?>
<?php endif; ?>

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