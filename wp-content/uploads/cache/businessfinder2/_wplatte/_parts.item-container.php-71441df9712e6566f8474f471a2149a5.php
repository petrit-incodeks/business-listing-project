<?php //netteCache[01]000575a:2:{s:4:"time";s:21:"0.17561800 1663238107";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:87:"/home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/item-container.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/item-container.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'wvsck9wgkn')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$maxCategories = !empty($maxCategories) ? $maxCategories : 3 ?>

<?php if ($layout == 'box') { ?>

<?php $boxAlign     = !empty($boxAlign) ? $boxAlign : 'align-center' ;$imgWidth     = !empty($imgWidth) ? $imgWidth : 640 ;$imageHeight  = !empty($imageHeight) ? $imageHeight : "4:3" ;$textRows     = !empty($textRows) ? $textRows : 3 ?>

	<div data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, 'image-present', $boxAlign ? $boxAlign:null, $isFeatured ? 'item-featured':null, defined("AIT_REVIEWS_ENABLED") ? 'reviews-enabled':null, !$addInfo ? 'noinfo':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>

<?php $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>
		<div class="item-thumbnail">
			<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>">
				<div class="item-thumbnail-wrap">
<?php if ($item->hasImage) { ?>
					<img src="<?php echo aitResizeImage($item->imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
<?php } else { ?>
					<img src="<?php echo aitResizeImage($noFeatured, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
<?php } ?>
				</div>
				<div class="item-text-wrap">
					<div class="item-text">
						<div class="item-excerpt txtrows-<?php echo NTemplateHelpers::escapeHtml($textRows, ENT_COMPAT) ?>
"><p><?php echo $template->striptags($item->excerpt(200)) ?></p></div>
					</div>
				</div>
			</a>
		</div>

		<div class="item-box-content-wrap">

<?php if ($addInfo and $item->categories('ait-items')) { ?>
			<div class="item-categories">
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/item-taxonomy", ""), array('itemID' => $item->id, 'taxonomy' => 'ait-items', 'onlyParent' => true, 'count' => 3, 'wrapper' => true) + get_defined_vars(), $_l->templates['wvsck9wgkn'])->render() ?>
			</div>
<?php } ?>

			<div class="item-title"><a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>
"><h3><?php echo $item->title ?></h3><span class="subtitle"><?php echo NTemplateHelpers::escapeHtml(AitLangs::getCurrentLocaleText($meta->subtitle), ENT_NOQUOTES) ?></span></a></div>

			<div class="item-location"><p class="txtrows-2"><?php echo NTemplateHelpers::escapeHtml($meta->map['address'], ENT_NOQUOTES) ?></p></div>

<?php if ($addInfo) { if (defined('AIT_REVIEWS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/carousel-reviews-stars", ""), array('item' => $item, 'showCount' => false) + get_defined_vars(), $_l->templates['wvsck9wgkn'])->render() ;} } ?>
		</div>
	</div>

<?php } else { ?>

		<?php $imgWidth     = !empty($imgWidth) ? $imgWidth : 600 ?>	
<?php $imageHeight  = !empty($imageHeight) ? $imageHeight : "4:3" ;$textRows     = !empty($textRows) ? $textRows : 3 ?>

<?php $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>

	<div	data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, 'image-present', $isFeatured ? 'item-featured':null, defined("AIT_REVIEWS_ENABLED") ? 'reviews-enabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>

		<div class="item-content-wrap<?php if (!$addInfo) { ?> no-info<?php } ?>">

			<div class="item-thumbnail">
<?php $imageUrl = $item->hasImage != '' ? $item->imageUrl : $noFeatured ?>
				<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>">
					<div class="item-thumbnail-wrap" style="background-image: url('<?php echo aitResizeImage($imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>')"></div>
				</a>
			</div>

			<div class="item-content">

				<div class="item-title">
					<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>
"><h3><?php echo $item->title ?></h3><?php if ($meta->subtitle) { ?> <span class="subtitle"><?php echo NTemplateHelpers::escapeHtml(AitLangs::getCurrentLocaleText($meta->subtitle), ENT_NOQUOTES) ?>
</span><?php } ?></a>
				</div>

				<div class="item-text">
					<div class="item-excerpt txtrows-<?php echo NTemplateHelpers::escapeHtml($textRows, ENT_COMPAT) ?>
"><p><?php echo $template->striptags($item->excerpt(200)) ?></p></div>
				</div>

				<div class="item-location"><p><?php echo NTemplateHelpers::escapeHtml($meta->map['address'], ENT_NOQUOTES) ?></p></div>

			</div>

		</div>

<?php if ($addInfo) { ?>
		<div class="item-info-wrap">
<?php if (defined('AIT_REVIEWS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/carousel-reviews-stars", ""), array('item' => $item, 'showCount' => false) + get_defined_vars(), $_l->templates['wvsck9wgkn'])->render() ;} ?>

<?php ob_start() ;if ($meta->webLinkLabel) { ?>
					<?php echo NTemplateHelpers::escapeHtml($meta->webLinkLabel, ENT_NOQUOTES) ?>

<?php } else { ?>
					<?php echo NTemplateHelpers::escapeHtml($meta->web, ENT_NOQUOTES) ?>

<?php } $itemWeb = ob_get_clean() ?>

<?php if ($meta->web) { ?>
			<div class="item-web icon-label">
				<i class="fa fa-home"></i> <a href="<?php echo NTemplateHelpers::escapeHtml($meta->web, ENT_COMPAT) ?>
" target="_blank"><?php echo NTemplateHelpers::escapeHtml($itemWeb, ENT_NOQUOTES) ?></a>
			</div>
<?php } ?>

<?php if ($meta->email and $meta->showEmail) { ?>
			<div class="item-mail icon-label">
				<i class="fa fa-envelope"></i> <a href="mailto:<?php echo NTemplateHelpers::escapeHtml($meta->email, ENT_COMPAT) ?>
" target="_top"><?php echo NTemplateHelpers::escapeHtml($meta->email, ENT_NOQUOTES) ?></a>
			</div>
<?php } ?>

<?php if ($item->categories('ait-items')) { ?>
			<div class="item-categories">
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/item-taxonomy", ""), array('itemID' => $item->id, 'taxonomy' => 'ait-items', 'onlyParent' => true, 'count' => $maxCategories, 'wrapper' => true) + get_defined_vars(), $_l->templates['wvsck9wgkn'])->render() ?>
			</div>
<?php } ?>
		</div>
<?php } ?>

	</div>

<?php } 