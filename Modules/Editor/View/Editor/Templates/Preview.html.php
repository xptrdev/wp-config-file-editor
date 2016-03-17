<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates;

# No direct access
defined('ABSPATH') or die(WCFE\NO_DIRECT_ACCESS_MESSAGE);
	
# Getting model
$result =& $this->result();
$router =& $this->router();
$model =& $result['model'];
$form =& $result['form'];

$options = array_merge( array( 'backButton' => true), ( isset( $result[ 'options' ] ) ? $result[ 'options' ] : array() ) );

?>

<div id="wcfe-preview-screen">

<?php if ($model->hasErrors()) : ?>
	<ul id="errors-bar">
<?php foreach ($model->getCleanErrors() as $errorMessage) : ?>
		<li><?php echo $errorMessage; ?></li>
<?php endforeach; ?>
	</ul>
<?php $model->writeState(); # Re-write state as this is running too late! ?>
<?php endif; ?>

	<form method="post" action="<?php echo $router->routeAction() ?>">
		<div id="config-file-content"><?php echo htmlentities( $model->getConfigFileContent() ) ?></div>
		<input type="button" class="wcfe-task-button" value="Save" id="wcfe-raw-editor-save" />
		<input type="hidden" name="wcfeaction" value="Preview" />
		<input type="hidden" name="rawConfigFile[<?php echo $form->getSecurityTokenName(); ?>]" value="<?php echo $form->getSecurityToken()->getValue(); ?>" />
	</form>
	<form>
<?php foreach ($router->getRouteParams() as $name => $value) : ?>
		<input type="hidden" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
<?php endforeach; ?>

<?php if ( $options[ 'backButton' ] ) : ?>
		<input type="submit" class="wcfe-task-button" value="Back" />
<?php endif; ?>
	</form>
</div>

<?php // Editor Services Template ?>
<?php require 'Templates' . DIRECTORY_SEPARATOR . 'EditorServices.html.php'; ?>