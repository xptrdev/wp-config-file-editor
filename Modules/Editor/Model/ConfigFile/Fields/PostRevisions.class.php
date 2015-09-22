<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class PostRevisions extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Disable / Enable Post Revisions and specify revisions max count'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WP_POST_REVISIONS';

	/**
	* put your comment there...
	* 
	*/
	public function & allReady() 
	{
		
		parent::allReady();
		
		$PostRevisionsMax = $this->getModel()->getField( 'PostRevisionsMax' );
		$postRevisionMaxField = $PostRevisionsMax->getField();
		$postRevisionsField = $this->getField();
		
		# Suppress Post Rvisions Max if it has no value
		if ( ! $postRevisionMaxField->getValue() || ! $postRevisionsField->getValue() )
		{
			$PostRevisionsMax->setSuppressOutputForce( true );
		}
		else
		{
			# Suppress Post Revisions if post revisions ON and post revisions Max has value
			
			$this->setSuppressOutputForce( true );
			
		}
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

