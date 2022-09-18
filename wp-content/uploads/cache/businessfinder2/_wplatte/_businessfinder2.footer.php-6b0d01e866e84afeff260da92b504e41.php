<?php //netteCache[01]000554a:2:{s:4:"time";s:21:"0.90179700 1663235683";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:66:"/home/www/npik.online/wp-content/themes/businessfinder2/footer.php";i:2;i:1663151020;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/footer.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '1mwp6zuzvk')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

	<footer id="footer" class="footer">

<?php if ($options->layout->general->enableWidgetAreas) { ?>
		<div class="footer-widgets">
			<div class="footer-widgets-wrap grid-main">
				<div class="footer-widgets-container">


<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($wp->widgetAreas('footer')) as $widgetArea) { ?>
																		<div class="widget-area <?php echo NTemplateHelpers::escapeHtml($widgetArea, ENT_COMPAT) ?>
 widget-area-<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>">
<?php dynamic_sidebar($widgetArea) ?>
						</div>
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>

				</div>
			</div>
		</div>
<?php } ?>

		<div class="site-footer">
			<div class="site-footer-wrap grid-main">
<?php WpLatteMacros::menu("footer", array('depth' => 1)) ?>
				<div class="footer-text"><?php echo $options->theme->footer->text ?></div>
			</div>
		</div>

	</footer><!-- /#footer -->
</div><!-- /#page -->

<?php wp_footer() ?>

<?php echo $options->theme->footer->customJsCode ?>


</body>
</html>
