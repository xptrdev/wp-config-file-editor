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
	private static $modelOptionName = 'wcfe-model-state_sysfiltersdashboardmodel';
	
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
	public static function getDataArray()
	{
		
		$sysFilterData = 	is_multisite() ? 
											get_blog_option( get_main_network_id(), self::$modelOptionName, null ) : 
											get_option( self::$modelOptionName, null );
		
		return $sysFilterData;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getData()
	{
		
		# Transform allowed mime type strcutrure from 
		# Wordpress filter structure to Chechbox list structure
		
		$sysFilterData = $this->sysFiltersData;
		
		$allowedMimeTypes =& $sysFilterData[ 'misc' ][ 'uploadAllowedMimes' ][ 'value' ];
		
		$transedMimeTypes = array();
		
		foreach ( $allowedMimeTypes as $extensions => $mimeType )
		{
			
			$extensions = explode( '|', $extensions );
			
			$transedMimeTypes[ $mimeType ] = array_combine( 
				$extensions,
				array_fill( 0, count( $extensions ), true ) 
			);
		}
		
		$allowedMimeTypes = $transedMimeTypes;
		
		return $sysFilterData;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public static function getDefaults()
	{
		
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
			 		'value' => wp_get_mime_types(),
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

			 	'stream' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'compress' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'decompress' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'blocking' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11 )
			 	),
			 	
			 	'responseSizeLimit' => array(
			 		'value' => null,
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
			
			'kses' => array
			(
			 	'protocols' => array(
			 		'value' => array
			 		( 
			 			'http',
			 			'https',
			 			'ftp',
			 			'ftps',
			 			'mailto',
			 			'news',
			 			'irc',
			 			'gopher',
			 			'nntp',
			 			'feed',
			 			'telnet',
			 			'mms',
			 			'rtsp',
			 			'svn',
			 			'tel',
			 			'fax',
			 			'xmpp',
			 			'webcal'
			 			),
			 		'options' => array
			 		(
			 			'priority' => 11,
			 		)
			 	),
			 	
			 	'postTags' => array(
			 		'value' => array
			 		( 
						'address' => array(),
						'a' => array(
							'href' => true,
							'rel' => true,
							'rev' => true,
							'name' => true,
							'target' => true,
						),
						'abbr' => array(),
						'acronym' => array(),
						'area' => array(
							'alt' => true,
							'coords' => true,
							'href' => true,
							'nohref' => true,
							'shape' => true,
							'target' => true,
						),
						'article' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'aside' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'audio' => array(
							'autoplay' => true,
							'controls' => true,
							'loop' => true,
							'muted' => true,
							'preload' => true,
							'src' => true,
						),
						'b' => array(),
						'big' => array(),
						'blockquote' => array(
							'cite' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'br' => array(),
						'button' => array(
							'disabled' => true,
							'name' => true,
							'type' => true,
							'value' => true,
						),
						'caption' => array(
							'align' => true,
						),
						'cite' => array(
							'dir' => true,
							'lang' => true,
						),
						'code' => array(),
						'col' => array(
							'align' => true,
							'char' => true,
							'charoff' => true,
							'span' => true,
							'dir' => true,
							'valign' => true,
							'width' => true,
						),
						'colgroup' => array(
							'align' => true,
							'char' => true,
							'charoff' => true,
							'span' => true,
							'valign' => true,
							'width' => true,
						),
						'del' => array(
							'datetime' => true,
						),
						'dd' => array(),
						'dfn' => array(),
						'details' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'open' => true,
							'xml:lang' => true,
						),
						'div' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'dl' => array(),
						'dt' => array(),
						'em' => array(),
						'fieldset' => array(),
						'figure' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'figcaption' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'font' => array(
							'color' => true,
							'face' => true,
							'size' => true,
						),
						'footer' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'form' => array(
							'action' => true,
							'accept' => true,
							'accept-charset' => true,
							'enctype' => true,
							'method' => true,
							'name' => true,
							'target' => true,
						),
						'h1' => array(
							'align' => true,
						),
						'h2' => array(
							'align' => true,
						),           
						'h3' => array(
							'align' => true,
						),
						'h4' => array(
							'align' => true,
						),
						'h5' => array(
							'align' => true,
						),
						'h6' => array(
							'align' => true,
						),
						'header' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'hgroup' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'hr' => array(
							'align' => true,
							'noshade' => true,
							'size' => true,
							'width' => true,
						),
						'i' => array(),
						'img' => array(
							'alt' => true,
							'align' => true,
							'border' => true,
							'height' => true,
							'hspace' => true,
							'longdesc' => true,
							'vspace' => true,
							'src' => true,
							'usemap' => true,
							'width' => true,
						),
						'ins' => array(
							'datetime' => true,
							'cite' => true,
						),
						'kbd' => array(),
						'label' => array(
							'for' => true,
						),
						'legend' => array(
							'align' => true,
						),
						'li' => array(
							'align' => true,
							'value' => true,
						),
						'map' => array(
							'name' => true,
						),
						'mark' => array(),
						'menu' => array(
							'type' => true,
						),
						'nav' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'p' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'pre' => array(
							'width' => true,
						),
						'q' => array(
							'cite' => true,
						),
						's' => array(),
						'samp' => array(),
						'span' => array(
							'dir' => true,
							'align' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'section' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'small' => array(),
						'strike' => array(),
						'strong' => array(),
						'sub' => array(),
						'summary' => array(
							'align' => true,
							'dir' => true,
							'lang' => true,
							'xml:lang' => true,
						),
						'sup' => array(),
						'table' => array(
							'align' => true,
							'bgcolor' => true,
							'border' => true,
							'cellpadding' => true,
							'cellspacing' => true,
							'dir' => true,
							'rules' => true,
							'summary' => true,
							'width' => true,
						),
						'tbody' => array(
							'align' => true,
							'char' => true,
							'charoff' => true,
							'valign' => true,
						),
						'td' => array(
							'abbr' => true,
							'align' => true,
							'axis' => true,
							'bgcolor' => true,
							'char' => true,
							'charoff' => true,
							'colspan' => true,
							'dir' => true,
							'headers' => true,
							'height' => true,
							'nowrap' => true,
							'rowspan' => true,
							'scope' => true,
							'valign' => true,
							'width' => true,
						),
						'textarea' => array(
							'cols' => true,
							'rows' => true,
							'disabled' => true,
							'name' => true,
							'readonly' => true,
						),
						'tfoot' => array(
							'align' => true,
							'char' => true,
							'charoff' => true,
							'valign' => true,
						),
						'th' => array(
							'abbr' => true,
							'align' => true,
							'axis' => true,
							'bgcolor' => true,
							'char' => true,
							'charoff' => true,
							'colspan' => true,
							'headers' => true,
							'height' => true,
							'nowrap' => true,
							'rowspan' => true,
							'scope' => true,
							'valign' => true,
							'width' => true,
						),
						'thead' => array(
							'align' => true,
							'char' => true,
							'charoff' => true,
							'valign' => true,
						),
						'title' => array(),
						'tr' => array(
							'align' => true,
							'bgcolor' => true,
							'char' => true,
							'charoff' => true,
							'valign' => true,
						),
						'track' => array(
							'default' => true,
							'kind' => true,
							'label' => true,
							'src' => true,
							'srclang' => true,
						),
						'tt' => array(),
						'u' => array(),
						'ul' => array(
							'type' => true,
						),
						'ol' => array(
							'start' => true,
							'type' => true,
						),
						'var' => array(),
						'video' => array(
							'autoplay' => true,
							'controls' => true,
							'height' => true,
							'loop' => true,
							'muted' => true,
							'poster' => true,
							'preload' => true,
							'src' => true,
							'width' => true,
						),
			 		),
			 		'options' => array
			 		(
			 			'priority' => 11,
			 		)
			 	),
			 	
			 	'commentTags' => array(
			 		'value' => array
			 		(
						'a' => array(
							'href' => true,
							'title' => true,
						),
						'abbr' => array(
							'title' => true,
						),
						'acronym' => array(
							'title' => true,
						),
						'b' => array(),
						'blockquote' => array(
							'cite' => true,
						),
						'cite' => array(),
						'code' => array(),
						'del' => array(
							'datetime' => true,
						),
						'em' => array(),
						'i' => array(),
						'q' => array(
							'cite' => true,
						),
						's' => array(),
						'strike' => array(),
						'strong' => array(),
			 		),
			 		'options' => array
			 		(
			 			'priority' => 11,
			 		)
			 	),
			 	
			),
			 	
		);
		
		$kses = array( 'postTags', 'commentTags' );
		
		foreach ( $kses as $ksesVar )
		{
			
			foreach ( $defaults[ 'kses' ][ $ksesVar ][ 'value' ] as $tagName => $attrs )
			{
				$defaults[ 'kses' ][ $ksesVar ][ 'value' ][ $tagName ] = _wp_add_global_attributes( $attrs );
			}
			
		}
		
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
		
		# Clean up Kses Post and Comment HTML tag attributes
		# unused element at the begining of the submitted list
		$checkboxesListItems = array( 
			'kses' => array( 'postTags', 'commentTags' ),
			'misc' => array( 'uploadAllowedMimes' ),
		);
		
		foreach ( $checkboxesListItems as $module => $vars )
		{
			foreach ( $vars as $var )
			{
				foreach ( $data[ $module ][ $var ][ 'value' ] as $key => & $array )
				{
					unset( $array[ 0 ] );
				}
			}
		}
		
		# Upload allowed mime types transformation
		# from checkbox list structure to Wordpress filter structure
		$uploadAllowedMimes =& $data[ 'misc' ][ 'uploadAllowedMimes' ][ 'value' ];
		$transUploadAllowedMimes = array();
		
		foreach ( $uploadAllowedMimes as $typeName => $extensions )
		{
			$transUploadAllowedMimes[ implode( '|', array_keys( $extensions ) ) ] = $typeName;
		}
		
		$uploadAllowedMimes = $transUploadAllowedMimes;

		$this->sysFiltersData =& $data;
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $data
	*/
	public static function setDataArray( $data )
	{
		
		if ( is_multisite() )
		{
			update_blog_option( get_main_network_id(), self::$modelOptionName, $data );
		}
		else {
			update_option( self::$modelOptionName, $data );
		}
		
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