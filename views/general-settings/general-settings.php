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
			$user_role_permission = "public_pages";
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
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="admin.php?page=csm_coming_soon_master">
								<?php _e("Coming Soon Master",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<a href="admin.php?page=csm_general_settings">
								<?php _e("General Settings",coming_soon_master); ?>
							</a>
						</li>
					</ul>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-plus"></i>
									<?php _e("General Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_general_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Show Coming Soon Master Menu",coming_soon_master)?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Any Menu",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<table class="table table-striped table-bordered table-margin-top" id="ux_tbl_plugin_settings">
												<thead>
													<tr>
														<th>
															<input type="checkbox" name="ux_chk_administrator" id="ux_chk_administrator" checked="checked" disabled="disabled" value="<?php echo isset($meta_data_array["administrator_general_settings"]) ? $meta_data_array["administrator_general_settings"] : "";?>">
															<?php _e("Administrator",coming_soon_master)?>
														</th>
														<th>
															<input type="checkbox" name="ux_chk_author" id="ux_chk_author" value="<?php echo isset($meta_data_array["author_general_settings"]) ? $meta_data_array["author_general_settings"] : "";?>">
															<?php _e("Author",coming_soon_master)?>
														</th>
														<th>
															<input type="checkbox" name="ux_chk_editor" id="ux_chk_editor" value="<?php echo isset($meta_data_array["editor_general_settings"]) ? $meta_data_array["editor_general_settings"] : "";?>">
															<?php _e("Editor",coming_soon_master)?>
														</th>
														<th>
															<input type="checkbox" name="ux_chk_contributor" id="ux_chk_contributor" value="<?php echo isset($meta_data_array["contributor_general_settings"]) ? $meta_data_array["contributor_general_settings"] : "";?>">
															<?php _e("Contributor",coming_soon_master)?>
														</th>
														<th>
															<input type="checkbox" name="ux_chk_subscriber" id="ux_chk_subscriber" value="<?php echo isset($meta_data_array["subscriber_general_settings"]) ? $meta_data_array["subscriber_general_settings"] : "";?>">
															<?php _e("Subscriber",coming_soon_master)?>
														</th>
													</tr>
												</thead>
											</table>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Show Coming Soon Master Top Bar Menu",coming_soon_master)?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Top Bar Menu",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<div class="input-icon right">
												<select id="ux_ddl_top_bar" name="ux_ddl_top_bar" class="form-control" value="<?php echo isset($meta_data_array["show_coming_soon_master_top_bar_menu"]) ? $meta_data_array["show_coming_soon_master_top_bar_menu"] : "";?>">
													<option value="show"><?php _e("Show",coming_soon_master)?></option>
													<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
												</select>
											</div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_general_settings" name="btn_save_general_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
?>