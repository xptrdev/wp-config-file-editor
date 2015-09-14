<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class SaveQueries extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'The SAVEQUERIES definition saves the database queries to an array and that array can 
		 be displayed to help analyze those queries. 
		 The constant defined as true causes each query to be saved, 
		 how long that query took to execute, and what function called it.'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'SAVEQUERIES';

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

