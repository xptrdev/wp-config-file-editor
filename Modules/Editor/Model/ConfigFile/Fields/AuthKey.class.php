<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class AuthKey extends Constant {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $comments = array
	(
		'Authentication Unique Keys and Salts.
		
 		 Change these to different unique phrases!
 		 You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 		 You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 
 		 @since 2.6.0'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'AUTH_KEY';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}
    
}

