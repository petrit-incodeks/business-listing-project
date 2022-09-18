<?php //netteCache[01]000591a:2:{s:4:"time";s:21:"0.25057300 1663236135";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:102:"/home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/google-map/google-map.latte";i:2;i:1662654480;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/google-map/google-map.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'qh6b8htzey')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['qh6b8htzey'])->render() ;$themeOptions = $options->theme ?>
<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">
	<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-container" class="google-map-container <?php if ($el->option('mapLoadType') == "request") { ?>
on-request<?php } ?>" style="height: <?php echo NTemplateHelpers::escapeHtml(NTemplateHelpers::escapeCss($el->option('height')), ENT_COMPAT) ?>px;">
<?php if ($el->option('mapLoadType') == "request") { ?>
			<div class="request-map">
<?php if ($themeOptions->google->requestDescriptionText) { ?>
					<div class="request-map-description">
						<?php echo $themeOptions->google->requestDescriptionText ?>

					</div>
<?php } ?>
				<div class="request-map-button">
					<a href="#" class="ait-sc-button simple">
					      <span class="container">
					            <span class="text">
					                  <span class="title"><?php if ($themeOptions->google->requestButtonText) { echo $themeOptions->google->requestButtonText ;} else { echo NTemplateHelpers::escapeHtml(__('Show the map', 'wplatte'), ENT_NOQUOTES) ;} ?></span>
					            </span>
					      </span>
					</a>
				</div>
			</div>
<?php } ?>
	</div>

<?php $address = $el->option('address') ;if (isset($address['address']) == false) { $address = AitLangs::getCurrentLocaleText($address) ;} $scrollWheel = $el->option('mousewheelZoom') ? "true" : "false" ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/google-map/javascript", ""), array() + get_defined_vars(), $_l->templates['qh6b8htzey'])->render() ?>

</div>