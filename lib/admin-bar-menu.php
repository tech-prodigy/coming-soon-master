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
		$wp_admin_bar->add_menu(array
		(
			"id"=>"coming_soon_master",
			"title"=>"<img src = \"".plugins_url("assets/global/img/icon.jpg",dirname(__FILE__)).
			"\" width=\"25\" height=\"25\" style=\"vertical-align:text-top; margin-top: 2px; margin-right:5px;\"./>Coming Soon Master",
			"href"=>site_url()."/wp-admin/admin.php?page=csm_coming_soon_master",
		));
	}
}
?>