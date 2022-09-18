<?php //netteCache[01]000589a:2:{s:4:"time";s:21:"0.26946600 1663237812";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:100:"/home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/header-map/javascript.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/header-map/javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'trqkcx4e8f')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-container-script">

(function($, $window, $document, globals){
"use strict";

$window.load(function(){
<?php $searchFormEnabled = $elements->unsortable['search-form']->options['@display'] ;$searchFormType = $elements->unsortable['search-form']->options['type'] ;$searchFormCloseButton = false ;if ($searchFormEnabled == "1" && $searchFormType == "3") { $searchFormCloseButton = true ;} if ($searchFormCloseButton) { ?>
		if(jQuery(".search-form-type-3 .header-search-wrap .close-search-form-request-map").length){
			//enabled Button Search form type, remove form and show to map
			jQuery(".search-form-type-3 .header-search-wrap .close-search-form-request-map").on('click', function(){
				jQuery(".search-form-type-3 .header-search-wrap .elm-search-form-main").fadeOut();
			});
		}
<?php } ?>
	
<?php if ($el->option('mapLoadType') == "request") { ?>
		jQuery("#<?php echo $htmlId ?> .google-map-container .request-map-button .ait-sc-button, .search-form-type-3 .header-search-wrap .close-search-form-request-map").on('click', function(){
			showHeaderMap();
		});
<?php } else { ?>
		showHeaderMap();
<?php } ?>

	var isProgressbar = false;

	function showHeaderMap(){

		addHeaderMapControls();

		if (Modernizr.touchevents || Modernizr.pointerevents) {
			// disable the panorama on mobile
			if(globals.globalMaps.headerMap.panorama != null){
				// superhack waiting for content
				var headerMapPanoEvent = setInterval(function(){
					// we need second div because the first is the google map itself
					// if(jQuery("#<?php echo $htmlId ?> .google-map-container").children('div').length > 1){ // old condition
					// this is better condition to check for button on streetview
					if(jQuery("#<?php echo $htmlId ?> .draggable-toggle-button").length > 1){
						jQuery("#<?php echo $htmlId ?> .google-map-container div:last-child").find('.draggable-toggle-button').parent().parent().find('div:first').css({'pointer-events': 'none'});
						clearInterval(headerMapPanoEvent);
					}
				}, 100);
			}
		}

		var postType = 'ait-item';

		var requestData				  = {};
		requestData['action']       	  = 'get-items:getHeaderMapMarkers';
		requestData['type']         	  = 'headerMap';
		requestData['pageType']     	  = <?php echo NTemplateHelpers::escapeJs($pageType) ?>;
		requestData['postType']     	  = postType;
		requestData['globalQueryVars']   = <?php echo NTemplateHelpers::escapeJs($globalQueryVars) ?>;
		requestData['query-data']   	  = <?php echo NTemplateHelpers::escapeJs($__ait_query_data) ?>;
		requestData['lang']         	  = <?php echo NTemplateHelpers::escapeJs(AitLangs::getCurrentLanguageCode()) ?>;
		requestData['is_post_preview'] = <?php echo NTemplateHelpers::escapeJs(is_preview()) ?>;
<?php if (isset($searchQuery)) { ?>
			requestData['search-params'] = <?php echo NTemplateHelpers::escapeJs($searchQuery) ?>;
<?php } ?>

<?php if ($options->theme->items->sortingEnableMapPagination) { ?>
			requestData['ignorePagination'] = false;
<?php } else { ?>
			requestData['ignorePagination']  = true;
<?php } ?>

<?php if ($el->option('infoboxEnableTelephoneNumbers')) { ?>
			requestData['enableTel']  = true;
<?php } ?>
		requestData['query-data'].ajax = {
			limit: 500,
			offset: 0
		};

		isProgressbar = false;

		// first initial load
		getHeaderMapMarkers(requestData);
	}

	function getHeaderMapMarkers(request_data) {

		ait.ajax.post('get-items:getHeaderMapMarkers', request_data).done(function(data){
			if(data.success == true){
				addMapPins(data.data.raw_data.markers);
				var willContinue = false;
				if ((data.data.raw_data.post_count + request_data['query-data'].ajax.offset) < data.data.raw_data.found_posts) {
					willContinue = true;
				} else {
					willContinue = false;
				}

				// will continue
				// response from first request - we can add progressbar
				if (willContinue && request_data['query-data'].ajax.offset == 0) {
					addProgressBar(data.data.raw_data.found_posts);
					isProgressbar = true;
				}

				var newOffset = request_data['query-data'].ajax.offset + data.data.raw_data.post_count;

				if (isProgressbar) {
					updateProgressBar(newOffset);
				}

				if(willContinue){
					request_data['query-data'].ajax.offset = newOffset;
					getHeaderMapMarkers(request_data);
				} else {
					fitMap();
				}
			} else {
				console.log("not success");
			}
		}).fail(function(){
			console.log("fail");
		});
	}

	function addMapPins(markers){
		var mapObject = globals.globalMaps.headerMap;
		mapObject.markers = markers
		mapObject.initMarkers(mapObject.markers);
		var mapObject = globals.globalMaps.headerMap;
		if ( mapObject.params.enableGeolocation ) {
			// mapObject.setGeolocation();
		} else if( mapObject.params.enableAutoFit ) {
			mapObject.autoFit();
		}
		if ( mapObject.params.enableClustering) {
			mapObject.initClusterer();
		};
	}

	function fitMap(){

		var mapObject = globals.globalMaps.headerMap;
		if ( mapObject.params.enableGeolocation ) {
			// mapObject.setGeolocation();
		} else if( mapObject.params.enableAutoFit ) {
			mapObject.autoFit();
		}
		if ( mapObject.params.enableClustering) {
			mapObject.initClusterer();
		};

		/*if (mapObject.params.streetview) {
			mapObject.enableStreetview();
		}*/
	}

	function addProgressBar(max) {
		var progressBar = document.createElement('div');
		progressBar.className = 'ait-loader';
		progressBar.dataset.max = max;
		progressBar.dataset.current = 0;

		var loaderBar = document.createElement('div');
		loaderBar.className = 'loader-bar';

		progressBar.appendChild(loaderBar);


		var mapContainer = document.getElementById(globals.globalMaps.headerMap.containerID);
		mapContainer.appendChild(progressBar);
	}

	function updateProgressBar(count) {
		var mapContainer = document.getElementById(globals.globalMaps.headerMap.containerID);

		var loader = mapContainer.getElementsByClassName("ait-loader")[0];
		var max = loader.dataset.max;
		var progress = 100 / max * count;

		loader.dataset.current = count;
		// loader.getElementsByClassName('loader-bar')[0].style.width = (progress + '%');
		$(loader).find('.loader-bar').width(progress + '%');

		if (progress == 100) {
			$(loader).addClass('loader-hidden');
		}
	}

	function addHeaderMapControls() {
		var map = globals.globalMaps.headerMap.map;
		var panorama = globals.globalMaps.headerMap.panorama;
		if (Modernizr.touchevents || Modernizr.pointerevents) {
			var disableControlDiv = document.createElement('div');
			var disableControl = new DisableHeaderControl(disableControlDiv, map);
			map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(disableControlDiv);

			if(panorama != null){
				var disableStreetViewDiv = document.createElement('div');
				var disableStreetViewControl = new DisableHeaderStreetViewControl(disableStreetViewDiv);
				panorama.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(disableStreetViewDiv);
			}
		}
	}

	function isAdvancedSearch() {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === "a") {
				return true;
			}
		}
		return false;
	}

	/**
	 * The DisableControl adds a control to the map.
	 * This constructor takes the control DIV as an argument.
	 * @constructor
	 */
	function DisableHeaderControl(controlDiv, map) {
		var containerID = jQuery("#<?php echo $htmlId ?> .google-map-container").attr('id');
		var disableButton = document.createElement('div');
		disableButton.className = "draggable-toggle-button";
		jQuery(disableButton).html('<i class="fa fa-lock"></i>');

		controlDiv.appendChild(disableButton);

		jQuery(this).removeClass('active').html('<i class="fa fa-lock"></i>');
		map.setOptions({ draggable : false });

		google.maps.event.addDomListener(disableButton, 'click', function(e) {
			if(jQuery(this).hasClass('active')){
				jQuery(this).removeClass('active').html('<i class="fa fa-lock"></i>');
				map.setOptions({ draggable : false });
			} else {
				jQuery(this).addClass('active').html('<i class="fa fa-unlock"></i>');
				map.setOptions({ draggable : true });
			}
		});
	}

	function DisableHeaderStreetViewControl(controlDiv){
		var containerID = jQuery("#<?php echo $htmlId ?> .google-map-container").attr('id');
		var disableButton = document.createElement('div');
		disableButton.className = "draggable-toggle-button";
		jQuery(disableButton).html('<i class="fa fa-lock"></i>');

		controlDiv.appendChild(disableButton);

		jQuery(this).removeClass('active').html('<i class="fa fa-lock"></i>');

		google.maps.event.addDomListener(disableButton, 'click', function(e) {
			if(jQuery(this).hasClass('active')){
				jQuery(this).removeClass('active').html('<i class="fa fa-lock"></i>');
				if(globals.globalMaps.headerMap.panorama != null){
					// pano hack
					jQuery(this).parent().parent().find('div:first').css({'pointer-events': 'none'});
				}
			} else {
				jQuery(this).addClass('active').html('<i class="fa fa-unlock"></i>');
				if(globals.globalMaps.headerMap.panorama != null){
					// pano hack
					jQuery(this).parent().parent().find('div:first').css({'pointer-events': ''});
				}
			}
		});
	}

});

})(jQuery, jQuery(window), jQuery(document), this);

</script>