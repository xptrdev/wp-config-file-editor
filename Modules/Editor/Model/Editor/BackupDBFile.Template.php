<?php

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
$data[ 'absPath' ] 	= '<?php echo ABSPATH ?>';
$data[ 'backupFileName' ]	= '<?php echo $backupFileName ?>';
$data[ 'backupFileHash' ] 	= '<?php echo $backupFileHash ?>';
$data[ 'timeCreated' ] 	= <?php echo time() ?>;


return $data;