<?php //netteCache[01]000564a:2:{s:4:"time";s:21:"0.36637500 1663237812";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:76:"/home/www/npik.online/wp-content/themes/businessfinder2/parts/page-share.php";i:2;i:1663151171;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/parts/page-share.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'phch2a9p1z')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$type = isset($elements->unsortable["page-title"]->option->type) ? $elements->unsortable["page-title"]->option->type : 'standard' ?>

<?php $shareUrl 				= "" ;$shareTitle 			= "" ;$shareImage 			= "" ;$shareDescription		= "" ;$twitterReferral       = "" ?>

<?php $twitterReferral = get_bloginfo( 'name' ) ;if ($options->theme->social->socIcons) { $iterations = 0; foreach ($options->theme->social->socIcons as $icon) { if (strpos($icon->url,'twitter') !== false) { $search = array('http://www.twitter.com/', 'http://twitter.com/', 'http://t.co') ;$twitterReferral = str_replace($search, '', $icon->url) ;} $iterations++; } } ?>




<?php if ($wp->isPage or $wp->isSingular('post') or $wp->isSingular('portfolio-item') or $wp->isSingular('event') or $wp->isSingular('job-offer') or $wp->isSingular('doc') or $wp->isSingular('theme') or $wp->isSingular('item')) { foreach($iterator = new WpLatteLoopIterator() as $post): $shareUrl 			= $post->permalink ;$shareTitle 		= $post->title ;$shareImage 		= isset($post->ID) ? wp_get_attachment_url(get_post_thumbnail_id($post->ID)) : wp_get_attachment_url(get_post_thumbnail_id($post->id)) ;$shareDescription	= substr(strip_tags($post->excerpt), 0, 100) ?>

<?php if ($type == 'theme' && $wp->isPage) { $query = WpLatteMacros::prepareCustomWpQuery(array('id' => $elements->unsortable["page-title"]->option->theme, 'type' => 'theme')); if ($query->havePosts) { foreach ($iterator = new WpLatteLoopIterator($query) as $item): $shareTitle 		= $item->meta('theme')->subtitle ;$shareDescription 	= strip_tags($item->content) ;$shareImage 		= $item->imageUrl ;endforeach; wp_reset_postdata(); } } ?>

<?php endforeach; } elseif ($wp->isAuthor) { $qobj = get_queried_object() ;if ($qobj and isset($qobj->ID)) { $shareUrl 				= get_author_posts_url( $qobj->ID ) ;$shareTitle 			= get_the_author_meta( 'display_name', $qobj->ID ) ;$shareDescription		= get_the_author_meta( 'description', $qobj->ID ) ;} } elseif ($wp->isCategory or $wp->isTax('ait-events-pro') or $wp->isTax('ait-items') or $wp->isTax('ait-locations') or $wp->isTax('events')) { $qobj = get_queried_object() ;if ($qobj and isset($qobj->term_id)) { $shareUrl 				= get_category_link(intval($qobj->term_id)) ;$shareTitle 			= $qobj->name ;$shareDescription		= $qobj->description ;} } else { if (AitWoocommerce::enabled()) { if (AitWoocommerce::currentPageIs('shop')) { $shareUrl 				= get_permalink( wc_get_page_id( 'shop' ) ) ?>
			<?php ob_start() ;woocommerce_page_title() ;$shareTitle = ob_get_clean() ?>

<?php $shareDescription		= '' ;} else { $qobj = get_queried_object() ;if ($qobj and isset($qobj->ID)) { $shareUrl 				= get_permalink($qobj->ID) ;$shareTitle 			= get_the_title($qobj->ID) ;$shareDescription		= '' ;} } } else { $qobj = get_queried_object() ;if ($qobj and isset($qobj->ID)) { $shareUrl 				= get_permalink($qobj->ID) ;$shareTitle 			= get_the_title($qobj->ID) ;$shareDescription		= '' ;} } } ?>

<?php $SEOOptions = $elements->unsortable["seo"]->option ?>

<?php if (isset($SEOOptions->title) && $SEOOptions->title != "") { $shareTitle = $SEOOptions->title ;} if (isset($SEOOptions->description) && $SEOOptions->description != "") { $shareDescription 	= substr($SEOOptions->description, 0, 80) ;} if ($showShare and $shareUrl and $shareTitle) { ?>
<div class="page-title-social">
	<div class="page-share">

		<ul class="share-icons">

			<li class="share-facebook">
				<a href="#" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $shareUrl ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<i class="fa fa-facebook"></i>
				</a>
			</li><li class="share-twitter">
				<a href="#" onclick="javascript:window.open('https://twitter.com/intent/tweet?text=<?php echo rawurlencode($shareTitle) ?>
&amp;url=<?php echo $shareUrl ?>&amp;via=<?php echo $twitterReferral ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
					<i class="fa fa-twitter"></i>
				</a>
			</li><li class="share-pinterest">
				<a href="#" onclick="javascript:window.open('http://pinterest.com/pin/create/link/?url=<?php echo $shareUrl ?>
&media=<?php echo $shareImage ?>&description=<?php echo $shareTitle ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
					<i class="fa fa-pinterest"></i>
				</a>
			</li>

		</ul>

		<div class="share-text">
			<?php echo __('<span class="title">Share</span> <span class="subtitle">this page</span>', 'wplatte') ?>

		</div>


	</div>
</div>
<?php } 