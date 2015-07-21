<?php
if(!is_user_logged_in())
{
	return;
}
else
{
	switch($csm_role)
	{
		case "administrator":
			$user_role_permission = "manage_options";
		break;

		case "author":
			$user_role_permission = "publish_posts";
		break;

		case "editor":
			$user_role_permission = "publish_pages";
		break;

		case "contributor":
			$user_role_permission = "edit_posts";
		break;

		case "subscriber":
			$user_role_permission = "read";
		break;
	}
	if(!current_user_can($user_role_permission))
	{
		return;
	}
	else
	{
		?>
		<div class="page-sidebar-wrapper">
			<div class="page-sidebar navbar-collapse collapse">
				<ul class="page-sidebar-menu" data-slide-speed="200">
					<li class="sidebar-search-wrapper" style="padding:20px;text-align:center">
						<a class="gm-logo" href="http://tech-prodigy.org/" target="_blank">
							<img src="" width="200px"/>
						</a>
					</li>
					<li class="" id="ux_li_plugin_mode">
						<a href="admin.php?page=csm_coming_soon_master">
							<i class="icon-puzzle"></i>
							<span class="title">
								<?php _e("Plugin Mode",coming_soon_master); ?>
							</span>
						</a>
					</li>
					<li class="" id="ux_li_layout_settings">
						<a href="javascript:;">
							<i class="icon-screen-tablet"></i>
							<span class="title">
								<?php _e("Layout Settings",coming_soon_master); ?>
							</span>
						</a>
						<ul class="sub-menu">
							<li id="ux_li_logo_settings">
								<a href="admin.php?page=csm_logo_settings">
									<i class="icon-plus"></i>
									<?php _e("Logo Settings",coming_soon_master); ?>
								</a>
							</li>
							<li id="ux_li_heading_settings">
								<a href="admin.php?page=csm_heading_settings">
									<i class="icon-layers"></i>
									<?php _e("Heading Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_description_settings">
								<a href="admin.php?page=csm_description_settings">
									<i class="icon-plus"></i>
									<?php _e("Description Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_footer_settings">
								<a href="admin.php?page=csm_footer_settings">
									<i class="icon-layers"></i>
									<?php _e("Footer Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_favicon_settings">
								<a href="admin.php?page=csm_favicon_settings">
									<i class="icon-plus"></i>
									<?php _e("FavIcon Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
						</ul>
					</li>
					<li class="" id="ux_li_background_settings">
						<a href="admin.php?page=csm_background_settings">
							<i class="icon-picture"></i>
							<span class="title">
								<?php _e("Background Settings",coming_soon_master); ?>
							</span>
							<span class="arrow-custom"></span>
						</a>
					</li>
					<li class="" id="ux_li_counter">
						<a href="admin.php?page=csm_counter">
							<i class="icon-calculator"></i>
							<span class="title">
								<?php _e("Countdown",coming_soon_master); ?>
							</span>
						</a>
					</li>
					<li class="" id="ux_li_social_settings">
						<a href="admin.php?page=csm_social_settings">
							<i class="icon-social-twitter"></i>
							<span class="title">
								<?php _e("Social Media Settings",coming_soon_master); ?>
							</span>
						</a>
					</li>
					<li class="" id="ux_li_subscription">
						<a href="javascript:;">
							<i class="icon-feed"></i>
							<span class="title">
								<?php _e("Subscription",coming_soon_master); ?>
							</span>
						</a>
						<ul class="sub-menu">
							<li id="ux_li_subscription_heading_settings">
								<a href="admin.php?page=csm_subscription_heading_settings">
									<i class="icon-plus"></i>
									<?php _e("Heading Settings",coming_soon_master); ?>
								</a>
							</li>
							<li id="ux_li_subscription_description_settings">
								<a href="admin.php?page=csm_subscription_description_settings">
									<i class="icon-layers"></i>
									<?php _e("Description Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_subscription_button_settings">
								<a href="admin.php?page=csm_subscription_button_settings">
									<i class="icon-plus"></i>
									<?php _e("Button Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_subscription_success_settings">
								<a href="admin.php?page=csm_subscription_success_settings">
									<i class="icon-layers"></i>
									<?php _e("Success Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_subscription_error_settings">
								<a href="admin.php?page=csm_subscription_error_settings">
									<i class="icon-plus"></i>
									<?php _e("Error Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
						</ul>
					</li>
					<li class="" id="ux_li_contact_form">
						<a href="javascript:;">
							<i class="icon-note"></i>
							<span class="title">
								<?php _e("Contact Form",coming_soon_master); ?>
							</span>
						</a>
						<ul class="sub-menu">
							<li id="ux_li_label_settings">
								<a href="admin.php?page=csm_label_settings">
									<i class="icon-plus"></i>
									<?php _e("Label Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_button_settings">
								<a href="admin.php?page=csm_button_settings">
									<i class="icon-layers"></i>
									<?php _e("Button Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_success_message_settings">
								<a href="admin.php?page=csm_success_message_settings">
									<i class="icon-plus"></i>
									<?php _e("Success Message Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
							<li id="ux_li_google_map_settings">
								<a href="admin.php?page=csm_google_map_settings">
									<i class="icon-layers"></i>
									<?php _e("Google Map Settings",coming_soon_master); ?>
									<span class="badge badge-warning badge-roundless"></span>
								</a>
							</li>
						</ul>
					</li>
					<li class="" id="ux_li_general_settings">
						<a href="admin.php?page=csm_general_settings">
							<i class="icon-settings"></i>
							<span class="title">
								<?php _e("General Settings",coming_soon_master); ?>
							</span>
						</a>
					</li>
					<li class="" id="ux_li_feature_requests">
						<a href="admin.php?page=csm_feature_requests">
							<i class="icon-call-out"></i>
							<span class="title">
								<?php _e("Feature Requests",coming_soon_master); ?>
							</span>
						</a>
					</li>
					<li class="" id="ux_li_premium_editions">
						<a href="admin.php?page=csm_premium_editions">
							<i class="icon-briefcase"></i>
							<span class="title">
								<?php _e("Premium Editions",coming_soon_master); ?>
							</span>
						</a>
					</li>
					<li class="" id="ux_li_system_information">
						<a href="admin.php?page=csm_system_information">
							<i class="icon-screen-desktop"></i>
							<span class="title">
								<?php _e("System Information",coming_soon_master); ?>
							</span>
						</a>
					</li>
					<li class="" id="ux_li_licensing">
						<a href="admin.php?page=csm_licensing">
							<i class="icon-key"></i>
							<span class="title">
								<?php _e("Licensing",coming_soon_master); ?>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	<?php
	}
}
?>