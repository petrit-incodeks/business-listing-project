<?php //netteCache[01]000555a:2:{s:4:"time";s:21:"0.74900200 1663235683";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:67:"/home/www/npik.online/wp-content/themes/businessfinder2/@layout.php";i:2;i:1663150973;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/@layout.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'llmshh996t')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
get_header("" ? "" : null) ?>

<?php $headerLayoutType = '' ?>

<?php $headerElementClass = array() ?>

<?php $headerImageSrc = '' ;$headerImageHeight = '' ?>

<?php if ($wp->isSingular('item')) { $meta = $post->meta('item-data') ?>

<?php $headerLayoutType = $meta->headerType ?>

<?php $headerImageSrc = isset($meta->headerImage) && $meta->headerImage != '' ? $meta->headerImage : $options->theme->item->noHeader ;$headerImageHeight = $meta->headerHeight ?>

<?php } elseif ($wp->isSingular('event-pro')) { $meta = $post->meta('event-pro-data') ?>

<?php $headerLayoutType = $meta->headerType ;$eventsOptions = get_option('ait_events_pro_options') ;$headerImageSrc = isset($meta->headerImage) && $meta->headerImage != '' ? $meta->headerImage : $eventsOptions['noHeader'] ;$headerImageHeight = $options->layout->general->headerHeight ?>

<?php } elseif ($wp->isTax('items') or $wp->isTax('locations')) { $meta = (object) get_option("{$taxonomyTerm->taxonomy}_category_{$taxonomyTerm->id}") ?>

<?php $headerLayoutType = isset($meta->header_type) ? $meta->header_type : '' ?>

<?php if ($wp->isTax('items')) { $headerImageSrc =  isset($meta->header_image) && $meta->header_image != '' ? $meta->header_image : $options->theme->items->categoryDefaultImage ;} else { $headerImageSrc = isset($meta->header_image) && $meta->header_image != '' ? $meta->header_image : $options->theme->items->locationDefaultImage ;} ?>

<?php $headerImageHeight = isset($meta->header_height) ? $meta->header_height : '' ?>

<?php } elseif ($wp->isTax('ait-events-pro')) { $meta = (object) get_option("{$taxonomyTerm->taxonomy}_category_{$taxonomyTerm->id}") ;$eventsOptions = get_option('ait_events_pro_options') ;$headerLayoutType = isset($meta->header_type) ? $meta->header_type : '' ;$headerImageSrc =  isset($meta->header_image) && $meta->header_image != '' ? $meta->header_image : $eventsOptions['categoryDefaultImage'] ;$headerImageHeight = $options->layout->general->headerHeight ?>

<?php } else { $headerLayoutType = $options->layout->general->headerType ?>

<?php $headerImageSrc = isset($options->layout->general->headerImage) && $options->layout->general->headerImage != '' ? $options->layout->general->headerImage : '' ;$headerImageHeight = $options->layout->general->headerHeight ?>

<?php } if ($headerLayoutType == 'image' && $headerImageHeight != "") { ?>
<style type="text/css" scoped="scoped">
	.header-layout.element-image-enabled .header-image { height: <?php echo NTemplateHelpers::escapeCss($headerImageHeight) ?>px; }
</style>
<?php } ?>

<?php if ($wp->isTax('items') or $wp->isTax('locations') or $wp->isSingular('item') or $wp->isSearch) { if ($headerLayoutType == 'map' and $elements->unsortable['header-map']->display and $elements->unsortable['search-form']->display) { ?>
		<div class="ait-toggle-area-group">
<?php if ($headerLayoutType == 'map' and $elements->unsortable['header-map']->display) { ?>
				<a href="#" class="ait-toggle-area-btn" data-toggle=".elm-header-map"><i class="fa fa-map-o"></i> <?php echo NTemplateHelpers::escapeHtml(__('Map', 'wplatte'), ENT_NOQUOTES) ?></a>
<?php } if ($elements->unsortable['search-form']->display) { ?>
				<a href="#" class="ait-toggle-area-btn" data-toggle=".elm-search-form"><i class="fa fa-search"></i> <?php echo NTemplateHelpers::escapeHtml(__('Search', 'wplatte'), ENT_NOQUOTES) ?></a>
<?php } ?>
		</div>
<?php } } ?>

<div class="header-layout element-<?php echo NTemplateHelpers::escapeHtml($headerLayoutType, ENT_COMPAT) ?>-enabled">
<?php if ($elements->unsortable['search-form']->display and $elements->unsortable['search-form']->option('type') != 4) { ?>
	<div class="header-search-wrap">
<?php if($elements->unsortable['search-form']->getId() === 'columns' or $elements->unsortable['search-form']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['search-form']->getTemplate(), array('el' => $elements->unsortable['search-form'], 'element' => $elements->unsortable['search-form'], 'htmlId' => $elements->unsortable['search-form']->getHtmlId(), 'htmlClass' => $elements->unsortable['search-form']->getHtmlClass()) + $template->getParameters(), $_l->templates['llmshh996t'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['search-form']);
			} ?>
	</div>
<?php } ?>
	<div<?php if ($_l->tmp = array_filter(array('header-element-wrap'))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php if ($headerLayoutType == 'revslider') { if ($elements->unsortable['revolution-slider']->display) { if($elements->unsortable['revolution-slider']->getId() === 'columns' or $elements->unsortable['revolution-slider']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['revolution-slider']->getTemplate(), array('el' => $elements->unsortable['revolution-slider'], 'element' => $elements->unsortable['revolution-slider'], 'htmlId' => $elements->unsortable['revolution-slider']->getHtmlId(), 'htmlClass' => $elements->unsortable['revolution-slider']->getHtmlClass()) + $template->getParameters(), $_l->templates['llmshh996t'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['revolution-slider']);
			} } } elseif ($headerLayoutType == 'map') { if ($elements->unsortable['header-map']->display) { if($elements->unsortable['header-map']->getId() === 'columns' or $elements->unsortable['header-map']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['header-map']->getTemplate(), array('el' => $elements->unsortable['header-map'], 'element' => $elements->unsortable['header-map'], 'htmlId' => $elements->unsortable['header-map']->getHtmlId(), 'htmlClass' => $elements->unsortable['header-map']->getHtmlClass()) + $template->getParameters(), $_l->templates['llmshh996t'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['header-map']);
			} } } elseif ($headerLayoutType == 'video') { if ($elements->unsortable['header-video']->display) { if($elements->unsortable['header-video']->getId() === 'columns' or $elements->unsortable['header-video']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['header-video']->getTemplate(), array('el' => $elements->unsortable['header-video'], 'element' => $elements->unsortable['header-video'], 'htmlId' => $elements->unsortable['header-video']->getHtmlId(), 'htmlClass' => $elements->unsortable['header-video']->getHtmlClass()) + $template->getParameters(), $_l->templates['llmshh996t'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['header-video']);
			} } } elseif ($headerLayoutType == 'image') { if ($headerImageHeight != "") { ?>
			<div class="header-image" style="background-image: url('<?php echo $headerImageSrc ?>')"></div>
<?php } else { ?>
			<img src="<?php echo $headerImageSrc ?>" alt="header-image" />
<?php } } else { } ?>
	</div>
<?php if ($elements->unsortable['search-form']->display and $elements->unsortable['search-form']->option('type') == 4) { ?>
	<div class="header-search-wrap">
<?php if($elements->unsortable['search-form']->getId() === 'columns' or $elements->unsortable['search-form']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['search-form']->getTemplate(), array('el' => $elements->unsortable['search-form'], 'element' => $elements->unsortable['search-form'], 'htmlId' => $elements->unsortable['search-form']->getHtmlId(), 'htmlClass' => $elements->unsortable['search-form']->getHtmlClass()) + $template->getParameters(), $_l->templates['llmshh996t'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['search-form']);
			} ?>
	</div>
<?php } ?>
</div>
<div id="main" class="elements">

<?php if ($elements->unsortable['page-title']->display) { if($elements->unsortable['page-title']->getId() === 'columns' or $elements->unsortable['page-title']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['page-title']->getTemplate(), array('el' => $elements->unsortable['page-title'], 'element' => $elements->unsortable['page-title'], 'htmlId' => $elements->unsortable['page-title']->getHtmlId(), 'htmlClass' => $elements->unsortable['page-title']->getHtmlClass()) + $template->getParameters(), $_l->templates['llmshh996t'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['page-title']);
			} } ?>

<?php $currentCategory = get_queried_object() ?>

<?php if ($wp->isTax('items') or $wp->isTax('locations') or $wp->isTax('ait-events-pro')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/taxonomy-category-list", ""), array('taxonomy' => $currentCategory->taxonomy, 'gridMain' => true) + get_defined_vars(), $_l->templates['llmshh996t'])->render() ;} elseif ($wp->isPostTypeArchive('ait-item')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/taxonomy-category-list", ""), array('taxonomy' => 'ait-items', 'gridMain' => true) + get_defined_vars(), $_l->templates['llmshh996t'])->render() ;} elseif ($wp->isPostTypeArchive('ait-event-pro')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/taxonomy-category-list", ""), array('taxonomy' => 'ait-events-pro', 'gridMain' => true) + get_defined_vars(), $_l->templates['llmshh996t'])->render() ;} ?>
	<div class="main-sections">
<?php $iterations = 0; foreach ($elements->sortable as $element) { ?>

<?php if ($element->id == 'sidebars-boundary-start') { ?>

		<div class="elements-with-sidebar">
			<div class="grid-main">
			<div class="elements-sidebar-wrap">
<?php if ($wp->hasSidebar('left')) { get_sidebar("left" ? "left" : null) ;} ?>
				<div class="elements-area">

<?php } elseif ($element->id == 'sidebars-boundary-end') { ?>

				</div><!-- .elements-area -->
<?php if ($wp->hasSidebar('right')) { get_sidebar("" ? "" : null) ;} ?>
				</div><!-- .elements-sidebar-wrap -->
				</div><!-- .grid-main -->
			</div><!-- .elements-with-sidebar -->

<?php } else { global $post ;if ($element->id == 'comments' && $post == null) { ?>
				<!-- COMMENTS DISABLED - IS NOT SINGLE PAGE -->
<?php } elseif ($element->id == 'comments' && !comments_open($post->ID) && get_comments_number($post->ID) == 0) { ?>
				<!-- COMMENTS DISABLED -->
<?php } else { if ($element->display) { ?>				<section id="<?php echo NTemplateHelpers::escapeHtml($element->htmlId, ENT_COMPAT) ?>
-main" class="<?php echo NTemplateHelpers::escapeHtml($element->htmlClasses, ENT_COMPAT) ?>">

					<div class="elm-wrapper <?php echo NTemplateHelpers::escapeHtml($element->htmlClass, ENT_COMPAT) ?>-wrapper">

<?php if($element->getId() === 'columns' or $element->isEnabled()){
				NCoreMacros::includeTemplate($element->getTemplate(), array('el' => $element, 'element' => $element, 'htmlId' => $element->getHtmlId(), 'htmlClass' => $element->getHtmlClass()) + $template->getParameters(), $_l->templates['llmshh996t'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($element);
			} ?>

					</div><!-- .elm-wrapper -->

				</section>
<?php } } } $iterations++; } ?>
	</div><!-- .main-sections -->
</div><!-- #main .elements -->

<?php get_footer("" ? "" : null) ;