<?php

namespace WCFE\Modules\Editor\Model\Editor;

# No direct access
defined( 'ABSPATH' ) or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

# Start PHP Document
echo "<?php\n\n";

?>
# No direct access
$secureSrcClassName  = 'WCFE\Modules\Editor\Model\EmergencyRestore';
( class_exists( $secureSrcClassName ) && ( get_class( $this ) == $secureSrcClassName ) ) or die( 'Access Denied' );

$data = array();

$data[ 'secureKey' ] 	= '<?php echo $secureKey ?>';
$data[ 'backupFileHash' ] 	= '<?php echo $backupFileHash ?>';

$data[ 'absPath' ] 	= '<?php echo ABSPATH ?>';
$data[ 'contentDir' ] 	= '<?php echo $contentDir ?>';

$data[ 'timeCreated' ] 	= <?php echo time() ?>;


return $data;