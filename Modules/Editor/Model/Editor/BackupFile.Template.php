<?php

# No direct access
defined( 'ABSPATH' ) or die( WCFE\NO_DIRECT_ACCESS_MESSAGE );

# Start PHP Document
echo "<?php\n\n";

?>
# No direct access
$secureSrcClassName  = 'WCFE\Modules\Editor\Model\EmergencyRestore';
( class_exists( $secureSrcClassName ) && ( get_class( $this ) == $secureSrcClassName ) && $this->authorized() ) or die( 'Access Denied' );


return array( 'content' => '<?php echo $configFileContent ?>' );