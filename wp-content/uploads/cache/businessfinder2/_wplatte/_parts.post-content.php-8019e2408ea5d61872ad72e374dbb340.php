<?php //netteCache[01]000566a:2:{s:4:"time";s:21:"0.40812200 1663314151";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:78:"/home/www/npik.online/wp-content/themes/businessfinder2/parts/post-content.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/parts/post-content.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '9bc1xba8vk')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$concreteTaxonomy = isset($taxonomy) && $taxonomy != "" ? $taxonomy : '' ;$maxCategories = $options->theme->items->maxDisplayedCategories ?>

<?php if (!$wp->isSingular) { ?>

<?php if ($wp->isSearch) { $isAdvanced = false ?>

<?php if (isset($_REQUEST['a']) && $_REQUEST['a'] != "") { $isAdvanced = true ;} ?>

<?php if ($isAdvanced) { $noFeatured = $options->theme->item->noFeatured ?>

<?php $item = $post ;$meta = $item->meta('item-data') ?>

<?php $enableCarousel = false ?>

<?php $dbFeatured = get_post_meta($post->id, '_ait-item_item-featured', true) ;$isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false ?>

<?php $addInfo = true ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/item-container", ""), array('layout' => $layout, 'onlyFeaturedCat' => true, 'noFeatured' => $noFeatured) + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ?>

<?php } else { ?>
								<article <?php echo $post->htmlId ?> <?php echo $post->htmlClass('hentry') ?>>
					<header class="entry-header">

						<div class="entry-title">

							<div class="entry-title-wrap">
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-date-format", ""), array('dateIcon' => $post->rawDate, 'dateLinks' => 'no', 'dateShort' => 'no') + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ?>
								<h2><a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>
"><?php echo $post->title ?></a></h2>
<?php if ($post->type == 'post') { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-author", ""), array() + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} ?>
							</div><!-- /.entry-title-wrap -->
						</div><!-- /.entry-title -->
					</header><!-- /.entry-header -->

					<div class="entry-content loop">
						<?php echo $post->excerpt ?>

						<a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>
" class="more"><?php echo __('read more', 'wplatte') ?></a>
					</div><!-- .entry-content -->

<!-- 					<footer class="entry-footer">
<?php if ($concreteTaxonomy) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-categories", ""), array('taxonomy' => $concreteTaxonomy) + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} else { if ($post->isInAnyCategory) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-categories", ""), array('taxonomy' => $concreteTaxonomy) + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} } ?>
					</footer> --><!-- /.entry-footer -->
				</article>
<?php } ?>

<?php } else { ?>

			
			<article <?php echo $post->htmlId ;if ($_l->tmp = array_filter(array('hentry' , $post->htmlClass('', false), !$post->hasImage ? 'has-no-thumbnail':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
				<div class="entry-wrap">
					<header class="entry-header <?php if (!$post->hasImage) { ?>nothumbnail<?php } ?>">

						<div class="entry-thumbnail-desc">

<?php if ($post->type == 'ait-event') { ?>

<?php $meta = $post->meta('event-data') ;NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-date-format", ""), array('dateIcon' => $meta->dateFrom, 'dateTo' => $meta->dateTo, 'dateLinks' => 'no', 'dateShort' => 'no', 'type' => 'event') + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ?>

<?php } else { ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-date-format", ""), array('dateIcon' => $post->rawDate, 'dateLinks' => 'no', 'dateShort' => 'no') + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ?>

<?php } ?>

							<div class="entry-title-wrappper">
							<div class="entry-title">
								<div class="entry-title-wrap">
									<h2><a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>
"><?php echo $post->title ?></a></h2>
								</div><!-- /.entry-title-wrap -->
							</div><!-- /.entry-title -->

<?php if ($post->type == 'post') { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-author", ""), array() + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} ?>
							</div>

<?php if (!$post->hasImage) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/comments-link", ""), array() + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} ?>
						</div>

<?php if ($post->hasImage) { ?>
							<div class="entry-thumbnail">
								<div class="entry-thumbnail-wrap entry-content" style="background-image: url('<?php echo aitResizeImage($post->imageUrl, array('width' => 1000, 'height' => 500, 'crop' => 1)) ?>')"></div>
							</div>
<?php } ?>

<?php if ($post->isSticky and !$wp->isPaged and $wp->isHome) { ?>
							<div class="entry-meta">
									<span class="featured-post"><?php echo NTemplateHelpers::escapeHtml(__('Featured post', 'wplatte'), ENT_NOQUOTES) ?></span>
							</div>
<?php } ?>

					</header><!-- /.entry-header -->

<?php if ($post->hasImage) { ?>
					<footer class="entry-footer">
						<div class="entry-data">

							<a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>" class="more"></a>

							<?php ob_start() ?><span class="edit-link"><?php echo __('Edit', 'wplatte') ?>
</span><?php $editLinkLabel = ob_get_clean() ?>

							<?php echo $post->editLink($editLinkLabel) ?>


<?php if ($post->isInAnyCategory) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-categories", ""), array() + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/comments-link", ""), array() + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ?>

						</div>
					</footer><!-- .entry-footer -->
<?php } ?>
				</div>

				<div class="entry-content loop">
<?php if ($post->hasContent) { ?>
						<?php echo $post->excerpt ?>

<?php } else { ?>
						<?php echo $post->content ?>

<?php } ?>
				</div><!-- .entry-content -->

<?php if (!$post->hasImage) { ?>
					<footer class="entry-footer">
						<div class="entry-data">

<?php if ($post->isInAnyCategory) { ?>
								<?php echo NTemplateHelpers::escapeHtml(__('Posted in', 'wplatte'), ENT_NOQUOTES) ?>
 <?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-categories", ""), array('separator' => ", ") + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ?>

<?php } ?>

							<?php ob_start() ?><span class="edit-link"><?php echo __('Edit', 'wplatte') ?>
</span><?php $editLinkLabel = ob_get_clean() ?>

							<?php echo $post->editLink($editLinkLabel) ?>


						</div>
					</footer><!-- .entry-footer -->
<?php } ?>

			</article>
<?php } ?>

<?php } else { ?>

				<article <?php echo $post->htmlId ?> class="content-block hentry">

			<div class="entry-title hidden-tag">
				<h2><?php echo $post->title ?></h2>
			</div>

			<div class="entry-thumbnail">
<?php if ($post->hasImage) { ?>
						<div class="entry-thumbnail-wrap">
						 <a href="<?php echo NTemplateHelpers::escapeHtml($post->imageUrl, ENT_COMPAT) ?>" class="thumb-link">
						  <span class="entry-thumbnail-icon">
							<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 1000, 'height' => 400, 'crop' => 1)) ?>
" alt="<?php echo $post->title ?>" />
						  </span>
						 </a>
						</div>
<?php if ($post->categoryList) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-categories", ""), array('taxonomy' => 'category') + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/comments-link", ""), array() + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ;} ?>
				</div>

			<div class="entry-content">
				<?php echo $post->content ?>

				<?php echo $post->linkPages ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer single">



<?php if ($post->tagList) { ?>
					<span class="tags">
						<span class="tags-links"><?php echo $post->tagList ?></span>
					</span>
<?php } ?>


			</footer><!-- .entry-footer -->

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/author-bio", ""), array() + get_defined_vars(), $_l->templates['9bc1xba8vk'])->render() ?>


		</article>

<?php } 