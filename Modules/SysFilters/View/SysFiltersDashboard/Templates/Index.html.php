<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Templates;

use \WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs;

# No direct access
defined('ABSPATH') or die(WCFE\NO_DIRECT_ACCESS_MESSAGE);
	
# Getting model
$router =& $this->router();
$data = $this->result();

$model =& $data[ 'model' ];
$form =& $data[ 'form' ];

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
<?php require 'Templates' . DIRECTORY_SEPARATOR . 'Menu.html.php' ?>

<?php // COnfig Form ?>
	<form id="wcfe-sysfilters-form" method="post" action="<?php echo $router->routeAction() ?>">
<?php
		# Output options tab
		$optionsTab = new Tabs\Tabs( new Tabs\SysFiltersFormTabsAdapter( $form, $this ), $form );
		$optionsTab->load();
		
		echo $optionsTab->render();
?>
		<div id="wcfe-toolbox">
			<input type="submit" id="save-sysfilters-form" name="save-sysfilters-form" value="Save"/>
		</div>
		<input type="hidden" name="securityToken" value="<?php echo $data[ 'securityToken' ] ?>" />
	</form>
</div>