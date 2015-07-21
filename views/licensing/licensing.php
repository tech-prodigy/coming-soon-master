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
		$csm_license = wp_create_nonce("coming_soon_master_licensing");
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
								<?php _e("Licensing",coming_soon_master); ?>
							</span>
						</li>
					</ul>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-key"></i>
									<?php _e("Licensing",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_licensing">
									<div class="form-body">
										<div class="note note-warning">
											<h4 class="block">
												<?php _e("Important Notice!",coming_soon_master)?>
											</h4>
											<p>
												<?php _e("Congratulations! You have recently purchased the Coming Soon Master and now you need to activate the license in order to unlock it!",coming_soon_master)?>
											</p>
											<p>
												<?php _e("Kindly fill in the required details and click on Validate License to unlock it.",coming_soon_master)?>
											</p>
											<p>
												<?php _e("If you face any issues activating the license, You may contact us at ",coming_soon_master)?>
												<a href="mailto:support@tech-prodigy.org" target="_blank">support@tech-prodigy.org</a>
											</p>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Product Name",coming_soon_master); ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("This field shows your installed Product.",coming_soon_master) ?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_product_name" id="ux_txt_product_name" value="<?php echo esc_attr($csm_licensing->type);?>" disabled="disabled">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Current Version",coming_soon_master); ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("This field shows your installed Product Version.",coming_soon_master) ?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_current_version" id="ux_txt_current_version" value="<?php echo esc_attr($csm_licensing->version);?>" disabled="disabled">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Website URL",coming_soon_master); ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("This field shows your website URL.",coming_soon_master) ?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_website_url" id="ux_txt_website_url" value="<?php echo esc_attr($csm_licensing->url);?>" disabled="disabled">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php _e("Order ID",coming_soon_master); ?> :
														<i class="icon-question tooltips" data-original-title="<?php _e("Please enter your Order ID  received after purchasing the Product. This will be used for Validating the License.",coming_soon_master) ?>" data-placement="right"></i>
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_order_id" id="ux_txt_order_id" placeholder="<?php _e("Enter the Order ID received after making the purchase",coming_soon_master) ?>" value="<?php echo $csm_licensing->order_id;?>"">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php _e("API KEY",coming_soon_master); ?> :
												<i class="icon-question tooltips" data-original-title="<?php _e("Please enter your API key received after purchasing the Product. This will be used for Validating the License.",coming_soon_master) ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_api_key" id="ux_txt_api_key" value="<?php echo esc_attr($csm_licensing->api_key);?>" placeholder="<?php _e("Enter the API Key received after making the purchase",coming_soon_master)?>">
										</div>
										<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<input type="submit" class="btn purple" value="<?php _e("Validate License!",coming_soon_master)?>">
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
