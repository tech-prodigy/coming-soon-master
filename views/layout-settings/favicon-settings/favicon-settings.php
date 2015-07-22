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
		$csm_favicon_settings = wp_create_nonce("coming_soon_master_favicon_settings");
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
							<a href="admin.php?page=csm_favicon_settings">
								<?php _e("Layout Settings",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("FavIcon Settings",coming_soon_master); ?>
							</span>
						</li>
					</ul>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-plus"></i>
									<?php _e("FavIcon Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_favicon_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("FavIcon Settings",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Enable or Disable For Logo",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_favicon_settings" id="ux_ddl_favicon_settings" onchange="change_favicon_settings();" value="<?php echo isset($meta_data_array["favicon_settings"]) ? $meta_data_array["favicon_settings"] : "";?>">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_favicon">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Upload FavIcon",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Upload Faicon",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-large input-inline" name="ux_txt_upload" id="ux_txt_upload" " placeholder="<?php _e("Please Upload Faicon",coming_soon_master)?>" value="<?php echo isset($meta_data_array["upload_favicon"]) ? $meta_data_array["upload_favicon"] : "";?>">
													<input type="button" class="btn purple custom-top-favicon" value="<?php _e("Upload",coming_soon_master);?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Custom CSS",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Enter Custom CSS",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<textarea class="form-control" name="ux_txtarea_css_fav" id="ux_txtarea_css_fav" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>"></textarea>
											</div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_favicon_settings" name="btn_save_favicon_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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