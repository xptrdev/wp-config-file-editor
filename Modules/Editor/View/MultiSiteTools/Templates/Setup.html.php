<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates;

# No direct access
defined('ABSPATH') or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

$router = $this->router();
$result = $this->result();

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
			}
			a {
				color: #04B5FB;
			}
			a:hover, a:visited 
			{
				color: #106586;
			}
			div#wcfe-multisite-tools-setup {
		    padding: 0px 20px;
		    font-family: monospace;
			}
			#wcfe-multisite-tools-setup p {
			  line-height: 21px;
			}
			div#wcfe-multisite-tools-setup h2 {
			  color: wheat;
			}
			#wcfe-multisite-tools-setup p {
			  line-height: 23px;
			  color: white;
			  font-size: 17px;
			}
			div#wcfe-multisite-tools-setup ol {
			    color: #339958;
			    font-size: 17px;
			}
		</style>
	</head>
	<body>
		<div id="wcfe-multisite-tools-setup" class="wcfe-popup-view">
		
<?php if ( ! $result[ 'isMultiSite' ] ) : ?>
		
<?php 	if ( ! isset( $result[ 'isSuccessed' ] ) || ! $result[ 'isSuccessed' ] ) : ?>

   		<div id="wcfe-multisite-tools-warning">
   			<h2>Welcome to CFE Plugin Multi Site Setup tools</h2>	
   			<p>
   			The main purpose of using this Tools is to write .htaccess file and wp-config file Multi Site configuration for you.
   			By default Wordpress would ask you to copy the code yourself to those files and this requires to access the file system over FTP.
   			Wordpress is forcing some restrictions on enabling Multi Site. WCFE Plugin needs to do some tricks in order to get around those restriction.
   			Wordpress requires to Deactivate all Plugins before enable/setup Multi Sites.
   			Therefor there is no chance to WCFE Plugin or any other Plugin to get involved while Wordpress is configuring Multi Sites.
   			WCFE gets around this by writing a single line of code to wp-config file so it will still running while configuring Multi Sites installation.
   			This process will take the following actions:
   			</p>
   			<ol>
   				<li>Deactivate all activate Plugins</li>
   				<li>Inject PHP Code into wp-config.php file, to load WCFE Plugin after all plugins are deactivated</li>
   				<li>Set WP_ALLOW_MULTISITE to true and write to wp-config.php file</li>
   				<li>Redirect to Wordpress Tools->Network Setup Page</li>
   				<li>You will be asked to select few options and then to press Setup</li>
   				<li>WCFE Buttons will be displayed on Tools->Network Setup page once Multi Sites is configureded</li>
   				<li>Use WCFE Buttons will reactivate Plugins</li>
   				<li>Remove wp-config.php file Code that loads WCFE Plugin</li>
   				<li>Writes Wordpress Multi Sites constants to wp-config.php</li>
   				<li>Writes Wordpress Multi Site htaccess derictives to .htaccess file</li> 
   			</ol>   			
   			<form action="<?php echo $router->routeAction() ?>" method="post">
   				<input type="submit" value="Setup" />
   				<input type="hidden" name="securityNonce" value="<?php echo $result[ 'securityNonce' ] ?>" />
   			</form>
   		</div>
   		
<?php 	else : ?>

			<div id="wcfe-multisite-setup-tools-start-configuration">
			
				<p>Wordpress Multi Sites setup is now enabled on Wordpress.</p>
				
				<p>Now its turn to <a target="_blank" href="<?php echo admin_url( 'Network.php' ); ?>">Configure Wordpress Multi Sites</a>.</p>
				
				<p>If you've any problem you can <a target="_blank" href="<?php echo $result[ 'restoreBackupUrl' ] ?>">revert Config File</a> to the state before processing this operation</p>
				
			</div>

<?php 	endif; ?>
   		
<?php else : ?>


			<div>
				<h2>Multi Site is enabled on this site! Nothing to do!!!</h2>	
			</div>

			
<?php endif; ?>   		


		</div>
		
<?php do_action( 'admin_print_footer_scripts' ) ?>
	</body>
</html>