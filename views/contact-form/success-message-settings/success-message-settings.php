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

		$font_style= explode(",",isset($meta_data_array["font_style_success_message_settings_contact_form"]) ? $meta_data_array["font_style_success_message_settings_contact_form"] : "");

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
							<a href="admin.php?page=csm_success_message_settings">
								<?php _e("Contact Form",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("Sucess Message Settings",coming_soon_master); ?>
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
									<?php _e("Sucess Message Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_success_message_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Success Message Settings",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_success_settings_cf" id="ux_ddl_success_settings_cf" onchange="change_success_message_settings();" value="<?php echo isset($meta_data_array["success_message_settings_contact_form"]) ? $meta_data_array["success_message_settings_contact_form"] : "";?>">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_success_message_settings">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Success Message Text",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Text Here",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<?php
												$distribution = stripslashes(urldecode(isset($meta_data_array["success_message_text_contact_form"]) ? $meta_data_array["success_message_text_contact_form"] : "")); 
												wp_editor( $distribution, $id ="ux_success_content_cf", array("media_buttons" => false, "textarea_rows" => 8, "tabindex" => 4 ) ); 
												?>
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
															<select class="form-control input-width-25 input-inline" name="ux_ddl_font_style_success_cf" id="ux_ddl_font_style_success_cf">
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
															<select class="form-control input-width-25 input-inline" name="ux_ddl_font_success_settings_cf" id="ux_ddl_font_success_settings_cf">
																<option value="bold"><?php _e("Bold",coming_soon_master)?></option>
																<option value="italic"><?php _e("Italic",coming_soon_master)?></option>
																<option value="normal"><?php _e("Normal",coming_soon_master)?></option>
															</select>
															<input type="text" name="ux_clr_success_settings_cf" id="ux_clr_success_settings_cf" class="form-control input-normal input-inline" placeholder="<?php _e("Color",coming_soon_master)?>" value="<?php echo $font_style[2];?>">
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
														<select class="form-control" name="ux_ddl_font_family_success_cf" id="ux_ddl_font_family_success_cf">
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
													<span class="required" aria-required="true">*</span>
												</label>
												<textarea class="form-control" name="ux_txtarea_css_succ_cf" id="ux_txtarea_css_succ_cf" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>" ></textarea>
											</div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_message_settings" name="btn_save_message_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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
