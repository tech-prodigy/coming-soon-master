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
		add_menu_page("Coming Soon Master",__("Coming Soon Master",coming_soon_master),"read","csm_coming_soon_master","",plugins_url("assets/global/img/icon.jpg",dirname(__FILE__)));
		add_submenu_page("csm_coming_soon_master","Plugin Mode",__("Plugin Mode",coming_soon_master),"read","csm_coming_soon_master","csm_coming_soon_master");

		add_submenu_page("","","","read","csm_logo_settings","csm_logo_settings");
		add_submenu_page("","","","read","csm_favicon_settings","csm_favicon_settings");
		add_submenu_page("","","","read","csm_heading_settings","csm_heading_settings");
		add_submenu_page("","","","read","csm_description_settings","csm_description_settings");
		add_submenu_page("","","","read","csm_footer_settings","csm_footer_settings");

		add_submenu_page("","","","read","csm_background_settings","csm_background_settings");
		add_submenu_page("","","","read","csm_counter","csm_counter");
		add_submenu_page("","","","read","csm_social_settings","csm_social_settings");

		add_submenu_page("","","","read","csm_subscription_heading_settings","csm_subscription_heading_settings");
		add_submenu_page("","","","read","csm_subscription_description_settings","csm_subscription_description_settings");
		add_submenu_page("","","","read","csm_subscription_button_settings","csm_subscription_button_settings");
		add_submenu_page("","","","read","csm_subscription_success_settings","csm_subscription_success_settings");
		add_submenu_page("","","","read","csm_subscription_error_settings","csm_subscription_error_settings");

		add_submenu_page("","","","read","csm_label_settings","csm_label_settings");
		add_submenu_page("","","","read","csm_button_settings","csm_button_settings");
		add_submenu_page("","","","read","csm_success_message_settings","csm_success_message_settings");
		add_submenu_page("","","","read","csm_google_map_settings","csm_google_map_settings");

		add_submenu_page("","","","read","csm_general_settings","csm_general_settings");

		add_submenu_page("","","","read","csm_feature_requests","csm_feature_requests");
		add_submenu_page("","","","read","csm_premium_editions","csm_premium_editions");
		add_submenu_page("","","","read","csm_system_information","csm_system_information");
		add_submenu_page("","","","read","csm_licensing","csm_licensing");

		/*
		Function Name: csm_coming_soon_master
		Parameter: No
		Description: It is used for creating a function of wp coming soon
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_coming_soon_master"))
		{
			function csm_coming_soon_master()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/plugin-mode/plugin-mode.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/plugin-mode/plugin-mode.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_logo_settings
		Parameter: No
		Description: It is used for creating a function of logo settings
		Created On: 2015-06-30 2:50
		Created By: Sonali
		*/

		if(!function_exists("csm_logo_settings"))
		{
			function csm_logo_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/layout-settings/logo-settings/logo-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/layout-settings/logo-settings/logo-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_favicon_settings
		Parameter: No
		Description: It is used for creating a function of favicon settings
		Created On: 2015-06-30 2:50
		Created By: Sonali
		*/

		if(!function_exists("csm_favicon_settings"))
		{
			function csm_favicon_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/layout-settings/favicon-settings/favicon-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/layout-settings/favicon-settings/favicon-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_heading_settings
		Parameter: No
		Description: It is used for creating a function of heading settings
		Created On: 2015-06-30 2:50
		Created By: Sonali
		*/

		if(!function_exists("csm_heading_settings"))
		{
			function csm_heading_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/layout-settings/heading-settings/heading-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/layout-settings/heading-settings/heading-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_description_settings
		Parameter: No
		Description: It is used for creating a function of description settings
		Created On: 2015-06-30 2:50
		Created By: Sonali
		*/

		if(!function_exists("csm_description_settings"))
		{
			function csm_description_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/layout-settings/description-settings/description-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/layout-settings/description-settings/description-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_footer_settings
		Parameter: No
		Description: It is used for creating a function of footer settings
		Created On: 2015-06-30 2:50
		Created By: Sonali
		*/

		if(!function_exists("csm_footer_settings"))
		{
			function csm_footer_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/layout-settings/footer-settings/footer-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/layout-settings/footer-settings/footer-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_background_settings
		Parameter: No
		Description: It is used for creating a function for Background settings.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_background_settings"))
		{
			function csm_background_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/background-settings/background-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/background-settings/background-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_counter
		Parameter: No
		Description: It is used for creating a function for counter.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_counter"))
		{
			function csm_counter()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/countdown/countdown.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/countdown/countdown.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_social_settings
		Parameter: No
		Description: It is used for creating a function for social settings.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_social_settings"))
		{
			function csm_social_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/social-media-settings/social-media-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/social-media-settings/social-media-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_subscription_heading_settings
		Parameter: No
		Description: It is used for creating a function forsubscription.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_subscription_heading_settings"))
		{
			function csm_subscription_heading_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/subscription/heading-settings/heading-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/subscription/heading-settings/heading-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_subscription_description_settings
		Parameter: No
		Description: It is used for creating a function forsubscription.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_subscription_description_settings"))
		{
			function csm_subscription_description_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/subscription/description-settings/description-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/subscription/description-settings/description-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_subscription_button_settings
		Parameter: No
		Description: It is used for creating a function forsubscription.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_subscription_button_settings"))
		{
			function csm_subscription_button_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/subscription/button-settings/button-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/subscription/button-settings/button-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_subscription_success_settings
		Parameter: No
		Description: It is used for creating a function forsubscription.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_subscription_success_settings"))
		{
			function csm_subscription_success_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/subscription/success-settings/success-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/subscription/success-settings/success-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_subscription_error_settings
		Parameter: No
		Description: It is used for creating a function forsubscription.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_subscription_error_settings"))
		{
			function csm_subscription_error_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/subscription/error-settings/error-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/subscription/error-settings/error-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_label_settings
		Parameter: No
		Description: It is used for creating a function for contact form.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_label_settings"))
		{
			function csm_label_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/contact-form/label-settings/label-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/contact-form/label-settings/label-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_button_settings
		Parameter: No
		Description: It is used for creating a function for contact form.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_button_settings"))
		{
			function csm_button_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/contact-form/button-settings/button-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/contact-form/button-settings/button-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_success_message_settings
		Parameter: No
		Description: It is used for creating a function for contact form.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_success_message_settings"))
		{
			function csm_success_message_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php"))
				{
					$web_font_list = include_once COMING_SOON_MASTER_DIR_PATH."lib/web-fonts.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/contact-form/success-message-settings/success-message-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/contact-form/success-message-settings/success-message-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_google_map_settings
		Parameter: No
		Description: It is used for creating a function for contact form.
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_google_map_settings"))
		{
			function csm_google_map_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/contact-form/google-map-settings/google-map-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/contact-form/google-map-settings/google-map-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_general_settings
		Parameter: No
		Description: It is used for creating a function of plugin settings
		Created On: 2015-07-02 3:00
		Created By: Sonali
		*/

		if(!function_exists("csm_general_settings"))
		{
			function csm_general_settings()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/general-settings/general-settings.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/general-settings/general-settings.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_feature_requests
		Parameter: No
		Description: It is used for creating a function of wp coming soon
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_feature_requests"))
		{
			function csm_feature_requests()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/feature-requests/feature-requests.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/feature-requests/feature-requests.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_premium_editions
		Parameter: No
		Description: It is used for creating a function of wp coming soon
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_premium_editions"))
		{
			function csm_premium_editions()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/premium-editions/premium-editions.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/premium-editions/premium-editions.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_system_information
		Parameter: No
		Description: It is used for creating a function of wp coming soon
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_system_information"))
		{
			function csm_system_information()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/system-information/system-information.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/system-information/system-information.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: csm_licensing
		Parameter: No
		Description: It is used for creating a function of wp coming soon
		Created On: 2015-06-24 11:30
		Created By: Sonali
		*/

		if(!function_exists("csm_licensing"))
		{
			function csm_licensing()
			{
				global $wpdb,$current_user,$user_role_permission;
				if(is_super_admin())
				{
					$csm_role = "administrator";
				}
				else
				{
					$csm_role = $wpdb->prefix . "capabilities";
					$current_user->role = array_key($current_user->$csm_role);
					$csm_role = $current_user->role[0];
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/header.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/queries.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."views/licensing/licensing.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."views/licensing/licensing.php";
				}
				if(file_exists(COMING_SOON_MASTER_DIR_PATH."includes/footer.php"))
				{
					include_once COMING_SOON_MASTER_DIR_PATH."includes/footer.php";
				}
			}
		}
	}
}
?>