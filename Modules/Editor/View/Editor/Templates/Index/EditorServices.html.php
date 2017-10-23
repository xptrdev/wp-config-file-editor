<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Templates;

# No direct access
defined( 'ABSPATH' ) or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

?>
<script type="text/javascript">var actionsRoute = <?php echo json_encode( $this->actionsRoute ) ?>;</script>

<?php // Errors list dialog to be used by various Ajax actions ?>
<div id="wcfe-errors-dialog"><div><ul id="wcfe-errors-dialog-errors-list"> </ul></div></div>

<?php // Confirm save message template to be used by thickbox as inline popup ?>
<?php require __DIR__ . DIRECTORY_SEPARATOR . 'ConfirmSave.html.php'; ?>