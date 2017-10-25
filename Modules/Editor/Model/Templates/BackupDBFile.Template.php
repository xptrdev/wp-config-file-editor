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

$data[ 'absPath' ] 	= '<?php echo $cleanAbsPath ?>';
$data[ 'contentDir' ] 	= '<?php echo $contentDir ?>';

$data[ 'timeCreated' ] 	= <?php echo time() ?>;

<?php 
/* The private key never exposed outside. 
* Its just only for making this file content RANDOM and therefore generating 
* different MD5 hash for file content to be validated when restored 
*/
?>
$data[ 'privateKey' ] = '<?php echo wp_generate_password( 512, true, true ) ?>';

return $data;