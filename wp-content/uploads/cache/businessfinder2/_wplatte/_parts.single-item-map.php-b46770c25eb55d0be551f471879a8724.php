<?php //netteCache[01]000576a:2:{s:4:"time";s:21:"0.61180200 1663269281";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:88:"/home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/single-item-map.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/single-item-map.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'v2eiuf0cng')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($meta->map['latitude'] && $meta->map['longitude']) { if (($meta->map['latitude'] === "1" && $meta->map['longitude'] === "1") != true) { ?>
<div class="map-container <?php if ($options->theme->google->requestMapItemDetail) { ?>
google-map-container on-request<?php } ?>">
	<div class="content" style="height: <?php echo NTemplateHelpers::escapeHtml(NTemplateHelpers::escapeCss($settings->mapHeight), ENT_COMPAT) ?>px">
<?php if ($options->theme->google->requestMapItemDetail) { ?>
		<div class="request-map">
<?php if ($options->theme->google->requestDescriptionText) { ?>
				<div class="request-map-description">
					<?php echo $options->theme->google->requestDescriptionText ?>

				</div>
<?php } ?>
			<div class="request-map-button">
				<a href="#" class="ait-sc-button simple">
				      <span class="container">
				            <span class="text">
				                  <span class="title"><?php if ($options->theme->google->requestButtonText) { echo $options->theme->google->requestButtonText ;} else { echo NTemplateHelpers::escapeHtml(__('Show the map', 'wplatte'), ENT_NOQUOTES) ;} ?></span>
				            </span>
				      </span>
				</a>
			</div>
		</div>
<?php } ?>
	</div>

	<script type="text/javascript">
	jQuery(document).ready(function(){
		var $mapContainer = jQuery('.single-ait-item .map-container');
		var $mapContent = $mapContainer.find('.content');

		$mapContent.width($mapContainer.width());

		var styles = [
			{ featureType: "landscape", stylers: [
					{ visibility: "<?php if ($settings->mapDisplayLandscapeShow == false) { ?>off<?php } else { ?>
on<?php } ?>"},
				]
			},
			{ featureType: "administrative", stylers: [
					{ visibility: "<?php if ($settings->mapDisplayAdministrativeShow == false) { ?>
off<?php } else { ?>on<?php } ?>"},
				]
			},
			{ featureType: "road", stylers: [
					{ visibility: "<?php if ($settings->mapDisplayRoadsShow == false) { ?>off<?php } else { ?>
on<?php } ?>"},
				]
			},
			{ featureType: "water", stylers: [
					{ visibility: "<?php if ($settings->mapDisplayWaterShow == false) { ?>off<?php } else { ?>
on<?php } ?>"},
				]
			},
			{ featureType: "poi", stylers: [
					{ visibility: "<?php if ($settings->mapDisplayPoiShow == false) { ?>off<?php } else { ?>
on<?php } ?>"},
				]
			},
		];

		var mapdata = {
			latitude: <?php echo NTemplateHelpers::escapeJs($meta->map['latitude']) ?>,
			longitude: <?php echo NTemplateHelpers::escapeJs($meta->map['longitude']) ?>

		}

<?php if ($options->theme->google->requestMapItemDetail) { ?>
		$mapContainer.find('.request-map-button').find('.ait-sc-button').on('click', function(e){
			e.preventDefault();
<?php } ?>
			$mapContent.gmap3({
				map: {
					options: {
						center: [mapdata.latitude,mapdata.longitude],
						zoom: <?php echo $settings->mapZoom ?>,
						scrollwheel: false,
						styles: styles,
					}
				},
				marker: {
					values:[
						{ latLng:[mapdata.latitude,mapdata.longitude] }
			        ],
				},
			});
<?php if ($options->theme->google->requestMapItemDetail) { ?>
		});
<?php } ?>
	});

	jQuery(window).resize(function(){
		var $mapContainer = jQuery('.single-ait-item .map-container');
		var $mapContent = $mapContainer.find('.content');

		$mapContent.width($mapContainer.width());
	});
	</script>
</div>

<?php } } 