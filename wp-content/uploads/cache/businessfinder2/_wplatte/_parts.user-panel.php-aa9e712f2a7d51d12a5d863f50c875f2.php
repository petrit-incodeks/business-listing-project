<?php //netteCache[01]000571a:2:{s:4:"time";s:21:"0.86995500 1663235683";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:83:"/home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/user-panel.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/user-panel.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 's4h9wnzfjx')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($options->theme->header->userPanel == 'enable') { ?>

<?php $descLogin = $options->theme->header->descLogin ;$descRegister = $options->theme->header->descRegister ;$helperUsername = $options->theme->header->helperUsername ;$helperEmail = $options->theme->header->helperEmail ;$conditions = $options->theme->header->conditions ;$captchaEnable = $options->theme->header->headerPanelUseCaptcha ?>

<div class="user-panel">

<?php if (is_user_logged_in()) { ?>

<?php $currentUser = wp_get_current_user() ?>

		<div class="user-info">
			<div class="user-avatar"><?php echo get_avatar($currentUser->ID, 45) ?></div>
			<!--<div class="user-name"></div>-->
		</div>

		<div class="user-actions">
			<a href="<?php echo NTemplateHelpers::escapeHtml(admin_url('profile.php'), ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml(__('Account', 'wplatte'), ENT_COMPAT) ?>
" class="button-account"><?php echo NTemplateHelpers::escapeHtml(__('Account', 'wplatte'), ENT_NOQUOTES) ?><span><i class="fa fa-cog"></i></span></a>
			<a href="<?php echo wp_logout_url(get_permalink()) ?>" title="<?php echo NTemplateHelpers::escapeHtml(__('Logout', 'wplatte'), ENT_COMPAT) ?>
" class="button-logout"><?php echo NTemplateHelpers::escapeHtml(__('Logout', 'wplatte'), ENT_NOQUOTES) ?><span><i class="fa fa-sign-out"></i></span></a>

<?php if (user_can( $currentUser, 'ait_toolkit_items_edit_items' )) { $adminItemsUrl = 'edit.php?post_type=ait-item&author=' . $currentUser->ID ;$itemsCount = intval(count_user_posts($currentUser->ID, "ait-item")) ?>
			<a href="<?php echo NTemplateHelpers::escapeHtml(admin_url($adminItemsUrl), ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml(__('Items', 'wplatte'), ENT_COMPAT) ?>
" class="user-items"><?php echo NTemplateHelpers::escapeHtml(__('My Items', 'wplatte'), ENT_NOQUOTES) ?>
<span><?php echo NTemplateHelpers::escapeHtml($itemsCount, ENT_NOQUOTES) ?></span></a>
<?php } ?>
			
<?php if (defined('AIT_EVENTS_PRO_ENABLED') && user_can( $currentUser, 'ait_toolkit_eventspro_edit_events' )) { $adminEventsUrl = 'edit.php?post_type=ait-event-pro&author=' . $currentUser->ID ;$eventsCount = intval(count_user_posts($currentUser->ID, "ait-event-pro")) ?>
			<a href="<?php echo NTemplateHelpers::escapeHtml(admin_url($adminEventsUrl), ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml(__('Events', 'wplatte'), ENT_COMPAT) ?>
" class="user-events"><?php echo NTemplateHelpers::escapeHtml(__('My Events', 'wplatte'), ENT_NOQUOTES) ?>
<span><?php echo NTemplateHelpers::escapeHtml($eventsCount, ENT_NOQUOTES) ?></span></a>
<?php } ?>
		</div>

<?php wp_enqueue_script( 'modernizr', aitPaths()->url->admin.'/modernizr/modernizr.touch.js') ?:null ?>

		<script type="text/javascript">
			jQuery(document).ready(function(){

				var userPanel = jQuery(".user-panel");

				if(!(Modernizr.touchevents || Modernizr.pointerevents)) {
					userPanel.mouseenter(function(){
						userPanel.addClass('opened');
					})
					userPanel.mouseleave(function(){
						userPanel.removeClass('opened');
					});
				} else {
					userPanel.find(".user-info").click(function(e) {
						e.preventDefault();

						if(isResponsive(640) && jQuery('.main-nav .nav-menu-main').hasClass('menu-opened')){
							jQuery('.main-nav .nav-menu-main').hide().removeClass('menu-opened');
						}

						userPanel.toggleClass("opened");
					});
				}

				jQuery('.main-nav .menu-toggle').on('touchstart', function(){
					jQuery(".user-panel").removeClass("opened");
				});

			});

		</script>

<?php } else { ?>

<?php $rand = rand() ?>

		<a href="#" class="toggle-button"><?php echo NTemplateHelpers::escapeHtml(__('Login', 'wplatte'), ENT_NOQUOTES) ?></a>

		<div class="login-register widget_login">
			<div class="userlogin-container user-not-logged-in">
				<div class="userlogin-tabs">
					<div class="userlogin-tabs-menu">
						<a class="userlogin-option-active" href="#"><?php echo NTemplateHelpers::escapeHtml(__('Login', 'wplatte'), ENT_NOQUOTES) ?></a>
<?php if ((get_option( 'users_can_register' ))) { ?>
						<a href="#"><?php echo NTemplateHelpers::escapeHtml(__('Register', 'wplatte'), ENT_NOQUOTES) ?></a>
<?php } ?>
					</div>
					<div class="userlogin-tabs-contents">
						<div class="userlogin-tabs-content userlogin-option-active">
<?php if ($descLogin != '') { ?>
							<p><?php echo $descLogin ?></p>
<?php } wp_login_form( array( 'redirect' => get_permalink(), 'form_id' => 'ait-login-form-panel', 'echo' => true, 'remember' => false, 'id_username' => 'user_login_panel', 'id_password' => 'user_pass_panel', 'id_submit' => 'wp-submit-panel') ) ?>
						</div>
<?php if ((get_option( 'users_can_register' ))) { ?>

						<div class="userlogin-tabs-content">
<?php if ($descRegister !='') { ?>
							<p><?php echo $descRegister ?></p>
<?php } ?>
							<form method="post" action="<?php echo NTemplateHelpers::escapeHtml(home_url('/?ait-action=register&source=panel'), ENT_COMPAT) ?>" class="wp-user-form user-register-form">
								<p class="input-container input-username">
									<label for="user_login_reg"><?php echo NTemplateHelpers::escapeHtml(__('Username', 'wplatte'), ENT_NOQUOTES) ?></label>
									<input type="text" name="user_login" id="user_login_reg" value="" size="20" tabindex="81" />
									<?php if ($helperUsername) { ?><span class="helper"><?php echo $helperUsername ?>
</span><?php } ?>

								</p>
								<p class="input-container input-email">
									<label for="user_email_reg"><?php echo NTemplateHelpers::escapeHtml(__('Email', 'wplatte'), ENT_NOQUOTES) ?></label>
									<input type="text" name="user_email" id="user_email_reg" value="" size="20" tabindex="82" />
									<?php if ($helperEmail) { ?><span class="helper"><?php echo $helperEmail ?>
</span><?php } ?>

								</p>

<?php $themeOptions = $options->theme ;$themePackages = new ThemePackages() ;$orderedPackages = $themePackages->getOrderedPackages() ?>

								<p class="input-container input-role">
<?php if (count($orderedPackages) == 1) { $package = $themePackages->getPackageBySlug($orderedPackages[0]) ;$packageOptions = $package->getOptions() ;$isFree = $packageOptions['price'] == 0 ? "true" : "false" ?>
										<span><?php echo NTemplateHelpers::escapeHtml($package->getName(), ENT_NOQUOTES) ?>
 (<?php echo NTemplateHelpers::escapeHtml($packageOptions['price'], ENT_NOQUOTES) ?>
 <?php echo NTemplateHelpers::escapeHtml($themeOptions->payments->currency, ENT_NOQUOTES) ?>)</span>
										<input type="hidden" name="user_role" value="<?php echo NTemplateHelpers::escapeHtml($package->getSlug(), ENT_COMPAT) ?>
" data-isfree="<?php echo NTemplateHelpers::escapeHtml($isFree, ENT_COMPAT) ?>" />
<?php } else { ?>
										<select id="user_role_panel" name="user_role" tabindex="83">
<?php $iterations = 0; foreach ($orderedPackages as $key => $value) { $package = $themePackages->getPackageBySlug($value) ;$packageOptions = $package->getOptions() ;$isFree = $packageOptions['price'] == 0 ? "true" : "false" ?>
												<option value="<?php echo NTemplateHelpers::escapeHtml($package->getSlug(), ENT_COMPAT) ?>
" data-isfree="<?php echo NTemplateHelpers::escapeHtml($isFree, ENT_COMPAT) ?>"><?php echo NTemplateHelpers::escapeHtml($package->getName(), ENT_NOQUOTES) ?>
 <?php echo NTemplateHelpers::escapeHtml($packageOptions['price'], ENT_NOQUOTES) ?>
 <?php echo NTemplateHelpers::escapeHtml($themeOptions->payments->currency, ENT_NOQUOTES) ?></option>
<?php $iterations++; } ?>
										</select>
<?php } ?>
								</p>

<?php $themeConfig = aitConfig()->getFullConfig('theme') ;$paymentGates = $themeOptions->payments ;unset($paymentGates->currency) ;$paymentGatesConfig = $themeConfig['payments']['@options'][1] ;$paymentGatesInstalled = array() ;$paymentGatesEnabled = array() ?>

<?php $iterations = 0; foreach ($paymentGates as $name => $value) { if ($paymentGatesConfig[$name]['controller'] == "none" or class_exists($paymentGatesConfig[$name]['controller'])) { $paymentGatesInstalled[$name] = $value ;} $iterations++; } ?>

<?php $iterations = 0; foreach ($paymentGatesInstalled as $name => $value) { if (((bool)$value == true)) { $paymentGatesEnabled[$name] = $value ;} $iterations++; } ?>

<?php $paymentGatesTexts = array(
									'bankTransfer'    => __('Bank Transfer', 'ait'),
									'paypal' => 'PayPal',
									'paypalRecurring' => __('PayPal Recurring', 'ait'),
									'stripe' => 'Stripe',
								) ?>

<?php if (count($paymentGatesEnabled) > 0) { $firstPackage = $themePackages->getPackageBySlug($orderedPackages[0]) ;$firstPackageOptions = $firstPackage->getOptions() ;if (($firstPackageOptions['price'] == 0)) { ?>
									<p class="input-container input-payment" style="display: none;">
<?php } else { ?>
									<p class="input-container input-payment">
<?php } ?>
									<select id="user_payment_panel" name="user_payment" tabindex="84">
<?php $iterations = 0; foreach ($paymentGatesEnabled as $name => $value) { ?>
										<option value="<?php echo NTemplateHelpers::escapeHtml($name, ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($paymentGatesTexts[$name], ENT_NOQUOTES) ?></option>
<?php $iterations++; } ?>
									</select>
								</p>
<?php } ?>

<?php if ($conditions != "") { ?>
								<p class="input-container input-required-conditions">
									<input type="checkbox" name="required_conditions" id="required_conditions" />
									<label for="required_conditions"><?php echo $conditions ?></label>
								</p>
<?php } ?>


<?php if ($captchaEnable) { ?>

<?php if (class_exists("AitReallySimpleCaptcha")) { $captcha = new AitReallySimpleCaptcha() ;$captcha->tmp_dir = aitPaths()->dir->cache . '/captcha' ?>

<?php $cacheUrl = aitPaths()->url->cache . '/captcha' ;$img = $captcha->generate_image('ait-login-widget-captcha-'.$rand, $captcha->generate_random_word()) ;$imgUrl = $cacheUrl."/".$img ?>

									<p class="input-container input-captcha">
										<img src="<?php echo NTemplateHelpers::escapeHtml($imgUrl, ENT_COMPAT) ?>" alt="captcha-input" />
										<input type="text" name="user_captcha" id="user_captcha" value="" size="20" tabindex="84" />
									</p>
<?php } } ?>
								
								<div class="login-fields">
<?php do_action('register_form') ?:null ?>
									<input type="submit" name="user-submit" value="<?php echo NTemplateHelpers::escapeHtml(__('Sign up!', 'wplatte'), ENT_COMPAT) ?>" class="user-submit" tabindex="85" />
									<input type="hidden" name="redirect_to" value="<?php echo NTemplateHelpers::escapeHtml(home_url(), ENT_COMPAT) ?>" />
									<input type="hidden" name="user-cookie" value="1" />

<?php if ($captchaEnable) { ?>
									<input type="hidden" name="rand" value="<?php echo NTemplateHelpers::escapeHtml($rand, ENT_COMPAT) ?>" />
<?php } ?>
																	</div>

								<div class="login-messages">
									<div class="login-message-error" style="display: none"><?php echo NTemplateHelpers::escapeHtml(__('Please fill out all registration fields', 'wplatte'), ENT_NOQUOTES) ?></div>

<?php if ($captchaEnable) { ?>
									<div class="captcha-error" style="display: none"><?php echo NTemplateHelpers::escapeHtml(__('Captcha failed to verify', 'wplatte'), ENT_NOQUOTES) ?></div>
									<div class="ajax-error" style="display: none"><?php echo NTemplateHelpers::escapeHtml(__('There was a server error during ajax request', 'wplatte'), ENT_NOQUOTES) ?></div>
<?php } ?>
																	</div>
							</form>
						</div>
<?php } ?>

					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			jQuery(document).ready(function(){

				// Toggle Button
				jQuery(".user-panel .toggle-button").click(function(e) {
					e.preventDefault();

					if(isResponsive(640) && jQuery('.main-nav .nav-menu-main').hasClass('menu-opened')){
						jQuery('.main-nav .nav-menu-main').hide().removeClass('menu-opened');
					}

					jQuery(".user-panel").toggleClass("opened");
				});

				jQuery('.main-nav .menu-toggle').on('touchstart', function(){
					jQuery(".user-panel").removeClass("opened");
				});

				// Widget
				jQuery(".user-panel .userlogin-tabs-contents input[type=text], .user-panel .userlogin-tabs-contents input[type=password]").each(function(){
					var $label = jQuery(this).parent().find("label");
					var placeholder = $label.html();
					jQuery(this).attr("placeholder", placeholder);
					$label.hide();
				});

				var $tabs = jQuery(".user-panel .userlogin-container .userlogin-tabs-menu a");
				var $contents = jQuery(".user-panel .userlogin-container .userlogin-tabs-contents");
				var activeClass = "userlogin-option-active";
				$tabs.each(function(){
					jQuery(this).click(function(e){
						e.preventDefault();
						$tabs.each(function(){
							jQuery(this).removeClass(activeClass);
						});
						$contents.find(".userlogin-tabs-content").each(function(){
							jQuery(this).removeClass(activeClass);
						});
						jQuery(this).addClass(activeClass);
						$contents.find(".userlogin-tabs-content:eq("+jQuery(this).index()+")").addClass(activeClass);
					});
				});

				jQuery(".user-panel form.user-register-form select[name=user_role]").change(function(){
					var $payments = jQuery(".user-panel form.user-register-form select[name=user_payment]");
					var $selected = jQuery(this).find("option:selected");
					var isFree = $selected.data("isfree");
					if(isFree){
						// disable payment gates input
						$payments.attr("disabled", "disabled");
						$payments.parent().hide();
					} else {
						// enable payment gates input
						$payments.removeAttr("disabled");
						$payments.parent().show();
					}
				});

				jQuery(".user-panel form.user-register-form").on("submit", function(e){
<?php if ($captchaEnable) { ?>
					e.preventDefault();
<?php } ?>
										var $inputs = jQuery(this).find("input[type=text]");
					var $selects = jQuery(this).find("select:not(:disabled)");
					var $checkboxes = jQuery(this).find("input[type=checkbox]");
					var valid = false;
					var all = parseInt($selects.length + $inputs.length + $checkboxes.length);
					var validation = 0;
					$selects.each(function(){
						if(jQuery(this).val() != "-1"){
							validation = validation + 1;
						}
					});
					$inputs.each(function(){
						if(jQuery(this).val() != ""){
							if(jQuery(this).attr("name") == "user_email"){
								validation = validation + 1;
							} else {
								validation = validation + 1;
							}
						}
					});
					$checkboxes.each(function(){
						if(jQuery(this).prop("checked")){
								validation = validation + 1;
						}
					});
					if(validation == all){
						valid = true;
					}
					if(!valid){
						jQuery(this).find(".login-message-error").fadeIn("slow"); jQuery(this).find(".login-message-error").on("hover", function(){ jQuery(this).fadeOut("fast"); });
						return false;

<?php if ($captchaEnable) { ?>
					} else {
						var data = { "captcha-check": jQuery(this).find("#user_captcha").val(), "captcha-hash": <?php echo NTemplateHelpers::escapeJs($rand) ?> };
						ait.ajax.post("login-widget-check-captcha:check", data).done(function(rdata){
							if(rdata.data == true){
								jQuery(".user-panel form.user-register-form").off("submit");
								jQuery(".user-panel form.user-register-form").submit();
							} else {
								jQuery(".user-panel form.user-register-form").find(".captcha-error").fadeIn("slow"); jQuery(".user-panel form.user-register-form").find(".captcha-error").on("hover", function(){ jQuery(this).fadeOut("fast"); });
							}
						}).fail(function(rdata){
							jQuery(".user-panel form.user-register-form").find(".ajax-error").fadeIn("slow");
							jQuery(".user-panel form.user-register-form").find(".ajax-error").on("hover", function(){
								jQuery(this).fadeOut("fast");
							});
						});
<?php } ?>
										}
				});

			});
		</script>

<?php } ?>

</div>
<?php } 