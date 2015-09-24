<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\SystemCheckTools\Templates;

# No direct access
defined('ABSPATH') or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

$router = $this->router();
$result = $this->result();
$model =& $result[ 'model' ];

$libraryImagesUrl = \WCFE\Plugin::me()->getURL() . '/Libraries/Images';

# CONFIG FILE
if ( $model->getConfigFileState() )
{
	$configFile[ 'task' ]	= 'off';
	$configFile[ 'taskText' ] = 'OFF';
	$configFile[ 'tipText' ] = 'Set readonly by changing permission to 0444';
}
else {
	$configFile[ 'task' ]	= 'on';
	$configFile[ 'taskText' ] = 'ON';	
	$configFile[ 'tipText' ] = 'Set writable by changing permission to 0664';
}

# HTACCESS FILE
if ( $model->getHTAccessFileState() )
{
	$htaccessFile[ 'task' ] = 'off';
	$htaccessFile[ 'taskText' ] = 'OFF';
	$htaccessFile[ 'tipText' ] = 'Set readonly by changing permission to 0444';
}
else 
{
	$htaccessFile[ 'task' ] = 'on';
	$htaccessFile[ 'taskText' ] = 'ON';	
	$htaccessFile[ 'tipText' ] = 'Set writable by changing permission to 0664';
}

# Backup
if ( $model->getBackupState() )
{
	$backup[ 'tipText' ] = 'Emergency backup files detected. Its more secure to delete them only if you dont need it';
}
else 
{
	$backup[ 'tipText' ] = '';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
<?php do_action( 'admin_print_scripts' ); ?>
<?php do_action( 'admin_print_styles' ); ?>
		<style type="text/css">
			
			body
			{
		    color: white;
		    font-family: monospace;
		    margin: 0;
		    background-color: #0A4758;
			}
			a {
				color: #04B5FB;
			}
			a:hover, a:visited 
			{
				color: #106586;
			}
			div#wcfe-check-tools {
		    padding: 0px 20px;
			}
			div#wcfe-check-tools p {
			  line-height: 23px;
			  color: white;
			  font-size: 17px;
			}
			div#wcfe-check-tools h2 {
			  color: wheat;
			}
			div#wcfe-check-tools ol {
			  color: #339958;
			  font-size: 17px;
			}
				
			div#wcfe-check-tools table {
		    color: white;
		    width: 100%;
		    margin-top: 24px;
		    font-size: 15px;
			}
			div#wcfe-check-tools table td {
    background-color: #040607;
    text-align: center;
    vertical-align: middle;
			}
		</style>
	</head>
	<body>
		<div id="wcfe-check-tools" class="wcfe-popup-view"> 		
    	<table cellpadding="9" cellspacing="13">
    		<tbody>
    			<tr>
    				<td>
    					<span>Writable wp-config.php</span>
							<br />
							<a href="<?php echo $this->actionsRoute[ 'systemCheckTools' ] ?>&wcfe-tool=config-file&wcfe-task=<?php echo $configFile[ 'task' ]; ?>" title="<?php echo $configFile[ 'tipText' ] ?>">Turn <?php echo $configFile[ 'taskText' ] ?></a>
    				</td>
    				<td><img src="<?php echo $libraryImagesUrl ?>/agt_action_<?php echo $model->getConfigFileState() ? 'success' : 'fail' ?>.png" /></td>
    			</tr>
    			<tr>
    				<td>
    					<span>Writable .htaccess</span>
							<br />
							<a href="<?php echo $this->actionsRoute[ 'systemCheckTools' ] ?>&wcfe-tool=htaccess-file&wcfe-task=<?php echo $htaccessFile[ 'task' ]; ?>" title="<?php echo $htaccessFile[ 'tipText' ] ?>">Turn <?php echo $htaccessFile[ 'taskText' ] ?></a>
    				</td>
    				<td><img src="<?php echo $libraryImagesUrl ?>/agt_action_<?php echo $model->getHTAccessFileState() ? 'success' : 'fail' ?>.png" /></td>
    			</tr>
    			<tr>
    				<td>Application Server</td>
    				<td><?php echo $model->getApplicationServer() ?></td>
    			</tr>
    			<tr>
    				<td>Backup directory</td>
    				<td><?php echo $model->getBackupDir() ?></td>
    			</tr>
    			<tr>
    				<td>
    					<span>Emergency Backup</span>

    					
<?php 			if ( $model->getBackupState() ) : ?>
							<br />
							<a href="<?php echo $this->actionsRoute[ 'systemCheckTools' ] ?>&wcfe-tool=emergency-backup">Delete</a>
<?php 			endif; ?>


    				</td>
    				<td><img src="<?php echo $libraryImagesUrl ?>/<?php echo $model->getBackupState() ? 'alert' : 'agt_action_success' ?>.png" title="<?php echo $backup[ 'tipText' ] ?>" /></td>
    			</tr>
    		</tbody>
    	</table>
		</div>
<?php do_action( 'admin_print_footer_scripts' ) ?>
	</body>
</html>