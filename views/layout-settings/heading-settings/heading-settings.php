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

		$padding = explode(",",isset($meta_data_array["padding_heading"]) ? $meta_data_array["padding_heading"] : "");
		$margin = explode(",",isset($meta_data_array["margin_heading"]) ? $meta_data_array["margin_heading"] : "");
		$font_style= explode(",",isset($meta_data_array["font_style_heading"]) ? $meta_data_array["font_style_heading"] : "");
		

		$csm_heading_settings = wp_create_nonce("coming_soon_master_heading_settings");
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
							<a href="admin.php?page=csm_heading_settings">
								<?php _e("Layout Settings",coming_soon_master); ?>
							</a>
							<span>></span>
						</li>
						<li>
							<span>
								<?php _e("Heading Settings",coming_soon_master); ?>
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
									<?php _e("Heading Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_heading_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Heading Settings",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_heading_settings" id="ux_ddl_heading_settings" onchange="change_heading_settings();">
												<option value="show"><?php _e("Show",coming_soon_master)?></option>
												<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_heading_text">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Heading Text",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Text Here",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<?php
												$distribution = isset($meta_data_array["heading_text"]) ? stripslashes(htmlspecialchars(urldecode($meta_data_array["heading_text"]))) : "Our website is coming soon...";
												wp_editor( $distribution, $id ="ux_heading_content" , array("media_buttons" => false, "textarea_rows" => 8, "tabindex" => 4  ) ); 
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
															<select class="form-control input-width-25 input-inline" name="ux_ddl_font_style_heading[]" id="ux_ddl_font_style_heading">
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
															<select class="form-control input-width-25 input-inline" name="ux_ddl_font_style_heading[]" id="ux_ddl_font_heading_settings">
																<option value="bold"><?php _e("Bold",coming_soon_master)?></option>
																<option value="italic"><?php _e("Italic",coming_soon_master)?></option>
																<option value="normal"><?php _e("Normal",coming_soon_master)?></option>
															</select>
															<input type="text" name="ux_ddl_font_style_heading[]" id="ux_clr_heading_settings" class="form-control input-normal input-inline" placeholder="<?php _e("Color",coming_soon_master)?>" value="<?php echo isset($meta_data_array["font_style_heading"]) ? $font_style[2] : "#ccc";?>">
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
														<select class="form-control" name="ux_ddl_font_family_heading" id="ux_ddl_font_family_heading">
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
													<?php _e("Heading Position",coming_soon_master)?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Heading Position",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<select class="form-control" name="ux_ddl_heading_position" id="ux_ddl_heading_position">
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
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_margin_text[]" id="ux_txt_heading_margin_top_text" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo isset($meta_data_array["margin_heading"]) ? $margin[0] : 20;?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_margin_text[]" id="ux_txt_heading_margin_right_text" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo isset($meta_data_array["margin_heading"]) ? $margin[1] : 20;?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_margin_text[]" id="ux_txt_heading_margin_bottom_text" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo isset($meta_data_array["margin_heading"]) ? $margin[2] : 20;?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_margin_text[]" id="ux_txt_heading_margin_left_text" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo isset($meta_data_array["margin_heading"]) ? $margin[3] : 20;?>">
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
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_padding_text[]" id="ux_txt_heading_padding_top_text" placeholder="<?php _e("Top",coming_soon_master)?>" value="<?php echo isset($meta_data_array["padding_heading"]) ? $padding[0] : "20";?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_padding_text[]" id="ux_txt_heading_padding_right_text" placeholder="<?php _e("Right",coming_soon_master)?>" value="<?php echo isset($meta_data_array["padding_heading"]) ? $padding[1] : "20";?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_padding_text[]" id="ux_txt_heading_padding_bottom_text" placeholder="<?php _e("Bottom",coming_soon_master)?>" value="<?php echo isset($meta_data_array["padding_heading"]) ? $padding[2] : "20";?>">
															<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_heading_padding_text[]" id="ux_txt_heading_padding_left_text" placeholder="<?php _e("Left",coming_soon_master)?>" value="<?php echo isset($meta_data_array["padding_heading"]) ? $padding[3] : "20";?>">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Custom CSS",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Enter Custom CSS",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<textarea class="form-control" name="ux_txtarea_css_heading_lay" id="ux_txtarea_css_heading_lay" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>"></textarea>
											</div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_heading_settings" name="btn_save_heading_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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