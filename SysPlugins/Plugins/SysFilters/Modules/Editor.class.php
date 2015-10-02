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
				'editorHeight' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'editor_height' ) ),
				'mediaButtons' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'media_buttons' ) ),
				'dragDropUpload' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'drag_drop_upload' ) ),
				'textAreaRows' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'textarea_rows' ) ),
				'tabIndex' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'tabindex' ) ),
				'editorCSS' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'editor_css' ) ),
				'editorClass' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'editor_class' ) ),
				'teeny' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'teeny' ) ),
				'tinyMCE' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'tinymce' ) ),
				'quickTags' => array( 'filter' => 'wp_editor_settings', 'params' => array( 'element' => 'quicktags', 'flags' => 'customHandler' ) ),
			),
			'return' => array
			(
				'plugins' => array( 'filter' => 'tiny_mce_plugins' ),
				'buttons2' => array( 'filter' => 'mce_buttons_2' ),
			)
		);
		
		$this->buildFiltersList( $filtersToBuild );

		return parent::getFilters();
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function get_quickTagsValue( $value )
	{
		# If buttons is supplied then Return array with buttons as item
		$buttons = $this->getVar( 'quickTags', 'buttons' );
		
		if ( $value && $buttons )
		{
			$value = array( 'buttons' => $buttons );
		}
		
		return $value;
	}
	
}
