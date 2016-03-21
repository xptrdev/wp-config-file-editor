<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates;

# No direct access
defined('ABSPATH') or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

$result = $this->result();
$router = $this->router();
$profiles = $result[ 'profiles' ];
$securityNonce = $result[ 'securityNonce' ];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
<?php do_action( 'admin_print_scripts' ); ?>
<?php do_action( 'admin_print_styles' ); ?>
	</head>
	<body>
		<div id="wcfe-profiles-list" class="wcfe-popup-view">
			<ul id="wcfe-profiles-list-menu">
				<li><?php $this->_e( 'Actions' ) ?>
					<ul>
						<li id="wcfe-profiles-list-menu-delete"><?php $this->_e( 'Delete' ) ?></li>
						<li id="wcfe-profiles-list-menu-create"><?php $this->_e( 'Create' ) ?></li>
					</ul>
				</li>
			</ul>
			<form id="wcfe-grid-table-form" action="<?php echo $router->routeAction() ?>" method="post">
				<table class="wcfe-grid-table" style="display: none;" cellpadding="4" cellspacing="2">
					<thead>
						<tr>
							<th><?php $this->_e( 'Name' ) ?></th>
							<th><?php $this->_e( 'escription' ) ?></th>
							<th><?php $this->_e( 'ID' ) ?></th>
							<th><input type="checkbox" id="wcfe-table-grid-selectall" /></th>
						</tr>
					</thead>
					<tbody>
<?php 			foreach ( $profiles as $profile ) : ?>
						<tr id="profile-row-<?php echo $profile->id ?>">
							<td>
								<span class="profile-field profile-name"><?php echo $profile->name ?></span>
								<div class="wcfe-table-grid-column-actions">
									<a class="wcfe-edit-profile" href="<?php echo $router->route( new \WPPFW\MVC\MVCViewParams( '', '', 'Edit', '', 'Profile' ) ) ?>&id=<?php echo $profile->id ?>"><?php $this->_e( 'Edit' ) ?></a> | 
									<a class="wcfe-select-profile" href="#<?php echo $profile->id ?>"><?php $this->_e( 'Load' ) ?></a>
								</div>
							</td>
							<td><span class="profile-field profile-description"><?php echo $profile->description ?></span></td>
							<td><span class="profile-field profile-id"><?php echo $profile->id ?></span></td>
							<td><input type="checkbox" name="id[]" value="<?php echo $profile->id ?>" /></td>
						</tr>
<?php 			endforeach; ?>
					</tbody>
				</table>
				<input type="hidden" name="securityNonce" value="<?php echo $result[ 'securityNonce' ] ?>" />
			</form>	
		</div>
		<script type="text/javascript">var actionsRoute = <?php echo json_encode( $this->actionsRoute ) ?>;</script>
<?php do_action( 'admin_print_footer_scripts' ) ?>
	</body>
</html>