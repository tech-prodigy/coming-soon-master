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
	}
}
?>