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
								<?php _e("Social Media Settings",coming_soon_master); ?>
							</span>
						</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-social-twitter"></i>
									<?php _e("Social Media Settings",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_social_settings">
									<div class="form-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Email",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Email Url",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_email" id="ux_txt_email" placeholder="<?php _e("Please Enter Your Email Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["email"]) ? $meta_data_array["email"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Website URL",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Website Url",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_website" id="ux_txt_website" placeholder="<?php _e("Please Enter Your Website Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["website_url"]) ? $meta_data_array["website_url"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Google",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Google Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_google" id="ux_txt_google" placeholder="<?php _e("Please Enter Your Google Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["google"]) ? $meta_data_array["google"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("YouTube",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your YouTube Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_utube" id="ux_txt_utube" placeholder="<?php _e("Please Enter Your YouTube Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["youtube"]) ? $meta_data_array["youtube"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Instagram",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Instagram Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_insta" id="ux_txt_insta" placeholder="<?php _e("Please Enter Your Instagram Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["instagram"]) ? $meta_data_array["instagram"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Pinterest",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Pinterest Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_pinterest" id="ux_txt_pinterest" placeholder="<?php _e("Please Enter Your Pinterest Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["pinterest"]) ? $meta_data_array["pinterest"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Flickr",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Flickr Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_flickr" id="ux_txt_flickr" placeholder="<?php _e("Please Enter Your Flickr Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["flickr"]) ? $meta_data_array["flickr"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Google Plus",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Google Plus Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_googleplus" id="ux_txt_googleplus" placeholder="<?php _e("Please Enter Your Google Plus Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["google_plus"]) ? $meta_data_array["google_plus"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Vimeo",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Vimeo Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_vimeo" id="ux_txt_vimeo" placeholder="<?php _e("Please Enter Your Vimeo Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["vimeo"]) ? $meta_data_array["vimeo"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("LinkedIn",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your LinkedIn Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_linkedin" id="ux_txt_linkedin" placeholder="<?php _e("Please Enter Your LinkedIn Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["linkedin"]) ? $meta_data_array["linkedin"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Skype",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Skype Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_skype" id="ux_txt_skype" placeholder="<?php _e("Please Enter Your Skype Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["skype"]) ? $meta_data_array["skype"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Tumblr",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Tumblr Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_tumblr" id="ux_txt_tumblr" placeholder="<?php _e("Please Enter Your Tumblr Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["tumblr"]) ? $meta_data_array["tumblr"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Dribble",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Dribble Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_dribble" id="ux_txt_dribble" placeholder="<?php _e("Please Enter Your Dribble Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["dribble"]) ? $meta_data_array["dribble"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("GitHub",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your GitHub Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_github" id="ux_txt_github" placeholder="<?php _e("Please Enter Your GitHub Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["github"]) ? $meta_data_array["github"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("RSS",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your RSS Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_rss" id="ux_txt_rss" placeholder="<?php _e("Please Enter Your RSS Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["rss"]) ? $meta_data_array["rss"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Facebook",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Facebook Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_fb" id="ux_txt_fb" placeholder="<?php _e("Please Enter Your Facebook Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["facebook"]) ? $meta_data_array["facebook"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Yahoo",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Yahoo Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_yahoo" id="ux_txt_yahoo" placeholder="<?php _e("Please Enter Your Yahoo Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["yahoo"]) ? $meta_data_array["yahoo"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Blogger",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Blogger Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_blogger" id="ux_txt_blogger" placeholder="<?php _e("Please Enter Your Blogger Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["blogger"]) ? $meta_data_array["blogger"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Wordpress",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Wordpress Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_wordpress" id="ux_txt_wordpress" placeholder="<?php _e("Please Enter Your Wordpress Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["wordpress"]) ? $meta_data_array["wordpress"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Myspace",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Myspace Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_myspace" id="ux_txt_myspace" placeholder="<?php _e("Please Enter Your Myspace Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["myspace"]) ? $meta_data_array["myspace"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Foursquare",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Foursquare Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_foursquare" id="ux_txt_foursquare" placeholder="<?php _e("Please Enter Your Foursquare Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["foursquare"]) ? $meta_data_array["foursquare"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("LiveJournal",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your LiveJournal Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_livejournal" id="ux_txt_livejournal" placeholder="<?php _e("Please Enter Your LiveJournal Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["livejournal"]) ? $meta_data_array["livejournal"] : "";?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Twitter",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your Twitter Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_twitter" id="ux_txt_twitter" placeholder="<?php _e("Please Enter Your Twitter Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["twitter"]) ? $meta_data_array["twitter"] : "";?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("DeviantArt",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please Enter Your DeviantArt Url",coming_soon_master)?>" data-placement="right"></i>
													</label>
													<input type="text" class="form-control" name="ux_txt_deviantart" id="ux_txt_deviantart" placeholder="<?php _e("Please Enter Your DeviantArt Url",coming_soon_master)?>" value="<?php echo isset($meta_data_array["deviantart"]) ? $meta_data_array["deviantart"] : "";?>">
												</div>
											</div>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" id="btn_save_social_settings" name="btn_save_social_settings" value= "<?php _e("Save Settings",coming_soon_master); ?> ">
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
