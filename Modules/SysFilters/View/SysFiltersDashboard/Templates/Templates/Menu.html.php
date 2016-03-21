<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Templates\Templates;

# No direct access
defined('ABSPATH') or die(WCFE\NO_DIRECT_ACCESS_MESSAGE);

?>

<ul id="wcfe-config-form-main-menu">

	<li>
		<?php $this->_e( 'Tools' ) ?>
		<ul>
			<li id="wcfe-dmm-tab-help" title="Fields help"><?php $this->_e( 'Help' ) ?></li>
			<li>-</li>
			<li id="wcfe-dmm-tab-control-options" title="Internel Filters control options"><?php $this->_e( 'Control options' ) ?></li>
		</ul>
	
	</li>
	
</ul>