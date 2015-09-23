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
		Tools
		<ul>
		
			<li>
				Profiles
				<ul id="wcfe-dmm-profiles">
					<li id="wcfe-dmm-profiles-create" title="Create new profile from config form fields">Create</li>
					<li id="wcfe-dmm-profiles-list" title="Manage profiles">Profiles</li>
					<li>-</li>
					<li id="wcfe-dmm-profiles-active-profile">
						Active Profile
						<ul>
							<li id="wcfe-dmm-profiles-save" title="Save config form fields vars into active profile">Save</li>
							<li>-</li>
							<li id="wcfe-dmm-profiles-edit" title="Edit active profile description">Edit</li>
							<li id="wcfe-dmm-profiles-delete" title="Delete active profile, return back to config file values, discard changes">Delete</li>
							<li id="wcfe-dmm-profiles-reload" title="Reload active profile field values, discard changes">Reload</li>
							<li>-</li>
							<li id="wcfe-dmm-profiles-unload" title="Active profile deattach. Return to config file values">Unload</li>
						</ul>
					</li>
				</ul>
			</li>
			
			<li>-</li>
			
			<li>
				Info
				<ul id="wcfe-dmm-info">
					<li id="wcfe-dmm-info-paths" title="Discover your installation path information">Paths</li>
				</ul>
			</li>
			
		  <li>-</li>

			<li id="wcfe-dmm-systemcheck" title="Check system compatibility with WCFE Plugin">System check <span class="beta-feature">( BETA )</span></li>
			
			<li>-</li>
			
			<li id="wcfe-dmm-multisite-enable">Multi Sites Setup <span class="beta-feature">( BETA )</span></li>
			
			<li>-</li>
			
			<li id="wcfe-dmm-cookies-generateHash">Generate Cookies Hash</li>
			
			<li>-</li>
			
			<li>
				Secure Keys
				<ul>
					<li id="wcfe-dmm-secure-keys-generate">Generate</li>
				
					<li id="wcfe-dmm-secure-keys-generate-all">Generate all</li>
				</ul>
			</li>
						
		</ul>
	
	</li>

	<li>
		Help
		<ul id="wcfe-dmm-about">
			<li>
				Tab
				<ul id="wcfe-dmm-tab">
					<li id="wcfe-dmm-tab-help" title="Active tab fields help text">Fields Help</li>
					<li id="wcfe-dmm-tab-constants-list" title="Active tab fields mapped to wp-config file constants list">Constants List</li>
				</ul>
			</li>
			<li>-</li>
			<li id="wcfe-dmm-about-contact">Contact</li>
			<li id="wcfe-dmm-about-website">Web Site</li>
			<li id="wcfe-dmm-about-support">Support Forum</li>
			<li id="wcfe-dmm-about-submit-review">Submit Review</li>
			<li>-</li>
			<li id="wcfe-dmm-about-online-help">Online Docs</li>
			<li>-</li>
			<li id="wcfe-dmm-about-info">About</li>
			<li>-</li>
			<li id="wcfe-dmm-about-follow-development">Follow Development</li>
		</ul>
	</li>
		
</ul>