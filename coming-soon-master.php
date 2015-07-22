<?php
/*
Plugin Name: Coming Soon Master
Plugin URI: http://tech-prodigy.org
Description:
Author: tech-prodigy
Author URI: http://tech-prodigy.org
Version: 1.0
License: GPLv3
*/

/* Constant Declaration */

if(!defined("COMING_SOON_MASTER_DIR_PATH")) define("COMING_SOON_MASTER_DIR_PATH",plugin_dir_path(__FILE__));
if(!defined("COMING_SOON_MASTER_URL_PATH")) define("COMING_SOON_MASTER_URL_PATH",plugins_url(__FILE__));
if(!defined("coming_soon_master")) define("coming_soon_master","coming-soon-master");

/* Constant Declaration */

/*
Function Name: install_script_for_coming_soon_master
Parameter: No
Description: It is used for creating a table in database.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("install_script_for_coming_soon_master"))
{
	function install_script_for_coming_soon_master()
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
		if(is_multisite())
		{
			$blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach($blog_ids as $blog_id)
			{
				switch_to_blog($blog_id);
				if(file_exists(COMING_SOON_MASTER_DIR_PATH. "lib/install-script.php"))
				{
					include COMING_SOON_MASTER_DIR_PATH . "lib/install-script.php";
				}
				restore_current_blog();
			}
		}
		else
		{
			if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/install-script.php"))
			{
				include_once COMING_SOON_MASTER_DIR_PATH."lib/install-script.php";
			}
		}
	}
}


/*
Function Name: js_backend_for_coming_soon_master
Parameter: No
Description: It is used for creating a js backend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("js_backend_for_coming_soon_master"))
{
	function js_backend_for_coming_soon_master()
	{
		wp_enqueue_script("jquery");
		wp_enqueue_script("jquery-ui-datepicker");
		wp_enqueue_script("bootstrap.js",plugins_url("assets/global/plugins/bootstrap/js/bootstrap.js",__FILE__));
		wp_enqueue_script("bootstrap-tabdrop.js",plugins_url("assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js",__FILE__));
		wp_enqueue_script("jquery.validate.js",plugins_url("assets/global/plugins/validation/jquery.validate.js",__FILE__));
		wp_enqueue_script("jquery.dataTables.min.js",plugins_url("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js",__FILE__));
		wp_enqueue_script("dataTables.bootstrap.js",plugins_url("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js",__FILE__));
		wp_enqueue_script("toastr.min.js",plugins_url("assets/global/plugins/bootstrap-toastr/toastr.min.js",__FILE__));
		wp_enqueue_script("colpick.js",plugins_url("assets/global/plugins/colorpicker/colpick.js",__FILE__));
		wp_enqueue_script("maps_script.js","https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyAvnFceWIy9ccuH6-M_RnjiEgRsmp1xC2g");
	}
}

/*
Function Name: css_backend_for_coming_soon_master
Parameter: No Parameters
Description: It is used for creating a css backend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("css_backend_for_coming_soon_master"))
{
	function css_backend_for_coming_soon_master()
	{
		wp_enqueue_style("simple-line-icons.css", plugins_url("assets/global/plugins/simple-line-icons/simple-line-icons.css",__FILE__));
		wp_enqueue_style("bootstrap.css", plugins_url("assets/global/plugins/bootstrap/css/bootstrap.css",__FILE__));
		wp_enqueue_style("components.css", plugins_url("assets/global/css/components.css",__FILE__));
		wp_enqueue_style("plugins.css", plugins_url("assets/global/css/plugins.css",__FILE__));
		wp_enqueue_style("layout.css", plugins_url("assets/admin/layout/css/layout.css",__FILE__));
		wp_enqueue_style("coming-soon-default.css", plugins_url("assets/admin/layout/css/themes/default.css",__FILE__));
		wp_enqueue_style("coming-soon-custom.css", plugins_url("assets/admin/layout/css/custom.css",__FILE__));
		wp_enqueue_style("pricing-table.css", plugins_url("assets/admin/pages/css/pricing-table.css",__FILE__));
		wp_enqueue_style("dataTables.bootstrap.css",plugins_url("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css",__FILE__));
		wp_enqueue_style("toastr.min.css", plugins_url("assets/global/plugins/bootstrap-toastr/toastr.min.css",__FILE__));
		wp_enqueue_style("jquery-ui.css", plugins_url("assets/global/plugins/datepicker/jquery-ui.css",__FILE__));
		wp_enqueue_style("colpick.css", plugins_url("assets/global/plugins/colorpicker/colpick.css",__FILE__));
	}
}

/*
Function Name: js_frontend_for_coming_soon_master
Parameter: No
Description: It is used for creating a js frontend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("js_frontend_for_coming_soon_master"))
{
	function js_frontend_for_coming_soon_master()
	{
		wp_enqueue_script("jquery");
	}
}

/*
Function Name: css_frontend_for_coming_soon_master
Parameter: No
Description: It is used for creating a css frontend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("css_frontend_for_coming_soon_master"))
{
	function css_frontend_for_coming_soon_master()
	{
		wp_enqueue_style("");
	}
}

/*
Function Name: side_bar_menu_for_coming_soon_master
Parameter: No
Description: It is used for creating a function for side bar menu.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("side_bar_menu_for_coming_soon_master"))
{
	function side_bar_menu_for_coming_soon_master()
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
		if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/sidebar-menu.php"))
		{
			include_once COMING_SOON_MASTER_DIR_PATH."lib/sidebar-menu.php";
		}
	}
}

/*
Function Name: top_bar_menu_for_coming_soon_master
Parameter: 1($meta=true)
Description: It is used for creating a function for admin top bar menu.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("top_bar_menu_for_coming_soon_master"))
{
	function top_bar_menu_for_coming_soon_master($meta=true)
	{
		global $wpdb,$current_user,$user_role_permission,$wp_admin_bar;
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

		if(file_exists(COMING_SOON_MASTER_DIR_PATH . "lib/admin-bar-menu.php"))
		{
			include_once COMING_SOON_MASTER_DIR_PATH . "lib/admin-bar-menu.php";
		}
	}
}

/*
Function Name: licencing_table_for_coming_soon_master
Parameter: No
Description: It is used for creating a table
Created On: 2015-07-11 4:25
Created By: Sonali
*/

if(!function_exists("coming_soon_licencing"))
{
	function coming_soon_licencing()
	{
		global $wpdb;
		return $wpdb->prefix . "coming_soon_licencing";
	}
}

/*
Function Name: wp_coming_soon_meta
Parameter: No
Description: It is used for creating a meta table
Created On: 2015-07-13 10:09
Created By: Sonali
*/

if(!function_exists("coming_soon_meta"))
{
	function coming_soon_meta()
	{
		global $wpdb;
		return $wpdb->prefix . "coming_soon_meta";
	}
}

/*
Function Name: wp_coming_soon_master
Parameter: No
Description: It is used for creating a parent table
Created On: 2015-07-11 4:25
Created By: Sonali
*/

if(!function_exists("coming_soon_master"))
{
	function coming_soon_master()
	{
		global $wpdb;
		return $wpdb->prefix . "coming_soon_master";
	}
}

/*
Function Name: helper_class_for_coming_soon_master
Parameter: No
Description: It is used for helper class.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("helper_class_for_coming_soon_master"))
{
	function helper_class_for_coming_soon_master()
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
		if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/helper.php"))
		{
			include_once COMING_SOON_MASTER_DIR_PATH."lib/helper.php";
		}

	}
}

/*
Function Name: create_ajax_library_for_coming_soon_master
Parameter: No
Description: It is used for creating an ajax.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

if(!function_exists("create_ajax_library_for_coming_soon_master"))
{
	function create_ajax_library_for_coming_soon_master()
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
		if(isset($_REQUEST["action"]))
		{
			switch($_REQUEST["action"])
			{
				case "coming_soon_master" :
					if(file_exists(COMING_SOON_MASTER_DIR_PATH."lib/action-library.php"))
					{
						include_once COMING_SOON_MASTER_DIR_PATH."lib/action-library.php";
					}
				break;
			}
		}
	}
}


/* Hook */

/*
register_activation_hook: It is used for activate the plugin
Created On: 2015-06-24 11:30
Created By: Sonali
*/

register_activation_hook(__FILE__,"install_script_for_coming_soon_master");


/*
add_action: It is used  for calling the js backend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("admin_init","js_backend_for_coming_soon_master");

/*
add_action: It is used for calling the css backend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("admin_init","css_backend_for_coming_soon_master");

/*
add_action: It is used for calling the js frontend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("init","js_frontend_for_coming_soon_master");

/*
add_action: It is used for calling the css frontend.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("init","css_frontend_for_coming_soon_master");

/*
add_action: It is used for calling the side bar menu for coming soon.
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("admin_menu","side_bar_menu_for_coming_soon_master");

/*
add_action: It is used for calling the top bar menu for coming soon
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("admin_bar_menu","top_bar_menu_for_coming_soon_master",100);

/*
 add_action: It is used for calling helper class
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("admin_init","helper_class_for_coming_soon_master");

/*
 add_action: It is used for  for calling an ajax
Created On: 2015-06-24 11:30
Created By: Sonali
*/

add_action("admin_init","create_ajax_library_for_coming_soon_master");

/* Hook */

?>
