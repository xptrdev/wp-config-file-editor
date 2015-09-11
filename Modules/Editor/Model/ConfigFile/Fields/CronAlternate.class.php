<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class CronAlternate extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Use this, for example, if scheduled posts are not getting published. 
		
		According to Otto\'s forum explanation, "this alternate method uses a redirection approach, 
		which makes the users browser get a redirect when the cron needs to run, 
		so that they come back to the site immediately while cron continues to run in the connection they just dropped. 
		This method is a bit iffy sometimes, which is why it\'s not the default."'
	);
  
	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'ALTERNATE_WP_CRON';

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

