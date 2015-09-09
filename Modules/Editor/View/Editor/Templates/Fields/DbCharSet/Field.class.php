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
			'cp1256',
			'cp1257',
			'utf32',
			'binary',
			'geostd8',
			'cp932',
			'eucjpms',
		);
		# Use the same value for both key and value
		return array_combine($list, $list);
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getText() {
		return 'Database Characters Set';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Was made available to allow designation of the database character set (e.g. tis620 for TIS620 Thai) to be used when defining the MySQL database tables.';
	}

}
