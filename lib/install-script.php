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
		/*
		Class Name: dbHelper
		Description: It is used to create a database table.
		Created On: 2015-06-27 4:10
		Created By: Sonali
		*/

		if(!class_exists("dbHelper"))
		{
			class dbHelper
			{
				/*
				Function Name: insertCommand
				Parameter: yes($table_name,$data)
				Description: It is used for inserting a cammand
				Created On: 2015-06-27 4:10
				Created By: Sonali
				*/

				function insertCommand($table_name,$data)
				{
					global $wpdb;
					$wpdb->insert($table_name,$data);
					return $wpdb->insert_id;
				}

				/*
				Function Name: updateCommand
				Parameter: yes($table_name,$data,$where)
				Description: It is used for updating a cammand
				Created On: 2015-06-27 4:10
				Created By: Sonali
				*/

				function updateCommand($table_name,$data,$where)
				{
					global $wpdb;
					$wpdb->update($table_name,$data,$where);
				}

				/*
				Function Name: deleteCommand
				Parameter: yes($table_name,$where)
				Description: It is used for deleting the command
				Created On: 2015-06-27 4:10
				Created By: Sonali
				*/

				function deleteCommand($table_name,$where)
				{
					global $wpdb;
					$wpdb->delete($table_name,$where);
				}
			}
		}

		require_once ABSPATH."wp-admin/includes/upgrade.php";
		$coming_soon_master_versions_number = get_option("coming_soon_master_versions_number");

		/*
		Function Name: coming_soon_parent_table
		Parameter: No
		Description: It is used for creating a parent table.
		Created On: 2015-07-11 4:56
		Created By: Sonali
		*/

		if(!function_exists("coming_soon_parent_table"))
		{
			function coming_soon_parent_table()
			{
				$sql2 = "CREATE TABLE IF NOT EXISTS ". coming_soon_master() ."
				(
					`meta_id` int(10) NOT NULL AUTO_INCREMENT,
					`type` longtext NOT NULL,
					`parent_id` int(10) NOT NULL,
					PRIMARY KEY (`meta_id`)
				)
				ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 COLLATE= utf8_general_ci";
				dbDelta($sql2);

				$var = "INSERT INTO ". coming_soon_master() ." (`meta_id`, `type`, `parent_id`) VALUES
				(1, 'layout_settings', 0),
				(2, 'logo_settings', 1),
				(3, 'heading_settings', 1),
				(4, 'description_settings', 1),
				(5, 'footer_settings', 1),
				(6, 'favicon_settings', 1),
				(7, 'background_settings', 0),
				(8, 'countdown', 0),
				(9, 'social_media_settings', 0),
				(10, 'subscription', 0),
				(11, 'heading_settings_subscription', 10),
				(12, 'description_settings_subscription', 10),
				(13, 'button_settings_subscription', 10),
				(14, 'success_settings', 10),
				(15, 'error_settings', 10),
				(16, 'contact_form', 0),
				(17, 'label_settings', 16),
				(18, 'button_settings', 16),
				(19, 'success_message_settings', 16),
				(20, 'google_map_settings', 16),
				(21, 'general_settings', 0);";
				dbDelta($var);
			}
		}

		/*
		Function Name: coming_soon_meta_table
		Parameter: No
		Description: It is used for creating a table in database for licencing.
		Created On: 2015-07-11 4:56
		Created By: Sonali
		*/

		if(!function_exists("coming_soon_meta_table"))
		{
			function coming_soon_meta_table()
			{
				$sql1 = "CREATE TABLE IF NOT EXISTS ". coming_soon_meta() ."
				(
					`id` int(10) NOT NULL AUTO_INCREMENT,
					`meta_id` int(10) NOT NULL,
					`meta_key` varchar(200) NOT NULL,
					`meta_value` longtext NOT NULL,
					PRIMARY KEY (`id`)
				)
				ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 COLLATE= utf8_general_ci";
				dbDelta($sql1);
				$url = site_url();

				$variable = "INSERT INTO ". coming_soon_meta() ." (`id`, `meta_id`, `meta_key`, `meta_value`) VALUES
				(1, 2, 'logo', 'show'),
				(2, 2, 'logo_type', 'text'),
				(3, 2, 'logo_position', 'top'),
				(4, 2, 'logo_text', 'This is your logo Text'),
				(5, 2, 'font_style_layout', '40px,bold'),
				(6, 2, 'font_family_layout', 'Roboto Condensed'),
				(7, 2, 'font_color_layout', '#ccc'),
				(8, 2, 'margin_layout', '10,10,10,10'),
				(9, 2, 'padding_layout', '10,10,10,10'),
				(10, 2, 'logo_image', 'http://localhost/wp-coming-soon-master/wp-content/plugins/coming-soon-master/assets/admin/images/logo.png'),
				(11, 2, 'logo_link', 'show'),
				(12, 2, 'logo_link_text', '$url'),
				(13, 2, 'logo_size', 'custom'),
				(14, 2, 'max_height', '75'),
				(15, 2, 'max_width', '200'),
				(16, 3, 'heading_settings', 'show'),
				(17, 3, 'heading_text', 'Our website is coming soon...'),
				(18, 3, 'font_style_heading', '96px,bold,#ccc'),
				(19, 3, 'font_family_heading', 'Roboto Condensed'),
				(20, 3, 'heading_position', 'top'),
				(21, 3, 'margin_heading', '20,20,20,20'),
				(22, 3, 'padding_heading', '20,20,20,20'),
				(23, 4, 'description_settings', 'show'),
				(24, 4, 'description_text', 'This is your description text'),
				(25, 4, 'font_style_description', '20px,bold,#ccc'),
				(26, 4, 'font_family_description', 'Roboto Condensed'),
				(27, 4, 'description_position', 'top'),
				(28, 4, 'margin_description', '10,10,10,10'),
				(29, 4, 'padding_description', '10,10,10,10'),
				(32, 5, 'footer_settings', 'show'),
				(33, 5, 'footer_text', 'Landing Page Template 2015 All rights reserved | Designed by Coming Soon Master'),
				(34, 5, 'font_style_footer', '20px,bold,#ccc'),
				(35, 5, 'font_family_footer', 'Roboto Condensed'),
				(36, 5, 'footer_position', 'top'),
				(37, 5, 'margin_footer', '10,10,10,10'),
				(38, 5, 'padding_footer', '10,10,10,10'),
				(39, 6, 'favicon_settings', 'show'),
				(40, 6, 'upload_favicon', 'http://localhost/wp-coming-soon-master/wp-content/plugins/coming-soon-master/assets/admin/images/'),
				(41, 7, 'background_type', 'color'),
				(42, 7, 'background_color', '#000000'),
				(43, 7, 'background_color_opacity', '1'),
				(44, 7, 'background_position', 'top'),
				(45, 7, 'margin_background', '10,10,10,10'),
				(46, 7, 'padding_background', '10,10,10,10'),
				(47, 7, 'choose_background', 'http://localhost/wp-coming-soon-master/wp-content/plugins/coming-soon-master/assets/admin/images/background.png'),
				(48, 7, 'upload_image_background', 'http://localhost/wp-coming-soon-master/wp-content/plugins/coming-soon-master/assets/admin/images/ ,repeat,center,top'),
				(49, 7, 'image_overlay', 'show'),
				(50, 7, 'overlay_color_image', '#E0E0E0'),
				(51, 7, 'overlay_color_opacity_image', '1'),
				(52, 7, 'video_url', 'https://www.youtube.com'),
				(53, 7, 'video_sound', 'show'),
				(54, 7, 'player_controls', 'show'),
				(55, 7, 'video_overlay', 'show'),
				(56, 7, 'overlay_color_video', '#E0E0E0'),
				(57, 7, 'overlay_color_opacity_video', '1'),
				(58, 7, 'choose_slideshow', 'http://localhost/wp-coming-soon-master/wp-content/plugins/coming-soon-master/assets/admin/images/slideshow.png'),
				(59, 7, 'upload_image_slideshow', 'http://localhost/wp-coming-soon-master/wp-content/plugins/coming-soon-master/assets/admin/images/'),
				(60, 7, 'slideshow_effect', 'side'),
				(61, 7, 'duration', 'This is your duration'),
				(62, 7, 'slideshow_overlay', 'show'),
				(63, 7, 'overlay_color_slideshow', '#E0E0E0'),
				(64, 7, 'overlay_color_opacity_slideshow', '1'),
				(65, 8, 'countdown_timer', 'show'),
				(66, 8, 'launch_date', 'This is your launch date'),
				(67, 8, 'launch_time', '00,00,00'),
				(68, 8, 'time_zone', 'Pacific/Midway'),
				(69, 8, 'countdown_text', 'This is your countdown text'),
				(70, 8, 'font_style_countdown', '20px,bold,#ccc'),
				(71, 8, 'font_family_countdown', 'Roboto Condensed'),
				(72, 8, 'countdown_position', 'top'),
				(73, 8, 'margin_countdown', '10,10,10,10'),
				(74, 8, 'padding_countdown', '10,10,10,10'),
				(75, 9, 'email', 'https://mail.google.com'),
				(76, 9, 'website_url', 'https://www.website.com'),
				(77, 9, 'google', 'https://www.google.co.in'),
				(78, 9, 'youtube', 'https://www.youtube.com'),
				(79, 9, 'instagram', 'https://www.instagram.com'),
				(80, 9, 'pinterest', 'https://in.pinterest.com'),
				(81, 9, 'flickr', 'https://www.flickr.com'),
				(82, 9, 'google_plus', 'https://www.plus.google.com'),
				(83, 9, 'vimeo', 'https://www.vimeo.com'),
				(84, 9, 'linkedin', 'https://in.linkedin.com'),
				(85, 9, 'skype', 'https://www.skype.com'),
				(86, 9, 'tumblr', 'https://www.tumblr.com'),
				(87, 9, 'dribble', 'https://www.dribble.com'),
				(88, 9, 'github', 'https://www.github.com'),
				(89, 9, 'rss', 'https://www.rss.com'),
				(90, 9, 'facebook', 'https://www.facebook.com'),
				(91, 9, 'yahoo', 'https://in.yahoo.com'),
				(92, 9, 'blogger', 'https://www.blogger.com'),
				(93, 9, 'wordpress', 'https://www.wordpress.com'),
				(94, 9, 'myspace', 'https://www.myspace.com'),
				(95, 9, 'foursquare', 'https://www.foursquare.com'),
				(96, 9, 'livejournal', 'https://www.livejournal.com'),
				(97, 9, 'twitter', 'https://www.twitter.com'),
				(98, 9, 'deviantart', 'https://www.deviantart.com'),
				(99, 11, 'heading_settings_subscription', 'show'),
				(100, 11, 'heading_text_subscription', 'This is your heading text for subscription'),
				(101, 11, 'font_style_heading_subscription', '20px,bold,#ccc'),
				(102, 11, 'font_family_heading_subscription', 'Roboto Condensed'),
				(103, 11, 'heading_position_subscription', 'top'),
				(104, 11, 'margin_heading_subscription', '10,10,10,10'),
				(105, 11, 'padding_heading_subscription', '10,10,10,10'),
				(106, 12, 'description_settings_subscription', 'show'),
				(107, 12, 'description_text_subscription', 'This is your description text for subscription'),
				(108, 12, 'font_style_description_subscription', '20px,bold,#ccc'),
				(109, 12, 'font_family_description_subscription', 'Roboto Condensed'),
				(110, 12, 'description_position_subscription', 'top'),
				(111, 12, 'margin_description_subscription', '10,10,10,10'),
				(112, 12, 'padding_description_subscription', '10,10,10,10'),
				(113, 13, 'button_label_subscription', 'This is your label button for subscription'),
				(114, 13, 'font_style_button_subscription', '20px,bold,#ccc'),
				(115, 13, 'font_family_button_subscription', 'Roboto Condensed'),
				(116, 13, 'button_color_subscription', '#660099'),
				(117, 13, 'hover_color_button_subscription', '#6666FF'),
				(118, 13, 'label_assignment_button_subscription', 'left'),
				(119, 13, 'button_position_subscription', 'top'),
				(120, 13, 'margin_button_subscription', '10,10,10,10'),
				(121, 13, 'padding_button_subscription', '10,10,10,10'),
				(122, 14, 'success_settings_subscription', 'show'),
				(123, 14, 'success_text_subscription', 'This is your success text for subscription'),
				(124, 14, 'font_style_sucess_subscription', '20px,bold,#ccc'),
				(125, 14, 'font_family_success_subscription', 'Roboto Condensed'),
				(126, 14, 'sucess_position_subscription', 'top'),
				(127, 14, 'margin_success_subscription', '10,10,10,10'),
				(128, 14, 'padding_sucess_subscription', '10,10,10,10'),
				(129, 15, 'error_settings_subscription', 'show'),
				(130, 15, 'error_text_subscription', 'This is your error text for subscription'),
				(131, 15, 'font_style_error_subscription', '20px,bold,#ccc'),
				(132, 15, 'font_family_subscription', 'Roboto Condensed'),
				(133, 15, 'error_position_subscription', 'top'),
				(134, 15, 'margin_error_subscription', '10,10,10,10'),
				(135, 15, 'padding_error_subscription', '10,10,10,10'),
				(136, 17, 'name_field', 'show'),
				(137, 17, 'name_label', 'This is your label name'),
				(138, 17, 'email_field', 'show'),
				(139, 17, 'email_label', 'This is your email label'),
				(140, 17, 'message_field', 'show'),
				(141, 17, 'message_label', 'This is your message label'),
				(142, 17, 'font_style_label', '20px,bold,#ccc'),
				(143, 17, 'font_family_label', 'Roboto Condensed'),
				(144, 18, 'button_label_contact_form', 'This is your button label for contact form'),
				(145, 18, 'button_color_contact_form', '#660099'),
				(146, 18, 'hover_color_contact_form', '#6666FF'),
				(147, 18, 'font_style_button_contact_form', '20px,bold,#ccc'),
				(148, 18, 'font_family_button_contact_form', 'Roboto Condensed'),
				(149, 18, 'label_assignment_contact_form', 'left'),
				(150, 19, 'success_message_settings_contact_form', 'show'),
				(151, 19, 'success_message_text_contact_form', 'This is your success message text for contact form'),
				(152, 19, 'font_style_success_message_settings_contact_form', '20px,bold,#ccc'),
				(153, 19, 'font_family_success_message_settings_contact_form', 'Roboto Condensed'),
				(154, 20, 'google_map_settings', 'show'),
				(155, 20, 'located_address_by', 'formatted_address'),
				(156, 20, 'formatted_address', 'This is your formatted address'),
				(157, 20, 'area_zip_code', 'This is my area/zip code'),
				(158, 20, 'latitude', 'This is your latitude'),
				(159, 20, 'longitude', 'This is your longitude'),
				(160, 21, 'administrator_general_settings', '1'),
				(161, 21, 'author_general_settings', '0'),
				(162, 21, 'editor_general_settings', '0'),
				(163, 21, 'contributor_general_settings', '0'),
				(164, 21, 'subscriber_general_settings', '0'),
				(165, 21, 'show_coming_soon_master_top_bar_menu', 'show'),
				(166, 2, 'custom_css_logo', 'Helo');";
				dbDelta($variable);
			}
		}

		/*
		Function Name: licencing_table_for_coming_soon_master
		Parameter: No
		Description: It is used for creating a table in database for licencing.
		Created On: 2015-07-11 4:56
		Created By: Sonali
		*/

		if(!function_exists("licencing_table_for_coming_soon_master"))
		{
			function licencing_table_for_coming_soon_master()
			{
				$sql = "CREATE TABLE IF NOT EXISTS ". coming_soon_licencing() ."
				(
					`licensing_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
					`version` varchar(10) NOT NULL,
					`type` varchar(100) NOT NULL,
					`url` text NOT NULL,
					`api_key` text,
					`order_id` int(10) DEFAULT NULL,
					PRIMARY KEY (`licensing_id`)
				)
				ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";
				dbDelta($sql);
			}
		}

		$obj_dbHelper_licencing = new dbHelper();
		switch($coming_soon_master_versions_number)
		{
			case "" :
				coming_soon_parent_table();
				coming_soon_meta_table();
				licencing_table_for_coming_soon_master();
				$array=array();
				$array["version"]= "1.0";
				$array["type"]= "Coming Soon Master";
				$array["url"]= site_url();
				$obj_dbHelper_licencing->insertCommand(coming_soon_licencing(),$array);
			break;
		}
		update_option("coming_soon_master_versions_number","1.0");
	}
}
?>
