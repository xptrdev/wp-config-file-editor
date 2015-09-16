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
		<script type="text/javascript">
		
			WCFEProfilesList = new function()
			{
				 this._onprofileupdated  = function( profileId )
				 {
				 	 window.location.reload();
				 };
			};
			
			jQuery( function() {
				
				
				jQuery( '#wcfe-profiles-list-menu' ).menu({ position: { my: "left top", at: "left bottom" },
					select : function(event)
					{
						switch ( event.srcElement.id )
						{
							case 'wcfe-profiles-list-menu-delete':
							
								if ( confirm( 'Would you like to delete selected profiles?' ) )
								{
									jQuery( '#wcfe-grid-table-form' ).submit();	
								}
								
							break;
							
							case 'wcfe-profiles-list-menu-create':
								
								tb_show( 'Create Profile', actionsRoute[ 'editProfile' ] + '&caller=WCFEProfilesList&TB_iframe=true' );
								
							break;
						}
					}
				});
				
				
				jQuery( '#wcfe-table-grid-selectall' ).change(
					function()
					{
						jQuery( '.wcfe-grid-table input[name="id[]"]' ).prop( 'checked', jQuery( this ).prop( 'checked' ) );
					}
				);
				
				
				// Notify config form window
				jQuery( '.wcfe-select-profile' ).click(
				
					function()
					{
						
						var callback = window.parent.WCFEEditorForm._onselectprofile;
						
						callback( this.href.substring( this.href.indexOf( '#' ) + 1 ) );
					}
				);
				
				// Edit Profile
				jQuery( '.wcfe-edit-profile' ).click(
					function( event )
					{
						
						tb_show( 'Edit Profile', event.target.href + '&caller=WCFEProfilesList&TB_iframe=true' );
						
						return false;
					}
				);
				
				// Notify when ready
				window.parent.WCFEEditorForm._onprofilesdialogready();
				
			} );
		</script>
	</head>
	<body>
		<div id="wcfe-profiles-list" class="wcfe-popup-view">
			<ul id="wcfe-profiles-list-menu">
				<li>Actions
					<ul>
						<li id="wcfe-profiles-list-menu-delete">Delete</li>	
						<li id="wcfe-profiles-list-menu-create">Create</li>	
					</ul>
				</li>
			</ul>
			<form id="wcfe-grid-table-form" action="<?php echo $router->routeAction() ?>" method="post">
				<table class="wcfe-grid-table" cellpadding="4" cellspacing="2">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>ID</th>
							<th><input type="checkbox" id="wcfe-table-grid-selectall" /></th>
						</tr>
					</thead>
					<tbody>
<?php 			foreach ( $profiles as $profile ) : ?>
						<tr>
							<td>
								<?php echo $profile->name ?>
								<div class="wcfe-table-grid-column-actions">
									<a class="wcfe-edit-profile" href="<?php echo $router->route( new \WPPFW\MVC\MVCViewParams( '', '', 'Edit', '', 'Profile' ) ) ?>&id=<?php echo $profile->id ?>">Edit</a> | 
									<a class="wcfe-select-profile" href="#<?php echo $profile->id ?>">Select</a>
								</div>
							</td>
							<td><?php echo $profile->description ?></td>
							<td><?php echo $profile->id ?></td>
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