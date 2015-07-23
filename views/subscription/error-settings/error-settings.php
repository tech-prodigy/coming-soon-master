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

		$padding = explode(",",isset($meta_data_array["padding_error_subscription"]) ? $meta_data_array["padding_error_subscription"] : "");
		$margin = explode(",",isset($meta_data_array["margin_error_subscription"]) ? $meta_data_array["margin_error_subscription"] : "");
		$font_style= explode(",",isset($meta_data_array["font_style_error_subscription"]) ? $meta_data_array["font_style_error_subscription"] : "");

		$csm_subscription_error_settings = wp_create_nonce("coming_soon_master_subscription_error_settings");
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
							<a href="admin.php?page=csm_subscription_error_settings">
								<?php _e("Subscription Settings",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("Error Settings",coming_soon_master); ?>
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
									<?php _e("Error Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_subscription_error_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Error Settings",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_error_settings_subscription" id="ux_ddl_error_settings_subscription" onchange="change_error_settings_subscription();" value="<?php echo isset($meta_data_array["error_settings_subscription"]) ? $meta_data_array["error_settings_subscription"] : "";?>">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_error_text_subscription">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Error Text",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Text Here",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<?php
												$distribution = isset($meta_data_array["error_text_subscription"]) ? stripslashes(htmlspecialchars_decode(urldecode($meta_data_array["error_text_subscription"]))) : "";
												wp_editor( $distribution, $id ="ux_error_content_subscription", array("media_buttons" => false, "textarea_rows" => 8, "tabindex" => 4 ) );
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
															<select class="form-control input-width-25 input-inline" name="ux_ddl_font_error_subscription[]" id="ux_ddl_font_style_error_subscription">
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
															<select class="form-control input-width-25 input-inline" name="ux_ddl_font_error_subscription[]" id="ux_ddl_font_error_settings_subscription">
																<option value="bold"><?php _e("Bold",coming_soon_master)?></option>
																<option value="italic"><?php _e("Italic",coming_soon_master)?></option>
																<option value="normal"><?php _e("Normal",coming_soon_master)?></option>
															</select>
															<input type="text" name="ux_ddl_font_error_subscription[]" id="ux_clr_error_settings_subscription" class="form-control input-normal input-inline" placeholder="<?php _e("Color", coming_soon_master)?>" value="<?php echo isset($font_style[2]) ? $font_style[2] : "";?>" onblur="check_color('#ux_clr_error_settings_subscription');">
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
														<select class="form-control" name="ux_ddl_font_family_error_subscription" id="ux_ddl_font_family_error_subscription">
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
													<?php _e("Error Position",coming_soon_master)?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Error Position",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<select class="form-control" name="ux_ddl_error_positions" id="ux_ddl_error_positions" value="<?php echo isset($meta_data_array["error_position_subscription"]) ? $meta_data_array["error_position_subscription"] : "";?>">
													<option value="top"><?php _e("Top",coming_soon_master)?></option>
													<option value="bottom"><?php _e("Bottom",coming_soon_master)?></option>
													<option value="left"><?php _e("Left",coming_soon_master)?></option>
													<option value="right"><?php _e("Right",coming_soon_master)?></option>
												</select>
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
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_margin_text[]" id="ux_txt_subscription_error_margin_top" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo isset($margin[0]) ? $margin[0] : "";?>" onblur="check_value('#ux_txt_subscription_error_margin_top');">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_margin_text[]" id="ux_txt_subscription_error_margin_right" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo isset($margin[1]) ? $margin[1] : "";?>" onblur="check_value('#ux_txt_subscription_error_margin_right');">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_margin_text[]" id="ux_txt_subscription_error_margin_bottom" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo isset($margin[2]) ? $margin[2] : "";?>" onblur="check_value('#ux_txt_subscription_error_margin_bottom');">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_margin_text[]" id="ux_txt_subscription_error_margin_left" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo isset($margin[3]) ? $margin[3] : "";?>" onblur="check_value('#ux_txt_subscription_error_margin_left');">
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
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_padding_text[]" id="ux_txt_subscription_error_padding_top" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo isset($padding[0]) ? $padding[0] : "";?>" onblur="check_value('#ux_txt_subscription_error_padding_top');">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_padding_text[]" id="ux_txt_subscription_error_padding_right" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo isset($padding[1]) ? $padding[1] : "";?>" onblur="check_value('#ux_txt_subscription_error_padding_right');">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_padding_text[]" id="ux_txt_subscription_error_padding_bottom" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo isset($padding[2]) ? $padding[2] : "";?>" onblur="check_value('#ux_txt_subscription_error_padding_bottom');">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_subscription_error_padding_text[]" id="ux_txt_subscription_error_padding_left" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo isset($padding[3]) ? $padding[3] : "";?>" onblur="check_value('#ux_txt_subscription_error_padding_left');">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Custom CSS",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Enter Custom CSS",coming_soon_master)?>" data-placement="right"></i>
												</label>
												<textarea class="form-control" name="ux_txtarea_css_error" id="ux_txtarea_css_error" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>"><?php echo isset($meta_data_array["custom_css_error_settings_subscription"]) ? $meta_data_array["custom_css_error_settings_subscription"] : "";?></textarea>
											</div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="ux_btn_save_error" name="ux_btn_save_error" value="<?php _e("Save Settings",coming_soon_master);?>">
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
