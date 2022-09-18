{if $meta->map['latitude'] && $meta->map['longitude']}
{if ($meta->map['latitude'] === "1" && $meta->map['longitude'] === "1") != true}
<div class="map-container {if $options->theme->google->requestMapItemDetail }google-map-container on-request{/if}">
	<div class="content" style="height: {$settings->mapHeight}px">
		{if $options->theme->google->requestMapItemDetail }
		<div class="request-map">
			{if $options->theme->google->requestDescriptionText}
				<div class="request-map-description">
					{!$options->theme->google->requestDescriptionText}
				</div>
			{/if}
			<div class="request-map-button">
				<a href="#" class="ait-sc-button simple">
				      <span class="container">
				            <span class="text">
				                  <span class="title">{if $options->theme->google->requestButtonText}{!$options->theme->google->requestButtonText}{else}{__ 'Show the map'}{/if}</span>
				            </span>
				      </span>
				</a>
			</div>
		</div>
		{/if}
	</div>

	<script type="text/javascript">
	jQuery(document).ready(function(){
		var $mapContainer = jQuery('.single-ait-item .map-container');
		var $mapContent = $mapContainer.find('.content');

		$mapContent.width($mapContainer.width());

		var styles = [
			{ featureType: "landscape", stylers: [
					{ visibility: "{if $settings->mapDisplayLandscapeShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "administrative", stylers: [
					{ visibility: "{if $settings->mapDisplayAdministrativeShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "road", stylers: [
					{ visibility: "{if $settings->mapDisplayRoadsShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "water", stylers: [
					{ visibility: "{if $settings->mapDisplayWaterShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "poi", stylers: [
					{ visibility: "{if $settings->mapDisplayPoiShow == false}off{else}on{/if}"},
				]
			},
		];

		var mapdata = {
			latitude: {$meta->map['latitude']},
			longitude: {$meta->map['longitude']}
		}

		{if $options->theme->google->requestMapItemDetail }
		$mapContainer.find('.request-map-button').find('.ait-sc-button').on('click', function(e){
			e.preventDefault();
		{/if}
			$mapContent.gmap3({
				map: {
					options: {
						center: [mapdata.latitude,mapdata.longitude],
						zoom: {!$settings->mapZoom},
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
		{if $options->theme->google->requestMapItemDetail }
		});
		{/if}
	});

	jQuery(window).resize(function(){
		var $mapContainer = jQuery('.single-ait-item .map-container');
		var $mapContent = $mapContainer.find('.content');

		$mapContent.width($mapContainer.width());
	});
	</script>
</div>

{/if}
{/if}