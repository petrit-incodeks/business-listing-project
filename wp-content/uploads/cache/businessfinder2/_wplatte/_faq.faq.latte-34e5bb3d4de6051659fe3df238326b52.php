<?php //netteCache[01]000576a:2:{s:4:"time";s:21:"0.12147000 1663237464";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:88:"/home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/faq/faq.latte";i:2;i:1662654480;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/faq/faq.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'cct8gdhzql')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['cct8gdhzql'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

<?php $faqs = $wp->categories('faqs') ;$cat = $el->option('category') ?>

<?php $query = WpLatteMacros::prepareCustomWpQuery(array('type' => 'faq',
		'tax' => 'faqs',
		'cat' => $cat,
		'limit' => $el->option('count'),
		'orderby' => $el->option('orderby'),
		'order' => $el->option('order'))) ?>

<?php if ($query->havePosts) { ?>

<?php if (isset($faqs[$cat]) and $el->option('showCategoryData')) { ?>
			<div class="faq-category">
<?php if ($faqs[$cat]->title) { ?>
					<h3 class="faq-category-title"><?php echo NTemplateHelpers::escapeHtml($faqs[$cat]->title, ENT_NOQUOTES) ?></h3>
<?php } if ($faqs[$cat]->description) { ?>
					<div class="entry-content faq-category-description"><?php echo $faqs[$cat]->description ?></div>
<?php } ?>
			</div>
<?php } ?>

		<div class="elm-faq-container">

<?php foreach ($iterator = new WpLatteLoopIterator($query) as $faq): $meta = $faq->meta('faq-data') ?>
			<div class="one-faq">
				<div class="faq-header">
					<h4 class="faq-question"><span class="faq-q"></span> <?php echo NTemplateHelpers::escapeHtml($meta->question, ENT_NOQUOTES) ?></h4>
				</div>
                <div class="entry-content faq-answer"><?php echo $template->shortcode($meta->answer) ?></div>
			</div>
<?php endforeach; wp_reset_postdata() ?>

		</div>
<?php } else { ?>
		<div class="elm-faq-container">
			<div class="alert alert-info">
				<?php echo NTemplateHelpers::escapeHtml(_x('FAQ', 'name of element', 'wplatte'), ENT_NOQUOTES) ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml(__('Info: There are no items created, add some please.', 'wplatte'), ENT_NOQUOTES) ?>

			</div>
		</div>
<?php } ?>

</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/faq/javascript", ""), array() + get_defined_vars(), $_l->templates['cct8gdhzql'])->render() ;