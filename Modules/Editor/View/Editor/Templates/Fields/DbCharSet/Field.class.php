<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\DbCharSet;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\DropDownField;

/**
* 
*/
class Field extends DropDownField {

	/**
	* put your comment there...
	* 
	*/
	protected function getOptionsList() {
		# Defeinf characters set list
		$list = array(
			'',
            'big5',
            'dec8',
            'cp850',
            'hp8',
            'koi8r',
            'latin1',
            'latin2',
            'swe7',
            'ascii',
            'ujis',
            'sjis',
            'hebrew',
            'tis620',
            'euckr',
            'koi8u',
            'gb2312',
            'greek',
            'cp1250',
            'gbk',
            'latin5',
            'armscii8',
            'utf8',
            'ucs2',
            'cp866',
            'keybcs2',
            'macce',
            'macroman',
            'cp852',
            'latin7',
            'utf8mb4',
            'cp1251',
            'utf16',
            'utf16le',
            'cp1256',
            'cp1257',
            'utf32',
            'binary',
            'geostd8',
            'cp932',
            'eucjpms',
            'big5',
            'dec8',
            'cp850',
            'hp8',
            'koi8r',
            'latin1',
            'latin2',
            'swe7',
            'ascii',
            'ujis',
            'sjis',
            'hebrew',
            'tis620',
            'euckr',
            'koi8u',
            'gb2312',
            'greek',
            'cp1250',
            'gbk',
            'latin5',
            'armscii8',
            'utf8',
            'ucs2',
            'cp866',
            'keybcs2',
            'macce',
            'macroman',
            'cp852',
            'latin7',
            'utf8mb4',
            'cp1251',
            'utf16',
            'utf16le',
            'cp1256',
            'cp1257',
            'utf32',
            'binary',
            'geostd8',
            'cp932',
            'eucjpms',

		);
        
        $list = array_combine( $list, $list );
        
        ksort( $list );
        
		# Use the same value for both key and value
		return $list;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return $this->_( 'Database Characters Set' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->_( 'Was made available to allow designation of the database character set (e.g. tis620 for TIS620 Thai) to be used when defining the MySQL database tables.' );
	}

}
