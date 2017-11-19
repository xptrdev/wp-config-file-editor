<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs;

# Imports
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs as TabsBase;
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\FieldsTab;
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\SimpleSubContainerTab;
use WCFE\Modules\Editor\View\Editor\Fields;
use WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\AdvancedOptionsPanel;
use WCFE\Modules\SysFilters\Model\SysFiltersDashboardModel;

/**
* 
*/
class Tabs extends TabsBase {

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
    protected $tabsFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_SYSFILTERS_REGISTER_TABS;

    /**
    * 
    * 
    */
    protected function getTabsList()
    {

        $tabs = array();

        // Misc Tab
        $tabs[] = $this->createMisc();
        $tabs[] = $this->createHTTPTab();
        $tabs[] = $this->createEditorTab();
        $tabs[] = $this->createKsesTab();

        return $tabs;
    }

    /**
    * put your comment there...
    * 
    */
    private function createEditorTab()
    {
        
        $tinyEditorFields = $this->form->get('editor');
        
        return new FieldsTab(
            $this,
            $this->__( 'Editor' ),
            \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_EDITOR_FIELDS,
            'editor',
            array
            (
                new Fields\CheckboxField( 
                    $this->form, 
                    $tinyEditorFields->get('autoParagraph')->get('value'),
                    $this->__('Auto Paragraph'), 
                    $this->__('Replaces double line-breaks with paragraph elements'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\InputField( 
                    $this->form, 
                    $tinyEditorFields->get('editorHeight')->get('value'),
                    $this->__('Editor Height'), 
                    $this->__('Editor Height in pixels'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $tinyEditorFields->get('mediaButtons')->get('value'), 
                    $this->__('Media Buttons'), 
                    $this->__('Whether to show the Add Media/other media buttons.'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $tinyEditorFields->get('dragDropUpload')->get('value'), 
                    $this->__('Drag and Drop Uploads'),
                    $this->__('Whether to enable drag &amp; drop on the editor uploading'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\InputField( 
                    $this->form, 
                    $tinyEditorFields->get('textAreaRows')->get('value'), 
                    $this->__('TextArea Rows'), 
                    $this->__('Number rows in the editor textarea'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\InputField( 
                    $this->form, 
                    $tinyEditorFields->get('tabIndex')->get('value'), 
                    $this->__('Tab Index'), 
                    $this->__('Tabindex value to use'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\TextareaField( 
                    $this->form, 
                    $tinyEditorFields->get('editorCSS')->get('value'), 
                    $this->__('Editor Style'),
                    $this->__('Intended for extra styles for both Visual and Text editors. Should include `&lt;style&gt;` tags, and can use "scoped"'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\InputField( 
                    $this->form, 
                    $tinyEditorFields->get('editorClass')->get('value'), 
                    $this->__('Editor CSS Class'), 
                    $this->__('Extra classes to add to the editor textarea element'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $tinyEditorFields->get('teeny')->get('value'),
                    $this->__('Teeny'), 
                    $this->__('Whether to output the minimal editor config. Examples include Press This and the Comment editor'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $tinyEditorFields->get('tinyMCE')->get('value'), 
                    $this->__('TinyMCE'), 
                    $this->__('Whether to load TinyMCE'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\HTMLComponent( 
                    $this->form, 
                    array
                    (
                        new Fields\CheckboxField( 
                            $this->form, 
                            $tinyEditorFields->get('quickTags')->get('value'), 
                            'Enable', 
                            null,
                            1
                        ),

                        new Fields\InputField( 
                            $this->form, 
                            $tinyEditorFields->get('quickTags')->get('buttons'), 
                            'Buttons', 
                            null
                        )

                    ),
                    $this->__('Quick Tags'),
                    $this->__('Specify Whether to load Quicktags and what buttons to load'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                (new Fields\PreDefinedCheckboxList( 
                    $this->form, 
                    $tinyEditorFields->get('plugins')->get('value'),
                    $this->__('Built-In Plugins'), 
                    $this->__('Enable / Disable TinyMCE Built in plugins'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ))->setPreDefinedList(
                    SysFiltersDashboardModel::getDefaultsSection( 'editor', 'plugins', 'value' )
                ),
                (new Fields\PreDefinedCheckboxList( 
                    $this->form, 
                    $tinyEditorFields->get('buttons2')->get('value'),
                    $this->__('Second Row Buttons list'), 
                    $this->__('Show / Hide second row buttons'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ))->setPreDefinedList(
                    SysFiltersDashboardModel::getDefaultsSection( 'editor', 'buttons2', 'value' )
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    private function createHTTPTab()
    {
        
        $httpFields = $this->form->get('http');
        
        return new FieldsTab(
            $this,
            $this->__('HTTP'),
            \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_HTTP_FIELDS,
            'http',
            array
            (
                new Fields\InputField( 
                    $this->form, 
                    $httpFields->get('timeOut')->get('value'), 
                    $this->__('Request TimeOut'), 
                    $this->__('Filter the timeout value for an HTTP request (seconds)'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\InputField( 
                    $this->form, 
                    $httpFields->get('redirectCount')->get('value'), 
                    $this->__('Redirect Count'), 
                    $this->__('Filter the number of redirects allowed during an HTTP request'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\InputField( 
                    $this->form, 
                    $httpFields->get('version')->get('value'), 
                    $this->__('HTTP Version'), 
                    $this->__('Filter the version of the HTTP protocol used in a request'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                (new Fields\InputField( 
                    $this->form, 
                    $httpFields->get('userAgent')->get('value'), 
                    $this->__('User Agent'), 
                    $this->__('Filter the user agent value sent with an HTTP request'),
                    array( 'optionsPanel' => new AdvancedOptionsPanel() )
                ))->setClassName( 'long-input' ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('rejectUnsafeUrls')->get('value'), 
                    $this->__('Reject Unsafe Urls'), 
                    $this->__('Filter whether to pass URLs through wp_http_validate_url() in an HTTP request'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('stream')->get('value'), 
                    $this->__('Stream'), 
                    $this->__('Whether to stream to a file. If set to true and no filename was given, it will be droped it in the WP temp dir and its name will be set using the basename of the URL. Default false'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('blocking')->get('value'), 
                    $this->__('Blocking'), 
                    $this->__('Whether the calling code requires the result of the request.
                         If set to false, the request will be sent to the remote server,
                         and processing returned to the calling code immediately, the caller
                         will know if the request succeeded or failed, but will not receive
                         any response from the remote server'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('compress')->get('value'),
                    $this->__('Compress'), 
                    $this->__('Whether to compress the $body when sending the request'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('decompress')->get('value'), 
                    $this->__('De-Compress'), 
                    $this->__('Whether to decompress a compressed response. If set to false and
                                 compressed content is returned in the response anyway, it will
                                 need to be separately decompressed'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\InputField( 
                    $this->form, 
                    $httpFields->get('responseSizeLimit')->get('value'), 
                    $this->__('Response Size limit'), 
                    $this->__('Size in bytes to limit the response to'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('proxyBlockLocalRequests')->get('value'), 
                    $this->__('Proxy Block Local Requests'), 
                    $this->__('Filter whether to block local requests through the proxy'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('localSSLVerify')->get('value'), 
                    $this->__('Local SSL Verify'), 
                    $this->__('Filter whether SSL should be verified for local requests'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('sslVerify')->get('value'), 
                    $this->__('SSL Verify'), 
                    $this->__('Filter whether SSL should be verified for non-local requests'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('useSteamTransport')->get('value'), 
                    $this->__('Use Steam Transport'), 
                    $this->__('Filter whether streams can be used as a transport'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('useCurlTransport')->get('value'), 
                    $this->__('Use Curl Transport'), 
                    $this->__('Filter whether cURL can be used as a transport'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ),
                new Fields\CheckboxField( 
                    $this->form, 
                    $httpFields->get('allowLocalHost')->get('value'), 
                    $this->__('Allow local Host'), 
                    $this->__('If host appears local, reject unless specifically allowed'),
                    1, 
                    array('optionsPanel' => new AdvancedOptionsPanel())
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createKsesTab()
    {
        
        $ksesFields = $this->form->get('kses');
        
        return new FieldsTab(
            $this,
            $this->__('Kses'),
            \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_KSES_FIELDS,
            'kses',
            array
            (
                (new Fields\PreDefinedCheckboxList( 
                    $this->form, 
                    $ksesFields->get('protocols' )->get('value'),
                    $this->__('Allowed Protocols'), 
                    $this->__('Filter HTML attributes allowed protocols'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ))->setPreDefinedList(
                    SysFiltersDashboardModel::getDefaultsSection('kses', 'protocols', 'value')
                ),
                
                (new Fields\StructuredCheckboxList( 
                    $this->form, 
                    $ksesFields->get('postTags')->get('value'),
                    $this->__('Post Tags'), 
                    $this->__('Allow what HTML Tags and attributes to be inserted into post content'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ))->setClassName('wcfe-editable-checkbox-list'),
                
                (new Fields\StructuredCheckboxList( 
                    $this->form, 
                    $ksesFields->get('commentTags')->get('value'),
                    $this->__('Comment Tags'), 
                    $this->__('Allow what HTML Tags and attributes to be inserted into comment content'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                ))->setClassName('wcfe-editable-checkbox-list'),
                
                new Fields\CheckboxListField( 
                    $this->form, 
                    $ksesFields->get('entities')->get('value'),
                    $this->__('HTML Entities'), 
                    $this->__('Allow what HTML Entities to be inserted'),
                    array('optionsPanel' => new AdvancedOptionsPanel())
                )
                
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMisc()
    {
        
        $miscFields = $this->form->get('misc');
        
        return (new SimpleSubContainerTab(
            $this,
            $this->__('Misc'),
            \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SYSFILTERS_MISC_FIELDS,
            'misc',
            array
            (
                'misc' => array
                (
                    (new Fields\PreDefinedCheckboxList( 
                        $this->form, 
                        $miscFields->get('queryVars')->get('value'),
                        $this->__('Query Vars'), 
                        $this->__('Filter which query vars to allow Wordpress to use. For example search can be stopped by unchecking "s" variable'),
                        array('optionsPanel' => new AdvancedOptionsPanel())
                    ))->setPreDefinedList(
                        SysFiltersDashboardModel::getDefaultsSection('misc', 'queryVars', 'value')
                    ),                
                    new Fields\CheckboxField
                    (
                        $this->form,
                        $miscFields->get('themesPersistCache')->get('value'),
                        $this->__('Persistly Cache Themes'), 
                        $this->__('Filter whether to get the cache of the registered theme directories'),
                        1,
                        array('optionsPanel' => new AdvancedOptionsPanel())
                    ),
                    new Fields\StructuredCheckboxList( 
                        $this->form, 
                        $miscFields->get('uploadAllowedMimes')->get('value'),
                        $this->__('Upload Allowed Mime Types'), 
                        $this->__('Allow/Disallow what type of images can be uploaded and what mime type to associate with the uploaded file.'),
                        array('optionsPanel' => new AdvancedOptionsPanel())
                    )
                ),
                'imagesEditor' => array
                (
                    new Fields\InputField
                    (
                        $this->form,
                        $miscFields->get('quality')->get('value'),
                        $this->__('Quality'), 
                        $this->__('Filter the default image compression quality setting.'),
                        array('optionsPanel' => new AdvancedOptionsPanel())
                    ),
                    new Fields\InputField
                    (
                        $this->form,
                        $miscFields->get('memoryLimit')->get('value'),
                        $this->__('Memory Limit'), 
                        $this->__('Filter the memory limit allocated for image manipulation'),
                        array('optionsPanel' => new AdvancedOptionsPanel())
                    )
                )
                
            )
        ))->setContainersData(
            array
            (   
                'misc' => array('title' => $this->__('Misc')),
                'imagesEditor' => array('title' => $this->__('Image'))
            )
        );
    }
    

}
