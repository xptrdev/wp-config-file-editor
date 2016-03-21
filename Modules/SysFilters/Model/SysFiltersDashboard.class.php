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
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'quality' => array(
			 		'value' => 90,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'memoryLimit' => array(
			 		'value' => WP_MAX_MEMORY_LIMIT,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'themesPersistCache' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'uploadAllowedMimes' => array(
			 		'value' => wp_get_mime_types(),
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			),
			
			'http' => array(
			
			 	'timeOut' => array(
			 		'value' => 5,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'redirectCount' => array(
			 		'value' => 5,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'version' => array(
			 		'value' => '1.0',
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'userAgent' => array(
			 		'value' => ( 'WordPress/' . $GLOBALS[ 'wp_version' ] . '; ' . get_bloginfo( 'url' ) ),
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'stream' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'compress' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'decompress' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'blocking' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'responseSizeLimit' => array(
			 		'value' => null,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'rejectUnsafeUrls' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'proxyBlockLocalRequests' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'localSSLVerify' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'sslVerify' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'useSteamTransport' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'useCurlTransport' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'allowLocalHost' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			),
			
			'editor' => array(
			
			 	'autoParagraph' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'editorHeight' => array(
			 		'value' => 300,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'mediaButtons' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'dragDropUpload' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'textAreaRows' => array(
			 		'value' => 20,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'tabIndex' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'editorCSS' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'editorClass' => array(
			 		'value' => '',
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'teeny' => array(
			 		'value' => false,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),
			 	
			 	'tinyMCE' => array(
			 		'value' => true,
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
			 	),

			 	'quickTags' => array(
			 		'value' => true,
			 		'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,more,close',
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
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
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
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
			 		'options' => array( 'priority' => 11, 'disabled' => true, )
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
			 			'disabled' => true,
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
			 			'disabled' => true,
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
			 			'disabled' => true,
			 		)
			 	),
			 	
			 	'entities' => array(
			 		'value' => array
			 		(
						'nbsp',    'iexcl',  'cent',    'pound',  'curren', 'yen',
						'brvbar',  'sect',   'uml',     'copy',   'ordf',   'laquo',
						'not',     'shy',    'reg',     'macr',   'deg',    'plusmn',
						'acute',   'micro',  'para',    'middot', 'cedil',  'ordm',
						'raquo',   'iquest', 'Agrave',  'Aacute', 'Acirc',  'Atilde',
						'Auml',    'Aring',  'AElig',   'Ccedil', 'Egrave', 'Eacute',
						'Ecirc',   'Euml',   'Igrave',  'Iacute', 'Icirc',  'Iuml',
						'ETH',     'Ntilde', 'Ograve',  'Oacute', 'Ocirc',  'Otilde',
						'Ouml',    'times',  'Oslash',  'Ugrave', 'Uacute', 'Ucirc',
						'Uuml',    'Yacute', 'THORN',   'szlig',  'agrave', 'aacute',
						'acirc',   'atilde', 'auml',    'aring',  'aelig',  'ccedil',
						'egrave',  'eacute', 'ecirc',   'euml',   'igrave', 'iacute',
						'icirc',   'iuml',   'eth',     'ntilde', 'ograve', 'oacute',
						'ocirc',   'otilde', 'ouml',    'divide', 'oslash', 'ugrave',
						'uacute',  'ucirc',  'uuml',    'yacute', 'thorn',  'yuml',
						'quot',    'amp',    'lt',      'gt',     'apos',   'OElig',
						'oelig',   'Scaron', 'scaron',  'Yuml',   'circ',   'tilde',
						'ensp',    'emsp',   'thinsp',  'zwnj',   'zwj',    'lrm',
						'rlm',     'ndash',  'mdash',   'lsquo',  'rsquo',  'sbquo',
						'ldquo',   'rdquo',  'bdquo',   'dagger', 'Dagger', 'permil',
						'lsaquo',  'rsaquo', 'euro',    'fnof',   'Alpha',  'Beta',
						'Gamma',   'Delta',  'Epsilon', 'Zeta',   'Eta',    'Theta',
						'Iota',    'Kappa',  'Lambda',  'Mu',     'Nu',     'Xi',
						'Omicron', 'Pi',     'Rho',     'Sigma',  'Tau',    'Upsilon',
						'Phi',     'Chi',    'Psi',     'Omega',  'alpha',  'beta',
						'gamma',   'delta',  'epsilon', 'zeta',   'eta',    'theta',
						'iota',    'kappa',  'lambda',  'mu',     'nu',     'xi',
						'omicron', 'pi',     'rho',     'sigmaf', 'sigma',  'tau',
						'upsilon', 'phi',    'chi',     'psi',    'omega',  'thetasym',
						'upsih',   'piv',    'bull',    'hellip', 'prime',  'Prime',
						'oline',   'frasl',  'weierp',  'image',  'real',   'trade',
						'alefsym', 'larr',   'uarr',    'rarr',   'darr',   'harr',
						'crarr',   'lArr',   'uArr',    'rArr',   'dArr',   'hArr',
						'forall',  'part',   'exist',   'empty',  'nabla',  'isin',
						'notin',   'ni',     'prod',    'sum',    'minus',  'lowast',
						'radic',   'prop',   'infin',   'ang',    'and',    'or',
						'cap',     'cup',    'int',     'sim',    'cong',   'asymp',
						'ne',      'equiv',  'le',      'ge',     'sub',    'sup',
						'nsub',    'sube',   'supe',    'oplus',  'otimes', 'perp',
						'sdot',    'lceil',  'rceil',   'lfloor', 'rfloor', 'lang',
						'rang',    'loz',    'spades',  'clubs',  'hearts', 'diams',
						'sup1',    'sup2',   'sup3',    'frac14', 'frac12', 'frac34',
						'there4',
			 		),
			 		'options' => array
			 		(
			 			'priority' => 11,
			 			'disabled' => true,
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