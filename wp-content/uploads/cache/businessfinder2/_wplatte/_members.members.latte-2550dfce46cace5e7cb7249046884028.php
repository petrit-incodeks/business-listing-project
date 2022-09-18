<?php //netteCache[01]000584a:2:{s:4:"time";s:21:"0.22485000 1663236135";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:96:"/home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/members/members.latte";i:2;i:1662654480;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/members/members.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'kgdnoibkqo')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($el->common('header'), $template->getParameters(), $_l->templates['kgdnoibkqo'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="elm-item-organizer <?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

<?php $query = WpLatteMacros::prepareCustomWpQuery(array('type'    => 'member',
		'tax'     => 'members',
		'cat'     => $el->option->category,
		'limit'   => $el->option->count,
		'orderby' => $el->option->orderby,
		'order' 	=> $el->option->order)) ?>

<?php if ($query->havePosts) { $layout = $el->option->layout ;$showContact = $el->option->showContact ;$showSocial = $el->option->showSocial ;$target = $el->option('linksInNewWindow') ? 'target="_blank"':null ?>

<?php if ($layout == 'box') { $enableCarousel  = $el->option->boxEnableCarousel ;$boxAlign 		  = $el->option->boxAlign ;$numOfRows       = $el->option->boxRows ;$numOfColumns    = $el->option->boxColumns ;$imagePresent = '' ;$imageHeight     = $el->option->boxImageHeight ;$imgWidth = 640 ;} else { $enableCarousel  = $el->option->listEnableCarousel ;$numOfRows       = $el->option->listRows ;$numOfColumns    = $el->option->listColumns ;$imageHeight     = $el->option->listImageHeight ;$imgWidth = 220 ;} ?>

<?php if ($enableCarousel) { ?>
			<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
<?php } ?>

<?php if ($layout == 'box') { ?>
			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('member') ?>

				<?php if ($item->hasImage and $imageHeight != 'none') { ?> <?php $imagePresent = 'yes' ?>
 <?php } else { ?> <?php $imagePresent = '' ?> <?php } ?>


<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
					<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } ?>
				<div	data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}",	$enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, $imagePresent ? 'image-present' : 'noimage', $imageHeight == "round" ? 'image-round':null, $boxAlign ? $boxAlign:null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>

					<div class="item-thumbnail">
<?php if ($imagePresent) { if ($imageHeight != 'round') { $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ;} else { $imgWidth = 300 ;$imgHeight = 300 ;} ?>
						<div class="item-thumbnail-wrap">
							<img src="<?php echo aitResizeImage($item->imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
						</div>
<?php } ?>

						<div class="item-text-wrap">
							<div class="item-text">
<?php if ($meta->aboutShort) { ?>
								<div class="item-excerpt"><p><?php echo NTemplateHelpers::escapeHtml($meta->aboutShort, ENT_NOQUOTES) ?></p></div>
<?php } elseif ($meta->about) { ?>
								<div class="item-excerpt"><p><?php echo $template->trimWords($template->striptags($meta->about), 50) ?></p></div>
<?php } ?>
							</div>
						</div>
					</div>

					<div class="item-title">
						<h3><?php echo $item->title ?></h3>
<?php if ($meta->position) { ?>
							<div class="member-position"><?php echo $meta->position ?></div>
<?php } ?>
					</div>

<?php if ($showContact or $showSocial) { ?>
					<div class="item-data">
<?php if ($showContact) { if (is_array($meta->contacts) && count($meta->contacts) > 0) { ?>
								<div class="contact-wrap">
									<div class="item-contacts">
										<ul class="member-contacts"><!--
<?php $iterations = 0; foreach ($meta->contacts as $contact) { ?>
											--><li><?php if ($contact['url']) { ?><a href="<?php echo NTemplateHelpers::escapeHtml($contact['url'], ENT_COMPAT) ?>
" <?php echo $target ?>><?php } ?><span><?php echo NTemplateHelpers::escapeHtml($contact['title'], ENT_NOQUOTES) ?>
</span><?php if ($contact['url']) { ?></a><?php } ?></li><!--
<?php $iterations++; } ?>
										--></ul>
									</div>
								</div>
<?php } } ?>

<?php if ($showSocial) { if (is_array($meta->icons) && count($meta->icons) > 0) { ?>
								<div class="social-wrap">
									<div class="item-social-icons">
										<ul class="member-icons"><!--
<?php $iterations = 0; foreach ($meta->icons as $icon) { ?>
											--><li><a href="<?php echo NTemplateHelpers::escapeHtml($icon['url'], ENT_COMPAT) ?>
" <?php echo $target ?> title="<?php echo $icon['title'] ?>"><i class="fa <?php echo NTemplateHelpers::escapeHtml($icon['icon'], ENT_COMPAT) ?>"></i></a></li><!--
<?php $iterations++; } ?>
										--></ul>
									</div>
								</div>
<?php } } ?>
					</div>
<?php } ?>

				</div>

<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
					</div>
<?php } endforeach; wp_reset_postdata() ?>
			</div>
<?php } else { ?>
			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('member') ?>

				<?php if ($item->hasImage and $imageHeight != 'none') { ?> <?php $imagePresent = 'yes' ?>
 <?php } else { ?> <?php $imagePresent = '' ?> <?php } ?>


<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
					<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } ?>

				<div	data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}",	$enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, $imagePresent ? 'image-present' : 'noimage', $imageHeight == "round" ? 'image-round':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>

<?php if ($imagePresent) { if ($imageHeight != 'round') { $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ;} else { $imgHeight = $imgWidth ;} ?>

					<div class="item-thumbnail">
						<img src="<?php echo aitResizeImage($item->imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
					</div>
<?php } ?>

					<div class="item-title">
						<h3><?php echo $item->title ?></h3>
<?php if ($meta->position) { ?>
							<div class="member-position"><?php echo $meta->position ?></div>
<?php } ?>
					</div>

					<div class="item-text">
<?php if ($meta->aboutShort) { ?>
							<div class="item-excerpt"><p><?php echo NTemplateHelpers::escapeHtml($meta->aboutShort, ENT_NOQUOTES) ?></p></div>
<?php } elseif ($meta->about) { ?>
							<div class="item-excerpt"><p><?php echo $template->trimWords($template->striptags($meta->about), 50) ?></p></div>
<?php } ?>

<?php if ($showContact) { if (is_array($meta->contacts) && count($meta->contacts) > 0) { ?>
								<div class="item-contacts">
									<ul class="member-contacts"><!--
<?php $iterations = 0; foreach ($meta->contacts as $contact) { ?>
										--><li><?php if ($contact['url']) { ?><a href="<?php echo NTemplateHelpers::escapeHtml($contact['url'], ENT_COMPAT) ?>
" <?php echo $target ?>><?php } ?><span><?php echo NTemplateHelpers::escapeHtml($contact['title'], ENT_NOQUOTES) ?>
</span><?php if ($contact['url']) { ?></a><?php } ?></li><!--
<?php $iterations++; } ?>
									--></ul>
								</div>
<?php } } ?>

<?php if ($showSocial) { if ($meta->icons) { ?>
								<div class="item-icons">
									<ul class="member-icons">
<?php $iterations = 0; foreach ($meta->icons as $icon) { ?>
										<li><a href="<?php echo NTemplateHelpers::escapeHtml($icon['url'], ENT_COMPAT) ?>
" <?php echo $target ?>><i class="fa <?php echo NTemplateHelpers::escapeHtml($icon['icon'], ENT_COMPAT) ?>"></i></a></li>
<?php $iterations++; } ?>
									</ul>
								</div>
<?php } } ?>
					</div>
				</div>

<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
					</div>
<?php } endforeach; wp_reset_postdata() ?>
			</div>
<?php } } else { ?>
		<div class="elm-item-organizer-container">
			<div class="alert alert-info">
				<?php echo NTemplateHelpers::escapeHtml(_x('Members', 'name of element', 'wplatte'), ENT_NOQUOTES) ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml(__('Info: There are no items created, add some please.', 'wplatte'), ENT_NOQUOTES) ?>

			</div>
		</div>
<?php } ?>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/members/javascript", ""), array('enableCarousel' => $enableCarousel) + get_defined_vars(), $_l->templates['kgdnoibkqo'])->render() ?>

<?php if ($el->option->layout == 'icon' && $enableCarousel) { ?>
<div class="carousel-icon-arrows">
	<div class="carousel-arrow-left icon-arrow icon-arrow-left" style="cursor: pointer;">&lt;</div>
	<div class="carousel-arrow-right icon-arrow icon-arrow-right" style="cursor: pointer;">&gt;</div>
</div>

</div> <!-- icon-container-content -->
<?php } ?>


<?php if ($el->option->layout != 'icon' && $enableCarousel) { ?>
<div class="carousel-standard-arrows">
	<div class="carousel-arrow-left standard-arrow standard-arrow-left" style="cursor: pointer;">&lt;</div>
	<div class="carousel-arrow-right standard-arrow standard-arrow-right" style="cursor: pointer;">&gt;</div>
</div>
<div class="carousel-bottom-arrows">
	<div class="carousel-nav-text"><?php echo NTemplateHelpers::escapeHtml(__('Navigation', 'wplatte'), ENT_NOQUOTES) ?></div>
	<div class="carousel-arrow-left bottom-arrow bottom-arrow-left" style="cursor: pointer;">&lt;</div>
	<div class="carousel-arrow-right bottom-arrow bottom-arrow-right" style="cursor: pointer;">&gt;</div>
</div>
<?php } 