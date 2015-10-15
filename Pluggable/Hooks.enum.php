<?php
/**
* 
*/

namespace WCFE;

/**
* 
*/
abstract class Hooks
{

	const ACTION_PLUGIN_BINDING_HOOKS = 'wcfe_plugin-binding-hooks';
	const ACTION_PLUGIN_LOADED = 'wcfe_plugin-loaded';
	
	const FILTER_MODEL_EDITOR_FORM_FIELDS = 'wcfe_model-editor-form-fields';
	const FILTER_MODEL_EDITOR_GENERATOR_FIELDS = 'wcfe_model-editor-generator-fields';
	const FILTER_MODEL_EDITOR_REGISTER_FIELDS = 'wcfe_model-editor-register-fields';
	
	const FILTER_VIEW_TABS_REGISTER_TABS = 'wcfe_view-tabs-register-tabs';
	
	const FILTER_VIEW_TABS_TAB_DATABASE_FIELDS = 'wcfe_view-tabs-tab-database-fields';
	const FILTER_VIEW_TABS_TAB_DEVELOPER_FIELDS = 'wcfe_view-tabs-tab-developer-fields';
	const FILTER_VIEW_TABS_TAB_LOCALIZATION_FIELDS = 'wcfe_view-tabs-tab-localization-fields';
	const FILTER_VIEW_TABS_TAB_MAINTENANCE_FIELDS = 'wcfe_view-tabs-tab-maintenance-fields';
	const FILTER_VIEW_TABS_TAB_MULTISITE_FIELDS = 'wcfe_view-tabs-tab-multisite-fields';
	const FILTER_VIEW_TABS_TAB_SECUREKEYS_FIELDS = 'wcfe_view-tabs-tab-securekeys-fields';
	const FILTER_VIEW_TABS_TAB_POST_FIELDS = 'wcfe_view-tabs-tab-post-fields';
	const FILTER_VIEW_TABS_TAB_CRON_FIELDS = 'wcfe_view-tabs-tab-cron-fields';
	const FILTER_VIEW_TABS_TAB_SECURITY_FIELDS = 'wcfe_view-tabs-tab-security-fields';
	const FILTER_VIEW_TABS_TAB_PATHS_FIELDS = 'wcfe_view-tabs-tab-paths-fields';
	const FILTER_VIEW_TABS_TAB_UPGRADE_FIELDS = 'wcfe_view-tabs-tab-upgrade-fields';
	const FILTER_VIEW_TABS_TAB_PROXY_FIELDS = 'wcfe_view-tabs-tab-proxy-fields';
	const FILTER_VIEW_TABS_TAB_COOKIES_FIELDS = 'wcfe_view-tabs-tab-cookies-fields';
	
	# SYS Filters Hooks 
	const FILTER_VIEW_TABS_SYSFILTERS_REGISTER_TABS = 'wcfe_view-tabs-sysfilters-register-tabs';
	const FILTER_VIEW_TABS_TAB_SYSFILTERS_HTTP_FIELDS = 'wcfe_view-tabs-tab-sysfilters-http-fields';
	const FILTER_VIEW_TABS_TAB_SYSFILTERS_EDITOR_FIELDS = 'wcfe_view-tabs-tab-sysfilters-editor-fields';
	const FILTER_VIEW_TABS_TAB_SYSFILTERS_MISC_FIELDS = 'wcfe_view-tabs-tab-sysfilters-misc-fields';
	const FILTER_VIEW_TABS_TAB_SYSFILTERS_KSES_FIELDS = 'wcfe_view-tabs-tab-sysfilters-kses-fields';
}
