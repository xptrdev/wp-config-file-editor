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

$form =& $result[ 'form' ];
$securityToken = $result[ 'securityToken' ];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
<?php do_action( 'admin_print_scripts' ); ?>
<?php do_action( 'admin_print_styles' ); ?>
	</head>
	<body>
		<div id="wcfe-profile-edit" class="wcfe-popup-view">
			<form action="<?php echo $router->route( new \WPPFW\MVC\MVCViewParams( '', '', 'Edit', '', 'Profile' ) ) ?>&caller=<?php echo $result[ 'caller' ] ?>&storageId=<?php echo $result[ 'storageId' ] ?>" method="post">
				<fieldset>
					<ul>
						<li>
							<label for="profile-name"><?php $this->_e( 'Name' ) ?></label>
							<input<?php echo ( ! $result[ 'isNew' ] ? ' readonly="readonly"' : '' ) ?> type="text" id="profile-name" name="profileForm[name]" value="<?php echo $form->get( 'name' )->getValue() ?>" />
						</li>
						<li>
							<label for="profile-description"><?php $this->_e( 'Description' ) ?></label>
							<textarea id="profile-description" name="profileForm[description]"><?php echo $form->get( 'description' )->getValue() ?></textarea>
						</li>
						<li>
							<input type="submit" name="Save" value="Save" />
						</li>
					</ul>
				</fieldset>
				<input type="hidden" name="securityToken" value="<?php echo $securityToken ?>" />
				<input type="hidden" name="profileForm[id]" value="<?php echo $form->get( 'id' )->getValue() ?>" />
			</form>
		</div>
<?php
			if ( isset( $result[ 'profile' ] ) ) : 
				$callbackName = $result[ 'isNew' ] ? '_onprofilecreated' : '_onprofileupdated';
?>
	<script type="text/javascript"> window.parent[ '<?php echo $result[ 'caller' ] ?>' ].<?php echo $callbackName ?>( <?php echo json_encode( $result[ 'profile' ] ) ?> );</script>
<?php endif; ?>
	</body>
</html>