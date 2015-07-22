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

		$font_style= explode(",",isset($meta_data_array["font_style_label"]) ? $meta_data_array["font_style_label"] : "");

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
							<a href="admin.php?page=csm_label_settings">
								<?php _e("Contact Form",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("Label settings",coming_soon_master); ?>
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
									<?php _e("Label settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_label_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Name Field",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_name_field" id="ux_ddl_name_field" onchange="change_name_field();" value="<?php echo isset($meta_data_array["name_field"]) ? $meta_data_array["name_field"] : "";?>">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_name_field">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Name Label",coming_soon_master)?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Name Label Here",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<input type="text" class="form-control" name="ux_txt_name_label" id="ux_txt_name_label" placeholder="<?php _e("Please Enter Your Name Label Here",coming_soon_master)?>" value="<?php echo stripslashes(urldecode(isset($meta_data_array["name_label"]) ? $meta_data_array["name_label"] : ""));?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Email Field",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_email_field" id="ux_ddl_email_field" onchange="change_name_email();" value="<?php echo isset($meta_data_array["email_field"]) ? $meta_data_array["email_field"] : "";?>">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_email">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Email Label",coming_soon_master)?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Email Label Here",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<input type="text" class="form-control" name="ux_txt_email_label" id="ux_txt_email_label" placeholder="<?php _e("Please Enter Your Email Label Here",coming_soon_master)?>" value="<?php echo stripslashes(urldecode(isset($meta_data_array["email_label"]) ? $meta_data_array["email_label"] : ""));?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Message Field",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_message_field" id="ux_ddl_message_field" onchange="change_message_field();" value="<?php echo isset($meta_data_array["message_field"]) ? $meta_data_array["message_field"] : "";?>">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_message">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Message Label",coming_soon_master)?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Message Label Here",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<input type="text" class="form-control" name="ux_txt_message_label" id="ux_txt_message_label" placeholder="<?php _e("Please Enter Your Message Label Here",coming_soon_master)?>" value="<?php echo stripslashes(urldecode(isset($meta_data_array["message_label"]) ? $meta_data_array["message_label"] : ""));?>">
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Font Style",coming_soon_master); ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Font Style",coming_soon_master) ?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<div class="input-icon right">
														<select class="form-control input-width-25 input-inline" name="ux_ddl_font_style_label" id="ux_ddl_font_style_label">
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
														<select class="form-control input-width-25 input-inline" name="ux_ddl_font_label_settings" id="ux_ddl_font_label_settings">
															<option value="bold"><?php _e("Bold",coming_soon_master)?></option>
															<option value="italic"><?php _e("Italic",coming_soon_master)?></option>
															<option value="normal"><?php _e("Normal",coming_soon_master)?></option>
														</select>
														<input type="text" name="ux_clr_label_settings" id="ux_clr_label_settings" class="form-control input-normal input-inline" placeholder="<?php _e("Color",coming_soon_master)?>" value="<?php echo $font_style[2];?>">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Font Family",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Font Family",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<select class="form-control" name="ux_ddl_font_family_label" id="ux_ddl_font_family_label">
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
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Custom CSS",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Enter Custom CSS",coming_soon_master)?>" data-placement="right"></i>
											</label>
											<textarea class="form-control" name="ux_txtarea_css_label" id="ux_txtarea_css_label" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>"></textarea>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_label_settings" name="btn_save_label_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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
