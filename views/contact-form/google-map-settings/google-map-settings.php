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
							<i class="icon-home"></i>
							<a href="admin.php?page=csm_google_map_settings">
								<?php _e("Contact Form",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("Google Map settings",coming_soon_master); ?>
							</span>
						</li>
					</ul>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-layers"></i>
									<?php _e("Google Map settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_google_map_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Google Map",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_google_map" id="ux_ddl_google_map" onchange="change_google_map();" value="<?php echo isset($meta_data_array["google_map_settings"]) ? $meta_data_array["google_map_settings"] : "";?>">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_google_map">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Locate Address By",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Any Of Them",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<select class="form-control" name="ux_ddl_location" id="ux_ddl_location" onchange="change_location();" value="<?php echo isset($meta_data_array["located_address_by"]) ? $meta_data_array["located_address_by"] : "";?>">
													<option value="formatted-address"><?php _e("Formatted Address",coming_soon_master)?></option>
													<option value="areacode"><?php _e("Area Code / ZIP Code",coming_soon_master)?></option>
													<option value="latitude"><?php _e("Latitude / Longitude",coming_soon_master)?></option>
												</select>
											</div>
											<div id="ux_div_format">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Formatted Address",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Formatted Address Here",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_formatted_address" id="ux_txt_formatted_address" placeholder="<?php _e("Please Enter Your Formatted Address Here",coming_soon_master)?>" value="<?php echo stripslashes(urldecode(isset($meta_data_array["formatted_address"]) ? $meta_data_array["formatted_address"] : ""));?>">
												</div>
											</div>
											<div id="ux_div_area_code">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Area Code / ZIP Code",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Area Code/ZIP Code Here",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_area_code" id="ux_txt_area_code" placeholder="<?php _e("Please Enter Your Area Code/ZIP Code Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["area_zip_code"]) ? $meta_data_array["area_zip_code"] : "";?>">
												</div>
											</div>
											<div id="ux_div_latitude">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Latitude",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Latitude Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_latitude" id="ux_txt_latitude" placeholder="<?php _e("Please Enter Your Latitude Here",coming_soon_master)?>" onblur="change_location();" value="<?php echo isset($meta_data_array["latitude"]) ? $meta_data_array["latitude"] : "";?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Longitude",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Longitude Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_longitude" id="ux_txt_longitude" placeholder="<?php _e("Please Enter Your Longitude Here",coming_soon_master)?>" onblur="change_location();" value="<?php echo isset($meta_data_array["longitude"]) ? $meta_data_array["longitude"] : "";?>">
														</div>
													</div>
												</div>
											</div>
											<div id="map_canvas" class="custom-map"></div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_map_settings" name="btn_save_map_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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
