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
							<span>
								<?php _e("Background Settings",coming_soon_master); ?>
							</span>
						</li>
					</ul>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-picture"></i>
									<?php _e("Background Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_background_settings">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label">
												<?php _e("Background Type",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Anyone Of Them",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_background_type" id="ux_ddl_background_type" onchange="change_background_type();" value="<?php echo isset($meta_data_array["background_type"]) ? $meta_data_array["background_type"] : "";?>">
												<option value="color"><?php _e("Color",coming_soon_master)?></option>
												<option value="image"><?php _e("Image",coming_soon_master)?></option>
												<option value="video"><?php _e("Video",coming_soon_master)?></option>
												<option value="slideshow"><?php _e("Slideshow",coming_soon_master)?></option>
											</select>
										</div>
										<div id="ux_div_color">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Background Color",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Background Color Here",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_background_color" id="ux_txt_background_color" placeholder="<?php _e("Please Enter Your Background Color Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["background_color"]) ? $meta_data_array["background_color"] : "";?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Background Color Opacity",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Background Color Opacity Here",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_background_color_opacity" id="ux_txt_background_color_opacity" placeholder="<?php _e("Please Enter Your Background Color Opacity Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["background_color_opacity"]) ? $meta_data_array["background_color_opacity"] : "";?>">
													</div>
												</div>
											</div>
										</div>
										<div id="ux_div_image">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Choose Background",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Choose Background Here ",coming_soon_master)?>" data-placement="right"></i>
												</label>
												<div class="custom-top-space-img">
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Upload Image",coming_soon_master)?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Upload Your Image",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<?php 
												$upload_image = explode(",",$meta_data_array["upload_image_background"])
												?>
												<div class="input-icon right">
													<input type="text" class="form-control input-inline" style="width: 32%;"name="ux_txt_upload_text" id="ux_txt_upload_text" placeholder="<?php _e("Please Upload Your Image",coming_soon_master)?>" value="<?php echo $upload_image[0];?>">
													<input type="button" class="btn purple custom-btn-img-upload" name="btn_upload_img" id="btn_upload_img" value="Upload">
													<select class="form-control input-width-30 input-inline " name="ux_ddl_repeat" id="ux_ddl_repeat" value="<?php echo $upload_image[1];?>">
														<option value="repeat"><?php _e("Repeat",coming_soon_master)?></option>
														<option value="no repeat"><?php _e("No Repeat",coming_soon_master)?></option>
														<option value="repeat x"><?php _e("Repeat X",coming_soon_master)?></option>
														<option value="repeat y"><?php _e("Repeat Y",coming_soon_master)?></option>	
													</select>
													<select class="form-control input-width-30 input-inline " name="ux_ddl_center" id="ux_ddl_center" value="<?php echo $upload_image[2];?>">
														<option value="center"><?php _e("Center",coming_soon_master)?></option>
														<option value="right"><?php _e("Right",coming_soon_master)?></option>
														<option value="left"><?php _e("Left",coming_soon_master)?></option>
													</select>
													<select class="form-control input-width-30 input-inline " name="ux_ddl_top" id="ux_ddl_top" value="<?php echo $upload_image[3];?>">
														<option value="top"><?php _e("Top",coming_soon_master)?></option>
														<option value="bottom"><?php _e("Bottom",coming_soon_master)?></option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Image Overlay",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<select class="form-control" name="ux_ddl_img_overlay" id="ux_ddl_img_overlay" onchange="change_overlay();" value="<?php echo isset($meta_data_array["image_overlay"]) ? $meta_data_array["image_overlay"] : "";?>">
													<option value="show"><?php _e("Show",coming_soon_master)?></option>
													<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
												</select>
											</div>
											<div id="ux_div_img_overlay">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Overlay Color",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Overlay Color Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_Overlay_color" id="ux_txt_Overlay_color" placeholder="<?php _e("Please Enter Your Overlay Color Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["overlay_color_image"]) ? $meta_data_array["overlay_color_image"] : "";?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Overlay Color Opacity",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Overlay Color Opacity Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_Overlay_color_opacity" id="ux_txt_Overlay_color_opacity" placeholder="<?php _e("Please Enter Your Overlay Color Opacity Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["overlay_color_opacity_image"]) ? $meta_data_array["overlay_color_opacity_image"] : "";?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="ux_div_video">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Video Url",coming_soon_master)?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Video Url",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<input type="text" class="form-control" name="ux_txt_video_url" id="ux_txt_video_url" placeholder="<?php _e("Please Enter Your Video Url",coming_soon_master)?>" value="<?php echo stripslashes(urldecode(isset($meta_data_array["video_url"]) ? $meta_data_array["video_url"] : ""));?>">
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Video Sound",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Choose show or hide",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<select class="form-control" name="ux_ddl_video_sound" id="ux_ddl_video_sound" value="<?php echo isset($meta_data_array["video_sound"]) ? $meta_data_array["video_sound"] : "";?>">
															<option value="show"><?php _e("Show",coming_soon_master)?></option>
															<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Player Controls",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Choose show or hide",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<select class="form-control" name="ux_ddl_player" id="ux_ddl_player" value="<?php echo isset($meta_data_array["player_controls"]) ? $meta_data_array["player_controls"] : "";?>">
															<option value="show"><?php _e("Show",coming_soon_master)?></option>
															<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Video Overlay",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<select class="form-control" name="ux_ddl_video_overlay" id="ux_ddl_video_overlay" onchange="change_video_overlay();" value="<?php echo isset($meta_data_array["video_overlay"]) ? $meta_data_array["video_overlay"] : "";?>">
													<option value="show"><?php _e("Show",coming_soon_master)?></option>
													<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
												</select>
											</div>
											<div id="ux_div_video_overlay">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Overlay Color",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Overlay Color Text Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_Overlay_color_video" id="ux_txt_Overlay_color_video" placeholder="<?php _e("Please Enter Your Overlay Color Text Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["overlay_color_video"]) ? $meta_data_array["overlay_color_video"] : "";?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Overlay Color Opacity",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Overlay Color Opacity Text Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_Overlay_color_opacity_video" id="ux_txt_Overlay_color_opacity_video" placeholder="<?php _e("Please Enter Your Overlay Color Opacity Text Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["overlay_color_opacity_video"]) ? $meta_data_array["overlay_color_opacity_video"] : "";?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="ux_div_slideshow">
											<div class="form-group">
												<label class="control-label">
													<?php _e("Choose Slideshow",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Choose Slideshow Here ",coming_soon_master)?>" data-placement="right"></i>
												</label>
												<div class="custom-top-space-img">
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
													<div class="custom-bg-img"></div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Upload Image",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Upload Image",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-large input-inline" name="ux_txt_upload_text_slideshow" id="ux_txt_upload_text_slideshow" placeholder="<?php _e("Please Upload Your Image",coming_soon_master)?>" value="<?php echo isset($meta_data_array["upload_image_slideshow"]) ? $meta_data_array["upload_image_slideshow"] : "";?>">
													<input type="button" class="btn purple custom-top-favicon" name="btn_upload_img_slideshow" id="btn_upload_img_slideshow" value="<?php _e("Upload",coming_soon_master);?>">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Slideshow Effects",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Choose Side or Fade",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<select class="form-control" name="ux_ddl_effects" id="ux_ddl_effects" value="<?php echo isset($meta_data_array["slideshow_effect"]) ? $meta_data_array["slideshow_effect"] : "";?>">
															<option value="side"><?php _e("Side",coming_soon_master)?></option>
															<option value="fade"><?php _e("Fade",coming_soon_master)?></option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php _e("Duration",coming_soon_master)?> :
															<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Duration Here",coming_soon_master)?>" data-placement="right"></i>
															<span class="required" aria-required="true">*</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_duration" id="ux_txt_duration" placeholder="<?php _e("Please Enter Your Duration Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["duration"]) ? $meta_data_array["duration"] : "";?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">
													<?php _e("Slideshow Overlay",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Please Select show or hide",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<select class="form-control" name="ux_ddl_slideshow_overlay" id="ux_ddl_slideshow_overlay" onchange="change_slideshow_overlay();" value="<?php echo isset($meta_data_array["slideshow_overlay"]) ? $meta_data_array["slideshow_overlay"] : "";?>">
													<option value="show"><?php _e("Show",coming_soon_master)?></option>
													<option value="hide"><?php _e("Hide",coming_soon_master)?></option>
												</select>
											</div>
											<div id="ux_div_slideshow_overlay">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Overlay Color",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Overlay Color Text Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_Overlay_color_slideshow" id="ux_txt_Overlay_color_slideshow" placeholder="<?php _e("Please Enter Your Overlay Color Text Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["overlay_color_slideshow"]) ? $meta_data_array["overlay_color_slideshow"] : "";?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																<?php _e("Overlay Color Opacity",coming_soon_master)?> :
																<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Overlay Color Opacity Text Here",coming_soon_master)?>" data-placement="right"></i>
																<span class="required" aria-required="true">*</span>
															</label>
															<input type="text" class="form-control" name="ux_txt_Overlay_color_opacity_slideshow" id="ux_txt_Overlay_color_opacity_slideshow" placeholder="<?php _e("Please Enter Your Overlay Color Opacity Text Here",coming_soon_master)?>" value="<?php echo isset($meta_data_array["overlay_color_opacity_slideshow"]) ? $meta_data_array["overlay_color_opacity_slideshow"] : "";?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Background Position",coming_soon_master)?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please Select Background Position",coming_soon_master)?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_background_position" id="ux_ddl_background_position" value="<?php echo isset($meta_data_array["background_position"]) ? $meta_data_array["background_position"] : "";?>">
												<option value="top"><?php _e("Top",coming_soon_master)?></option>
												<option value="bottom"><?php _e("Bottom",coming_soon_master)?></option>
												<option value="left"><?php _e("Left",coming_soon_master)?></option>
												<option value="right"><?php _e("Right",coming_soon_master)?></option>
											</select>
										</div>
										<div class="form-group">
												<label class="control-label">
													<?php _e("Custom CSS",coming_soon_master) ?> :
													<i class="icon-question tooltips" data-original-title="<?php _e("Enter Custom CSS",coming_soon_master)?>" data-placement="right"></i>
													<span class="required" aria-required="true">*</span>
												</label>
												<textarea class="form-control" name="ux_txtarea_css_bg" id="ux_txtarea_css_bg" placeholder="<?php _e("Enter Custom CSS",coming_soon_master); ?>"></textarea>
											</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_background_settings" name="btn_save_background_settings" value="<?php _e("Save Settings",coming_soon_master);?>">
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