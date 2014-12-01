<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\DbCollate;

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
		# Define list
		$list = array(
			'',
			'big5_chinese_ci',
			'dec8_swedish_ci',
			'cp850_general_ci',
			'hp8_english_ci',
			'koi8r_general_ci',
			'latin1_swedish_ci',
			'latin2_general_ci',
			'swe7_swedish_ci',
			'ascii_general_ci',
			'ujis_japanese_ci',
			'sjis_japanese_ci',
			'tis620_thai_ci',
			'euckr_korean_ci',
			'koi8u_general_ci',
			'gb2312_chinese_ci',
			'greek_general_ci',
			'cp1250_general_ci',
			'gbk_chinese_ci',
			'latin5_turkish_ci',
			'armscii8_general_ci',
			'utf8_general_ci',
			'ucs2_general_ci',
			'cp866_general_ci',
			'keybcs2_general_ci',
			'macce_general_ci',
			'macroman_general_ci',
			'cp852_general_ci',
			'latin7_general_ci',
			'utf8mb4_general_ci',
			'cp1251_general_ci',
			'utf16_general_ci',
			'cp1256_general_ci',
			'cp1257_general_ci',
			'utf32_general_ci',
			'binary',
			'geostd8_general_ci',
			'cp932_japanese_ci',
			'eucjpms_japanese_ci',
		);
		# Use the same values for key and values
		return array_combine($list, $list);
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getText() {
		return 'Database Collation';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Database collate used for defining algorithms when querying the database and comparing data';
	}

	
}
