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
		if(isset($_REQUEST["param"]))
		{
			$obj_dbHelper = new dbHelper();
			switch($_REQUEST["param"])
			{
				case "licensing_module" :
					if(wp_verify_nonce($_REQUEST["_wp_nonce"], "coming_soon_master_licensing"))
					{
						parse_str($_REQUEST["data"],$form_data);
						$update_license = array();
						$where = array();

						$update_license["url"] = site_url();
						$update_license["api_key"] = esc_attr($form_data["ux_txt_api_key"]);
						$update_license["order_id"] = intval($form_data["ux_txt_order_id"]);
						$where["licensing_id"] = intval($_REQUEST["license_id"]);
						$obj_dbHelper->updateCommand(coming_soon_licencing(),$update_license,$where);
					}
					die();
				break;
				case "logo_settings_module" :
					if(wp_verify_nonce($_REQUEST["_wp_nonce"], "coming_soon_master_logo_settings"))
					{
						parse_str($_REQUEST["data"],$form_data);
						$update_logo_settings = array();
						$where = array();

						$update_logo_settings["logo"] = esc_attr($form_data["ux_ddl_font_logo"]);
						$update_logo_settings["logo_type"] = esc_attr($form_data["ux_ddl_font_logo_type"]);
						$update_logo_settings["logo_position"] = esc_attr($form_data["ux_ddl_logo_position"]);
						$update_logo_settings["logo_text"] = esc_attr($form_data["ux_txt_Logo_type"]);
						$update_logo_settings["font_style_layout"] = esc_attr(implode(",",$form_data["ux_ddl_font_style_logo"]));
						$update_logo_settings["font_family_layout"] = esc_attr($form_data["ux_ddl_font_family"]);
						$update_logo_settings["font_color_layout"] = esc_attr($form_data["ux_txt_font_color"]);
						$update_logo_settings["margin_layout"] = esc_attr(implode(",",$form_data["ux_txt_logo_margin_text"]));
						$update_logo_settings["padding_layout"] = esc_attr(implode(",",$form_data["ux_txt_logo_padding_text"]));
						$update_logo_settings["logo_image"] = esc_attr($form_data["ux_txt_logo_text"]);
						$update_logo_settings["logo_link"] = esc_attr($form_data["ux_ddl_logo_link"]);
						$update_logo_settings["logo_link_text"] = esc_attr($form_data["ux_txt_logo_link"]);
						$update_logo_settings["logo_size"] = esc_attr($form_data["ux_ddl_font_logo_size"]);
						$update_logo_settings["max_height"] = esc_attr($form_data["ux_txt_width"]);
						$update_logo_settings["max_width"] = esc_attr($form_data["ux_txt_height"]);
						$update_logo_settings["custom_css_logo"] = esc_attr($form_data["ux_txtarea_css_logo"]);
						

						foreach($update_logo_settings as $keys => $value)
						{
							$update_logo_value = array();
							$where["meta_key"] = $keys;
							$update_logo_value["meta_value"] = $value;
							$obj_dbHelper->updateCommand(coming_soon_meta(),$update_logo_value,$where);
						}
					}
					die();
				break;

				case "heading_settings_module" :
					if(wp_verify_nonce($_REQUEST["_wp_nonce"], "coming_soon_master_heading_settings"))
					{
						parse_str($_REQUEST["data"],$form_data);
						$update_heading_settings = array();
						$where = array();
						
						$update_heading_settings["heading_settings"] = esc_attr($form_data["ux_ddl_heading_settings"]);
						$update_heading_settings["heading_text"] = esc_attr($form_data["ux_heading_content"]);
						$update_heading_settings["font_style_heading"] = esc_attr(implode(",",$form_data["ux_ddl_font_style_heading"]));
						$update_heading_settings["font_family_heading"] = esc_attr($form_data["ux_ddl_font_family_heading"]);
						$update_heading_settings["heading_position"] = esc_attr($form_data["ux_ddl_heading_position"]);
						$update_heading_settings["margin_heading"] = esc_attr(implode(",",$form_data["ux_txt_heading_margin_text"]));
						$update_heading_settings["padding_heading"] = esc_attr(implode(",",$form_data["ux_txt_heading_padding_text"]));
						
						foreach($update_heading_settings as $keys => $value)
						{
							$update_heading_value = array();
							$where["meta_key"] = $keys;
							$update_heading_value["meta_value"] = $value;
							$obj_dbHelper->updateCommand(coming_soon_meta(),$update_heading_value,$where);
						}
					}
					die();
				break;
				
				case "description_settings_module" :
					if(wp_verify_nonce($_REQUEST["_wp_nonce"], "coming_soon_master_description_settings"))
					{
						parse_str($_REQUEST["data"],$form_data);
						$update_description_settings = array();
						$where = array();
				
						$update_description_settings["description_settings"] = esc_attr($form_data["ux_ddl_description_settings"]);
						$update_description_settings["description_text"] = esc_attr($form_data["ux_description_content"]);
						$update_description_settings["font_style_description"] = esc_attr(implode(",",$form_data["ux_ddl_font_style_des"]));
						$update_description_settings["font_family_description"] = esc_attr($form_data["ux_ddl_font_family_description"]);
						$update_description_settings["description_position"] = esc_attr($form_data["ux_ddl_description_position"]);
						$update_description_settings["margin_description"] = esc_attr(implode(",",$form_data["ux_txt_des_margin_text"]));
						$update_description_settings["padding_description"] = esc_attr(implode(",",$form_data["ux_txt_des_padding_text"]));
				
						foreach($update_description_settings as $keys => $value)
						{
							$update_description_value = array();
							$where["meta_key"] = $keys;
							$update_description_value["meta_value"] = $value;
							$obj_dbHelper->updateCommand(coming_soon_meta(),$update_description_value,$where);
						}
					}
					die();
				break;
				
				case "footer_settings_module" :
					if(wp_verify_nonce($_REQUEST["_wp_nonce"], "coming_soon_master_footer_settings"))
					{
						parse_str($_REQUEST["data"],$form_data);
						$update_footer_settings = array();
						$where = array();
				
						$update_footer_settings["footer_settings"] = esc_attr($form_data["ux_ddl_footer_settings"]);
						$update_footer_settings["footer_text"] = esc_attr($form_data["ux_footer_content"]);
						$update_footer_settings["font_style_footer"] = esc_attr(implode(",",$form_data["ux_ddl_font_style_ftr"]));
						$update_footer_settings["font_family_footer"] = esc_attr($form_data["ux_ddl_font_family_footer"]);
						$update_footer_settings["footer_position"] = esc_attr($form_data["ux_ddl_footer_position"]);
						$update_footer_settings["margin_footer"] = esc_attr(implode(",",$form_data["ux_txt_footer_margin_text"]));
						$update_footer_settings["padding_footer"] = esc_attr(implode(",",$form_data["ux_txt_footer_padding_text"]));
				
						foreach($update_footer_settings as $keys => $value)
						{
							$update_footer_settings = array();
							$where["meta_key"] = $keys;
							$update_footer_value["meta_value"] = $value;
							$obj_dbHelper->updateCommand(coming_soon_meta(),$update_footer_value,$where);
						}
					}
					die();
				break;
				
				case "favicon_settings_module" :
					if(wp_verify_nonce($_REQUEST["_wp_nonce"], "coming_soon_master_favicon_settings"))
					{
						parse_str($_REQUEST["data"],$form_data);
						$update_favicon_settings = array();
						$where = array();
				
						$update_favicon_settings["favicon_settings"] = esc_attr($form_data["ux_ddl_favicon_settings"]);
						$update_favicon_settings["upload_favicon"] = esc_attr($form_data["ux_txt_upload"]);
						
						foreach($update_favicon_settings as $keys => $value)
						{
							$update_favicon_settings = array();
							$where["meta_key"] = $keys;
							$update_favicon_value["meta_value"] = $value;
							$obj_dbHelper->updateCommand(coming_soon_meta(),$update_favicon_value,$where);
						}
					}
					die();
				break;
			}
		}
	}
}
?>