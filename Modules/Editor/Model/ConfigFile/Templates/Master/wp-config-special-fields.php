<?php 

# No direct access
defined( 'ABSPATH' ) or die( 'Access Denied!!!!!' );

# Use default config template
require 'wp-config.php';
?>

/* WCFE Plugin Multi Sites Tools Plugin Bootstrap */

<?php
# Add special fields
foreach ( $this->specialFields as $field ) 
{
	
	echo $field;
	
}