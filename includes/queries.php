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
		$obj_dbHelper = new dbHelper();

		if(isset($_REQUEST["page"]))
		{
			switch(esc_attr($_REQUEST["page"]))
			{
				case "csm_coming_soon_master":

				break;

				case "csm_logo_settings":
					$logo_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"logo_settings"
						)
					);

					$meta_data_array = array();
					foreach($logo_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_favicon_settings":
					$favicon_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"favicon_settings"
						)
					);

					$meta_data_array = array();
					foreach($favicon_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_heading_settings":
					$heading_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"heading_settings"
						)
					);

					$meta_data_array = array();
					foreach($heading_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_description_settings":
					$description_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"description_settings"
						)
					);

					$meta_data_array = array();
					foreach($description_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_footer_settings":
					$footer_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"footer_settings"
						)
					);

					$meta_data_array = array();
					foreach($footer_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_background_settings":
					$background_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"background_settings"
						)
					);

					$meta_data_array = array();
					foreach($background_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_counter":
					$countdown_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"countdown"
						)
					);

					$meta_data_array = array();
					foreach($countdown_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_social_settings":
					$social_media_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"social_media_settings"
						)
					);

					$meta_data_array = array();
					foreach($social_media_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_subscription_heading_settings":
					$heading_settings_subscription_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"heading_settings_subscription"
						)
					);

					$meta_data_array = array();
					foreach($heading_settings_subscription_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_subscription_description_settings":
					$description_settings_subscription_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"description_settings_subscription"
						)
					);

					$meta_data_array = array();
					foreach($description_settings_subscription_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_subscription_button_settings":
					$button_settings_subscription_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"button_settings_subscription"
						)
					);

					$meta_data_array = array();
					foreach($button_settings_subscription_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_subscription_heading_settings":
					$heading_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"heading_settings"
						)
					);

					$meta_data_array = array();
					foreach($heading_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_subscription_success_settings":
					$success_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"success_settings"
						)
					);

					$meta_data_array = array();
					foreach($success_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_subscription_error_settings":
					$error_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"error_settings"
						)
					);

					$meta_data_array = array();
					foreach($error_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_label_settings":
					$label_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"label_settings"
						)
					);

					$meta_data_array = array();
					foreach($label_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_button_settings":
					$button_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"button_settings"
						)
					);

					$meta_data_array = array();
					foreach($button_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_success_message_settings":
					$success_message_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"success_message_settings"
						)
					);

					$meta_data_array = array();
					foreach($success_message_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_google_map_settings":
					$google_map_settings_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT " . coming_soon_meta() . ".meta_key, " . coming_soon_meta() . ".meta_value FROM " . coming_soon_meta(). " INNER JOIN ".coming_soon_master().
							" ON ".coming_soon_master().".meta_id = ".coming_soon_meta().".meta_id WHERE "
							.coming_soon_master().".type = %s",
							"google_map_settings"
						)
					);

					$meta_data_array = array();
					foreach($google_map_settings_data as $row)
					{
						$meta_data_array["$row->meta_key"] = $row->meta_value;
					}
				break;

				case "csm_general_settings":

				break;

				case "csm_feature_requests":

				break;

				case "csm_premium_editions":

				break;

				case "csm_system_information":

				break;

				case "csm_licensing":
					$csm_licensing = $wpdb->get_row
					(
						"SELECT * FROM " . coming_soon_licencing()
					);
				break;
			}
		}
	}
}
?>
