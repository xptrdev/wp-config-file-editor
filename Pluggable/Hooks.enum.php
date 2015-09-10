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
	
}