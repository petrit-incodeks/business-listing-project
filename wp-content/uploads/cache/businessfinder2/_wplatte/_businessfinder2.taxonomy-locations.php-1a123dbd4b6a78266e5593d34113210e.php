<?php //netteCache[01]000566a:2:{s:4:"time";s:21:"0.09481700 1663304278";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:78:"/home/www/npik.online/wp-content/themes/businessfinder2/taxonomy-locations.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/taxonomy-locations.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'kt0rgrq30k')
;
// prolog NUIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb069d8fd167_content')) { function _lb069d8fd167_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;global $wp_query ?>

<?php $currentCategory = get_queried_object() ?>

<?php if ($currentCategory->description) { ?>
<div class="entry-content">
	<?php echo $currentCategory->description ?>

</div>
<?php } ?>

<div<?php if ($_l->tmp = array_filter(array('items-container', !$wp->willPaginate($wp_query) ? 'pagination-disabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
	<div class="content">

<?php if ($wp_query->have_posts()) { ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/search-filters", ""), array('taxonomy' => "ait-locations", 'current' => $wp_query->post_count, 'max' => $wp_query->found_posts) + get_defined_vars(), $_l->templates['kt0rgrq30k'])->render() ?>

<?php if (defined("AIT_ADVANCED_FILTERS_ENABLED")) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/advanced-filters", ""), array('query' => $wp_query) + get_defined_vars(), $_l->templates['kt0rgrq30k'])->render() ;} ?>

		<div class="ajax-container">
			<div class="content">

<?php $layout = $options->theme->items->taxonomyLayout ;$noFeatured = $options->theme->item->noFeatured ;$numOfColumns = ($layout == 'box' ? '4' : '1') ;$enableCarousel = false ;$addInfo = true ?>

				<div class="items-container elm-item-organizer<?php if ($layout == 'box') { ?>
 organizer-alt<?php } ?>">
					<div class="elm-item-organizer-container carousel-disabled layout-<?php echo NTemplateHelpers::escapeHtml($layout, ENT_COMPAT) ?>
 column-<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>">

<?php foreach ($iterator = new WpLatteLoopIterator($wp_query) as $post): ?>

<?php $item = $post ;$meta = $item->meta('item-data') ?>

<?php $dbFeatured = get_post_meta($item->id, '_ait-item_item-featured', true) ;$isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/item-container", ""), array('layout' => $layout, 'noFeatured' => $noFeatured) + get_defined_vars(), $_l->templates['kt0rgrq30k'])->render() ?>

<?php endforeach; wp_reset_postdata() ?>

					</div>
				</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/pagination", ""), array('location' => 'pagination-below', 'max' => $wp_query->max_num_pages) + get_defined_vars(), $_l->templates['kt0rgrq30k'])->render() ?>

			</div>
		</div>

<?php } else { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/none", ""), array('message' => 'empty-site') + get_defined_vars(), $_l->templates['kt0rgrq30k'])->render() ;} ?>
	</div>
</div>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof NPresenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 