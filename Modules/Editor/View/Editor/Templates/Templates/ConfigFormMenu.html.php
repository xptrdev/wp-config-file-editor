<?php
/**
* 	
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates;

# No direct access
defined('ABSPATH') or die(WCFE\NO_DIRECT_ACCESS_MESSAGE);

?>

<ul id="wcfe-config-form-main-menu">
	
	<li>
		<?php $this->_e( 'Tools' ) ?>
		<ul>
		
			<li>
				<?php $this->_e( 'Profiles' ) ?>
				<ul id="wcfe-dmm-profiles">
					<li id="wcfe-dmm-profiles-create" title="<?php $this->_e( 'Create new profile from config form fields' )?>'"><?php $this->_e( 'Create' ) ?></li>
					<li id="wcfe-dmm-profiles-list" title="<?php $this->_e( 'Manage profiles' ) ?>"><?php $this->_e( 'Profiles' ) ?></li>
					<li>-</li>
					<li id="wcfe-dmm-profiles-active-profile">
						<?php $this->_e( 'Active Profile' ) ?>
						<ul>
							<li id="wcfe-dmm-profiles-save" title="<?php $this->_e( 'Save config form fields vars into active profile' )?>"><?php $this->_e( 'Save' ) ?></li>
							<li>-</li>
							<li id="wcfe-dmm-profiles-edit" title="<?php $this->_e( 'Edit active profile description' )?>"><?php $this->_e( 'Edit' ) ?></li>
							<li id="wcfe-dmm-profiles-delete" title="<?php $this->_e( 'Delete active profile, return back to config file values, discard changes' )?>"><?php $this->_e( 'Delete' ) ?></li>
							<li id="wcfe-dmm-profiles-reload" title="<?php $this->_e( 'Reload active profile field values, discard changes' ) ?>"><?php $this->_e( 'Reload' ) ?></li>
							<li>-</li>
							<li id="wcfe-dmm-profiles-unload" title="<?php $this->_e( 'Active profile deattach. Return to config file values' ) ?>"><?php $this->_e( 'Unload' ) ?></li>
						</ul>
					</li>
				</ul>
			</li>
			
			<li>-</li>
			
			<li>
				<?php $this->_e( 'Info' ) ?>
				<ul id="wcfe-dmm-info">
					<li id="wcfe-dmm-info-paths" title="<?php $this->_e( 'Discover your installation path information' ) ?>"><?php $this->_e( 'Paths' ) ?></li>
				</ul>
			</li>
			
		  <li>-</li>

			<li id="wcfe-dmm-systemcheck" title="<?php $this->_e( 'Check system compatibility with WCFE Plugin' ) ?>"><?php $this->_e( 'System check' ) ?></li>
			
			<li>-</li>
			
			<li id="wcfe-dmm-multisite-enable"><?php $this->_e( 'Multi Sites Setup' ) ?></li>
			
			<li>-</li>
			
			<li id="wcfe-dmm-cookies-generateHash"><?php $this->_e( 'Generate Cookies Hash' ) ?></li>
			
			<li>-</li>
			
			<li>
				<?php $this->_e( 'Secure Keys' ) ?>
				<ul>
					<li id="wcfe-dmm-secure-keys-generate"><?php $this->_e( 'Generate' ) ?></li>
				
					<li id="wcfe-dmm-secure-keys-generate-all"><?php $this->_e( 'Generate all' ) ?></li>
				</ul>
			</li>
						
		</ul>
	
	</li>

	<li>
		<?php $this->_e( 'Help' ) ?>
		<ul id="wcfe-dmm-about">
			<li>
				<?php $this->_e( 'Tab' ) ?>
				<ul id="wcfe-dmm-tab">
					<li id="wcfe-dmm-tab-help" title="Active tab fields help text"><?php $this->_e( 'Fields Help' ) ?></li>
					<li id="wcfe-dmm-tab-constants-list" title="Active tab fields mapped to wp-config file constants list"><?php $this->_e( 'Constants List' ) ?></li>
				</ul>
			</li>
			<li>-</li>
			<li id="wcfe-dmm-about-contact"><?php $this->_e( 'Contact' ) ?></li>
			<li id="wcfe-dmm-about-website"><?php $this->_e( 'Web Site' ) ?></li>
			<li id="wcfe-dmm-about-support"><?php $this->_e( 'Support Forum' ) ?></li>
			<li id="wcfe-dmm-about-submit-review"><?php $this->_e( 'Submit Review' ) ?></li>
			<li>-</li>
			<li id="wcfe-dmm-about-online-help"><?php $this->_e( 'Online Docs' ) ?></li>
			<li>-</li>
			<li id="wcfe-dmm-about-info"><?php $this->_e( 'About' ) ?></li>
			<li>-</li>
			<li id="wcfe-dmm-about-follow-development"><?php $this->_e( 'Follow Development' ) ?></li>
		</ul>
	</li>
		
</ul>