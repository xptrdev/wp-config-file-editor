<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs;

# Imports
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\SimpleSubContainerTab;

/**
* 
*/
class PostOptionsTab extends SimpleSubContainerTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_POST_FIELDS;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'Generic' => array
		(
			'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
			(
				'PostAutoSaveInterval',
				'PostEmptyTrashDays',
			)		
		),
		'PostRevisions' => array(
			'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
			(
				'PostRevisions',
				'PostRevisionsMax',
			)
		)

	);
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
        $this->title = $this->_( 'Post' );
        
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}