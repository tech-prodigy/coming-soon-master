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
			$user_role_permission = "publish_pages";
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
		</div>
		<script type="text/javascript">
			jQuery(".tooltips").tooltip();
			jQuery("li > a").parents("li").each(function ()
			{
				if (jQuery(this).parent("ul.page-sidebar-menu").size() === 1)
				{
					jQuery(this).find("> a").append("<span class=\"selected\"></span>");
				}
			});

			jQuery(".page-sidebar").on("click", "li > a", function (e)
			{
				var hasSubMenu = jQuery(this).next().hasClass("sub-menu");
				var parent = jQuery(this).parent().parent();
				var sidebar_menu = jQuery(".page-sidebar-menu");
				var sub = jQuery(this).next();
				var slideSpeed = parseInt(sidebar_menu.data("slide-speed"));
				parent.children("li.open").children(".sub-menu:not(.always-open)").slideUp(slideSpeed);
				parent.children("li.open").removeClass("open");
				if (sub.is(":visible"))
				{
					jQuery(this).parent().removeClass("open");
					sub.slideUp(slideSpeed);
				}
				else if(hasSubMenu)
				{
					jQuery(this).parent().addClass("open");
					sub.slideDown(slideSpeed);
				}
			});

			if(typeof(load_sidebar_content) != "function")
			{
				function load_sidebar_content()
				{
					var menus_height = jQuery(".page-sidebar-menu").height();
					var content_height = jQuery(".page-content").height() + 30;
					if(parseInt(menus_height) > parseInt(content_height))
					{
						jQuery(".page-content").attr("style","min-height:"+menus_height+"px")
					}
					else
					{
						jQuery(".page-sidebar-menu").attr("style","min-height:"+content_height+"px")
					}
				}
			}

			var sidebar_load_interval = setInterval(load_sidebar_content ,1000);

				if(typeof(overlay_loading) != "function")
				{
					function overlay_loading(control_id)
					{
						var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
						jQuery("body").append(overlay_opacity);
						var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
						jQuery("body").append(overlay);

						if(control_id != undefined)
						{
							switch(control_id)
							{
								case "update_logo_settings":
									var message = "<?php _e("Your data has been updated successfully.",coming_soon_master)?>";
									var success = "<?php _e("Success!",coming_soon_master)?>";
								break;

								case "feature_request":
									var message = "<?php _e("Your request email has been sent successfully.",coming_soon_master)?>";
									var success = "<?php _e("Success!",coming_soon_master)?>";
								break;

								case "update_license":
									var message = "<?php _e("Your License has been activated successfully.",coming_soon_master)?>";
									var success = "<?php _e("Success!",coming_soon_master)?>";
								break;

							}
							var issuccessmessage = jQuery("#toast-container").exists();
							if(issuccessmessage != true)
							{
								var shortCutFunction = $("#manage_messages input:checked").val();
								var $toast = toastr[shortCutFunction](message, success);
							}
						}
					}
				}

				if (typeof(remove_overlay) != "function")
				{
					function remove_overlay()
					{
						jQuery(".loader_opacity").remove();
						jQuery(".opacity_overlay").remove();
					}
				}

		<?php
		if(isset($_REQUEST["page"]))
		{
			switch(esc_attr($_REQUEST["page"]))
			{
				case "csm_coming_soon_master":
					?>
					jQuery("#ux_li_plugin_mode").addClass("active");
					load_sidebar_content();
					<?php
				break;

				case "csm_logo_settings":
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_logo_settings").addClass("active");
					load_sidebar_content();
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_logo").val("<?php echo isset($meta_data_array["logo"]) ? $meta_data_array["logo"] : "show";?>");
						jQuery("#ux_ddl_font_logo_type").val("<?php echo isset($meta_data_array["logo_type"]) ? $meta_data_array["logo_type"] : "text";?>");
						jQuery("#ux_ddl_font_style").val("<?php echo isset($meta_data_array["font_style_layout"]) ? $font_style[0] : "40px"?>");
						jQuery("#ux_ddl_font").val("<?php echo isset($meta_data_array["font_style_layout"]) ? $font_style[1] : "bold";?>");
						jQuery("#ux_ddl_font_family").val("<?php echo isset($meta_data_array["font_family_layout"]) ? $meta_data_array["font_family_layout"] : "Roboto Condensed";?>");
						jQuery("#ux_ddl_logo_position").val("<?php echo isset($meta_data_array["logo_position"]) ? $meta_data_array["logo_position"] : "top";?>");
						jQuery("#ux_ddl_logo_link").val("<?php echo isset($meta_data_array["logo_link"]) ? $meta_data_array["logo_link"] : "show";?>");
						jQuery("#ux_ddl_font_logo_size").val("<?php echo isset($meta_data_array["logo_size"]) ? $meta_data_array["logo_size"] : "custom";?>");

						change_type();
						change_logo();
						change_link();
						change_size();

						jQuery("#ux_txt_font_color").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_type) != "function")
					{
						function change_type()
						{
							var type = jQuery("#ux_ddl_font_logo_type").val();
							switch(type)
							{
								case "text" :
									jQuery("#ux_div_logo_text").css("display","block");
									jQuery("#ux_div_logo_img").css("display","none");
								break;

								case "image" :
									jQuery("#ux_div_logo_text").css("display","none");
									jQuery("#ux_div_logo_img").css("display","block");
								break;
							}
						}
					}

					if(typeof(change_logo) != "function")
					{
						function change_logo()
						{
							var logo = jQuery("#ux_ddl_font_logo").val();
							switch(logo)
							{
								case "show" :
									jQuery("#ux_div_logo").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_logo").css("display","none");
								break;
							}
						}
					}

					if(typeof(change_link) != "function")
					{
						function change_link()
						{
							var logo = jQuery("#ux_ddl_logo_link").val();
							switch(logo)
							{
								case "show" :
									jQuery("#ux_div_logo_link").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_logo_link").css("display","none");
								break;
							}
						}
					}

					if(typeof(change_size) != "function")
					{
						function change_size()
						{
							var logo = jQuery("#ux_ddl_font_logo_size").val();
							switch(logo)
							{
								case "custom" :
									jQuery("#ux_div_width").css("display","block");
								break;

								case "default" :
									jQuery("#ux_div_width").css("display","none");
								break;
							}
						}
					}

					var csm_frm_logo_settings = jQuery("#ux_frm_logo_settings");
					csm_frm_logo_settings.validate
					({
						rules:
						{
							ux_txt_width:
							{
								required: true
							},
							ux_txt_height:
							{
								required: true
							},
							ux_txt_logo_link:
							{
								required: true
							},
							ux_txt_font_color:
							{
								required: true
							},
							ux_txt_Logo_type:
							{
								required: true
							},
							ux_txt_logo_text:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form )
						{
							jQuery.post(ajaxurl,
							{
								data: jQuery("#ux_frm_logo_settings").serialize(),
								param: "logo_settings_module",
								action: "coming_soon_master",
								_wp_nonce:"<?php echo $csm_logo_settings;?>"
							},
							function()
							{
								overlay_loading("update_logo_settings");
								setTimeout(function()
								{
									remove_overlay();
									window.location.href = "admin.php?page=csm_coming_soon_master";
								}, 3000);
							});
						}
					});
					<?php
				break;

				case "csm_favicon_settings":
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_favicon_settings").addClass("active");
					load_sidebar_content();

					jQuery(document).ready(function()
					{
						change_favicon_settings();
					});

					if(typeof(change_favicon_settings) != "function")
					{
						function change_favicon_settings()
						{
							var type = jQuery("#ux_ddl_favicon_settings").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_favicon").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_favicon").css("display","none");
								break;
							}
						}
					}

					var csm_frm_favicon_settings = jQuery("#ux_frm_favicon_settings");
					csm_frm_favicon_settings.validate
					({
						rules:
						{
							ux_txt_upload:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{
							jQuery.post(ajaxurl,
							{
								data: jQuery("#ux_frm_favicon_settings").serialize(),
								param: "favicon_settings_module",
								action: "coming_soon_master",
								_wp_nonce:"<?php echo $csm_favicon_settings;?>"
							},
							function()
							{
								overlay_loading("update_favicon_settings");
								setTimeout(function()
								{
									remove_overlay();
									window.location.href = "admin.php?page=csm_favicon_settings";
								}, 3000);
							});
						}
					});
					<?php
				break;

				case "csm_heading_settings":
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_heading_settings").addClass("active");
					load_sidebar_content();

					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_heading_settings").val("<?php echo isset($meta_data_array["heading_settings"]) ? $meta_data_array["heading_settings"] : "show";?>");
						jQuery("#ux_ddl_font_style_heading").val("<?php echo isset($meta_data_array["font_style_heading"]) ? $font_style[0] : "96px"?>");
						jQuery("#ux_ddl_font_heading_settings").val("<?php echo isset($meta_data_array["font_style_heading"]) ? $font_style[1] : "bold";?>");
						jQuery("#ux_ddl_font_family_heading").val("<?php echo isset($meta_data_array["font_family_heading"]) ? $meta_data_array["font_family_heading"] : "Roboto Condensed";?>");
						jQuery("#ux_ddl_heading_position").val("<?php echo isset($meta_data_array["heading_position"]) ? $meta_data_array["heading_position"] : "top";?>");

						change_heading_settings();
						jQuery("#ux_clr_heading_settings").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_heading_settings) != "function")
					{
						function change_heading_settings()
						{
							var type = jQuery("#ux_ddl_heading_settings").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_heading_text").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_heading_text").css("display","none");
								break;
							}
						}
					}

					var csm_frm_heading_settings = jQuery("#ux_frm_heading_settings");
					csm_frm_heading_settings.validate
					({
						rules:
						{
							ux_heading_content:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{
							jQuery.post(ajaxurl,
							{
								data: jQuery("#ux_frm_heading_settings").serialize(),
								param: "heading_settings_module",
								action: "coming_soon_master",
								_wp_nonce:"<?php echo $csm_heading_settings;?>"
							},
							function()
							{
								overlay_loading("update_heading_settings");
								setTimeout(function()
								{
									remove_overlay();
									window.location.href = "admin.php?page=csm_heading_settings";
								}, 3000);
							});
						}
					});
					<?php
				break;

				case "csm_description_settings":
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_description_settings").addClass("active");
					load_sidebar_content();
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_description_settings").val("<?php echo isset($meta_data_array["description_settings"]) ? $meta_data_array["description_settings"] : "show";?>");
						jQuery("#ux_ddl_font_style_description").val("<?php echo isset($meta_data_array["font_style_description"]) ? $font_style[0] : "20px"?>");
						jQuery("#ux_ddl_font_description_settings").val("<?php echo isset($meta_data_array["font_style_description"]) ? $font_style[1] : "bold";?>");
						jQuery("#ux_ddl_font_family_description").val("<?php echo isset($meta_data_array["font_family_description"]) ? $meta_data_array["font_family_description"] : "Roboto Condensed";?>");
						jQuery("#ux_ddl_description_position").val("<?php echo isset($meta_data_array["description_position"]) ? $meta_data_array["description_position"] : "top";?>");

						change_description_settings();
						jQuery("#ux_clr_description_settings").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_description_settings) != "function")
					{
						function change_description_settings()
						{
							var type = jQuery("#ux_ddl_description_settings").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_description_text").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_description_text").css("display","none");
								break;
							}
						}
					}

					var csm_frm_description_settings = jQuery("#ux_frm_description_settings");
					csm_frm_description_settings.validate
					({
						rules:
						{
							ux_description_content:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{
							jQuery.post(ajaxurl,
							{
								data: jQuery("#ux_frm_description_settings").serialize(),
								param: "description_settings_module",
								action: "coming_soon_master",
								_wp_nonce:"<?php echo $csm_description_settings;?>"
							},
							function()
							{
								overlay_loading("update_description_settings");
								setTimeout(function()
								{
									remove_overlay();
									window.location.href = "admin.php?page=csm_description_settings";
								}, 3000);
							});
						}
					});
					<?php
				break;

				case "csm_footer_settings":
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_footer_settings").addClass("active");
					load_sidebar_content();

					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_footer_settings").val("<?php echo isset($meta_data_array["footer_settings"]) ? $meta_data_array["footer_settings"] : "show";?>");
						jQuery("#ux_ddl_font_style_footer").val("<?php echo isset($meta_data_array["font_style_footer"]) ? $font_style[0] : "20px"?>");
						jQuery("#ux_ddl_font_footer_settings").val("<?php echo isset($meta_data_array["font_style_footer"]) ? $font_style[1] : "bold";?>");
						jQuery("#ux_ddl_font_family_footer").val("<?php echo isset($meta_data_array["font_family_footer"]) ? $meta_data_array["font_family_footer"] : "Roboto Condensed";?>");
						jQuery("#ux_ddl_footer_position").val("<?php echo isset($meta_data_array["footer_position"]) ? $meta_data_array["footer_position"] : "top";?>");

						change_footer_settings();
						jQuery("#ux_clr_footer_settings").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_footer_settings) != "function")
					{
						function change_footer_settings()
						{
							var type = jQuery("#ux_ddl_footer_settings").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_footer_text").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_footer_text").css("display","none");
								break;
							}
						}
					}

					var csm_frm_footer_settings = jQuery("#ux_frm_footer_settings");
					csm_frm_footer_settings.validate
					({
						rules:
						{
							ux_footer_content:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{
							jQuery.post(ajaxurl,
							{
								data: jQuery("#ux_frm_footer_settings").serialize(),
								param: "footer_settings_module",
								action: "coming_soon_master",
								_wp_nonce:"<?php echo $csm_footer_settings;?>"
							},
							function()
							{
								overlay_loading("update_footer_settings");
								setTimeout(function()
								{
									remove_overlay();
									window.location.href = "admin.php?page=csm_footer_settings";
								}, 3000);
							});
						}
					});
					<?php
				break;

				case "csm_background_settings":
					?>
					jQuery("#ux_li_background_settings").addClass("active");
					jQuery(document).ready(function()
					{
						change_background_type();
						change_overlay();
						change_video_overlay();
						change_slideshow_overlay();
						jQuery("#ux_txt_background_color").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_txt_Overlay_color").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_txt_Overlay_color_video").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_txt_Overlay_color_slideshow").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_background_type) != "function")
					{
						function change_background_type()
						{
							var type = jQuery("#ux_ddl_background_type").val();
							switch(type)
							{
								case "color" :
									jQuery("#ux_div_color").css("display","block");
									jQuery("#ux_div_image").css("display","none");
									jQuery("#ux_div_video").css("display","none");
									jQuery("#ux_div_slideshow").css("display","none");
								break;

								case "image" :
									jQuery("#ux_div_color").css("display","none");
									jQuery("#ux_div_image").css("display","block");
									jQuery("#ux_div_video").css("display","none");
									jQuery("#ux_div_slideshow").css("display","none");
								break;

								case "video" :
									jQuery("#ux_div_color").css("display","none");
									jQuery("#ux_div_image").css("display","none");
									jQuery("#ux_div_video").css("display","block");
									jQuery("#ux_div_slideshow").css("display","none");
								break;

								case "slideshow" :
									jQuery("#ux_div_color").css("display","none");
									jQuery("#ux_div_image").css("display","none");
									jQuery("#ux_div_video").css("display","none");
									jQuery("#ux_div_slideshow").css("display","block");
								break;
							}
							load_sidebar_content();
						}
					}

					if(typeof(change_overlay) != "function")
					{
						function change_overlay()
						{
							var type = jQuery("#ux_ddl_img_overlay").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_img_overlay").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_img_overlay").css("display","none");
								break;
							}
						}
					}

					if(typeof(change_video_overlay) != "function")
					{
						function change_video_overlay()
						{
							var type = jQuery("#ux_ddl_video_overlay").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_video_overlay").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_video_overlay").css("display","none");
								break;
							}
						}
					}

					if(typeof(change_slideshow_overlay) != "function")
					{
						function change_slideshow_overlay()
						{
							var type = jQuery("#ux_ddl_slideshow_overlay").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_slideshow_overlay").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_slideshow_overlay").css("display","none");
								break;
							}
						}
					}

					var csm_frm_background_settings = jQuery("#ux_frm_background_settings");
					csm_frm_background_settings.validate
					({
						rules:
						{
							ux_txt_background_color:
							{
								required: true
							},
							ux_txt_background_color_opacity:
							{
								required: true
							},
							ux_txt_upload_text:
							{
								required: true
							},
							ux_txt_Overlay_color:
							{
								required: true
							},
							ux_txt_Overlay_color_opacity:
							{
								required: true
							},
							ux_txt_video_url:
							{
								required: true
							},
							ux_txt_Overlay_color_video:
							{
								required: true
							},
							ux_txt_Overlay_color_opacity_video:
							{
								required: true
							},
							ux_txt_upload_text_slideshow:
							{
								required: true
							},
							ux_txt_duration:
							{
								required: true
							},
							ux_txt_Overlay_color_slideshow:
							{
								required: true
							},
							ux_txt_Overlay_color_opacity_slideshow:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					<?php
				break;

				case "csm_counter":
					?>
					jQuery("#ux_li_counter").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_counter").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_counter").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_counter").val("<?php echo $meta_data_array["font_family_countdown"];?>");

						change_countdown_timer();
						jQuery("#ux_clr_counter").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_txt_launch_date").datepicker(
						{
							textFormat:"yy-mm-dd"
						});
					});

					if(typeof(change_countdown_timer) != "function")
					{
						function change_countdown_timer()
						{
							var type = jQuery("#ux_ddl_countdown_timer").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_countdown_timer").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_countdown_timer").css("display","none");
								break;
							}
						}
					}
					load_sidebar_content();

					var csm_frm_counter = jQuery("#ux_frm_counter");
					csm_frm_counter.validate
					({
						rules:
						{
							ux_txt_launch_date:
							{
								required: true
							},
							ux_txt_countdown_text:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					<?php
				break;

				case "csm_social_settings":
					?>
					jQuery("#ux_li_social_settings").addClass("active");
					load_sidebar_content();
					<?php
				break;

				case "csm_subscription_heading_settings":
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_heading_settings").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_heading_subscription").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_heading_settings_subscription").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_heading_subscription").val("<?php echo $meta_data_array["font_family_heading_subscription"];?>");

						change_heading_settings_subscription();
						jQuery("#ux_clr_heading_settings_subscription").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_heading_settings_subscription) != "function")
					{
						function change_heading_settings_subscription()
						{
							var type = jQuery("#ux_ddl_heading_settings_subscription").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_heading_text_subscription").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_heading_text_subscription").css("display","none");
								break;
							}
						}
					}
					load_sidebar_content();

					var csm_frm_subscription_heading_settings = jQuery("#ux_frm_subscription_heading_settings");
					csm_frm_subscription_heading_settings.validate
					({
						rules:
						{
							ux_heading_content_subscription:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					<?php
				break;

				case "csm_subscription_description_settings":
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_description_settings").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_description_subscription").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_description_settings_subscription").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_description_subscription").val("<?php echo $meta_data_array["font_family_description_subscription"];?>");

						change_description_settings_subscription();
						jQuery("#ux_clr_description_settings_subscription").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_description_settings_subscription) != "function")
					{
						function change_description_settings_subscription()
						{
							var type = jQuery("#ux_ddl_description_settings_subscription").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_description_text_subscription").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_description_text_subscription").css("display","none");
								break;
							}
						}
					}
					load_sidebar_content();

					var csm_frm_subscription_description_settings = jQuery("#ux_frm_subscription_description_settings");
					csm_frm_subscription_description_settings.validate
					({
						rules:
						{
							ux_description_content_subscription:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					<?php
				break;

				case "csm_subscription_button_settings":
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_button_settings").addClass("active");

					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_button_subscription").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_button_settings_subscription").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_button_subscription").val("<?php echo $meta_data_array["font_family_button_subscription"];?>");

						jQuery("#ux_clr_button_settings_subscription").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_clr_button_color").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_clr_hover_color").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					var csm_frm_subscription_button_settings = jQuery("#ux_frm_button_settings");
					csm_frm_subscription_button_settings.validate
					({
						rules:
						{
							ux_txt_button_label:
							{
								required: true
							},
							ux_txt_button_color:
							{
								required: true
							},
							ux_txt_hover_color:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					load_sidebar_content();
					<?php
				break;

				case "csm_subscription_success_settings":
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_success_settings").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_success_subscription").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_success_settings_subscription").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_success_subscription").val("<?php echo $meta_data_array["font_family_success_subscription"];?>");

						change_success_settings_subscription();
						jQuery("#ux_clr_success_settings_subscription").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_success_settings_subscription) != "function")
					{
						function change_success_settings_subscription()
						{
							var type = jQuery("#ux_ddl_success_settings_subscription").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_success_text_subscription").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_success_text_subscription").css("display","none");
								break;
							}
						}
					}
					load_sidebar_content();

					var csm_frm_subscription_success_settings = jQuery("#ux_frm_subscription_success_settings");
					csm_frm_subscription_success_settings.validate
					({
						rules:
						{
							ux_success_content_subscription:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					<?php
				break;

				case "csm_subscription_error_settings":
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_error_settings").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_error_subscription").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_heading_settings_subscription").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_error_subscription").val("<?php echo $meta_data_array["font_family_subscription"];?>");

						change_error_settings_subscription();
						jQuery("#ux_clr_error_settings_subscription").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_error_settings_subscription) != "function")
					{
						function change_error_settings_subscription()
						{
							var type = jQuery("#ux_ddl_error_settings_subscription").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_error_text_subscription").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_error_text_subscription").css("display","none");
								break;
							}
						}
					}
					load_sidebar_content();

					var csm_frm_subscription_error_settings = jQuery("#ux_frm_subscription_error_settings");
					csm_frm_subscription_error_settings.validate
					({
						rules:
						{
							ux_error_content_subscription:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					<?php
				break;

				case "csm_label_settings":
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_label_settings").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_label").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_label_settings").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_label").val("<?php echo $meta_data_array["font_family_label"];?>");

						change_name_field();
						change_name_email();
						change_message_field();
						jQuery("#ux_clr_label_settings").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_name_field) != "function")
					{
						function change_name_field()
						{
							var type = jQuery("#ux_ddl_name_field").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_name_field").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_name_field").css("display","none");
								break;
							}
						}
					}

					if(typeof(change_name_email) != "function")
					{
						function change_name_email()
						{
							var type = jQuery("#ux_ddl_email_field").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_email").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_email").css("display","none");
								break;
							}
						}
					}

					if(typeof(change_message_field) != "function")
					{
						function change_message_field()
						{
							var type = jQuery("#ux_ddl_message_field").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_message").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_message").css("display","none");
								break;
							}
						}
					}

					var csm_frm_label_settings = jQuery("#ux_frm_label_settings");
					csm_frm_label_settings.validate
					({
						rules:
						{
							ux_txt_name_label:
							{
								required: true
							},
							ux_txt_email_label:
							{
								required: true
							},
							ux_txt_message_label:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					load_sidebar_content();
					<?php
				break;

				case "csm_button_settings":
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_button_settings").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_button_cf").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_button_settings_cf").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_button_cf").val("<?php echo $meta_data_array["font_family_button_contact_form"];?>");

						jQuery("#ux_clr_button_settings_cf").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_clr_hover_color_cf").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
						jQuery("#ux_clr_button_color_cf").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					var csm_frm_button_settings = jQuery("#ux_frm_button_settings");
					csm_frm_button_settings.validate
					({
						rules:
						{
							ux_txt_button_label_cf:
							{
								required: true
							},
							ux_txt_button_color_cf:
							{
								required: true
							},
							ux_txt_hover_color_cf:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					load_sidebar_content();
					<?php
				break;

				case "csm_success_message_settings":
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_success_message_settings").addClass("active");
					jQuery(document).ready(function()
					{
						jQuery("#ux_ddl_font_style_success_cf").val("<?php echo $font_style[0];?>");
						jQuery("#ux_ddl_font_success_settings_cf").val("<?php echo $font_style[1];?>");
						jQuery("#ux_ddl_font_family_success_cf").val("<?php echo $meta_data_array["font_family_success_message_settings_contact_form"];?>");

						change_success_message_settings();
						jQuery("#ux_clr_success_settings_cf").colpick
						({
							layout:"hex",
							colorScheme:"dark",
							onChange:function(hsb,hex,rgb,el,bySetColor)
							{
								if(!bySetColor) jQuery(el).val("#"+hex);
							}
						}).keyup(function()
						{
							jQuery(this).colpickSetColor("#"+this.value);
						});
					});

					if(typeof(change_success_message_settings) != "function")
					{
						function change_success_message_settings()
						{
							var type = jQuery("#ux_ddl_success_settings_cf").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_success_message_settings").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_success_message_settings").css("display","none");
								break;
							}
						}
					}

					var csm_frm_success_message_settings = jQuery("#ux_frm_success_message_settings");
					csm_frm_success_message_settings.validate
					({
						rules:
						{
							ux_success_content_cf:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});
					load_sidebar_content();
					<?php
				break;

				case "csm_google_map_settings":
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_google_map_settings").addClass("active");

					jQuery(document).ready(function()
					{
						change_google_map();
						change_location();
						csm_initialize();
					});
					var latitude = 35.38453628611739;
					var longitude = -97.03259696914063;
					var input = "";

					load_sidebar_content();
					jQuery(document).ready(function()
					{
						jQuery("#ux_li_locations").addClass("active");
						jQuery("#ux_li_add_new_location").addClass("active");
						change_display();
						csm_initialize();
						digits_dots_only();
					});

					if(typeof(csm_initialize) != "function")
					{
						function csm_initialize()
						{
							var mapOptions =
							{
								center: new google.maps.LatLng(latitude, longitude),
								zoom: 13
							};
							var map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
							var autocomplete = new google.maps.places.Autocomplete(input);
							autocomplete.bindTo("bounds", map);
							google.maps.event.addListener(autocomplete, "place_changed", function()
							{
								var place = autocomplete.getPlace();
								if (place.geometry.viewport)
								{
									map.fitBounds(place.geometry.viewport);
								}
								else
								{
									map.setCenter(place.geometry.location);
								}
							});
						}
					}

					if(typeof(change_google_map) != "function")
					{
						function change_google_map()
						{
							var type = jQuery("#ux_ddl_google_map").val();
							switch(type)
							{
								case "show" :
									jQuery("#ux_div_google_map").css("display","block");
								break;

								case "hide" :
									jQuery("#ux_div_google_map").css("display","none");
								break;
							}
						}
					}

					if(typeof(change_location) != "function")
					{
						function change_location()
						{
							var type = jQuery("#ux_ddl_location").val();
							switch(type)
							{
								case "formatted-address" :
									jQuery("#ux_div_format").css("display","block");
									jQuery("#ux_div_area_code").css("display","none");
									jQuery("#ux_div_latitude").css("display","none");
									input = document.getElementById("ux_txt_formatted_address");
									csm_initialize();
								break;

								case "areacode" :
									jQuery("#ux_div_format").css("display","none");
									jQuery("#ux_div_area_code").css("display","block");
									jQuery("#ux_div_latitude").css("display","none");
									input = document.getElementById("ux_txt_area_code");
									csm_initialize();
								break;

								case "latitude" :
									jQuery("#ux_div_format").css("display","none");
									jQuery("#ux_div_area_code").css("display","none");
									jQuery("#ux_div_latitude").css("display","block");

									latitude = jQuery("#ux_txt_latitude").val();
									longitude = jQuery("#ux_txt_longitude").val();
									csm_initialize();
								break;
							}
						}
					}

					var csm_frm_google_map_settings = jQuery("#ux_frm_google_map_settings");
					csm_frm_google_map_settings.validate
					({
						rules:
						{
							ux_txt_formatted_address:
							{
								required: true
							},
							ux_txt_area_code:
							{
								required: true
							},
							ux_txt_latitude:
							{
								required: true
							},
							ux_txt_longitude:
							{
								required: true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{

						}
					});

					jQuery('#ux_txt_latitude').keypress(function(event)
					{
						if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9)
						{
							return true;
						}
						else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
						{
							event.preventDefault();
						}
					});

					jQuery('#ux_txt_longitude').keypress(function(event)
					{
						if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9)
						{
							return true;
						}
						else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
						{
							event.preventDefault();
						}
					});

					load_sidebar_content();
					<?php
				break;

				case "csm_general_settings":
					?>
					jQuery("#ux_li_general_settings").addClass("active");
					load_sidebar_content();
					<?php
				break;

				case "csm_feature_requests":
					?>
					jQuery("#ux_li_feature_requests").addClass("active");
					load_sidebar_content();

					var features_array = [];
					var url = "http://tech-prodigy.org/feedbacks.php";
					var csm_frm_feature_request = jQuery("#ux_frm_feature_requests");
					csm_frm_feature_request.validate
					({
						rules:
						{
							ux_txt_your_name:
							{
								required:true
							},
							ux_txt_email_address:
							{
								required:true,
								email:true
							},
							ux_txtarea_feature_request:
							{
								required:true
							}
						},

						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function(form)
						{
							features_array.push(jQuery("#ux_txt_your_name").val());
							features_array.push(jQuery("#ux_txt_email_address").val());
							features_array.push(domain_url);
							features_array.push(jQuery("#ux_txtarea_feature_request").val());
							jQuery.post(url,
							{
								data :JSON.stringify(features_array),
								param: "csm_feature_requests"
							},
							function()
							{
								overlay_loading("feature_request");
								setTimeout(function()
								{
									remove_overlay();
									window.location.reload();
								}, 3000);
							});
						}
					});
					<?php
				break;

				case "csm_premium_editions":
					?>
					jQuery("#ux_li_premium_editions").addClass("active");
					load_sidebar_content();
					<?php
				break;

				case "csm_system_information":
					?>
					jQuery("#ux_li_system_information").addClass("active");
					load_sidebar_content();

					jQuery.getSystemReport = function (strDefault, stringCount, string, location)
					{
						var o = strDefault.toString();
						if (!string)
						{
							string = "0";
						}
						while (o.length < stringCount)
						{
							if (location == "undefined")
							{
								o = string + o;
							}
							else
							{
								o = o + string;
							}
						}
						return o;
					};
					jQuery(".system-report").click(function ()
					{
						var report = "";
						jQuery(".custom-form-body").each(function ()
						{
							jQuery("h3.form-section", jQuery(this)).each(function ()
							{
								report = report + "\n### " + jQuery.trim(jQuery(this).text()) + " ###\n\n";
							});
							jQuery("tbody > tr", jQuery(this)).each(function ()
							{
								var the_name = jQuery.getSystemReport(jQuery.trim(jQuery(this).find("strong").text()), 25, " ");
								var the_value = jQuery.trim(jQuery(this).find("span").text());
								var value_array = the_value.split(", ");
								if (value_array.length > 1)
								{
									var temp_line = "";
									jQuery.each(value_array, function (key, line)
									{
										var tab = ( key == 0 ) ? 0 : 25;
										temp_line = temp_line + jQuery.getSystemReport("", tab, " ", "f") + line + "\n";
									});
									the_value = temp_line;
								}
								report = report + "" + the_name + the_value + "\n";
							});
						});
						try
						{
							jQuery("#ux_system_information").slideDown();
							jQuery("#ux_system_information textarea").val(report).focus().select();
							return false;
						} catch (e)
						{
							console.log(e);
						}
						return false;
					});
					jQuery("#ux_btn_system_information").click(function ()
					{
						if(jQuery("#ux_btn_system_information").text() == "Close System Information!")
						{
							jQuery("#ux_system_information").slideUp();
							jQuery("#ux_btn_system_information").html("Get System Information!");
						}
						else
						{
							jQuery("#ux_btn_system_information").html("Close System Information!");
							jQuery("#ux_btn_system_information").removeClass("system-information");
							jQuery("#ux_btn_system_information").addClass("close-information");
						}
					});
					<?php
				break;

				case "csm_licensing":
					?>
					jQuery("#ux_li_licensing").addClass("active");
					var license_array= [];
					var License_id = "<?php echo intval($csm_licensing->licensing_id) ?>";
					var csm_frm_licensing = jQuery("#ux_frm_licensing");
					csm_frm_licensing.validate
					({
						rules:
						{
							ux_txt_api_key:
							{
								required: true
							},
							ux_txt_order_id:
							{
								required: true,
								digits: true
							}
						},
						errorPlacement: function (error, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							icon.removeClass("fa-check").addClass("fa-warning");
							icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
						},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							var icon = jQuery(element).parent(".input-icon").children("i");
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							icon.removeClass("fa-warning").addClass("fa-check");
						},
						submitHandler: function (form)
						{
							jQuery.post(ajaxurl,
							{
								data: jQuery("#ux_frm_licensing").serialize(),
								license_id: License_id,
								param: "licensing_module",
								action: "coming_soon_master",
								_wp_nonce:"<?php echo $csm_license;?>"
							},
							function()
							{
								overlay_loading("update_license");
								setTimeout(function()
								{
									remove_overlay();
									window.location.href = "admin.php?page=csm_coming_soon_master";
								}, 3000);
							});
						}
					});
					load_sidebar_content();
					<?php
				break;
			}
		}
	?>
	</script>
	<?php
	}
}
?>
