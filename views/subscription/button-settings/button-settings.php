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
			$csm_button_settings = wp_create_nonce("coming_soon_master_button_settings");

		$padding = explode(",",isset($meta_data_array["padding_button_subscription"]) ? $meta_data_array["padding_button_subscription"] : "");
		$margin = explode(",",isset($meta_data_array["margin_button_subscription"]) ? $meta_data_array["margin_button_subscription"] : "");
		$font_style= explode(",",isset($meta_data_array["font_style_button_subscription"]) ? $meta_data_array["font_style_button_subscription"] : "");

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
							<a href="admin.php?page=csm_subscription_button_settings">
								<?php _e("Subscription Settings",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("Button Settings",coming_soon_master); ?>
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
									<?php _e("Button Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_button_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Button Label",coming_soon_master)?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Button Label Here",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_button_label" id="ux_txt_button_label" placeholder="<?php _e("Please Enter Your Button Label Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["button_label_subscription"]) ? $meta_data_array["button_label_subscription"] : "";?>">
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
														<select class="form-control input-width-25 input-inline " name="ux_ddl_font_style_button_subscription" id="ux_ddl_font_style_button_subscription">
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
														<select class="form-control input-width-25 input-inline " name="ux_ddl_font_button_settings_subscription" id="ux_ddl_font_button_settings_subscription">
															<option value="bold"><?php _e("Bold",coming_soon_master)?></option>
															<option value="italic"><?php _e("Italic",coming_soon_master)?></option>
															<option value="normal"><?php _e("Normal",coming_soon_master)?></option>
														</select>
														<input type="text" name="ux_clr_button_settings_subscription" id="ux_clr_button_settings_subscription" class="form-control input-normal input-inline" placeholder="<?php _e("Color",coming_soon_master)?>" value="<?php echo $font_style[2];?>">
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
													<select class="form-control" name="ux_ddl_font_family_button_subscription" id="ux_ddl_font_family_button_subscription">
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
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Button Color",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Button Color Here",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_clr_button_color" id="ux_clr_button_color" placeholder="<?php _e("Please Enter Your Button Color Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["button_color_subscription"]) ? $meta_data_array["button_color_subscription"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Hover Color",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Hover Color Here",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_clr_hover_color" id="ux_clr_hover_color" placeholder="<?php _e("Please Enter Your Hover Color Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["hover_color_button_subscription"]) ? $meta_data_array["hover_color_button_subscription"] : "";?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Label Assignment",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Anyone Of Them",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_label_assignment" id="ux_ddl_label_assignment" value="<?php echo isset($meta_data_array["label_assignment_button_subscription"]) ? $meta_data_array["label_assignment_button_subscription"] : "";?>">
												<option value="left"><?php _e("Left",coming_soon_master)?></option>
												<option value="right"><?php _e("Right",coming_soon_master)?></option>
												<option value="center"><?php _e("Center",coming_soon_master)?></option>
											</select>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Button Position",coming_soon_master)?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Button Position",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_button_position" id="ux_ddl_button_position" value="<?php echo isset($meta_data_array["button_position_subscription"]) ? $meta_data_array["button_position_subscription"] : "";?>">
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
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmnb_text" id="ux_txt_marginmnb_text" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo $margin[0];?>">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmnv_text" id="ux_txt_marginmnv_text" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo $margin[1];?>">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmnc_text" id="ux_txt_marginmnc_text" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo $margin[2];?>">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmnx_text" id="ux_txt_marginmnx_text" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo $margin[3];?>">
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
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmna_text" id="ux_txt_marginmna_text" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo $padding[0];?>">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmns_text" id="ux_txt_marginmns_text" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo $padding[1];?>">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmnd_text" id="ux_txt_marginmnd_text" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo $padding[2];?>">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_marginmnf_text" id="ux_txt_marginmnf_text" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo $padding[3];?>">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Custom CSS",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Enter Custom CSS",coming_soon_master)?>" data-placement="right"></i>
											</label>
											<textarea class="form-control" name="ux_txtarea_css_button" id="ux_txtarea_css_button" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>"></textarea>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="ux_btn_save_button_settings" name="ux_btn_save_button_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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
