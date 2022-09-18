<?php //netteCache[01]000572a:2:{s:4:"time";s:21:"0.84675900 1663235683";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:84:"/home/www/npik.online/wp-content/themes/businessfinder2/parts/languages-switcher.php";i:2;i:1663151117;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/parts/languages-switcher.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '8250xgctv7')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($languages && count($languages) > 1) { ?>
	<div class="language-icons">
<?php $iterations = 0; foreach ($languages as $lang) { if ($lang->isCurrent) { ?>
				<a hreflang="<?php echo NTemplateHelpers::escapeHtml($lang->slug, ENT_COMPAT) ?>
" href="#" class="language-icons__icon language-icons__icon_main <?php echo NTemplateHelpers::escapeHtml($lang->htmlClass, ENT_COMPAT) ?> ait-toggle-hover">
					<?php echo NTemplateHelpers::escapeHtml($lang->name, ENT_NOQUOTES) ?>

				</a>
<?php } $iterations++; } ?>
		<ul class="language-icons__list">
<?php $iterations = 0; foreach ($languages as $lang) { if (!$lang->isCurrent) { ?>
				<li>
					<a hreflang="<?php echo NTemplateHelpers::escapeHtml($lang->slug, ENT_COMPAT) ?>
" href="<?php echo NTemplateHelpers::escapeHtml($lang->url, ENT_COMPAT) ?>" class="language-icons__icon <?php echo NTemplateHelpers::escapeHtml($lang->htmlClass, ENT_COMPAT) ?>">
						<?php echo $lang->flag ?>

						<?php echo NTemplateHelpers::escapeHtml($lang->name, ENT_NOQUOTES) ?>

					</a>
				</li>
<?php } $iterations++; } ?>
		</ul>
	</div>
<?php } 