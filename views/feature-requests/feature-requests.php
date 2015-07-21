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
								<?php _e("Feature Requests",coming_soon_master); ?>
							</span>
						</li>
					</ul>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-call-out"></i>
									<?php _e("Feature Requests",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_feature_requests">
									<div class="form-body">
										<div class="note note-warning">
											<h4 class="block">
												<?php _e("Thank You!",coming_soon_master)?>
											</h4>
											<p>
												<?php _e("Kindly fill in the below form, If you would like to suggest some features which are not in the Plugin.",coming_soon_master)?>
											</p>
											<p>
												<?php _e("If you also have any suggestion/complaint, You can use the same form below.",coming_soon_master)?>
											</p>
											<p>
												<?php _e("You can also write us on",coming_soon_master)?>
												<a href="mailto:support@tech-prodigy.org" target="_blank">support@tech-prodigy.org</a>
											</p>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Your Name",coming_soon_master)?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please enter your Name which will be sent along with your Feature Request.",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_your_name" id="ux_txt_your_name" value="" placeholder="<?php _e("Enter your name here",coming_soon_master)?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Your Email",coming_soon_master) ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please enter your Email which will be sent along with your Feature Request.",coming_soon_master)?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_email_address" id="ux_txt_email_address" value=""  placeholder="<?php _e("Enter your Email here",coming_soon_master)?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("Feature Request",coming_soon_master) ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please enter your Feature Request which will be sent along.",coming_soon_master) ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<textarea class="form-control" name="ux_txtarea_feature_request" id="ux_txtarea_feature_request" rows="8"  placeholder="<?php _e("Enter your Feature Request here",coming_soon_master)?>"></textarea>
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" value="<?php _e("Send Request",coming_soon_master)?>">
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
