<?php
/**
* 
*/

namespace WCFE\Modules\Editor\View\Editor;

use WCFE\Modules\Editor\ConfigFileFieldsNameMap;
use WCFE\Modules\Editor\Lib\FieldsFactoryBase;
use WCFE\Modules\Editor\View\Editor\Fields;
use WPPFW\Forms;

defined('ABSPATH') or die(-1);

/**
* 
*/
class RendererFieldsFactory
extends FieldsFactoryBase
{
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private static $fieldsData = null;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $form;
    
    /**
    * put your comment there...
    * 
    * @param Forms\Form $this->form
    * @return {RendererFieldsFactory|Forms\Form}
    */
    public function __construct(Forms\Form & $form)
    {
        $this->form =& $form;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAdminPath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAuth($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTH_COOKIE), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieDomain($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::COOKIE_DOMAIN), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieHash($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::COOKIEHASH), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'long-input' )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieLoggedIn($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::LOGGED_IN_COOKIE), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'long-input' )
        );
    }
            
    /**
    * put your comment there...
    * 
    */
    public function createCookiePass($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PASS_COOKIE), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookiePath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::COOKIEPATH), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        ); 
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookiePluginsPath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieSecureAuth($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'long-input' )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieSitePath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SITECOOKIEPATH), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
        
    /**
    * put your comment there...
    * 
    */
    public function createCookieTest($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::TEST_COOKIE), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieUser($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::USER_COOKIE), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronDisable($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISABLE_WP_CRON), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronAlternate($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::ALTERNATE_WP_CRON), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronLockTimeOut($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseAllowRepair($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_ALLOW_REPAIR), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCharset($fieldData)
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_CHARSET), 
            $fieldData['title'],
            $fieldData['tip'],
            array
            ( 
                'list' =>  array
                (
                    '' => '',
                    'armscii8' => 'armscii8',
                    'ascii' => 'ascii',
                    'big5' => 'big5',
                    'binary' => 'binary',
                    'cp1250' => 'cp1250',
                    'cp1251' => 'cp1251',
                    'cp1256' => 'cp1256',
                    'cp1257' => 'cp1257',
                    'cp850' => 'cp850',
                    'cp852' => 'cp852',
                    'cp866' => 'cp866',
                    'cp932' => 'cp932',
                    'dec8' => 'dec8',
                    'eucjpms' => 'eucjpms',
                    'euckr' => 'euckr',
                    'gb2312' => 'gb2312',
                    'gbk' => 'gbk',
                    'geostd8' => 'geostd8',
                    'greek' => 'greek',
                    'hebrew' => 'hebrew',
                    'hp8' => 'hp8',
                    'keybcs2' => 'keybcs2',
                    'koi8r' => 'koi8r',
                    'koi8u' => 'koi8u',
                    'latin1' => 'latin1',
                    'latin2' => 'latin2',
                    'latin5' => 'latin5',
                    'latin7' => 'latin7',
                    'macce' => 'macce',
                    'macroman' => 'macroman',
                    'sjis' => 'sjis',
                    'swe7' => 'swe7',
                    'tis620' => 'tis620',
                    'ucs2' => 'ucs2',
                    'ujis' => 'ujis',
                    'utf16' => 'utf16',
                    'utf16le' => 'utf16le',
                    'utf32' => 'utf32',
                    'utf8' => 'utf8',
                    'utf8mb4' => 'utf8mb4',
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCollate($fieldData)
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_COLLATE), 
            $fieldData['title'],
            $fieldData['tip'],
            array
            ( 
                'list' =>  array
                (
                    '' => '',
                    'armscii8_bin' => 'armscii8_bin',
                    'armscii8_general_ci' => 'armscii8_general_ci',
                    'ascii_bin' => 'ascii_bin',
                    'ascii_general_ci' => 'ascii_general_ci',
                    'big5_bin' => 'big5_bin',
                    'big5_chinese_ci' => 'big5_chinese_ci',
                    'binary' => 'binary',
                    'cp1250_bin' => 'cp1250_bin',
                    'cp1250_croatian_ci' => 'cp1250_croatian_ci',
                    'cp1250_czech_cs' => 'cp1250_czech_cs',
                    'cp1250_general_ci' => 'cp1250_general_ci',
                    'cp1250_polish_ci' => 'cp1250_polish_ci',
                    'cp1251_bin' => 'cp1251_bin',
                    'cp1251_bulgarian_ci' => 'cp1251_bulgarian_ci',
                    'cp1251_general_ci' => 'cp1251_general_ci',
                    'cp1251_general_cs' => 'cp1251_general_cs',
                    'cp1251_ukrainian_ci' => 'cp1251_ukrainian_ci',
                    'cp1256_bin' => 'cp1256_bin',
                    'cp1256_general_ci' => 'cp1256_general_ci',
                    'cp1257_bin' => 'cp1257_bin',
                    'cp1257_general_ci' => 'cp1257_general_ci',
                    'cp1257_lithuanian_ci' => 'cp1257_lithuanian_ci',
                    'cp850_bin' => 'cp850_bin',
                    'cp850_general_ci' => 'cp850_general_ci',
                    'cp852_bin' => 'cp852_bin',
                    'cp852_general_ci' => 'cp852_general_ci',
                    'cp866_bin' => 'cp866_bin',
                    'cp866_general_ci' => 'cp866_general_ci',
                    'cp932_bin' => 'cp932_bin',
                    'cp932_japanese_ci' => 'cp932_japanese_ci',
                    'dec8_bin' => 'dec8_bin',
                    'dec8_swedish_ci' => 'dec8_swedish_ci',
                    'eucjpms_bin' => 'eucjpms_bin',
                    'eucjpms_japanese_ci' => 'eucjpms_japanese_ci',
                    'euckr_bin' => 'euckr_bin',
                    'euckr_korean_ci' => 'euckr_korean_ci',
                    'gb2312_bin' => 'gb2312_bin',
                    'gb2312_chinese_ci' => 'gb2312_chinese_ci',
                    'gbk_bin' => 'gbk_bin',
                    'gbk_chinese_ci' => 'gbk_chinese_ci',
                    'geostd8_bin' => 'geostd8_bin',
                    'geostd8_general_ci' => 'geostd8_general_ci',
                    'greek_bin' => 'greek_bin',
                    'greek_general_ci' => 'greek_general_ci',
                    'hp8_bin' => 'hp8_bin',
                    'hp8_english_ci' => 'hp8_english_ci',
                    'keybcs2_bin' => 'keybcs2_bin',
                    'keybcs2_general_ci' => 'keybcs2_general_ci',
                    'koi8r_bin' => 'koi8r_bin',
                    'koi8r_general_ci' => 'koi8r_general_ci',
                    'koi8u_bin' => 'koi8u_bin',
                    'koi8u_general_ci' => 'koi8u_general_ci',
                    'latin1_bin' => 'latin1_bin',
                    'latin1_danish_ci' => 'latin1_danish_ci',
                    'latin1_general_ci' => 'latin1_general_ci',
                    'latin1_general_cs' => 'latin1_general_cs',
                    'latin1_german1_ci' => 'latin1_german1_ci',
                    'latin1_german2_ci' => 'latin1_german2_ci',
                    'latin1_spanish_ci' => 'latin1_spanish_ci',
                    'latin1_swedish_ci' => 'latin1_swedish_ci',
                    'latin2_bin' => 'latin2_bin',
                    'latin2_croatian_ci' => 'latin2_croatian_ci',
                    'latin2_czech_cs' => 'latin2_czech_cs',
                    'latin2_general_ci' => 'latin2_general_ci',
                    'latin2_hungarian_ci' => 'latin2_hungarian_ci',
                    'latin5_bin' => 'latin5_bin',
                    'latin5_turkish_ci' => 'latin5_turkish_ci',
                    'latin7_bin' => 'latin7_bin',
                    'latin7_estonian_cs' => 'latin7_estonian_cs',
                    'latin7_general_ci' => 'latin7_general_ci',
                    'latin7_general_cs' => 'latin7_general_cs',
                    'macce_bin' => 'macce_bin',
                    'macce_general_ci' => 'macce_general_ci',
                    'macroman_bin' => 'macroman_bin',
                    'macroman_general_ci' => 'macroman_general_ci',
                    'sjis_bin' => 'sjis_bin',
                    'sjis_japanese_ci' => 'sjis_japanese_ci',
                    'swe7_bin' => 'swe7_bin',
                    'swe7_swedish_ci' => 'swe7_swedish_ci',
                    'tis620_bin' => 'tis620_bin',
                    'tis620_thai_ci' => 'tis620_thai_ci',
                    'ucs2_bin' => 'ucs2_bin',
                    'ucs2_croatian_ci' => 'ucs2_croatian_ci',
                    'ucs2_czech_ci' => 'ucs2_czech_ci',
                    'ucs2_danish_ci' => 'ucs2_danish_ci',
                    'ucs2_esperanto_ci' => 'ucs2_esperanto_ci',
                    'ucs2_estonian_ci' => 'ucs2_estonian_ci',
                    'ucs2_general_ci' => 'ucs2_general_ci',
                    'ucs2_general_mysql500_ci' => 'ucs2_general_mysql500_ci',
                    'ucs2_german2_ci' => 'ucs2_german2_ci',
                    'ucs2_hungarian_ci' => 'ucs2_hungarian_ci',
                    'ucs2_icelandic_ci' => 'ucs2_icelandic_ci',
                    'ucs2_latvian_ci' => 'ucs2_latvian_ci',
                    'ucs2_lithuanian_ci' => 'ucs2_lithuanian_ci',
                    'ucs2_persian_ci' => 'ucs2_persian_ci',
                    'ucs2_polish_ci' => 'ucs2_polish_ci',
                    'ucs2_roman_ci' => 'ucs2_roman_ci',
                    'ucs2_romanian_ci' => 'ucs2_romanian_ci',
                    'ucs2_sinhala_ci' => 'ucs2_sinhala_ci',
                    'ucs2_slovak_ci' => 'ucs2_slovak_ci',
                    'ucs2_slovenian_ci' => 'ucs2_slovenian_ci',
                    'ucs2_spanish2_ci' => 'ucs2_spanish2_ci',
                    'ucs2_spanish_ci' => 'ucs2_spanish_ci',
                    'ucs2_swedish_ci' => 'ucs2_swedish_ci',
                    'ucs2_turkish_ci' => 'ucs2_turkish_ci',
                    'ucs2_unicode_520_ci' => 'ucs2_unicode_520_ci',
                    'ucs2_unicode_ci' => 'ucs2_unicode_ci',
                    'ucs2_vietnamese_ci' => 'ucs2_vietnamese_ci',
                    'ujis_bin' => 'ujis_bin',
                    'ujis_japanese_ci' => 'ujis_japanese_ci',
                    'utf16_bin' => 'utf16_bin',
                    'utf16_croatian_ci' => 'utf16_croatian_ci',
                    'utf16_czech_ci' => 'utf16_czech_ci',
                    'utf16_danish_ci' => 'utf16_danish_ci',
                    'utf16_esperanto_ci' => 'utf16_esperanto_ci',
                    'utf16_estonian_ci' => 'utf16_estonian_ci',
                    'utf16_general_ci' => 'utf16_general_ci',
                    'utf16_german2_ci' => 'utf16_german2_ci',
                    'utf16_hungarian_ci' => 'utf16_hungarian_ci',
                    'utf16_icelandic_ci' => 'utf16_icelandic_ci',
                    'utf16_latvian_ci' => 'utf16_latvian_ci',
                    'utf16_lithuanian_ci' => 'utf16_lithuanian_ci',
                    'utf16_persian_ci' => 'utf16_persian_ci',
                    'utf16_polish_ci' => 'utf16_polish_ci',
                    'utf16_roman_ci' => 'utf16_roman_ci',
                    'utf16_romanian_ci' => 'utf16_romanian_ci',
                    'utf16_sinhala_ci' => 'utf16_sinhala_ci',
                    'utf16_slovak_ci' => 'utf16_slovak_ci',
                    'utf16_slovenian_ci' => 'utf16_slovenian_ci',
                    'utf16_spanish2_ci' => 'utf16_spanish2_ci',
                    'utf16_spanish_ci' => 'utf16_spanish_ci',
                    'utf16_swedish_ci' => 'utf16_swedish_ci',
                    'utf16_turkish_ci' => 'utf16_turkish_ci',
                    'utf16_unicode_520_ci' => 'utf16_unicode_520_ci',
                    'utf16_unicode_ci' => 'utf16_unicode_ci',
                    'utf16_vietnamese_ci' => 'utf16_vietnamese_ci',
                    'utf16le_bin' => 'utf16le_bin',
                    'utf16le_general_ci' => 'utf16le_general_ci',
                    'utf32_bin' => 'utf32_bin',
                    'utf32_croatian_ci' => 'utf32_croatian_ci',
                    'utf32_czech_ci' => 'utf32_czech_ci',
                    'utf32_danish_ci' => 'utf32_danish_ci',
                    'utf32_esperanto_ci' => 'utf32_esperanto_ci',
                    'utf32_estonian_ci' => 'utf32_estonian_ci',
                    'utf32_general_ci' => 'utf32_general_ci',
                    'utf32_german2_ci' => 'utf32_german2_ci',
                    'utf32_hungarian_ci' => 'utf32_hungarian_ci',
                    'utf32_icelandic_ci' => 'utf32_icelandic_ci',
                    'utf32_latvian_ci' => 'utf32_latvian_ci',
                    'utf32_lithuanian_ci' => 'utf32_lithuanian_ci',
                    'utf32_persian_ci' => 'utf32_persian_ci',
                    'utf32_polish_ci' => 'utf32_polish_ci',
                    'utf32_roman_ci' => 'utf32_roman_ci',
                    'utf32_romanian_ci' => 'utf32_romanian_ci',
                    'utf32_sinhala_ci' => 'utf32_sinhala_ci',
                    'utf32_slovak_ci' => 'utf32_slovak_ci',
                    'utf32_slovenian_ci' => 'utf32_slovenian_ci',
                    'utf32_spanish2_ci' => 'utf32_spanish2_ci',
                    'utf32_spanish_ci' => 'utf32_spanish_ci',
                    'utf32_swedish_ci' => 'utf32_swedish_ci',
                    'utf32_turkish_ci' => 'utf32_turkish_ci',
                    'utf32_unicode_520_ci' => 'utf32_unicode_520_ci',
                    'utf32_unicode_ci' => 'utf32_unicode_ci',
                    'utf32_vietnamese_ci' => 'utf32_vietnamese_ci',
                    'utf8_bin' => 'utf8_bin',
                    'utf8_croatian_ci' => 'utf8_croatian_ci',
                    'utf8_czech_ci' => 'utf8_czech_ci',
                    'utf8_danish_ci' => 'utf8_danish_ci',
                    'utf8_esperanto_ci' => 'utf8_esperanto_ci',
                    'utf8_estonian_ci' => 'utf8_estonian_ci',
                    'utf8_general_ci' => 'utf8_general_ci',
                    'utf8_general_mysql500_ci' => 'utf8_general_mysql500_ci',
                    'utf8_german2_ci' => 'utf8_german2_ci',
                    'utf8_hungarian_ci' => 'utf8_hungarian_ci',
                    'utf8_icelandic_ci' => 'utf8_icelandic_ci',
                    'utf8_latvian_ci' => 'utf8_latvian_ci',
                    'utf8_lithuanian_ci' => 'utf8_lithuanian_ci',
                    'utf8_persian_ci' => 'utf8_persian_ci',
                    'utf8_polish_ci' => 'utf8_polish_ci',
                    'utf8_roman_ci' => 'utf8_roman_ci',
                    'utf8_romanian_ci' => 'utf8_romanian_ci',
                    'utf8_sinhala_ci' => 'utf8_sinhala_ci',
                    'utf8_slovak_ci' => 'utf8_slovak_ci',
                    'utf8_slovenian_ci' => 'utf8_slovenian_ci',
                    'utf8_spanish2_ci' => 'utf8_spanish2_ci',
                    'utf8_spanish_ci' => 'utf8_spanish_ci',
                    'utf8_swedish_ci' => 'utf8_swedish_ci',
                    'utf8_turkish_ci' => 'utf8_turkish_ci',
                    'utf8_unicode_520_ci' => 'utf8_unicode_520_ci',
                    'utf8_unicode_ci' => 'utf8_unicode_ci',
                    'utf8_vietnamese_ci' => 'utf8_vietnamese_ci',
                    'utf8mb4_bin' => 'utf8mb4_bin',
                    'utf8mb4_croatian_ci' => 'utf8mb4_croatian_ci',
                    'utf8mb4_czech_ci' => 'utf8mb4_czech_ci',
                    'utf8mb4_danish_ci' => 'utf8mb4_danish_ci',
                    'utf8mb4_esperanto_ci' => 'utf8mb4_esperanto_ci',
                    'utf8mb4_estonian_ci' => 'utf8mb4_estonian_ci',
                    'utf8mb4_general_ci' => 'utf8mb4_general_ci',
                    'utf8mb4_german2_ci' => 'utf8mb4_german2_ci',
                    'utf8mb4_hungarian_ci' => 'utf8mb4_hungarian_ci',
                    'utf8mb4_icelandic_ci' => 'utf8mb4_icelandic_ci',
                    'utf8mb4_latvian_ci' => 'utf8mb4_latvian_ci',
                    'utf8mb4_lithuanian_ci' => 'utf8mb4_lithuanian_ci',
                    'utf8mb4_persian_ci' => 'utf8mb4_persian_ci',
                    'utf8mb4_polish_ci' => 'utf8mb4_polish_ci',
                    'utf8mb4_roman_ci' => 'utf8mb4_roman_ci',
                    'utf8mb4_romanian_ci' => 'utf8mb4_romanian_ci',
                    'utf8mb4_sinhala_ci' => 'utf8mb4_sinhala_ci',
                    'utf8mb4_slovak_ci' => 'utf8mb4_slovak_ci',
                    'utf8mb4_slovenian_ci' => 'utf8mb4_slovenian_ci',
                    'utf8mb4_spanish2_ci' => 'utf8mb4_spanish2_ci',
                    'utf8mb4_spanish_ci' => 'utf8mb4_spanish_ci',
                    'utf8mb4_swedish_ci' => 'utf8mb4_swedish_ci',
                    'utf8mb4_turkish_ci' => 'utf8mb4_turkish_ci',
                    'utf8mb4_unicode_520_ci' => 'utf8mb4_unicode_520_ci',
                    'utf8mb4_unicode_ci' => 'utf8mb4_unicode_ci',
                    'utf8mb4_vietnamese_ci' => 'utf8mb4_vietnamese_ci',
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUpgradeGlobalTables($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseName($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_NAME), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUser($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_USER), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabasePassword($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_PASSWORD), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'type' => 'password' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseHost($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_HOST), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabasePort($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_PORT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseTablePrefix($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_TABLE_PREFIX), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugConcatenateScripts($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugSaveQueries($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SAVEQUERIES), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugScriptDebug($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SCRIPT_DEBUG), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugWPDebug($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_DEBUG), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugDisplay($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugLog($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_DEBUG_LOG), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLang($fieldData)
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WPLANG), 
            $fieldData['title'],
            $fieldData['tip'],
            array
            ( 
                'list' => array
                (
                    '' => '',
                    'af-ZA' => 'af-ZA',
                    'am-ET' => 'am-ET',
                    'ar-AE' => 'ar-AE',
                    'ar-BH' => 'ar-BH',
                    'ar-DZ' => 'ar-DZ',
                    'ar-EG' => 'ar-EG',
                    'ar-IQ' => 'ar-IQ',
                    'ar-JO' => 'ar-JO',
                    'ar-KW' => 'ar-KW',
                    'ar-LB' => 'ar-LB',
                    'ar-LY' => 'ar-LY',
                    'ar-MA' => 'ar-MA',
                    'ar-OM' => 'ar-OM',
                    'ar-QA' => 'ar-QA',
                    'ar-SA' => 'ar-SA',
                    'ar-SY' => 'ar-SY',
                    'ar-TN' => 'ar-TN',
                    'ar-YE' => 'ar-YE',
                    'arn-CL' => 'arn-CL',
                    'as-IN' => 'as-IN',
                    'az-Cyrl-AZ' => 'az-Cyrl-AZ',
                    'az-Latn-AZ' => 'az-Latn-AZ',
                    'ba-RU' => 'ba-RU',
                    'be-BY' => 'be-BY',
                    'bg-BG' => 'bg-BG',
                    'bn-BD' => 'bn-BD',
                    'bn-IN' => 'bn-IN',
                    'bo-CN' => 'bo-CN',
                    'br-FR' => 'br-FR',
                    'bs-Cyrl-BA' => 'bs-Cyrl-BA',
                    'bs-Latn-BA' => 'bs-Latn-BA',
                    'ca-ES' => 'ca-ES',
                    'co-FR' => 'co-FR',
                    'cs-CZ' => 'cs-CZ',
                    'cy-GB' => 'cy-GB',
                    'da-DK' => 'da-DK',
                    'de-AT' => 'de-AT',
                    'de-CH' => 'de-CH',
                    'de-DE' => 'de-DE',
                    'de-LI' => 'de-LI',
                    'de-LU' => 'de-LU',
                    'dsb-DE' => 'dsb-DE',
                    'dv-MV' => 'dv-MV',
                    'el-GR' => 'el-GR',
                    'en-029' => 'en-029',
                    'en-AU' => 'en-AU',
                    'en-BZ' => 'en-BZ',
                    'en-CA' => 'en-CA',
                    'en-GB' => 'en-GB',
                    'en-IE' => 'en-IE',
                    'en-IN' => 'en-IN',
                    'en-JM' => 'en-JM',
                    'en-MY' => 'en-MY',
                    'en-NZ' => 'en-NZ',
                    'en-PH' => 'en-PH',
                    'en-SG' => 'en-SG',
                    'en-TT' => 'en-TT',
                    'en-US' => 'en-US',
                    'en-ZA' => 'en-ZA',
                    'en-ZW' => 'en-ZW',
                    'es-AR' => 'es-AR',
                    'es-BO' => 'es-BO',
                    'es-CL' => 'es-CL',
                    'es-CO' => 'es-CO',
                    'es-CR' => 'es-CR',
                    'es-DO' => 'es-DO',
                    'es-EC' => 'es-EC',
                    'es-ES' => 'es-ES',
                    'es-GT' => 'es-GT',
                    'es-HN' => 'es-HN',
                    'es-MX' => 'es-MX',
                    'es-NI' => 'es-NI',
                    'es-PA' => 'es-PA',
                    'es-PE' => 'es-PE',
                    'es-PR' => 'es-PR',
                    'es-PY' => 'es-PY',
                    'es-SV' => 'es-SV',
                    'es-US' => 'es-US',
                    'es-UY' => 'es-UY',
                    'es-VE' => 'es-VE',
                    'et-EE' => 'et-EE',
                    'eu-ES' => 'eu-ES',
                    'fa-IR' => 'fa-IR',
                    'fi-FI' => 'fi-FI',
                    'fil-PH' => 'fil-PH',
                    'fo-FO' => 'fo-FO',
                    'fr-BE' => 'fr-BE',
                    'fr-CA' => 'fr-CA',
                    'fr-CH' => 'fr-CH',
                    'fr-FR' => 'fr-FR',
                    'fr-LU' => 'fr-LU',
                    'fr-MC' => 'fr-MC',
                    'fy-NL' => 'fy-NL',
                    'ga-IE' => 'ga-IE',
                    'gd-GB' => 'gd-GB',
                    'gl-ES' => 'gl-ES',
                    'gsw-FR' => 'gsw-FR',
                    'gu-IN' => 'gu-IN',
                    'ha-Latn-NG' => 'ha-Latn-NG',
                    'he-IL' => 'he-IL',
                    'hi-IN' => 'hi-IN',
                    'hsb-DE' => 'hsb-DE',
                    'hu-HU' => 'hu-HU',
                    'hy-AM' => 'hy-AM',
                    'id-ID' => 'id-ID',
                    'ig-NG' => 'ig-NG',
                    'ii-CN' => 'ii-CN',
                    'is-IS' => 'is-IS',
                    'it-CH' => 'it-CH',
                    'it-IT' => 'it-IT',
                    'iu-Cans-CA' => 'iu-Cans-CA',
                    'iu-Latn-CA' => 'iu-Latn-CA',
                    'ja-JP' => 'ja-JP',
                    'ka-GE' => 'ka-GE',
                    'kk-KZ' => 'kk-KZ',
                    'kl-GL' => 'kl-GL',
                    'km-KH' => 'km-KH',
                    'kn-IN' => 'kn-IN',
                    'ko-KR' => 'ko-KR',
                    'kok-IN' => 'kok-IN',
                    'ky-KG' => 'ky-KG',
                    'lb-LU' => 'lb-LU',
                    'lo-LA' => 'lo-LA',
                    'lt-LT' => 'lt-LT',
                    'lv-LV' => 'lv-LV',
                    'mi-NZ' => 'mi-NZ',
                    'mk-MK' => 'mk-MK',
                    'ml-IN' => 'ml-IN',
                    'mn-MN' => 'mn-MN',
                    'mn-Mong-CN' => 'mn-Mong-CN',
                    'moh-CA' => 'moh-CA',
                    'mr-IN' => 'mr-IN',
                    'ms-BN' => 'ms-BN',
                    'ms-MY' => 'ms-MY',
                    'mt-MT' => 'mt-MT',
                    'nb-NO' => 'nb-NO',
                    'ne-NP' => 'ne-NP',
                    'nl-BE' => 'nl-BE',
                    'nl-NL' => 'nl-NL',
                    'nn-NO' => 'nn-NO',
                    'nso-ZA' => 'nso-ZA',
                    'oc-FR' => 'oc-FR',
                    'or-IN' => 'or-IN',
                    'pa-IN' => 'pa-IN',
                    'pl-PL' => 'pl-PL',
                    'prs-AF' => 'prs-AF',
                    'ps-AF' => 'ps-AF',
                    'pt-BR' => 'pt-BR',
                    'pt-PT' => 'pt-PT',
                    'qut-GT' => 'qut-GT',
                    'quz-BO' => 'quz-BO',
                    'quz-EC' => 'quz-EC',
                    'quz-PE' => 'quz-PE',
                    'rm-CH' => 'rm-CH',
                    'ro-RO' => 'ro-RO',
                    'ru-RU' => 'ru-RU',
                    'rw-RW' => 'rw-RW',
                    'sa-IN' => 'sa-IN',
                    'sah-RU' => 'sah-RU',
                    'se-FI' => 'se-FI',
                    'se-NO' => 'se-NO',
                    'se-SE' => 'se-SE',
                    'si-LK' => 'si-LK',
                    'sk-SK' => 'sk-SK',
                    'sl-SI' => 'sl-SI',
                    'sma-NO' => 'sma-NO',
                    'sma-SE' => 'sma-SE',
                    'smj-NO' => 'smj-NO',
                    'smj-SE' => 'smj-SE',
                    'smn-FI' => 'smn-FI',
                    'sms-FI' => 'sms-FI',
                    'sq-AL' => 'sq-AL',
                    'sr-Cyrl-BA' => 'sr-Cyrl-BA',
                    'sr-Cyrl-CS' => 'sr-Cyrl-CS',
                    'sr-Cyrl-ME' => 'sr-Cyrl-ME',
                    'sr-Cyrl-RS' => 'sr-Cyrl-RS',
                    'sr-Latn-BA' => 'sr-Latn-BA',
                    'sr-Latn-CS' => 'sr-Latn-CS',
                    'sr-Latn-ME' => 'sr-Latn-ME',
                    'sr-Latn-RS' => 'sr-Latn-RS',
                    'sv-FI' => 'sv-FI',
                    'sv-SE' => 'sv-SE',
                    'sw-KE' => 'sw-KE',
                    'syr-SY' => 'syr-SY',
                    'ta-IN' => 'ta-IN',
                    'te-IN' => 'te-IN',
                    'tg-Cyrl-TJ' => 'tg-Cyrl-TJ',
                    'th-TH' => 'th-TH',
                    'tk-TM' => 'tk-TM',
                    'tn-ZA' => 'tn-ZA',
                    'tr-TR' => 'tr-TR',
                    'tt-RU' => 'tt-RU',
                    'tzm-Latn-DZ' => 'tzm-Latn-DZ',
                    'ug-CN' => 'ug-CN',
                    'uk-UA' => 'uk-UA',
                    'ur-PK' => 'ur-PK',
                    'uz-Cyrl-UZ' => 'uz-Cyrl-UZ',
                    'uz-Latn-UZ' => 'uz-Latn-UZ',
                    'vi-VN' => 'vi-VN',
                    'wo-SN' => 'wo-SN',
                    'xh-ZA' => 'xh-ZA',
                    'yo-NG' => 'yo-NG',
                    'zh-CN' => 'zh-CN',
                    'zh-HK' => 'zh-HK',
                    'zh-MO' => 'zh-MO',
                    'zh-SG' => 'zh-SG',
                    'zh-TW' => 'zh-TW',
                    'zu-ZA' => 'zu-ZA',
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLangDir($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WPLANG_DIR), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMaxMemoryLimit($fieldData)
    {   
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMemoryLimit($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_MEMORY_LIMIT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceCache($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_CACHE), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisite($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::MULTISITE), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteAllow($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteBlogIdCurrentSite($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createMultisiteDomainCurrentSite($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePathCurrentSite($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PATH_CURRENT_SITE), 
            $fieldData['title'],
            $fieldData['tip'],
            array('class' => 'path long-input') 
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePrimaryNetworkId($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSiteIdCurrentSite($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSubDomainInstall($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createPostAutoSaveInterval($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostEmptyTrashDays($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostRevisionsStatus($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostRevisions($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_POST_REVISIONS), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyBypassHosts($fieldData)
    {
        return new Fields\CheckboxListField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyHost($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_HOST), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPassword($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_PASSWORD), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'type' => 'password' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPort($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_PORT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyUserName($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_USERNAME), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAccessibleHosts($fieldData)
    {
        return new Fields\CheckboxListField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAllowUnfilteredUploads($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityHTTPBlockExternal($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowFileEdit($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowUnfilteredHTML($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLAdmin($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FORCE_SSL_ADMIN), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLLogin($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FORCE_SSL_LOGIN), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuth($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTH_KEY), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuthSalt($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTH_SALT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedIn($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::LOGGED_IN_KEY), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedInSalt($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::LOGGED_IN_SALT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonce($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::NONCE_KEY), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonceSalt($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::NONCE_SALT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuth($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SECURE_AUTH_KEY), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuthSalt($fieldData)
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SECURE_AUTH_SALT), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutoUpdateCore($fieldData)
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE), 
            $fieldData['title'],
            $fieldData['tip'],
            array
            ( 
                'list' => $fieldData['choices']
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutmaticUpdater($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeDisallowFileMods($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISALLOW_FILE_MODS), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemMethod($fieldData)
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FS_METHOD), 
            $fieldData['title'],
            $fieldData['tip'],
            array
            ( 
                'list' => $fieldData['choices']
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPBasePath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_BASE), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPContentDirPath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_CONTENT_DIR), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPHost($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_HOST), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPassword($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PASS), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'type' => 'password' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPluginDirPath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PLUGIN_DIR), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPrivateKeyPath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PRIKEY), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPublicKeyPath($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PUBKEY), 
            $fieldData['title'],
            $fieldData['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPSSL($fieldData)
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_SSL), 
            $fieldData['title'],
            $fieldData['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPUser($fieldData)
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_USER), 
            $fieldData['title'],
            $fieldData['tip']
        );
    }
    
}