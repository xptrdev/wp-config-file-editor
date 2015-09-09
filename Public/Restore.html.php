<?php

# No direct access
$secureSrcClassName  = 'WCFE\Modules\Editor\Model\EmergencyRestore';
( class_exists( $secureSrcClassName ) && defined( 'WCFE_RESTORE_ENDPOINT' ) ) or die( 'Access Denied' );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Config File Editor Emergency Restore Interface</title>
		<style type="text/css">
			body 
			{
				background-color: #161616;
				color: white;
				font-family: sans-serif;
				font-size: 14px;
			}
			div#wcfe-restore-tools 
			{
		    margin: auto;
		    width: 400px;
		    height: 300px;
		    text-align: center;
			}
			#wcfe-restore-tools .restore-button
			{
		    margin-top: 50px;
		    width: 200px;
		    height: 200px;
		    background-color: #10FF00;
		    font-size: 38px;
		    border-color: #10FF00;
		    color: white;
			}
		</style>
	</head>
	<body>
	
<?php if ( $showForm ) : ?>

		<div id="wcfe-restore">			
			<div id="wcfe-restore-tools">
				<form method="post">
					<input class="restore-button" type="submit" name="Restore" value="Restore" />
				</form>
			</div>
		</div>
		
<?php else : ?>

	<span><?php echo $message; ?></span>

<?php endif; ?>

	</body>
</html>