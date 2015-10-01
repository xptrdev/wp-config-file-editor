<?php
/**
* 
*/

namespace WCFE\SysPlugins\SysFilters\Modules;

use WCFE\SysPlugins\SysFilters\Module;

/**
* 
*/
class EditorModule extends Module
{
	
	/**
	* put your comment there...
	* 
	*/
	public function getFilters()
	{
		
		$filtersToBuild = array
		(
			'setArrayElement' => array
			(
				'autoParagraph' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'wpautop' ) ),
				'mediaButtons' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'media_buttons' ) ),
				'dragDropUpload' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'drag_drop_upload' ) ),
				'textAreaRows' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'textarea_rows' ) ),
				'tabIndex' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'tabindex' ) ),
				'editorCSS' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'editor_css' ) ),
				'editorClass' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'editor_class' ) ),
				'teeny' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'teeny' ) ),
				'tinyMCE' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'tinymce' ) ),
			)

		);
		
		$this->buildFiltersList( $filtersToBuild );

		return parent::getFilters();
	}
	
	
}
