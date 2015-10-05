<?php
/**
* 
*/

namespace WCFE\Modules\SysFilters\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class SysFiltersDashboardModel extends PluginModel {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $sysFiltersData = null;
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {}
	
	
	/**
	* put your comment there...
	* 
	*/
	public function getData()
	{
		return $this->sysFiltersData;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public static function getDefaults()
	{
		# Allowed mime types to be uploaded
		$wpMimeTypes = wp_get_mime_types();
		
		foreach ( $wpMimeTypes as $extensions => $type )
		{
			$allowedUploadMimeTypes[] = "{$extensions},{$type}";
		}
		
		$defaults = array
		(
			'misc' => array(
			
			 	'queryVars' => array(
			 		'value' => array
			 		(
			 			'm',
			 			'p',
			 			'posts',
			 			'w',
			 			'cat',
			 			'withcomments',
			 			'withoutcomments',
			 			's', 
			 			'search', 
			 			'exact', 
			 			'sentence', 
			 			'calendar', 
			 			'page', 
			 			'paged', 
			 			'more', 
			 			'tb', 
			 			'pb', 
			 			'author', 
			 			'order', 
			 			'orderby', 
			 			'year', 
			 			'monthnum', 
			 			'day', 
			 			'hour', 
			 			'minute', 
			 			'second', 
			 			'name', 
			 			'category_name', 
			 			'tag', 
			 			'feed', 
			 			'author_name', 
			 			'static', 
			 			'pagename', 
			 			'page_id', 
			 			'error', 
			 			'comments_popup', 
			 			'attachment', 
			 			'attachment_id', 
			 			'subpost', 
			 			'subpost_id', 
			 			'preview', 
			 			'robots', 
			 			'taxonomy', 
			 			'term', 
			 			'cpage', 
			 			'post_type'
			 		),
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'quality' => array(
			 		'value' => 90,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'memoryLimit' => array(
			 		'value' => WP_MAX_MEMORY_LIMIT,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'themesPersistCache' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'uploadAllowedMimes' => array(
			 		'value' => $allowedUploadMimeTypes,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			),
			
			'http' => array(
			
			 	'timeOut' => array(
			 		'value' => 5,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'redirectCount' => array(
			 		'value' => 5,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'version' => array(
			 		'value' => '1.0',
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'userAgent' => array(
			 		'value' => ( 'WordPress/' . $GLOBALS[ 'wp_version' ] . '; ' . get_bloginfo( 'url' ) ),
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'rejectUnsafeUrls' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'proxyBlockLocalRequests' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'localSSLVerify' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'sslVerify' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'useSteamTransport' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'useCurlTransport' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			),
			
			'editor' => array(
			
			 	'autoParagraph' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'editorHeight' => array(
			 		'value' => 300,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'mediaButtons' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'dragDropUpload' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'textAreaRows' => array(
			 		'value' => 20,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'tabIndex' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'editorCSS' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'editorClass' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'teeny' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'tinyMCE' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'quickTags' => array(
			 		'value' => true,
			 		'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,more,close',
			 		'options' => array( 'priority' => 11 )
			 	),
			 
			 	'plugins' => array(
			 		'value' => array
			 		(
						'charmap',
						'colorpicker',
						'hr',
						'lists',
						'media',
						'paste',
						'tabfocus',
						'textcolor',
						'fullscreen',
						'wordpress',
						'wpautoresize',
						'wpeditimage',
						'wpemoji',
						'wpgallery',
						'wplink',
						'wpdialogs',
						'wptextpattern',
						'wpview',
						'image'
			 		),
			 		'options' => array( 'priority' => 11 )
			 	),

			 	'buttons2' => array(
			 		'value' => array
			 		(
			 			'formatselect',
			 			'underline',
			 			'alignjustify',
			 			'forecolor',
			 			'pastetext',
			 			'removeformat',
			 			'charmap',
			 			'outdent',
			 			'indent',
			 			'undo',
			 			'redo'
			 		),
			 		'options' => array( 'priority' => 11 )
			 	),
			 				 	
			),
			
		);
		
		return $defaults;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $module
	* @param mixed $var
	* @param mixed $name
	*/
	public static function getDefaultsSection( $module, $var, $name )
	{
		$defaults = self::getDefaults();
		
		return $defaults[ $module ][ $var ][ $name ];
	}

	/**
	* put your comment there...
	* 
	*/
	public function isNeverSubmitted()
	{
		return ( $this->sysFiltersData === null );
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $data
	*/
	public function setData( $data )
	{

		$this->sysFiltersData =& $data;
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function validate()
	{
		return true;
	}

}