<?php //netteCache[01]000566a:2:{s:4:"time";s:21:"0.83093700 1663235683";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:78:"/home/www/npik.online/wp-content/themes/businessfinder2/parts/social-icons.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/parts/social-icons.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'epfx9twync')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($options->theme->social->enableSocialIcons) { ?>
<div class="social-icons">
	<a href="#" class="social-icons-toggle ait-toggle-hover"><i class="fa fa-share-alt"></i></a>
	<ul><!--
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator(array_filter((array) $options->theme->social->socIcons)) as $icon) { ?>
			--><li>
				<a href="<?php echo NTemplateHelpers::escapeHtml($icon->url, ENT_COMPAT) ?>" <?php if ($options->theme->social->socIconsNewWindow) { ?>
target="_blank"<?php } ?> class="icon-<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>">
										<?php if ($icon->icon) { ?><i class="fa <?php echo NTemplateHelpers::escapeHtml($icon->icon, ENT_COMPAT) ?>
"></i><?php } ?>

					<span class="s-title"><?php echo NTemplateHelpers::escapeHtml($icon->title, ENT_NOQUOTES) ?></span>
				</a>
			</li><!--
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
	--></ul>
	<style type="text/css" scoped="scoped">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator(array_filter((array) $options->theme->social->socIcons)) as $icon) { ?>
	.social-icons .icon-<?php echo NTemplateHelpers::escapeCss($iterator->getCounter()) ?>
:hover { background: <?php echo $icon->iconColor ?>; }
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
	</style>
</div>
<?php } 