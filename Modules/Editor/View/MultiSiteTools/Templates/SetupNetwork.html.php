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
		background-color: #0AB6F8;
		padding: 10px 10px;
		margin-top: 20px;
		width: 822px;
	}
	div#wcfe-multisite-setup-network-tools strong {
	  font-size: 26px;
	  color: yellow;
	}
	div#wcfe-multisite-setup-network-tools p {
		color: #EAEAEA;
    font-size: 15px;
	}

</style>
<div id="wcfe-multisite-setup-network-tools" style="display: none;">
	<div id="wcfe-multisite-network-setup-dialog">
		<strong>WCFE Network Setup Tools</strong>
		<br><br>
		<span style="color:black">Left editor is current htaccess file code. Copy code on the right and put it at the desired position to left editor.</span>
		<br>
		<span style="color:black">Left code is the final code that will be write to .htaccess file</span>
		<div style="float: right; margin: 18px 10px;">
			<p>Detected htaccess code</p>
			<textarea id="wcfe-htaccess-file-detected-code" readonly="readonly" cols="50" rows="24"></textarea>
		</div>
		
		<span class="wcfe-htaccess-editors-space" style="display: inline-block;width: 20px;height: 100%;"></span>
		
		<div>
			<p>Final htaccess File</p>
			<textarea id="wcfe-htaccess-file-final-code" cols="50" rows="24"><?php echo $result[ 'htaccessCode' ] ?></textarea>		
		</div>

		<div>
			<p>Detected Config File constants</p>
			<textarea id="wcfe-config-file-detected-code" readonly="readonly" cols="113" rows="14"></textarea>
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
<?php require $this->getPath() . DIRECTORY_SEPARATOR . 'Media' . DIRECTORY_SEPARATOR . 'SetupNetwork.js'; ?>

</script>