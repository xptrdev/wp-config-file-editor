<?php

# Config File Editor Plugin autoload
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

define( 'WCFE_RESTORE_ENDPOINT', true );
define( 'INVALID_INPUTS_MESSAGE', 'Invalid Inputs' );

# initialize
$showForm = true;

# Read inputs
$inputs = array();
$inputNames = array
(
	'secureKey',
	'dataFileSecure',
	'absPath',
	'contentDir',
);

# DIE if any single input is missing
foreach ( $inputNames as $input )
{
	
	if ( ! isset( $_GET[ $input ] ) || ! $_GET[ $input ] )
	{
		
		die( INVALID_INPUTS_MESSAGE );
		
	}
	
	$inputs[ $input ] = $_GET[ $input ];
	
}

# Secure keys must be 32 characters long
if ( ( strlen( $inputs[ 'secureKey' ] ) != 32 ) || ( strlen( $inputs[ 'dataFileSecure' ] ) != 32 ) )
{
	die( INVALID_INPUTS_MESSAGE );
	
}

# Make sure passed ABS paths is part of system path!
if ( strpos( __DIR__, $inputs[ 'absPath' ] ) !== 0 )
{

	die( INVALID_INPUTS_MESSAGE );
	
}

# Load Emergency Restore model
$emergencyRestore = new \WCFE\Modules\Editor\Model\EmergencyRestore
(
	$inputs[ 'secureKey' ],
	$inputs[ 'dataFileSecure' ],
	$inputs[ 'absPath' ],
	$inputs[ 'contentDir' ]
);

# Check backup
try
{
	
	# Confirm backup request (secure keys, paths, file hash, etc...)
	$emergencyRestore->confirm();
	
	try
	{
		
		# Validate if backup can be used (e.g not expired)
		$emergencyRestore->validate();
		
	}
	catch ( Exception $exception )
	{
		
		# Delete expired backup
		$emergencyRestore->delete();
		
		die( 'Backup Expired!! WCFE deleted the expired backup!!' );
		
	}
	
}
catch( Exception $exception )
{
	
	die( 'Access denied!! Invalid backup sepecified' );
	
}

# Restore backup
if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	
	try
	{
		# Restore
		$emergencyRestore->restore();
		
		# Delete backup
		$emergencyRestore->delete();
		
		$message = 'Config File Restored Successful!';
		
	}
	catch( Exception $exception )
	{
		
		$message = $exception->getMessage();
		
	}

	$showForm = false;
		
}

# Normal View / Display Backup button
require __DIR__ . DIRECTORY_SEPARATOR . 'Restore.html.php';