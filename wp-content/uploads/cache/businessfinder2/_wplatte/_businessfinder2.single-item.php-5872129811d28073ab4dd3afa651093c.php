<?php //netteCache[01]000559a:2:{s:4:"time";s:21:"0.37470100 1663269281";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:71:"/home/www/npik.online/wp-content/themes/businessfinder2/single-item.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/single-item.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '9q3km0meua')
;
// prolog NUIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb12e022bb4e_content')) { function _lb12e022bb4e_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;foreach($iterator = new WpLatteLoopIterator() as $post): $meta = $post->meta('item-data') ;$settings = $options->theme->item ?>
						<div class="item-content-wrap" itemscope itemtype="http://schema.org/LocalBusiness">
			<meta itemprop="name" content="<?php echo NTemplateHelpers::escapeHtml($post->title, ENT_COMPAT) ?>" />
			<meta itemprop="image" content="<?php echo NTemplateHelpers::escapeHtml($post->imageUrl, ENT_COMPAT) ?>" />
<?php if ($meta->map['address']) { ?>
			<meta itemprop="address" content="<?php echo NTemplateHelpers::escapeHtml($meta->map['address'], ENT_COMPAT) ?>" />
<?php } ?>
								<div class="item-content">
<?php if ($meta->displayGallery && !empty($meta->gallery)) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-gallery", ""), array('meta' => $meta) + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} else { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-featured-img", ""), array('meta' => $meta) + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} ?>

				<div class="entry-content-wrap" itemprop="description">
					<div class="entry-content">
<?php if ($post->hasContent) { ?>
						<?php echo $post->content ?>

<?php } else { ?>
						<?php echo $post->excerpt ?>

<?php } ?>
					</div>
				</div>

<?php if ((!$meta->displayGallery || ($meta->displayGallery && (empty($meta->gallery) && !$post->hasImage)))) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-features", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} ?>

			</div>
			
<?php $gridClass = $meta->displayOpeningHours ? 'column-grid-3' : 'column-grid-2' ?>
			<div class="column-grid <?php echo NTemplateHelpers::escapeHtml($gridClass, ENT_COMPAT) ?>">
<?php if ($meta->displayOpeningHours) { ?>
				<div class="column column-span-1 column-narrow column-first">
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-opening-hours", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ?>
									</div>
<?php } ?>

				<div class="column column-span-2 column-narrow column-last">
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-address", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;if (($meta->contactOwnerBtn and $meta->email) or (defined('AIT_GET_DIRECTIONS_ENABLED'))) { ?>
					<div class="contact-buttons-container">
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-contact-owner", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;if (defined('AIT_GET_DIRECTIONS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/get-directions-button", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} ?>
										</div>
<?php } ?>
				</div>
			</div>

<?php if (defined('AIT_EXTENSION_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/item-extension", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} if (defined('AIT_CLAIM_LISTING_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/claim-listing", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-map", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;if (defined('AIT_GET_DIRECTIONS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/get-directions-container", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-social", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;if (defined('AIT_REVIEWS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-reviews", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} if ((defined('AIT_SPECIAL_OFFERS_ENABLED'))) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/single-item-special-offers", ""), array() + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} if ((defined('AIT_EVENTS_PRO_ENABLED')) && AitEventsPro::getEventsByItem($post->id)->found_posts) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-events", ""), array('itemId' => $post->id) + get_defined_vars(), $_l->templates['9q3km0meua'])->render() ;} ?>
							</div>
<?php endforeach; 
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
?>

<?php if ($_l->extends) { ob_end_clean(); return NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 