<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Groups;

/**
* 
*/
class Database extends Group {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array(
		'DbHost', 
		'DbUser', 
		'DbPassword', 
		'DbName', 
		'DbCharSet', 
		'DbCollate',
		'DbTablePrefix'
		);
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTitle() {
		return 'Database Connection Parameters';
	}

}