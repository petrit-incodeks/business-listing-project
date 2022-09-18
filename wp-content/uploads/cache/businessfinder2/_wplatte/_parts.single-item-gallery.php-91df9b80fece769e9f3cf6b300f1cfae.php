<?php //netteCache[01]000580a:2:{s:4:"time";s:21:"0.52774800 1663269281";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:92:"/home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/single-item-gallery.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/single-item-gallery.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'jjjc3kzu0b')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$galleryItems = array() ?>

<?php if ($post->hasImage) { array_push($galleryItems, array(
		'title' => $post->title,
		'image' => $post->imageUrl
	)) ;} ?>

<?php if (is_array($meta->gallery)) { $galleryItems = array_merge($galleryItems, $meta->gallery) ;} ?>

<div class="item-gallery gallery-wrapper">
	<div class="gallery-slider">

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/single-item-features", ""), array() + get_defined_vars(), $_l->templates['jjjc3kzu0b'])->render() ?>
				<ul class="slider-items">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($galleryItems) as $item) { ?>
			<li <?php if ($iterator->first) { ?>class="active"<?php } ?>>
<?php $title = !empty($item['title']) ? $item['title'] : ($defaultLabel . ' ' . $iterator->counter) ?>
				<a href="<?php echo NTemplateHelpers::escapeHtml($item['image'], ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml($title, ENT_COMPAT) ?>" target="_blank" rel="item-gallery" data-focus="disabled">
					<div style="background-image: url('<?php echo aitResizeImage($item['image'], array('width' => 1000, 'height' => 500, 'crop' => 1)) ?>')"></div>
				</a>
			</li>
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
		</ul>
		<div class="navigation-arrows">
			<div class="arrow-left"><i class="fa fa-chevron-left"></i></div>
			<div class="arrow-right"><i class="fa fa-chevron-right"></i></div>
		</div>
	</div>

	<div class="gallery-aside">
		<h3><?php echo NTemplateHelpers::escapeHtml(__('Gallery', 'wplatte'), ENT_NOQUOTES) ?></h3>
		<div class="navigation-list-wrapper">
			<div class="optiscroll">
				<div class="optiscroll-content">
					<ul class="navigation-list">
						<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Image', 'wplatte'), ENT_NOQUOTES) ;$defaultLabel = ob_get_clean() ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($galleryItems) as $item) { ?>
						<li class="navigation-item<?php if ($iterator->first) { ?> active<?php } ?>">
<?php $label = !empty($item['title']) ? $item['title'] : ($defaultLabel . ' ' . $iterator->counter) ?>
							<a href="#"><?php echo $label ?></a>
						</li>
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<script id="single-item-gallery-script">

var singleItemGallery = singleItemGallery || {};

(function($, $window, $document, undefined){
	"use strict";

	var gallery = {
		items: [],
		context: null,
		currentIndex: 0,
		listeners: [],

		dispatch: function() {
			for (var i=0; i < gallery.listeners.length; i++) {
				gallery.listeners[i].apply();
			}
		}

	};

	// ===============================================
	// Start
	// -----------------------------------------------

	$(function(){
		// initialize gallery
		gallery.context = $('.item-gallery.gallery-wrapper');
		gallery.items = gallery.context.find('ul.slider-items li');

		var updateArrows = function() {
			console.log("updating arrows");
			gallery.context.find(".navigation-arrows .arrow-right").removeClass('disabled');
			gallery.context.find(".navigation-arrows .arrow-left").removeClass('disabled');

			if (gallery.currentIndex == 0) {
				gallery.context.find(".navigation-arrows .arrow-left").addClass('disabled');
			} else if ((gallery.currentIndex + 1) == gallery.items.length) {
				gallery.context.find(".navigation-arrows .arrow-right").addClass('disabled');
			}
		};
		gallery.listeners.push(updateArrows);

		var updateListNav = function() {
			console.log("updating list nav");
			gallery.context.find("ul.navigation-list li").each(function(index, value){
				if (gallery.currentIndex == index) {
					$(value).addClass('active');
				} else {
					$(value).removeClass('active');
				}
			});
		}
		gallery.listeners.push(updateListNav);

		var updateGalleryItem = function() {
			for (var i=0; i < gallery.items.length; i++) {
				console.log(gallery.items[i]);
				$(gallery.items[i]).removeClass('active');
			}
			$(gallery.items[gallery.currentIndex]).addClass('active');
			gallery.context.find('.optiscroll').optiscroll('scrollIntoView', gallery.context.find('.navigation-item.active'), 'auto');
		}
		gallery.listeners.push(updateGalleryItem);


		gallery.context.find(".navigation-arrows .arrow-left").on('click', function(){
			gallery.currentIndex -= 1;
			gallery.dispatch();
		});

		gallery.context.find(".navigation-arrows .arrow-right").on('click', function(){
			gallery.currentIndex += 1;
			gallery.dispatch();
		});

		gallery.context.find("ul.navigation-list li.navigation-item").on('click', function(e){
			e.preventDefault();
			console.log($(e.currentTarget).index());
			gallery.currentIndex = $(e.currentTarget).index();
			gallery.dispatch();
		});
	});

	singleItemGallery = gallery;

})(jQuery, jQuery(window), jQuery(document));


</script>
