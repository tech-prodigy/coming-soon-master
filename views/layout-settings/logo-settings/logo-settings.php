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

		$font_style= explode(",",isset($meta_data_array["font_style_layout"]) ? $meta_data_array["font_style_layout"] : "");
		$margin = explode(",",isset($meta_data_array["margin_layout"]) ? $meta_data_array["margin_layout"] : "");
		$padding = explode(",",isset($meta_data_array["padding_layout"]) ? $meta_data_array["padding_layout"] : "");

		$csm_logo_settings = wp_create_nonce("coming_soon_master_logo_settings");
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
							<a href="admin.php?page=csm_logo_settings">
								<?php _e("Layout Settings",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("Logo Settings",coming_soon_master); ?>
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
									<?php _e("Logo Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_logo_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Logo",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide For Logo",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_font_logo" id="ux_ddl_font_logo" value="<?php echo isset($meta_data_array["logo"]) ? $meta_data_array["logo"] : "";?>" onchange="change_logo();">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_logo">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Logo Type",coming_soon_master) ?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Text or Image For Logo Type",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<select class="form-control" name="ux_ddl_font_logo_type" id="ux_ddl_font_logo_type" value="<?php echo isset($meta_data_array["logo_type"]) ? $meta_data_array["logo_type"] : "";?>" onchange="change_type();">
															<option value="text"><?php _e("Text",coming_soon_master)?></option>
															<option value="image"><?php _e("Image",coming_soon_master)?></option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Logo Position",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Logo Position",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<select class="form-control" name="ux_ddl_logo_position" id="ux_ddl_logo_position" value="<?php echo isset($meta_data_array["logo_position"]) ? $meta_data_array["logo_position"] : "";?>">
															<option value="top"><?php _e("Top",coming_soon_master)?></option>
															<option value="bottom"><?php _e("Bottom",coming_soon_master)?></option>
															<option value="left"><?php _e("Left",coming_soon_master)?></option>
															<option value="right"><?php _e("Right",coming_soon_master)?></option>
														</select>
													</div>
												</div>
											</div>
											<div id="ux_div_logo_text">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Logo Text",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Logo Text Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_Logo_type" id="ux_txt_logo_type" value="<?php echo stripslashes(urldecode(isset($meta_data_array["logo_text"]) ? $meta_data_array["logo_text"] : ""));?>" placeholder="<?php _e("Please Enter Your Logo Text Here",coming_soon_master)?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Font Style",coming_soon_master); ?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Font Style",coming_soon_master) ?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>

															<div class="input-icon right">
																<select class="form-control custom-input-medium input-inline" name="ux_ddl_font_style_logo[]" id="ux_ddl_font_style">
																	<?php
																	for($flag = 1;$flag <= 100;$flag++)
																	{
																		if($flag < 10)
																		{
																			?>
																			<option value="<?php echo $flag;?>px">0<?php echo $flag;?> Px</option>
																			<?php
																		}
																		else
																		{
																			?>
																			<option value="<?php echo $flag;?>px"><?php echo $flag;?> Px</option>
																			<?php
																		}
																	}
																	?>
																</select>
																<select class="form-control custom-input-medium input-inline" name="ux_ddl_font_style_logo[]" id="ux_ddl_font">
																	<option value="bold"><?php _e("Bold",coming_soon_master)?></option>
																	<option value="italic"><?php _e("Italic",coming_soon_master)?></option>
																	<option value="normal"><?php _e("Normal",coming_soon_master)?></option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Font Family",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Font Family",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<select class="form-control" name="ux_ddl_font_family" id="ux_ddl_font_family">
																<?php
																foreach($web_font_list as $key => $val)
																{
																	?>
																		<option value="<?php echo $key;?>"><?php echo $val;?></option>
																	<?php
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Font Color",coming_soon_master); ?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Font Color",coming_soon_master) ?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_font_color" id="ux_txt_font_color" value="<?php echo isset($meta_data_array["font_color_layout"]) ? $meta_data_array["font_color_layout"] : "";?>" placeholder="<?php _e("Please Enter Your Font Color Here", coming_soon_master)?>">
														</div>
													</div>
												</div>
											</div>
											<div id="ux_div_logo_img">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Logo Image",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Upload Your Image",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<div class="input-icon right">
																<input type="text" class="form-control input-inline custom-input-img" name="ux_txt_logo_text" id="ux_txt_logo_text" value="<?php echo isset($meta_data_array["logo_image"]) ? $meta_data_array["logo_image"] : "";?>" placeholder="<?php _e("Please Upload Your Image", coming_soon_master)?>">
																<input type="button" class="btn purple custom-btn-lg" name="btn_logo_img" id="btn_logo_img" value="Upload">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Logo Link",coming_soon_master) ?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show Or hide For Logo Link",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<select class="form-control" name="ux_ddl_logo_link" id="ux_ddl_logo_link" value="<?php echo isset($meta_data_array["logo_link"]) ? $meta_data_array["logo_link"] : "";?>" onchange="change_link();">
																<option value="show"><?php _e("Show",coming_soon_master)?></option>
																<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
															</select>
														</div>
													</div>
												</div>
												<div id="ux_div_logo_link">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Logo Link",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Logo Link",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_logo_link" id="ux_txt_logo_link" value="<?php echo isset($meta_data_array["logo_link_text"]) ? $meta_data_array["logo_link_text"] : "";?>" placeholder="<?php _e("Please Enter Your Logo Link Here",coming_soon_master)?>">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">
														<?php _e("Logo Size",coming_soon_master); ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Default Or Custom For Logo Size",coming_soon_master) ?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<select class="form-control" name="ux_ddl_font_logo_size" id="ux_ddl_font_logo_size" value="<?php echo isset($meta_data_array["logo_size"]) ? $meta_data_array["logo_size"] : "";?>" onchange="change_size();">
														<option value="custom"><?php _e("Custom",coming_soon_master)?></option>
														<option value="default"><?php _e("Default",coming_soon_master)?></option>
													</select>
												</div>
												<div id="ux_div_width">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">
																	<?php _e("Max Width",coming_soon_master)?> :
																	<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Width Here",coming_soon_master) ?>" data-placement="right"></i>
																	<span class="required" aria-required="true">*</span>
																</label>
																<input type="text" class="form-control" name="ux_txt_width" id="ux_txt_width" value="<?php echo isset($meta_data_array["max_width"]) ? $meta_data_array["max_width"] : "";?>" placeholder="<?php _e("Please Enter Your Width Here",coming_soon_master)?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">
																	<?php _e("Max Height",coming_soon_master)?> :
																	<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Height Here",coming_soon_master) ?>" data-placement="right"></i>
																	<span class="required" aria-required="true">*</span>
																</label>
																<input type="text" class="form-control" name="ux_txt_height" id="ux_txt_height" value="<?php echo isset($meta_data_array["max_height"]) ? $meta_data_array["max_height"] : "";?>" placeholder="<?php _e("Please Enter Your Height Here",coming_soon_master)?>">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Margin(Px)",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Margin Here",coming_soon_master) ?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<div class="input-icon right">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_top_text" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo $margin[0];?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_right_text" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo $margin[1];?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_bottom_text" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo $margin[2];?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_left_text" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo $margin[3];?>">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Padding(Px)",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Padding Here",coming_soon_master) ?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<div class="input-icon right">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_top_text" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo $padding[0];?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_right_text" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo $padding[1];?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_bottom_text" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo $padding[2];?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_left_text" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo $padding[3];?>">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Custom CSS",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Enter Custom CSS",coming_soon_master)?>" data-placement="right"></i>
												</label>
												<textarea class="form-control" name="ux_txtarea_css_logo" id="ux_txtarea_css_logo" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>" value="<?php echo isset($meta_data_array["custom_css_logo"]) ? $meta_data_array["custom_css_logo"] : "";?>"></textarea>
											</div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_logo_settings" name="btn_save_logo_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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
