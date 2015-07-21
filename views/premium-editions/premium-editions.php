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
								<?php _e("Premium Editions",coming_soon_master); ?>
							</span>
						</li>
					</ul>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-briefcase"></i>
									<?php _e("Premium Editions",coming_soon_master);?>
								</div>
							</div>
							<div class="portlet-body form">
								<form id="ux_frm_premium_editions">
									<div class="form-body">
										<div class="row margin-bottom-40 margin-top-10 pricing-box">
											<div class="col-md-4">
												<div class="pricing hover-effect">
													<div class="pricing-head">
														<h3>
															<?php _e("Beginner",coming_soon_master)?>
															<span>
																<?php _e("For WordPress Beginners",coming_soon_master)?>
															</span>
														</h3>
														<h4>
															<i>$</i><i>3</i>
															<span>
																<?php _e("Per Month",coming_soon_master)?>
															</span>
														</h4>
													</div>
													<ul class="pricing-content list-unstyled">
														<li>
															<i class="icon icon-check"></i>
															<?php _e("For Single Installation",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Support Multisite",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Unlimited Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Unlimited Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Multi-Lingual",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Auto Plugin Updates",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Default Lightbox",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Restore Settings",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Purge Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("SEO Friendly",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Thumbnail Settings",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Support Media Manager",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Upload Videos",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Bulk Deletion",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Flip Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Rotate Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Copy Images to Other Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Move Images to Other Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Exclude Images from Galleries",coming_soon_master)?>
														</li>
													</ul>
													<div class="pricing-footer">
														<a target="_blank" href="http://tech-prodigy.org/product/gallery-master-beginner-edition/" class="btn purple">
															<?php _e("Order Now",coming_soon_master)?>
															<i class="m-icon-swapright m-icon-white"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="pricing pricing-active hover-effect">
													<div class="pricing-head pricing-head-active">
														<h3>
															<?php _e("Pro",coming_soon_master)?>
															<span>
																<?php _e("For Wordpress Pro Users",coming_soon_master)?>
															</span>
														</h3>
														<h4>
															<i>$</i><i>5</i>
															<span>
																<?php _e("Per Month",coming_soon_master)?>
															</span>
														</h4>
													</div>
													<ul class="pricing-content list-unstyled">
														<li>
															<i class="icon icon-check"></i>
															<?php _e("For Single Installation",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-close red-icon"></i>
															<?php _e("Support Multisite",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Unlimited Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Unlimited Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Multi-Lingual",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Auto Plugin Updates",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Default Lightbox",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Restore Settings",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Purge Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("SEO Friendly",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Thumbnail Settings",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Support Media Manager",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Upload Videos",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Bulk Deletion",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Flip Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Rotate Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Copy Images to Other Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Move Images to Other Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Exclude Images from Galleries",coming_soon_master)?>
														</li>
													</ul>
													<div class="pricing-footer">
														<a target="_blank" href="http://tech-prodigy.org/product/gallery-master-pro-edition/" class="btn purple">
															<?php _e("Order Now",coming_soon_master)?>
															<i class="m-icon-swapright m-icon-white"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="pricing hover-effect">
													<div class="pricing-head">
														<h3>
															<?php _e("Developer",coming_soon_master)?>
															<span>
																<?php _e("Upto 5 Websites for Pro Users",coming_soon_master)?>
															</span>
														</h3>
														<h4>
															<i>$</i><i>35</i>
															<span>
																<?php _e("Per Month",coming_soon_master)?>
															</span>
														</h4>
													</div>
													<ul class="pricing-content list-unstyled">
														<li>
															<i class="icon icon-check"></i>
															<?php _e("For 10 Installations",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Support Multisite",coming_soon_master)?>
															<span class="required" aria-required="true">*</span>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Unlimited Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Unlimited Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Multi-Lingual",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Auto Plugin Updates",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Default Lightbox",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Restore Settings",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Purge Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("SEO Friendly",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Thumbnail Settings",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Support Media Manager",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Upload Videos",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Bulk Deletion",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Flip Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Rotate Images",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Copy Images to Other Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Move Images to Other Galleries",coming_soon_master)?>
														</li>
														<li>
															<i class="icon icon-check"></i>
															<?php _e("Exclude Images from Galleries",coming_soon_master)?>
														</li>
													</ul>
													<div class="pricing-footer">
														<a target="_blank" href="http://tech-prodigy.org/product/gallery-master-developer-edition/" class="btn purple">
															<?php _e("Order Now",coming_soon_master)?> 
															<i class="m-icon-swapright m-icon-white"></i>
														</a>
													</div>
												</div>
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