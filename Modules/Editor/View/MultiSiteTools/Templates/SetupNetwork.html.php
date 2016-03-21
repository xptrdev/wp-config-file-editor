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
<style type="text/css">
	#wcfe-multisite-setup-network-tools
	{
    background-color: #FFFFFF;
    padding: 10px 10px;
    margin-top: 20px;
    margin-bottom: 35px;
    width: 75%;
	}
	div#wcfe-multisite-setup-network-tools strong {
    font-size: 26px;
    color: #067F94;
	}
	div#wcfe-multisite-setup-network-tools p {
    font-size: 15px;
    font-weight: bold;
	}
	blockquote {
    background-color: #ECECEC;
    padding: 10px 10px;
    color: #EB211F;
    font-size: 19px;
    line-height: 25px;
    text-align: center;
	}
</style>
<div id="wcfe-multisite-setup-network-tools" style="display: none;">
	<div id="wcfe-multisite-network-setup-dialog">
		<strong><?php $this->_e( 'WCFE Network Setup Tools' ) ?></strong>
		<br><br>
		<span style="color:black"><?php $this->_e( 'Left editor is current htaccess file code. Copy code on the right and put it at the desired position to left editor.' ) ?></span>
		<br>
		<span style="color:black"><?php $this->_e( 'Left code is the final code that will be write to .htaccess file' ) ?></span>
		
		<blockquote><?php $this->_e( 'Writing Rewrite rules is not supported for Windows IIS, only config file will be processed' ) ?></blockquote>
		
		<div style="float: right; margin: 18px 10px;width: 45%;">
			<p><?php $this->_e( 'Detected htaccess code' ) ?></p>
			<textarea id="wcfe-htaccess-file-detected-code" style="width: 100%;height: 400px;" readonly="readonly"></textarea>
		</div>
		
		<span class="wcfe-htaccess-editors-space" style="display: inline-block;width: 20px;height: 100%;"></span>
		
		<div style="width: 45%">
			<p><?php $this->_e( 'Final htaccess File' ) ?></p>
			<textarea id="wcfe-htaccess-file-final-code" style="width: 100%;height: 400px"><?php echo $result[ 'htaccessCode' ] ?></textarea>
		</div>

		<div>
			<p><?php $this->_e( 'Detected Config File constants' ) ?></p>
			<textarea id="wcfe-config-file-detected-code" style="height: 150px;width: 100%" readonly="readonly"></textarea>
		</div>
		
	</div>
	<input type="button" id="wcfe-multisite-setup-tools-button" value="Setup Network" />
	<input type="hidden" name="WCFEMultiSitesTools[stoken]" value="<?php echo $result[ 'securityNonce' ] ?>" />
</div>

<script type="text/javascript">

var actionsRoute = <?php echo json_encode( $this->actionsRoute ); ?>;

<?php require implode( DIRECTORY_SEPARATOR, array
	(  
  	\WCFE\Plugin::DIR,
  	'Modules',
  	'Editor',
  	'View',
  	'Editor',
  	'Media',
  	'EditorServices.js'
	)
); 
?>
<?php

    $mediaDir = $this->getPath() . DIRECTORY_SEPARATOR . 'Media';
    
    # Inline JS Localization
?>

var WCFESetupNetworkL10N = <?php echo json_encode( require $mediaDir . DIRECTORY_SEPARATOR . 'SetupNetwork.localization.php' ); ?>;
    
<?php
    # Inline JS
    require $mediaDir . DIRECTORY_SEPARATOR . 'SetupNetwork.js'; 
    
?>  

</script>