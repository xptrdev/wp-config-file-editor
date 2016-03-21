<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Templates;

# No direct access
defined( 'ABSPATH' ) or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

$paths = $result[ 'info' ][ 'paths' ];
$pathDisplay = array
(
	'absPath' => array( 'title' => $this->_( 'Absolute Path' ) ),
	'pluginsDir' => array( 'title' => $this->_( 'Plugins directory path' ) ),
	'pluginsDirUrl' => array( 'title' => $this->_( 'Plugins directory URL' ) ),
	'contentDir' => array( 'title' => $this->_( 'Content directory path' ) ),
	'contentDirUrl' => array( 'title' => $this->_( 'Content directory Url' ) ),
	'adminUrl' => array( 'title' => $this->_( 'Admin Url' ) ),
	'siteUrl' => array( 'title' => $this->_( 'Site Url' ) ),
	'networkAdminUrl' => array( 'title' => $this->_( 'Network Admin Url' ) ),
	'networkSiteUrl' => array( 'title' => $this->_( 'Network Site Url' ) ),
);

# COnvery to array
foreach ( $paths as $key => $location )
{
	
	$paths[ $key ] = $pathDisplay[ $key ];
	
	$paths[ $key ][ 'location' ] = $location;
	
}

?>
<div id="wcfe-info-paths">
	<table id="wcfe-info-paths-table" cellpadding="5" cellspacing="1">
		<thead>
			<tr>
				<th style="width: 28%;"><?php $this->_e( 'Name' ) ?></th>
				<th><?php $this->_e( 'Path' ) ?></th>
			</tr>
		</thead>
		<tbody>
<?php foreach( $paths as $path ) : ?>
			<tr>
				<td><span><?php echo $path[ 'title' ] ?></span></td>
				<td><input type="text" readonly="readonly" value="<?php echo $path[ 'location' ] ?>" /></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
</div>