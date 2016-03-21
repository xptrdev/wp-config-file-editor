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
				
			}
			a, a:visited {
				color: #04B5FB;
			}
			a:hover
			{
				color: #106586;
			}
			div#wcfe-multisite-tools-setup {
		    padding: 0px 20px;
		    font-family: monospace;
			}
			div#wcfe-multisite-tools-setup h2 {
			  color: #736F6E;
			}
			#wcfe-multisite-tools-setup p {
				font-size: 16px;
    		font-style: italic;
			}
			div#wcfe-multisite-tools-setup ol {
			  color: #339958;
			  font-size: 17px;
			  font-weight: bold;
			}
			.step-1
			{
				color: #05303D !important;
			}
			.step-2
			{
				color: #074328 !important;
			}
			blockquote {
		    background-color: #090909;
		    padding: 10px 10px;
		    color: #E2FF08;
		    font-size: 19px;
			}
		</style>
	</head>
	<body>
		<div id="wcfe-multisite-tools-setup" class="wcfe-popup-view">

<?php // Display Multi site Setup Form ?>
<?php if ( ! $result[ 'isMultiSite' ] ) : ?>

<?php // DISPLAY MULTI SITE SETUP FORM ?>		
<?php 	if ( ! isset( $result[ 'isSuccessed' ] ) || ! $result[ 'isSuccessed' ] ) : ?>

   		<div id="wcfe-multisite-tools-warning">
   			<h2><?php $this->_e( 'Welcome to CFE Plugin Multi Site Setup tools' ) ?></h2>	
   			<p>
   			<?php $this->_e( 'The main purpose of using this Tools is to write .htaccess file and wp-config file Multi Site configuration for you.
   			By default Wordpress would ask you to copy the code yourself. This requires access the file system over FTP.
   			Wordpress is forcing some restrictions on enabling Multi Site. WCFE Plugin needs to do some tricks in order to get around those restriction.
   			Wordpress requires to Deactivate all Plugins before enable/setup Multi Sites.
   			Therefor there is no chance for WCFE Plugin to get involved while Wordpress is configuring Multi Sites.
   			WCFE gets around this by writing a single line of code to wp-config file so it will still running while configuring Multi Sites installation.
   			This process will take the following actions:' ) ?>
   			</p>
   			<ol class="step-1">
   				<li><?php $this->_e( 'Deactivate all activate Plugins' ) ?></li>
   				<li><?php $this->_e( 'Backup wp-config.php file, you will be provided with restore link' ) ?></li>
   				<li><?php $this->_e( 'Inject PHP Code into wp-config.php file that loads WCFE Plugin after all plugins are deactivated' ) ?></li>
   				<li><?php $this->_e( 'Set WP_ALLOW_MULTISITE to true and write to wp-config.php file' ) ?></li>
   				<li><?php $this->_e( 'Redirect to Wordpress Tools->Network Setup Page' ) ?></li>
   			</ol>
   			<ol class="step-2">
   				<li><?php $this->_e( 'You will be asked to select few options and then to press Setup' ) ?></li>
   				<li><?php $this->_e( 'WCFE Buttons will be displayed on Tools->Network Setup page once Multi Sites is configureded' ) ?></li>
   				<li><?php $this->_e( 'Use WCFE Buttons will reactivate Plugins' ) ?></li>
   				<li><?php $this->_e( 'Remove wp-config.php file Code that loads WCFE Plugin' ) ?></li>
   				<li><?php $this->_e( 'Writes Wordpress Multi Sites constants to wp-config.php ') ?></li>
   				<li><?php $this->_e( 'Writes Wordpress Multi Site htaccess derictives to .htaccess file' ) ?></li> 
   			</ol> 
   			<blockquote><?php $this->_e( 'Writing Rewrite rules is not supported for Windows IIS, only config file will be processed' ) ?></blockquote>
   			<form action="<?php echo $router->routeAction() ?>" method="post">
   				<input type="submit" value="Setup" />
   				<input type="hidden" name="securityNonce" value="<?php echo $result[ 'securityNonce' ] ?>" />
   			</form>
   		</div>

<?php 	// DISPLAY MULTI SITE SETUP SUBMISSION RESULT ?>   		
<?php 	else : ?>

			<div id="wcfe-multisite-setup-tools-start-configuration">
			
				<p><?php $this->_e( 'Wordpress Multi Sites setup is now enabled on Wordpress.' ) ?></p>
				
				<p><?php $this->_e( 'Now its turn to Configure Wordpress Multi Sites' ) ?> <a target="_blank" href="<?php echo admin_url( 'network.php' ); ?>"><?php $this->_e( 'Configure Multi Site' ) ?></a></p>
				
				<p><?php $this->_e( 'If you\'ve any problem you can revert Config File to the state before processing this operation.' ) ?> <a target="_blank" href="<?php echo $result[ 'restoreBackupUrl' ] ?>"><?php $this->_e( 'Revert' ) ?></a></p>
				
			</div>

<?php 	endif; ?>
 
<?php // MULTI SITE IS ALREADY ENABLED!! ?>  		
<?php else : ?>


			<div>
				<h2><?php $this->_e( 'Multi Site is enabled on this site! Nothing to do!!!' ) ?></h2>	
			</div>

			
<?php endif; ?>   		


		</div>
		
<?php do_action( 'admin_print_footer_scripts' ) ?>
	</body>
</html>