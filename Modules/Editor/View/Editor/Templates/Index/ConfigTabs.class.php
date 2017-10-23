<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

use WCFE\Modules\Editor\View\Editor\Fields;
use WCFE\Modules\Editor\Model\ConfigFileFieldsNameMap;

/**
* 
*/
class ConfigTabs extends Tabs {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $id = 'wcfe-options-tab';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_REGISTER_TABS;

    /**
    * put your comment there...
    * 
    */
    protected function getTabsList()
    {
        
        $tabs = array();
        
        $tabsName = array
        (
            'Maintenance',
            'Security',
            'Upgrade',
            'Post',
            'Localization',
            'Cron',
            'MultiSites',
            'Database',
            'SecureKeys',
            'Debug',
            'proxy',
            'Cookies',
        );
        
        foreach ( $tabsName as $tabName )
        {
            $tabs[ $tabName ] = $this->{"tab{$tabName}"}();
            
            $tabs[ $tabName ]->setId( "{$tabName}OptionsTab" );
        }
        
        return $tabs;  
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabCookies()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Cookies' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_COOKIES_FIELDS );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::COOKIEHASH), 
            $this->__( 'Hash' ), 
            $this->__( 'Hash Cookie' ),
            array( 'class' => 'long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::USER_COOKIE), 
            $this->__( 'User' ), 
            $this->__( 'User Cookie' ),
            array( 'class' => 'long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::PASS_COOKIE), 
            $this->__( 'Pass' ), 
            $this->__( 'Pass Cookie' ),
            array( 'class' => 'long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::AUTH_COOKIE), 
            $this->__( 'Auth' ), 
            $this->__( 'Auth cookie name' ),
            array( 'class' => 'long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE), 
            $this->__( 'Secure Auth' ), 
            $this->__( 'Secure Auth cookie' ),
            array( 'class' => 'long-input' )
        );

        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::LOGGED_IN_COOKIE), 
            $this->__( 'Logged In' ), 
            $this->__( 'Logged In Cookie' ),
            array( 'class' => 'long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::TEST_COOKIE), 
            $this->__( 'Test' ), 
            $this->__( 'Test Cookie' ),
            array( 'class' => 'long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::COOKIEPATH), 
            $this->__( 'Path' ), 
            $this->__( 'Path Cookie' ),
            array( 'class' => 'path long-input' )
        );      
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SITECOOKIEPATH), 
            $this->__( 'Site Path' ), 
            $this->__( 'Site path cookie' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH), 
            $this->__( 'Admin path' ), 
            $this->__( 'Admin path cookie name' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH), 
            $this->__( 'Plugins Path' ), 
            $this->__( 'Plugins Path Cookie' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::COOKIE_DOMAIN), 
            $this->__( 'Domain' ), 
            $this->__( 'Cookie domain' )
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabCron()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Cron' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_CRON_FIELDS );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DISABLE_WP_CRON), 
            $this->__( 'Disable Cron' ), 
            $this->__( 'Disable the cron entirely' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::ALTERNATE_WP_CRON), 
            $this->__( 'Alternate Cron' ), 
            $this->__( 'Use this, for example, if scheduled posts are not getting published. According to Otto\'s forum explanation, "this alternate method uses a redirection approach, which makes the users browser get a redirect when the cron needs to run, so that they come back to the site immediately while cron continues to run in the connection they just dropped. This method is a bit iffy sometimes, which is why it\'s not the default.' ),
            1
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT), 
            $this->__( 'Cron Lock Timeout' ), 
            $this->__( 'Make sure a cron process cannot run more than once every XXXX seconds.' )
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabDatabase()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Database' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_DATABASE_FIELDS );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_HOST), 
            $this->__( 'Host' ), 
            $this->__( 'The address in which the Database is located. This can either be an IP or Domain name. In most cases its \'localhost\'' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_PORT), 
            $this->__( 'Port' ), 
            $this->__( 'Alternate Database host port' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_USER), 
            $this->__( 'User Name' ), 
            $this->__( 'User name to be used for connecting to Database' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_PASSWORD), 
            $this->__( 'Password' ), 
            $this->__( 'Database user password for authenticating the connection between Wordpress and Database' ),
            array( 'type' => 'password' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_NAME), 
            $this->__( 'Database Name' ), 
            $this->__( 'Database name to used for Wordpress installation, All posts/pages/categories and all the data will be stored there' )
        );

        $fields[] = new Fields\DropDownField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_CHARSET), 
            $this->__( 'Database Characters Set' ), 
            $this->__( 'Was made available to allow designation of the database character set (e.g. tis620 for TIS620 Thai) to be used when defining the MySQL database tables.' ),
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
        
        $fields[] = new Fields\DropDownField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_COLLATE), 
            $this->__( 'Database Collation' ), 
            $this->__( 'As of WordPress Version 2.2, DB_COLLATE was made available to allow designation of the database collation (i.e. the sort order of the character set). In most cases, this value should be left blank (null) so the database collation will be automatically assigned by MySQL based on the database character set specified by Character Set' ),
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
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DB_TABLE_PREFIX), 
            $this->__( 'Table Prefix' ), 
            $this->__( 'The value placed in the front of your database tables. Change the value if you want to use something other than wp_ for your database prefix. Typically this is changed if you are installing multiple WordPress blogs in the same database.' )
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_ALLOW_REPAIR), 
            $this->__( 'Automatic Repair' ), 
            $this->__( 'Added with Version 2.9, there is automatic database optimization support, which you can enable by adding the following define to your wp-config.php file only when the feature is required. Please Note: That this define enables the functionality, The user does not need to be logged in to access this functionality when this define is set. This is because its main intent is to repair a corrupted database, Users can often not login when the database is corrupt.' ),
            1
        );

        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES), 
            $this->__( 'Stop Upgrading Global Tables' ), 
            $this->__( 'A DO_NOT_UPGRADE_GLOBAL_TABLES define prevents dbDelta() and the upgrade functions from doing expensive queries against global tables. Sites that have large global tables (particularly users and usermeta), as well as sites that share user tables with bbPress and other WordPress installs, can prevent the upgrade from changing those tables during upgrade by defining DO_NOT_UPGRADE_GLOBAL_TABLES. Since an ALTER, or an unbounded DELETE or UPDATE, can take a long time to complete, large sites usually want to avoid these being run as part of the upgrade so they can handle it themselves. Further, if installations are sharing user tables between multiple bbPress and WordPress installs it maybe necessary to want one site to be the upgrade master.' ),
            1
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabDebug()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Developer' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_DEVELOPER_FIELDS );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_DEBUG), 
            $this->__( 'Debug Mode' ), 
            $this->__( 'Added in WordPress Version 2.3.1, controls the reporting of some errors and warnings' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY), 
            $this->__( 'Debug Display' ), 
            $this->__( 'Another companion to Debug Mode field that controls whether debug messages are shown inside the HTML of pages or not. The default is ON which shows errors and warnings as they are generated. Setting this to false will hide all errors. This should be used in conjunction with Debug Log so that errors can be reviewed later.' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_DEBUG_LOG), 
            $this->__( 'Debug Log' ), 
            $this->__( 'Companion to Debug Mode field that causes all errors to also be saved to a debug.log log file inside the /wp-content/ directory. This is useful if you want to review all notices later or need to view notices generated off-screen (e.g. during an AJAX request or wp-cron run). Note that this allows you to write to /wp-content/debug.log using PHP\'s built in error_log() function, which can be useful for instance when debugging AJAX events.' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SCRIPT_DEBUG), 
            $this->__( 'Script Debugging' ), 
            $this->__( 'Force WordPress to use the "dev" versions of core CSS and Javascript files rather than the minified versions that are normally loaded. This is useful when you are testing modifications to any built-in .js or .css files. Default is false.' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS), 
            $this->__( 'Concatenate JavaScript' ), 
            $this->__( 'To result in a faster administration area, all Javascript files are concatenated into one URL. If Javascript is failing to work in your administration area, you can try disabling this feature:' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SAVEQUERIES), 
            $this->__( 'Save Queries' ), 
            $this->__( 'Saves the database queries to an array and that array can be displayed to help analyze those queries. When set to ON causes each query to be saved, how long that query took to execute, and what function called it.' ),
            1
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabLocalization()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Localization' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_LOCALIZATION_FIELDS );
        
        $fields[] = new Fields\DropDownField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WPLANG), 
            $this->__( 'Language' ), 
            $this->__( 'Defines the name of the language translation (.mo) file.' ),
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
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WPLANG_DIR), 
            $this->__( 'Language Directory' ), 
            $this->__( 'Defines what directory the Language .mo file resides. If Language Directory is not defined WordPress looks first to wp-content/languages and then wp-includes/languages for the .mo defined by Language file.' ),
            array( 'class' => 'path long-input' )
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabMaintenance()
    {
        
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Maintenance' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_MAINTENANCE_FIELDS );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_CACHE), 
            $this->__( 'Enable Cache' ), 
            $this->__( 'If true, includes the wp-content/advanced-cache.php script, when executing wp-settings.php.' ),
            1
        );

        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_MEMORY_LIMIT), 
            $this->__( 'Memory limit' ), 
            $this->__( 'Allows you to specify the maximum amount of memory that can be consumed by PHP. This setting may be necessary in the event you receive a message such as "Allowed memory size of xxxxxx bytes exhausted".' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT), 
            $this->__( 'Max Memory limit' ), 
            $this->__( 'When in the administration area, the memory can be increased or decreased from the Memory Limit by defining Max Memory Limit.' )
        );
                    
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabMultiSites()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Multi Sites' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_MULTISITE_FIELDS );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE), 
            $this->__( 'Setup Multi Site installation' ), 
            $this->__( 'is a feature introduced in WordPress Version 3.0 to enable multisite functionality previously achieved through WordPress MU. If this setting is absent from wp-config.php it defaults to false.' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::MULTISITE), 
            $this->__( 'Enable Multi Site' ), 
            $this->__( 'Multi site feature is enabled on current Wordpress installation' ),
            1
        );
        
        $fields[] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL), 
            $this->__( 'Enable Sub Domains' ), 
            $this->__( 'Use sub domains for network sites' ),
            1
        );

        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE), 
            $this->__( 'Domain' ), 
            $this->__( 'Root domain for multi site installations' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::PATH_CURRENT_SITE), 
            $this->__( 'Root path' ), 
            $this->__( 'Root path for multi site installations' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE), 
            $this->__( 'Site Id' ), 
            $this->__( 'Current Site Id' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE), 
            $this->__( 'Current Blog Id' ), 
            $this->__( 'Current Blog Id' )
        );
        
        $fields[] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID), 
            $this->__( 'Primary Network Id' ), 
            $this->__( 'Primary Network Id' )
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabPost()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new SimpleSubContainerTab( $this, $this->__( 'Post' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_POST_FIELDS );
        
        $fields[ 'Generic' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL), 
            $this->__( 'Autosave Interval' ), 
            $this->__( 'When editing a post, WordPress uses Ajax to auto-save revisions to the post as you edit. You may want to increase this setting for longer delays in between auto-saves, or decrease the setting to make sure you never lose changes. The default is 60 seconds' )
        );
        
        $fields[ 'Generic' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS), 
            $this->__( 'Empty Trash (Days)' ), 
            $this->__( 'Added with Version 2.9, this constant controls the number of days before WordPress permanently deletes posts, pages, attachments, and comments, from the trash bin. The default is 30 days.  disable trash set the number of days to zero. Note that WordPress will not ask for confirmation when someone clicks on "Delete Permanently' )
        );
        
        $fields[ 'PostRevisions' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS), 
            $this->__( 'Enable Revisions' ), 
            $this->__( 'Enable / Disable post revisions' ),
            1
        );
        
        $fields[ 'PostRevisions' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_POST_REVISIONS), 
            $this->__( 'Max Revisions Count' ), 
            $this->__( 'Maximum number of revisions per post or page can be specified.' )
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabProxy()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Proxy' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_PROXY_FIELDS );
        
        $fields[ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_PROXY_HOST), 
            $this->__( 'Host' ), 
            $this->__( 'Enable proxy support and host for connecting' )
        );
        
        $fields[ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_PROXY_PORT), 
            $this->__( 'Port' ), 
            $this->__( 'Proxy port for connection. No default, must be defined' )
        );
        
        $fields[ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_PROXY_USERNAME), 
            $this->__( 'User' ), 
            $this->__( 'Proxy username, if it requires authentication' )
        );
        
        $fields[ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_PROXY_PASSWORD), 
            $this->__( 'Password' ), 
            $this->__( 'Proxy password, if it requires authentication' ),
            array( 'type' => 'password' )
        );
        
        # ByPass list
        $fields[ ] = new Fields\CheckboxListField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS), 
            $this->__( 'Bypass Hosts' ), 
            $this->__( 'Will prevent the hosts in this list from going through the proxy' )
        );
            
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabSecurity()
    {
        
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new SimpleSubContainerTab( $this, $this->__( 'Security' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SECURITY_FIELDS );
        
        $fields[ 'Generic' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT), 
            $this->__( 'Disable Plugin &amp; Theme Editor' ), 
            $this->__( 'Occasionally you may wish to disable the plugin or theme editor to prevent overzealous users from being able to edit sensitive files and potentially crash the site. Disabling these also provides an additional layer of security if a hacker gains access to a well-privileged user account.<strong>Please note: the functionality of some plugins may be affected by the use of current_user_can(\'edit_plugins\') in their code. Plugin authors should avoid checking for this capability, or at least check if this constant is set and display an appropriate error message. Be aware that if a plugin is not working this may be the cause.<strong>' ),
            1
        );
        
        $fields[ 'Generic' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FORCE_SSL_ADMIN), 
            $this->__( 'Force SSL Admin' ), 
            $this->__( 'when you want to secure logins and the admin area so that both passwords and cookies are never sent in the clear. This is the most secure option.' ),
            1
        );
        
        $fields[ 'Generic' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FORCE_SSL_LOGIN), 
            $this->__( 'Force SSL Login' ), 
            $this->__( 'when you want to secure logins so that passwords are not sent in the clear, but you still want to allow non-SSL admin sessions (since SSL can be slow).' ),
            1
        );
        
        $fields[ 'Generic' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML), 
            $this->__( 'Disallow Unfiltered HTML' ), 
            $this->__( 'Disallow unfiltered HTML for everyone, including administrators and super administrators. To disallow unfiltered HTML for all users, you can add this to wp-config.php:' ),
            1
        );
        
        $fields[ 'Generic' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS), 
            $this->__( 'Allow Unfiltered Uploads' ), 
            $this->__( 'Allow unfilered Uploads' ),
            1
        );
        
        $fields[ 'BlockExternal' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL), 
            $this->__( 'Block External Url' ), 
            $this->__( 'Block external URL requests by defining WP_HTTP_BLOCK_EXTERNAL as true and this will only allow localhost and your blog to make requests' ),
            1
        );
    
        $fields[ 'BlockExternal' ][ ] = new Fields\CheckboxListField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS), 
            $this->__( 'Accessible Hosts List' ), 
            $this->__( 'Write host you would like to allow in the input field and preess Enter. The constant WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests. The format of the WP_ACCESSIBLE_HOSTS constant is a comma separated list of hostnames to allow, wildcard domains are supported, eg *.wordpress.org will allow for all subdomains of wordpress.org to be contacted.' )
        );
        
        $tab->setFields( $fields );
        
        return $tab;
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function tabSecureKeys()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new FieldsTab( $this, $this->__( 'Secure Keys' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SECUREKEYS_FIELDS );
        
        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::AUTH_KEY), 
            $this->__( 'Authentication' ), 
            $this->__( 'Wordpress Hash key for AUTH_KEY constant' )
        );
        
        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SECURE_AUTH_KEY), 
            $this->__( 'Secure Authentication key' ), 
            $this->__( 'Wordpress Hash key for SECURE_AUTH_KEY constant' )
        );
        
        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::LOGGED_IN_KEY), 
            $this->__( 'Logged In key' ), 
            $this->__( 'Wordpress Hash key for LOGGED_IN_KEY constant' )
        );
        
        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::NONCE_SALT), 
            $this->__( 'Nonce salt' ), 
            $this->__( 'Wordpress Hash key for NONCE_SALT constant' )
        );
        
        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::AUTH_SALT), 
            $this->__( 'Authentication Salt' ), 
            $this->__( 'Wordpress Hash key for AUTH_SALT constant' )
        );
        
        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::SECURE_AUTH_SALT), 
            $this->__( 'Secure Authentication Salt' ), 
            $this->__( 'Wordpress Hash key for SECURE_AUTH_SALT constant' )
        );

        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::LOGGED_IN_SALT), 
            $this->__( 'Logged In Salt' ), 
            $this->__( 'Wordpress Hash key for LOGGED_IN_SALT constant' )
        );
        
        $fields[ ] = new Fields\SecureKeyField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::NONCE_KEY), 
            $this->__( 'Nonce key' ), 
            $this->__( 'Wordpress Hash key for NONCE_KEY constant' )
        );
         
        $tab->setFields( $fields );
        
        return $tab;
    }

    /**
    * put your comment there...
    * 
    */
    protected function tabUpgrade()
    {
        $form =& $this->getForm();
        $fields = array();
        
        $tab = new SimpleSubContainerTab( $this, $this->__( 'Upgrade' ), \WCFE\Hooks::FILTER_VIEW_TABS_TAB_UPGRADE_FIELDS );
        
        $fields[ 'Generic' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED), 
            $this->__( 'Disable Automatic Update' ), 
            $this->__( 'Disable all automatic updates' ),
            1
        );
        
        $fields[ 'Generic' ][ ] = new Fields\DropDownField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE), 
            $this->__( 'Core' ), 
            $this->__( 'The easiest way to manipulate core updates is with the WP_AUTO_UPDATE_CORE constant' ),
            array
            ( 
                'list' => array
                (
                    'true' => $this->__( 'Enable' ),
                    'minor' => $this->__( 'Enable only Minor updates' ),
                    'false' => $this->__( 'Disable' ),                
                )
            )
        );
        
        $fields[ 'Generic' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::DISALLOW_FILE_MODS), 
            $this->__( 'Disable Plugins and Themes' ), 
            $this->__( 'This will block users being able to use the plugin and theme installation/update functionality from the WordPress admin area. Setting this constant also disables the Plugin and Theme editor (i.e. you don\'t need to set DISALLOW_FILE_MODS and DISALLOW_FILE_EDIT, as on its own DISALLOW_FILE_MODS will have the same effect).' ),
            1
        );
        
        $fields[ 'FTP' ][ ] = new Fields\DropDownField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FS_METHOD), 
            $this->__( 'File System Method' ), 
            $this->__( 'forces the filesystem method. It should only be "direct", "ssh2", "ftpext", or "ftpsockets". Generally, you should only change this if you are experiencing update problems. If you change it and it doesn\'t help, change it back/remove it. Under most circumstances, setting it to \'ftpsockets\' will work if the automatically chosen method does not.<br><br>(Primary Preference) "direct" forces it to use Direct File I/O requests from within PHP, this is fraught with opening up security issues on poorly configured hosts, This is chosen automatically when appropriate
                        <br><br><strong>
                        (Secondary Preference) "ssh2" is to force the usage of the SSH PHP Extension if installed</strong>
                        <br><br><strong>
                        (3rd Preference) "ftpext" is to force the usage of the FTP PHP Extension for FTP Access, and finally</strong>
                        <br><br><strong>
                        (4th Preference) "ftpsockets" utilises the PHP Sockets Class for FTP Access.</strong>' ),
            array
            ( 
                'list' => array
                (                
                    '' => '',
                    'direct' => $this->__( 'Direct (direct)' ),
                    'ssh2' => $this->__( 'SSH 2 (ssh2)' ),
                    'ftpext' => $this->__( 'FTP Extension (ftpext)' ),
                    'ftpsockets' => $this->__( 'FTP Sockets (ftpsockets)' ),
                )
            )
        );
        
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_BASE), 
            $this->__( 'FTP ABS Path' ), 
            $this->__( 'The full path to the "base"(ABSPATH) folder of the WordPress installation' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_CONTENT_DIR), 
            $this->__( 'FTP Content Dir ABS Path' ), 
            $this->__( 'The full path to the wp-content folder of the WordPress installation' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_PLUGIN_DIR), 
            $this->__( 'Plugins Dir ABS Path' ), 
            $this->__( 'The full path to the plugins folder of the WordPress installation' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_PUBKEY), 
            $this->__( 'Public Key' ), 
            $this->__( 'The full path to your SSH public key' ),
            array( 'class' => 'path long-input' )
        );
        
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_PRIKEY), 
            $this->__( 'Private Key' ), 
            $this->__( 'The full path to your SSH private key' ),
            array( 'class' => 'path long-input' )
        );
       
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_USER), 
            $this->__( 'User' ), 
            $this->__( 'either user FTP or SSH username. Most likely these are the same, but use the appropriate one for the type of update you wish to do.' )
        );
        
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_PASS), 
            $this->__( 'Password' ), 
            $this->__( 'The password for the username entered for FTP_USER. If you are using SSH public key authentication this can be omitted.' ),
            array( 'type' => 'password' )
        );
        
        $fields[ 'FTP' ][ ] = new Fields\InputField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_HOST), 
            $this->__( 'FTP Host' ), 
            $this->__( 'the hostname:port combination for your SSH/FTP server. The default FTP port is 21 and the default SSH port is 22. These do not need to be mentioned.' )
        );

        $fields[ 'FTP' ][ ] = new Fields\CheckboxField( 
            $form, 
            $form->get(ConfigFileFieldsNameMap::FTP_SSL), 
            $this->__( 'Secure Connection' ), 
            $this->__( 'TRUE for SSL-connection if supported by the underlying transport (not available on all servers). This is for "Secure FTP" not for SSH SFTP.' ),
            1
        );
        
        $tab->setFields( $fields );
        
        return $tab;
    }
    
}
