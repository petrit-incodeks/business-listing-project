<?php //netteCache[01]000591a:2:{s:4:"time";s:21:"0.25601100 1663237812";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:102:"/home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/header-map/header-map.latte";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/header-map/header-map.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'zrxcdjerld')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$elmAddress = $el->option('address') ?>

<?php $scrollWheel = $el->option('mousewheelZoom') ? "true" : "false" ;$autoZoomAndFit = $el->option('autoZoomAndFit') ? true : false ;$clustering = $el->option('clusterEnable') ? true : false ;$clustering = $el->option('clusterEnable') ? true : false ;$geoLocation = $el->option('geoLocationEnable') ? true : false ;$radius = false ;$streetview = false ?>

<?php $swheading = '' ;$swpitch = '' ;$swzoom = '' ?>

<?php $elmStreetview = false ;if ($elmAddress['streetview']) { $streetview = true ;$elmStreetview = true ;$address 	= array(
		'latitude'  => $elmAddress['latitude'],
		'longitude' => $elmAddress['longitude'],
	) ;$swheading = $elmAddress['swheading'] ;$swpitch   = $elmAddress['swpitch'] ;$swzoom    = $elmAddress['swzoom'] ;} else { $address = $el->option('address') ;} ?>

<?php $mapHeight = 'style="height: '. $el->option->height .'px;"' ?>

<?php global $wp_query ;global $__ait_query_data; $globalQueryVars = $wp_query->query_vars ?>

<?php $pageType = 'normal' ?>

<?php if ($wp->isSearch && isset($_REQUEST['a'])) { $pageType = 'search' ;$searchQuery = wp_parse_args($_GET) ?>

<?php if (!empty($_REQUEST['rad'])) { $geoLocation = true ;$radius = $_REQUEST['rad'] ;} ?>

<?php } elseif ($wp->isTax('ait-items') or $wp->isTax('ait-locations')) { $pageType = 'ait-items' ?>

<?php } elseif ($wp->isSingular('ait-item')) { $pageType = 'ait-item' ;$autoZoomAndFit = true ;$streetview = false ;$itemAddress = $post->meta('item-data')->map ;if ($itemAddress['streetview']) { $streetview = true ;$address 	= array(
			'latitude'  => $itemAddress['latitude'],
			'longitude' => $itemAddress['longitude'],
		) ;$swheading = $itemAddress['swheading'] ;$swpitch   = $itemAddress['swpitch'] ;$swzoom    = $itemAddress['swzoom'] ;} ?>

<?php } elseif ($wp->isSingular('ait-event-pro')) { $pageType = 'ait-event-pro' ;$autoZoomAndFit = true ;$streetview = false ;$itemAddress = aitEventAddress($post, true) ;if ($itemAddress['streetview']) { $streetview = true ;$address 	= array(
			'latitude'  => $itemAddress['latitude'],
			'longitude' => $itemAddress['longitude'],
		) ?>

<?php $swheading = $itemAddress['swheading'] ;$swpitch   = $itemAddress['swpitch'] ;$swzoom    = $itemAddress['swzoom'] ;} } ?>

<?php $toggleButton = false ;$toggleArea = false ;$headerLayoutType = isset($headerLayoutType) ? $headerLayoutType : $options->layout->general->headerType ?>

<?php if ($wp->isTax('items') or $wp->isTax('locations') or $wp->isSingular('item') or $wp->isSearch) { if ($headerLayoutType == 'map' and !$elements->unsortable['search-form']->display) { $toggleButton = true ;} ?>

<?php $toggleArea = true ;} ?>

<?php if ($toggleButton) { ?>
	<div class="ait-toggle-area-group toggle-map">
		<a href="#" class="ait-toggle-area-btn" data-toggle=".<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>
"><i class="fa fa-map-o"></i> <?php echo NTemplateHelpers::escapeHtml(__('Toggle Map', 'wplatte'), ENT_NOQUOTES) ?></a>
	</div>
<?php } ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ;if ($toggleArea) { ?>
 ait-toggle-area<?php } ?>" <?php echo $mapHeight ?>>

<?php $mapParams = array(
			'name'				=> 'headerMap',
			'enableAutoFit'     => $autoZoomAndFit,
			'enableClustering'  => $clustering,
			'typeId'            => $el->option('type'),
			'clusterRadius'     => intval($el->option('clusterRadius')),
			'enableGeolocation' => $geoLocation,
			'radius'			=> $radius,
			'streetview'		=> $streetview,
			'address'			=> $address,
			'swheading'			=> $swheading,
			'swpitch'			=> $swpitch,
			'swzoom'			=> $swzoom,
			'externalInfoWindow'=> false,
			'i18n'		        => aitMapTranslations(),
		) ;$themeOptions = $options->theme ;NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/google-map", ""), array('options' => aitGetMapOptions($el->options),
			'markers' => array(),
			'params'  => $mapParams,
			'containerID' => $htmlId,
			'themeOptions' 	=> $themeOptions) + get_defined_vars(), $_l->templates['zrxcdjerld'])->render() ?>


<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/header-map/javascript", ""), array() + get_defined_vars(), $_l->templates['zrxcdjerld'])->render() ?>
</div>
