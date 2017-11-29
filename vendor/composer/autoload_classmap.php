<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'ComposerAutoloaderInitfe2ad7bc57369cc31174fe5525a436ac' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInitfe2ad7bc57369cc31174fe5525a436ac' => $vendorDir . '/composer/autoload_static.php',
    'WCFEPluginLoaded' => $baseDir . '/wp-config-file-editor.php',
    'WCFE\\CompatibleWordpress' => $baseDir . '/Plugin/CompatibilityLayer.class.php',
    'WCFE\\Config\\ExtensionsFeatures' => $baseDir . '/Config/ExtensionsFeatures.Config.php',
    'WCFE\\Config\\Plugin' => $baseDir . '/Config/Plugin.class.php',
    'WCFE\\Factory' => $baseDir . '/Plugin/PluginFactory.class.php',
    'WCFE\\Factory\\WordpressOptions' => $baseDir . '/Plugin/PluginFactoryWordpressOptions.class.php',
    'WCFE\\Hooks' => $baseDir . '/Libraries/Hooks.enum.php',
    'WCFE\\Includes\\Mail\\EmergencyRestoreMail' => $baseDir . '/Libraries/EmergencyRestoreEmailMessage.class.php',
    'WCFE\\Installer\\Factory' => $baseDir . '/Plugin/InstallerFactory.class.php',
    'WCFE\\Installer\\Installer' => $baseDir . '/Plugin/Installer.class.php',
    'WCFE\\Installer\\WordpressOptions' => $baseDir . '/Plugin/InstallerFactoryWordpressOptions.class.php',
    'WCFE\\Libraries\\CSS\\jQuery\\Theme\\Theme' => $baseDir . '/Libraries/CSS/jQuery/Theme/Theme.class.php',
    'WCFE\\Libraries\\Forms\\Rules\\RequiredField' => $baseDir . '/Libraries/Forms/Rule-Required.class.php',
    'WCFE\\Libraries\\InstallerService' => $baseDir . '/Libraries/InstallerService.abstract.php',
    'WCFE\\Libraries\\JavaScript\\AceEditor\\ACEExtLanguageTools' => $baseDir . '/Libraries/JavaScript/AceEditor/ext-language_tools.class.php',
    'WCFE\\Libraries\\JavaScript\\AceEditor\\ACEExtSearchBox' => $baseDir . '/Libraries/JavaScript/AceEditor/ext-searchbox.class.php',
    'WCFE\\Libraries\\JavaScript\\AceEditor\\ACEModePHP' => $baseDir . '/Libraries/JavaScript/AceEditor/mode-php.class.php',
    'WCFE\\Libraries\\JavaScript\\AceEditor\\ACEditor' => $baseDir . '/Libraries/JavaScript/AceEditor/ace.class.php',
    'WCFE\\Libraries\\JavaScript\\AceEditor\\Theme' => $baseDir . '/Libraries/JavaScript/AceEditor/Theme.class.php',
    'WCFE\\Libraries\\JavaScript\\ChechboxList' => $baseDir . '/Libraries/JavaScript/CheckboxList.class.php',
    'WCFE\\Libraries\\JavaScript\\ErrorsDialog' => $baseDir . '/Libraries/JavaScript/ErrorsDialog.class.php',
    'WCFE\\Libraries\\JavaScript\\jQueryCookies' => $baseDir . '/Libraries/JavaScript/jQueryCookies.class.php',
    'WCFE\\Libraries\\JavaScript\\jQueryMenu' => $baseDir . '/Libraries/JavaScript/jQueryMenu.class.php',
    'WCFE\\Libraries\\ParseString' => $baseDir . '/Libraries/ParseString.class.php',
    'WCFE\\Libraries\\PersistObject' => $baseDir . '/Libraries/PersistObject.abstract.php',
    'WCFE\\Libraries\\ResStorage' => $baseDir . '/Libraries/ResourcesStorage.class.php',
    'WCFE\\Modules\\Editor\\ConfigFileFieldsNameMap' => $baseDir . '/Modules/Editor/Lib/ConfigFileFieldsNameMap.class.php',
    'WCFE\\Modules\\Editor\\ConfigFileNamesMap' => $baseDir . '/Modules/Editor/Lib/ConfigFileNamesMap.class.php',
    'WCFE\\Modules\\Editor\\Controller\\EditorService\\EditorServiceController' => $baseDir . '/Modules/Editor/Controller/EditorServices.php',
    'WCFE\\Modules\\Editor\\Controller\\Editor\\EditorController' => $baseDir . '/Modules/Editor/Controller/Editor.php',
    'WCFE\\Modules\\Editor\\Controller\\JSONControllerResponder' => $baseDir . '/Modules/Editor/JSONControllerResponder.class.php',
    'WCFE\\Modules\\Editor\\Controller\\MultiSiteToolsService\\MultiSiteToolsServiceController' => $baseDir . '/Modules/Editor/Controller/MultiSiteService.php',
    'WCFE\\Modules\\Editor\\Controller\\MultiSiteTools\\MultiSiteToolsController' => $baseDir . '/Modules/Editor/Controller/MultiSiteTools.php',
    'WCFE\\Modules\\Editor\\Controller\\ProfilesService\\ProfilesServiceController' => $baseDir . '/Modules/Editor/Controller/ProfilesService.php',
    'WCFE\\Modules\\Editor\\Controller\\Profiles\\ProfilesController' => $baseDir . '/Modules/Editor/Controller/Profiles.php',
    'WCFE\\Modules\\Editor\\Lib\\ConfigFileFactoriesFieldsNameMap' => $baseDir . '/Modules/Editor/Lib/ConfigFileFactoriesNamesMap.abstract.php',
    'WCFE\\Modules\\Editor\\Lib\\ConfigFileFormFieldsFactory' => $baseDir . '/Modules/Editor/Lib/ConfigFormFieldsFactoy.class.php',
    'WCFE\\Modules\\Editor\\Lib\\ConfigFileWriterFactoriesFieldsNameMap' => $baseDir . '/Modules/Editor/Lib/ConfigFileWriterFactoriesNamesMap.abstract.php',
    'WCFE\\Modules\\Editor\\Lib\\ConfigFile\\IWriter' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Writer.interface.php',
    'WCFE\\Modules\\Editor\\Lib\\ConfigFile\\Reader' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Reader.class.php',
    'WCFE\\Modules\\Editor\\Lib\\ConfigFile\\Writer' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Writer.class.php',
    'WCFE\\Modules\\Editor\\Lib\\ConfigFile\\WriterFieldsFactory' => $baseDir . '/Modules/Editor/Lib/ConfigFile/WritterFieldsFactory.class.php',
    'WCFE\\Modules\\Editor\\Lib\\FieldsFactoryBase' => $baseDir . '/Modules/Editor/Lib/FieldsFactoryBase.abstract.php',
    'WCFE\\Modules\\Editor\\Lib\\FormFieldsDataAccess' => $baseDir . '/Modules/Editor/Lib/ConfigFileFormFieldsDataAccess.class.php',
    'WCFE\\Modules\\Editor\\Lib\\RWFactoryBase' => $baseDir . '/Modules/Editor/Lib/FieldsRWFactoryBase.abstract.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\Constant' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/Constant.class.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\CookieNamedBase' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/CookieNamedBase.abstract.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\CustomContentField' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/CustomContent.class.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\Field' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/Field.abstract.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\Types\\BooleanType' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/Types/Boolean.class.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\Types\\Itype' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/Types/IType.class.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\Types\\NumericType' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/Types/Numeric.class.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\Types\\StringType' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/Types/String.class.php',
    'WCFE\\Modules\\Editor\\Model\\ConfigFile\\Fields\\Variable' => $baseDir . '/Modules/Editor/Lib/ConfigFile/Fields/Variable.class.php',
    'WCFE\\Modules\\Editor\\Model\\EditorModel' => $baseDir . '/Modules/Editor/Model/Editor.class.php',
    'WCFE\\Modules\\Editor\\Model\\EmergencyRestore' => $baseDir . '/Modules/Editor/Model/EmergencyRestore.class.php',
    'WCFE\\Modules\\Editor\\Model\\Forms\\ConfigFileForm' => $baseDir . '/Modules/Editor/Model/Forms/ConfigFileForm.class.php',
    'WCFE\\Modules\\Editor\\Model\\Forms\\ProfileForm' => $baseDir . '/Modules/Editor/Model/Forms/Profile.class.php',
    'WCFE\\Modules\\Editor\\Model\\Forms\\RawConfigFileForm' => $baseDir . '/Modules/Editor/Model/Forms/RawConfigFile.class.php',
    'WCFE\\Modules\\Editor\\Model\\MultiSiteToolsModel' => $baseDir . '/Modules/Editor/Model/MultiSiteTools.class.php',
    'WCFE\\Modules\\Editor\\Model\\Profile' => $baseDir . '/Modules/Editor/Model/Profile.class.php',
    'WCFE\\Modules\\Editor\\Model\\ProfilesModel' => $baseDir . '/Modules/Editor/Model/Profiles.class.php',
    'WCFE\\Modules\\Editor\\Model\\SystemCheckToolsModel' => $baseDir . '/Modules/Editor/Model/SystemCheckTools.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\EditorHTMLView' => $baseDir . '/Modules/Editor/View/Editor/View.html.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\CheckboxField' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/CheckboxField.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\CheckboxListField' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/CheckboxList.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\DropDownField' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/DropDownField.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\FieldBase' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/Field.abstract.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\HTMLComponent' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/HTMLComponent.abstract.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\InputField' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/InputField.abstract.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\PreDefinedCheckboxList' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/PreDefinedCheckboxList.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\SecureKeyField' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/SecureKeyField.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\StructuredCheckboxList' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/StructuredCheckboxList.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Fields\\TextareaField' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Fields/Textarea.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Media\\AutoPath' => $baseDir . '/Modules/Editor/View/Editor/Media/AutoPath.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Media\\ConfigForm' => $baseDir . '/Modules/Editor/View/Editor/Media/ConfigForm.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Media\\EditorServices' => $baseDir . '/Modules/Editor/View/Editor/Media/EditorServices.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Media\\RawView' => $baseDir . '/Modules/Editor/View/Editor/Media/RawView.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Media\\Style' => $baseDir . '/Modules/Editor/View/Editor/Media/Style.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\RendererFieldsFactory' => $baseDir . '/Modules/Editor/View/Editor/RendererFieldsFactory.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\ConfigTabs' => $baseDir . '/Modules/Editor/View/Editor/Templates/Index/ConfigTabs.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\EditorFormTabsAdapter' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Tabs/TabsAdapter.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\FieldsTab' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Tabs/FieldsTab.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\ITabsFormAdapter' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Tabs/TabsAdapter.interface.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\SimpleSubContainerTab' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Tabs/SimpleSubContainer.class.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\Tab' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Tabs/Tab.abstract.php',
    'WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\Tabs' => $baseDir . '/Modules/Editor/View/Editor/Templates/__TFW_Tabs/Tabs.class.php',
    'WCFE\\Modules\\Editor\\View\\MultiSiteTools\\MultiSiteToolsHTMLView' => $baseDir . '/Modules/Editor/View/MultiSiteTools/View.html.php',
    'WCFE\\Modules\\Editor\\View\\Profile\\Media\\EditCSS' => $baseDir . '/Modules/Editor/View/Profile/Media/Edit.css.php',
    'WCFE\\Modules\\Editor\\View\\Profile\\Media\\Profile' => $baseDir . '/Modules/Editor/View/Profile/Media/Profile.js.php',
    'WCFE\\Modules\\Editor\\View\\Profile\\ProfileHTMLView' => $baseDir . '/Modules/Editor/View/Profile/View.html.php',
    'WCFE\\Modules\\Editor\\View\\Profiles\\Media\\Profiles' => $baseDir . '/Modules/Editor/View/Profiles/Media/Profiles.js.php',
    'WCFE\\Modules\\Editor\\View\\Profiles\\Media\\Style' => $baseDir . '/Modules/Editor/View/Profiles/Media/List.php',
    'WCFE\\Modules\\Editor\\View\\Profiles\\ProfilesHTMLView' => $baseDir . '/Modules/Editor/View/Profiles/View.html.php',
    'WCFE\\Modules\\Editor\\View\\SystemCheckTools\\SystemCheckToolsHTMLView' => $baseDir . '/Modules/Editor/View/SystemCheckTools/View.html.php',
    'WCFE\\Modules\\SysFilters\\Controller\\SysFiltersDashboard\\SysFiltersDashboardController' => $baseDir . '/Modules/SysFilters/Controller/SysFiltersDashboard/Controller.class.php',
    'WCFE\\Modules\\SysFilters\\Model\\Forms\\SysFiltersOptionsForm' => $baseDir . '/Modules/SysFilters/Model/Forms/SysFilters.class.php',
    'WCFE\\Modules\\SysFilters\\Model\\SysFiltersDashboardModel' => $baseDir . '/Modules/SysFilters/Model/SysFiltersDashboard.class.php',
    'WCFE\\Modules\\SysFilters\\View\\SysFiltersDashboard\\Media\\IndexStyle' => $baseDir . '/Modules/SysFilters/View/SysFiltersDashboard/Media/Index.css.php',
    'WCFE\\Modules\\SysFilters\\View\\SysFiltersDashboard\\Media\\SysFiltersDashboard' => $baseDir . '/Modules/SysFilters/View/SysFiltersDashboard/Media/SysFiltersDashboard.js.php',
    'WCFE\\Modules\\SysFilters\\View\\SysFiltersDashboard\\SysFiltersDashboardHTMLView' => $baseDir . '/Modules/SysFilters/View/SysFiltersDashboard/View.HTML.php',
    'WCFE\\Modules\\SysFilters\\View\\SysFiltersDashboard\\Tabs\\AdvancedOptionsPanel' => $baseDir . '/Modules/SysFilters/View/SysFiltersDashboard/Tabs/AdvancedOptionsPanel.class.php',
    'WCFE\\Modules\\SysFilters\\View\\SysFiltersDashboard\\Tabs\\SysFiltersFormTabsAdapter' => $baseDir . '/Modules/SysFilters/View/SysFiltersDashboard/Tabs/TabsFormAdapter.class.php',
    'WCFE\\Modules\\SysFilters\\View\\SysFiltersDashboard\\Tabs\\Tabs' => $baseDir . '/Modules/SysFilters/View/SysFiltersDashboard/Tabs/Tabs.class.php',
    'WCFE\\Pluggable\\DeferredExtender' => $baseDir . '/Libraries/DeferredExtender.class.php',
    'WCFE\\Plugin' => $baseDir . '/Plugin/Plugin.php',
    'WCFE\\Services\\EditorModule' => $baseDir . '/Plugin/Services/Editor.class.php',
    'WCFE\\Services\\Editor\\MenuPages\\Editor\\Editor' => $baseDir . '/Plugin/Services/Editor/MenuPages/Editor/Editor.class.php',
    'WCFE\\Services\\Editor\\MenuPages\\Editor\\Page' => $baseDir . '/Plugin/Services/Editor/MenuPages/Editor/Page.class.php',
    'WCFE\\Services\\Editor\\MenuPages\\Editor\\RawEdit' => $baseDir . '/Plugin/Services/Editor/MenuPages/Editor/RawEdit.class.php',
    'WCFE\\Services\\Editor\\MultiSiteTools\\MultiSiteNetworkPageTools' => $baseDir . '/Plugin/Services/Editor/MultiSiteTools/MultiSiteNetworkPageTools.class.php',
    'WCFE\\Services\\Editor\\MultiSiteTools\\Proxy' => $baseDir . '/Plugin/Services/Editor/MultiSiteTools/Proxy.class.php',
    'WCFE\\Services\\Editor\\MultiSiteTools\\Service' => $baseDir . '/Plugin/Services/Editor/MultiSiteTools/Service.class.php',
    'WCFE\\Services\\Editor\\MultiSiteTools\\ServiceFront' => $baseDir . '/Plugin/Services/Editor/MultiSiteTools/ServiceFront.class.php',
    'WCFE\\Services\\Editor\\Services\\Editor\\Ajax' => $baseDir . '/Plugin/Services/Editor/Services/Editor/Ajax.class.php',
    'WCFE\\Services\\Editor\\Services\\Editor\\AjaxViews' => $baseDir . '/Plugin/Services/Editor/Services/Editor/AjaxViews.class.php',
    'WCFE\\Services\\Editor\\Services\\Editor\\Service' => $baseDir . '/Plugin/Services/Editor/Services/Editor/Service.class.php',
    'WCFE\\Services\\SysFiltersModule' => $baseDir . '/Plugin/Services/SysFilters.class.php',
    'WCFE\\Services\\SysFilters\\Dashboard\\Dashboard' => $baseDir . '/Plugin/Services/SysFilters/Dashboard/Dashboard.class.php',
    'WCFE\\Services\\SysFilters\\Dashboard\\Page' => $baseDir . '/Plugin/Services/SysFilters/Dashboard/Page.class.php',
    'WCFE\\Services\\SysFilters\\Services\\Dashboard\\Ajax' => $baseDir . '/Plugin/Services/SysFilters/Services/Dashboard/Ajax.class.php',
    'WCFE\\Services\\SysFilters\\Services\\Dashboard\\AjaxViews' => $baseDir . '/Plugin/Services/SysFilters/Services/Dashboard/AjaxViews.class.php',
    'WCFE\\Services\\SysFilters\\Services\\Dashboard\\Service' => $baseDir . '/Plugin/Services/SysFilters/Services/Dashboard/Service.class.php',
    'WCFE\\Services\\SysFilters\\SysFilters' => $baseDir . '/Plugin/Services/SysFilters/SysFilters.class.php',
    'WCFE\\SysPlugins\\Plugins' => $baseDir . '/SysPlugins/Plugins.class.php',
    'WCFE\\SysPlugins\\SysFilters\\Module' => $baseDir . '/SysPlugins/Plugins/SysFilters/Module.abstract.php',
    'WCFE\\SysPlugins\\SysFilters\\Modules\\EditorModule' => $baseDir . '/SysPlugins/Plugins/SysFilters/Modules/Editor.class.php',
    'WCFE\\SysPlugins\\SysFilters\\Modules\\HTTPModule' => $baseDir . '/SysPlugins/Plugins/SysFilters/Modules/HTTP.class.php',
    'WCFE\\SysPlugins\\SysFilters\\Modules\\KsesModule' => $baseDir . '/SysPlugins/Plugins/SysFilters/Modules/Kses.class.php',
    'WCFE\\SysPlugins\\SysFilters\\Modules\\MiscModule' => $baseDir . '/SysPlugins/Plugins/SysFilters/Modules/Misc.class.php',
    'WCFE\\SysPlugins\\SysFilters\\Plugin' => $baseDir . '/SysPlugins/Plugins/SysFilters/Plugin.class.php',
    'WPPFW\\Collection\\ArrayIterator' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Collection/ArrayIterator.abstract.php',
    'WPPFW\\Collection\\DataAccess' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Collection/DataAccess.class.php',
    'WPPFW\\Collection\\IDataAccess' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Collection/DataAccess.interface.php',
    'WPPFW\\Database\\Wordpress\\MUWordpressOptions' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Database/Wordpress/MUOptions.class.php',
    'WPPFW\\Database\\Wordpress\\WPOptionVariable' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Database/Wordpress/OptionVariable.class.php',
    'WPPFW\\Database\\Wordpress\\WordpressOptions' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Database/Wordpress/Options.class.php',
    'WPPFW\\Forms\\Fields\\FormArrayField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/Array.class.php',
    'WPPFW\\Forms\\Fields\\FormField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/Field.class.php',
    'WPPFW\\Forms\\Fields\\FormFieldBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/Field.abstract.php',
    'WPPFW\\Forms\\Fields\\FormFieldsList' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/FieldsList.class.php',
    'WPPFW\\Forms\\Fields\\FormIntegerField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/Integer.class.php',
    'WPPFW\\Forms\\Fields\\FormListField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/List.class.php',
    'WPPFW\\Forms\\Fields\\FormRawField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/Raw.class.php',
    'WPPFW\\Forms\\Fields\\FormSecurityTokenField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/SecurityToken.class.php',
    'WPPFW\\Forms\\Fields\\FormStringField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/String.class.php',
    'WPPFW\\Forms\\Fields\\IField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/Field.interface.php',
    'WPPFW\\Forms\\Fields\\IInputField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Fields/InputField.interface.php',
    'WPPFW\\Forms\\Form' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Form.class.php',
    'WPPFW\\Forms\\HTML\\ElementsCollection' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/ElementsCollection.class.php',
    'WPPFW\\Forms\\HTML\\Elements\\HTMLFormCheckBox' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/Checkbox.class.php',
    'WPPFW\\Forms\\HTML\\Elements\\HTMLFormElement' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/Element.abstract.php',
    'WPPFW\\Forms\\HTML\\Elements\\HTMLFormHidden' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/Hidden.class.php',
    'WPPFW\\Forms\\HTML\\Elements\\HTMLFormListOption' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/ListOption.class.php',
    'WPPFW\\Forms\\HTML\\Elements\\HTMLFormNode' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/Node.abstract.php',
    'WPPFW\\Forms\\HTML\\Elements\\HTMLFormOptionsList' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/OptionsList.class.php',
    'WPPFW\\Forms\\HTML\\Elements\\HTMLFormTextBox' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/Textbox.class.php',
    'WPPFW\\Forms\\HTML\\Elements\\IElement' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Elements/Element.interface.php',
    'WPPFW\\Forms\\HTML\\HTMLForm' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/HTMlForm.class.php',
    'WPPFW\\Forms\\HTML\\Linkers\\FieldLinker' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Linkers/Linker.class.php',
    'WPPFW\\Forms\\HTML\\Linkers\\IFieldLinker' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/HTML/Linkers/FielsLinker.interface.php',
    'WPPFW\\Forms\\IForm' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Form.interface.php',
    'WPPFW\\Forms\\Rules\\FieldRule' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Rules/Rule.abstract.php',
    'WPPFW\\Forms\\Rules\\IFieldRule' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Rules/Rule.interface.php',
    'WPPFW\\Forms\\Rules\\RequiredField' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Rules/Required.class.php',
    'WPPFW\\Forms\\SecureForm' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/SecureForm.class.php',
    'WPPFW\\Forms\\Types\\IType' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Types/Type.interface.php',
    'WPPFW\\Forms\\Types\\TypeArray' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Types/Array.class.php',
    'WPPFW\\Forms\\Types\\TypeBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Types/Type.abstract.php',
    'WPPFW\\Forms\\Types\\TypeInteger' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Types/Integer.class.php',
    'WPPFW\\Forms\\Types\\TypeRaw' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Types/Raw.class.php',
    'WPPFW\\Forms\\Types\\TypeString' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Forms/Types/String.class.php',
    'WPPFW\\HDT\\HDTDocument' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/Document.abstract.php',
    'WPPFW\\HDT\\IHTDDocument' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/Document.interface.php',
    'WPPFW\\HDT\\IReaderPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/ReaderPrototype.interface.php',
    'WPPFW\\HDT\\IWriterPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/WriterPrototype.interface.php',
    'WPPFW\\HDT\\ReaderPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/ReaderPrototype.abstract.php',
    'WPPFW\\HDT\\WriterPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/WriterPrototype.abstract.php',
    'WPPFW\\HDT\\XML\\SimpleXMLReaderPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/XML/SimpleXMLReader.class.php',
    'WPPFW\\HDT\\XML\\XMLWriterPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/HDT/XML/Writer.abstract.php',
    'WPPFW\\Http\\HTTPRequest' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Http/Request.class.php',
    'WPPFW\\Http\\HTTPResponse' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Http/Response.class.php',
    'WPPFW\\Http\\Url' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Http/Url.class.php',
    'WPPFW\\Http\\UrlParams' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Http/UrlParams.class.php',
    'WPPFW\\MVC\\Controller\\Base' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Controller/Base.php',
    'WPPFW\\MVC\\Controller\\Controller' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Controller/Controller.class.php',
    'WPPFW\\MVC\\Controller\\IController' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Controller/Controller.interface.php',
    'WPPFW\\MVC\\Controller\\ServiceController' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Controller/Service.class.php',
    'WPPFW\\MVC\\IDispatcher' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Dispatcher.interface.php',
    'WPPFW\\MVC\\IMVCComponentsLayer' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/MVCLayer.interface.php',
    'WPPFW\\MVC\\IMVCResponder' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Responder.interface.php',
    'WPPFW\\MVC\\IMVCRouter' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Router.interface.php',
    'WPPFW\\MVC\\IMVCServiceManager' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/ServiceManager.interface.php',
    'WPPFW\\MVC\\IMVCViewRouter' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/MVCViewRouter.interface.php',
    'WPPFW\\MVC\\MVCComponenetsLayer' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/MVCLayer.abstract.php',
    'WPPFW\\MVC\\MVCDispatcher' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Dispatcher.class.php',
    'WPPFW\\MVC\\MVCParams' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Params.class.php',
    'WPPFW\\MVC\\MVCRequestParamsRouter' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/InputRouter.class.php',
    'WPPFW\\MVC\\MVCStructure' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Structure.class.php',
    'WPPFW\\MVC\\MVCViewDispatcher' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/ViewDispatcher.class.php',
    'WPPFW\\MVC\\MVCViewParams' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/ViewParams.class.php',
    'WPPFW\\MVC\\MVCViewRequestParamsRouter' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/ViewInputRouter.class.php',
    'WPPFW\\MVC\\MVCViewStructure' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/ViewStructure.class.php',
    'WPPFW\\MVC\\Model\\EntityModel' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/EntityModel.class.php',
    'WPPFW\\MVC\\Model\\ModelBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/Base.abstract.php',
    'WPPFW\\MVC\\Model\\PluginModel' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/PluginModel.abstract.php',
    'WPPFW\\MVC\\Model\\State\\CurrentUserWPOptionsModelState' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/State/CurrentUserState.class.php',
    'WPPFW\\MVC\\Model\\State\\GlobalWPOptionsModelState' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/State/Global.class.php',
    'WPPFW\\MVC\\Model\\State\\IModelStateAdapter' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/State/StateAdapter.interface.php',
    'WPPFW\\MVC\\Model\\State\\SessionWPOptionsModelState' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/State/Session.class.php',
    'WPPFW\\MVC\\Model\\State\\WPOptionsModelState' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Model/State/WordpressOptionsAdpater.abstract.php',
    'WPPFW\\MVC\\RouterBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Router.abstract.php',
    'WPPFW\\MVC\\Service\\FileDownloader' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Service/FileDownloader.class.php',
    'WPPFW\\MVC\\Service\\JSONEncoder' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/Service/JSON.class.php',
    'WPPFW\\MVC\\Service\\MVCResponder' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/MVCResponder.abstract.php',
    'WPPFW\\MVC\\View\\Base' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/View/Base.php',
    'WPPFW\\MVC\\View\\TemplateView' => $vendorDir . '/xptrdev/WPPluginFramework/Include/MVC/View/Template.php',
    'WPPFW\\Obj\\CastObject' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Obj/Cast.class.php',
    'WPPFW\\Obj\\ClassName' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Obj/ClassName.class.php',
    'WPPFW\\Obj\\Factory' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Obj/Factory.class.php',
    'WPPFW\\Obj\\IFactory' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Obj/Factory.interface.php',
    'WPPFW\\Obj\\IFactoryObject' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Obj/FactoryObject.interface.php',
    'WPPFW\\Obj\\PHPNamespace' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Obj/Namespace.class.php',
    'WPPFW\\Obj\\Register' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Obj/Register.class.php',
    'WPPFW\\Plugin\\Config\\XML\\MVCPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/MVC.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Objects\\ObjectParamPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Objects/Param.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Objects\\ObjectPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Objects/Object.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Objects\\ObjectsPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Objects/Objects.class.php',
    'WPPFW\\Plugin\\Config\\XML\\PluginConfigDocument' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Document.class.php',
    'WPPFW\\Plugin\\Config\\XML\\PluginParametersPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/PluginParameters.class.php',
    'WPPFW\\Plugin\\Config\\XML\\PluginPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Plugin.class.php',
    'WPPFW\\Plugin\\Config\\XML\\PluginSimpleXMLReaderPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/SimpleXMLReader.class.php',
    'WPPFW\\Plugin\\Config\\XML\\PluginWriterPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Writer.abstract.php',
    'WPPFW\\Plugin\\Config\\XML\\Services\\ModelPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Services/Model.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Services\\ModelsPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Services/Models.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Services\\ServicePrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Services/Service.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Services\\ServiceProxyPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Services/Proxy.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Services\\ServicesPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Services/Services.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Services\\TypePrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Services/Type.class.php',
    'WPPFW\\Plugin\\Config\\XML\\Services\\TypesPrototype' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/XML/Services/Types.class.php',
    'WPPFW\\Plugin\\IServiceFrontProxy' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/ServiceFrontProxy.interface.php',
    'WPPFW\\Plugin\\Localization' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Localization.class.php',
    'WPPFW\\Plugin\\MVCRequestInputFrontProxy' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/MVCRequestInputFrontProxy.class.php',
    'WPPFW\\Plugin\\MVCViewRequestInputFrontProxy' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/MVCViewRequestInputFrontProxy.class.php',
    'WPPFW\\Plugin\\PluginBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/PluginBase.php',
    'WPPFW\\Plugin\\PluginConfig' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Config/Config.class.php',
    'WPPFW\\Plugin\\PluginFactory' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/PluginFactory.abstract.php',
    'WPPFW\\Plugin\\Request' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Request.class.php',
    'WPPFW\\Plugin\\Resource\\JavascriptResource' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Resource/Types/Javascript.class.php',
    'WPPFW\\Plugin\\Resource\\Resource' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/Resource/Base.abstract.php',
    'WPPFW\\Plugin\\ServiceFrontProxy' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/ServiceFrontProxy.abstract.php',
    'WPPFW\\Plugin\\ServiceObjectRouter' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/ServiceObjectRouter.class.php',
    'WPPFW\\Plugin\\ServiceObjectRouterBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/ServiceObjectRouter.abstract.php',
    'WPPFW\\Plugin\\ServiceObjectViewRouter' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/ServiceObjectViewRouter.class.php',
    'WPPFW\\Services\\Dashboard\\Ajax\\AjaxAccessPoint' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Ajax/AccessPoint.class.php',
    'WPPFW\\Services\\Dashboard\\Ajax\\AjaxService' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Ajax/Service.class.php',
    'WPPFW\\Services\\Dashboard\\Ajax\\Proxy' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Ajax/Proxy.class.php',
    'WPPFW\\Services\\Dashboard\\Menu\\IMenuPage' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Menu/MenuPage.interface.php',
    'WPPFW\\Services\\Dashboard\\Menu\\MenuPage' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Menu/MenuPage.class.php',
    'WPPFW\\Services\\Dashboard\\Menu\\MenuPageBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Menu/MenuPage.abstract.php',
    'WPPFW\\Services\\Dashboard\\Menu\\MenuService' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Menu/Service.class.php',
    'WPPFW\\Services\\Dashboard\\Menu\\Proxy' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Menu/Proxy.class.php',
    'WPPFW\\Services\\Dashboard\\Menu\\SubMenu' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Menu/SubMenu.class.php',
    'WPPFW\\Services\\Dashboard\\Menu\\SubMenuPage' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Dashboard/Menu/SubMenuPage.class.php',
    'WPPFW\\Services\\HookMap' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/HookMap.class.php',
    'WPPFW\\Services\\IProxy' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Proxy.interface.php',
    'WPPFW\\Services\\IReachableServiceObject' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/ReachableServiceObject.interface.php',
    'WPPFW\\Services\\IService' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Service.interface.php',
    'WPPFW\\Services\\IServiceFrontFactory' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/ServiceFrontFactory.interface.php',
    'WPPFW\\Services\\IServiceObject' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/ServiceObject.interface.php',
    'WPPFW\\Services\\ProxyBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Proxy.abstract.php',
    'WPPFW\\Services\\Queue\\DashboardScriptsQueue' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/DashboardScript.class.php',
    'WPPFW\\Services\\Queue\\DashboardStylesQueue' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/DashboardStyle.class.php',
    'WPPFW\\Services\\Queue\\Resource' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/Resource.class.php',
    'WPPFW\\Services\\Queue\\Resources' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/Resources.class.php',
    'WPPFW\\Services\\Queue\\ScriptResource' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/Script.class.php',
    'WPPFW\\Services\\Queue\\ScriptsQueue' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/Scripts.class.php',
    'WPPFW\\Services\\Queue\\StyleResource' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/Style.class.php',
    'WPPFW\\Services\\Queue\\StylesQueue' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Queue/Styles.class.php',
    'WPPFW\\Services\\ServiceBase' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/Service.abstract.php',
    'WPPFW\\Services\\ServiceModule' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Plugin/ServiceModule.abstract.php',
    'WPPFW\\Services\\ServiceObject' => $vendorDir . '/xptrdev/WPPluginFramework/Include/Services/ServiceObject.abstract.php',
);
