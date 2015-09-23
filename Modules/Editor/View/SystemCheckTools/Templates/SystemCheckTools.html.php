<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\SystemCheckTools\Templates;

# No direct access
defined('ABSPATH') or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

$router = $this->router();
$model = $this->result();

$libraryImagesUrl = \WCFE\Plugin::me()->getURL() . '/Libraries/Images';

$configFile[ 'task' ] = $model->getConfigFileState() ? 'off' : 'on';
$configFile[ 'taskText' ] = ( $configFile[ 'task' ] == 'off' ) ? 'OFF' : 'ON';

$htaccessFile[ 'task' ] = $model->getHTAccessFileState() ? 'off' : 'on';
$htaccessFile[ 'taskText' ] = ( $htaccessFile[ 'task' ] == 'off' ) ? 'OFF' : 'ON';

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
		    background-color: #1088AA;
		    text-align: center;
		    vertical-align: middle;
			}
		</style>
	</head>
	<body>
		<div id="wcfe-check-tools" class="wcfe-popup-view"> 		
    	<table cellpadding="9" cellspacing="6">
    		<tbody>
    			<tr>
    				<td>
    					<span>Writable wp-config.php</span>
							<br />
							<a href="<?php echo $this->actionsRoute[ 'systemCheckTools' ] ?>&wcfe-tool=config-file&wcfe-task=<?php echo $configFile[ 'task' ]; ?>">Turn <?php echo $configFile[ 'taskText' ] ?></a>
    				</td>
    				<td><img src="<?php echo $libraryImagesUrl ?>/agt_action_<?php echo $model->getConfigFileState() ? 'success' : 'fail' ?>.png" /></td>
    			</tr>
    			<tr>
    				<td>
    					<span>Writable .htaccess</span>
							<br />
							<a href="<?php echo $this->actionsRoute[ 'systemCheckTools' ] ?>&wcfe-tool=htaccess-file&wcfe-task=<?php echo $htaccessFile[ 'task' ]; ?>">Turn <?php echo $htaccessFile[ 'taskText' ] ?></a>
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
    				<td><img src="<?php echo $libraryImagesUrl ?>/<?php echo $model->getBackupState() ? 'alert' : 'agt_action_success' ?>.png" /></td>
    			</tr>
    		</tbody>
    	</table>
		</div>
<?php do_action( 'admin_print_footer_scripts' ) ?>
	</body>
</html>