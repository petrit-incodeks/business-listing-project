<script type="text/javascript">
;(function($, undefined){
	//$(function(){
	jQuery(window).on('load', function() {

		var langCode = {$currentLang->slug};

		if(langCode === 'br'){
			langCode = 'pt-BR';
		}else if(langCode === 'cn'){
			langCode = 'zh-CN';
		}else if(langCode === 'tw'){
			langCode = 'zh-TW';
		}

		// set the center of the messages
		var datepickerOptions = {
			firstDay: {!= get_option('start_of_week')}
		};
		if(langCode != 'en' && $.datepicker.regional[langCode]){
			$.extend(datepickerOptions, $.datepicker.regional[langCode]);
		}
		$('#{!$htmlId} form .input-datepicker').datepicker(datepickerOptions);

		$('#{!$htmlId} form select').selectbox();

		{if $options->theme->general->progressivePageLoading}
			if(!isResponsive(1024)){
				jQuery("#{!$htmlId}-main").waypoint(function(){
					jQuery("#{!$htmlId}-main").addClass('load-finished');
				}, { triggerOnce: true, offset: "95%" });
			} else {
				jQuery("#{!$htmlId}-main").addClass('load-finished');
			}
		{else}
			jQuery("#{!$htmlId}-main").addClass('load-finished');
		{/if}

		/* new captcha */
		var $captchaContainer = $("#{!$htmlId} form input[name=captcha-check]").parent();
		if($captchaContainer.find('img').length == 0){
			// ajax load new captcha
			ait.ajax.get('send-email:getCaptcha', null).done(function(xhr){
					var $container = jQuery('#{!$htmlId} form');
					var $captchaInput = $container.find("input[name=captcha-check]");
					var $captchaContainer = $captchaInput.parent();

					$container.find('input[name="response-email-check"]').val(xhr.data.rand);

					jQuery(xhr.data.html).insertBefore($captchaInput);	// insert new captcha image
					$captchaInput.show();
					$captchaContainer.find('.captcha-text .fa-refresh').hide();

			}).fail(function(){
				console.error("get captcha failed");
			});
		}
		/* new captcha */
	});

	function regenerateCaptcha() {
		/* regenerate captcha image after submit */
		/* new captcha */
		var $captchaContainer = $("#{!$htmlId} form input[name=captcha-check]").parent();
		if($captchaContainer.find('img').length > 0){
			var $captchaImage = $captchaContainer.find('img');
			$captchaImage.fadeTo("slow", 0);
			// ajax load new captcha
			ait.ajax.get('send-email:getCaptcha', null).done(function(xhr){
					var $container = jQuery('#{!$htmlId} form');
					$container.find('input[name="response-email-check"]').val(xhr.data.rand);
					var $imageUrl = xhr.data.url;
					$captchaImage.attr('src', $imageUrl);
					$captchaImage.fadeTo("slow", 1);
			}).fail(function(){
				console.error("get captcha failed");
			});
		}
		/* new captcha */
	}


	$("#{!$htmlId} form input[type=reset]").click(function(){
		$("#{!$htmlId} form")[0].reset();
		$('#{!$htmlId} form select option').each(function(){
			$(this).removeAttr('selected');
		});
		$('#{!$htmlId} form select option:first-child').attr("selected", "selected");
		$('#{!$htmlId} form .input-select .sbSelector').html($('#{!$htmlId} form .input-select .sbOptions li:first-child').text())
		$("#{!$htmlId} form .input-warning").removeClass("input-warning");
		regenerateCaptcha();
	});

	var $submitButton = $("#{!$htmlId} form input[type=submit]");

	$("#{!$htmlId} form").submit(function(){
		$("#{!$htmlId} .ait-sc-notification").fadeOut('fast');
		// disable submit button
		$submitButton.attr('disabled', true);

		var ignored = new Array("submit", "reset", 'button', 'file');	// ignored from validation
		var data = {};
		var sendTheForm = true;
		var checkdata = {};
		// do the validation process for text inputs
		$('#{!$htmlId} form input[type=text], #{!$htmlId} form textarea, #{!$htmlId} form input[type=email], #{!$htmlId} form input[type=url]').each(function(){
			var type = $(this).attr('type');
			if($.inArray(type, ignored) == -1 && $(this).hasClass('input-required')){
				if(!$(this).val() && $(this).val() == "" || $(this).val() == "http://"){
					$(this).addClass('input-warning');
					$(this).parent().parent().parent().addClass('input-warning');
					checkdata["'"+$(this).attr('name')+"'"] = false;
				} else {
					$(this).removeClass('input-warning');
					$(this).parent().parent().parent().removeClass('input-warning');
					checkdata["'"+$(this).attr('name')+"'"] = true;
				}
			}
		});

		// do the validation process for the rest (radios, checkboxes)
		$('#{!$htmlId} form input[type=radio], #{!$htmlId} form input[type=checkbox]').each(function(){
			if($(this).hasClass('input-required')){
				checkdata["'"+$(this).attr('name')+"'"] = false;
			}
		});
		$('#{!$htmlId} form input[type=radio], #{!$htmlId} form input[type=checkbox]').each(function(){
			if($(this).hasClass('input-required')){
				if($(this).is(':checked')){
					checkdata["'"+$(this).attr('name')+"'"] = true;
				}
			}
		});

		var counter = 0;
		$.each(checkdata, function(k, v){ if(v == true){ counter++; } else {
			var elem = jQuery("#{!$htmlId} form input[name="+k+"]");
			elem.parent().parent().parent().parent().parent().addClass('input-warning');
		} });
		var mCheckArray = $.map(checkdata, function(k, v) { return [k]; });
		if(counter != mCheckArray.length){ sendTheForm = false; }

		var $loading = $("#{!$htmlId} .loading");

		// check the multiinputs
		if(sendTheForm){
			// build the data
			var multiinputs = {};
			$('#{!$htmlId} form :input').each(function(){
				var type = $(this).attr('type');
				if($.inArray(type, ignored) == -1){
					var name = $(this).attr('name');
					var value = $(this).val();
					switch(type){
						case "checkbox":
							if($(this).is(":checked")){
								multiinputs[name] += ", " + value;
							}
						break;
						case "radio":
							if($(this).is(":checked")){
								data[name] = value;
							}
						break;
						default:
							data[name] = value;
						break;
					}
				}
			});

			$.each(multiinputs, function(index, value){
				value = value.replace("undefined, ", "");
				data[index] = value;
			});

			$loading.fadeIn("slow");

			var oldErrorMsg = $("#{!$htmlId} .error p").html();

			// after validation send the form througth ajax
			ait.ajax.post('send-email:send', data).done(function(response){
				if(response.success == true){
					$loading.fadeOut("slow");
					regenerateCaptcha();
					$("#{!$htmlId} form").each(function(){
						this.reset();
					});
					$submitButton.removeAttr('disabled');
					$("#{!$htmlId} .success").fadeIn('fast').delay(5000).fadeOut('fast');
				} else {
					$loading.fadeOut("slow");
					$("#{!$htmlId} .error p").html(response.data.message);
					$("#{!$htmlId} .error").fadeIn('fast').delay(5000).fadeOut('fast');
					$submitButton.removeAttr('disabled');
					$("#{!$htmlId} .error p").html(oldErrorMsg); // restore old error msg
				}
			}).fail(function(){
				$loading.fadeOut("slow");
				$("#{!$htmlId} .error").fadeIn('fast').delay(5000).fadeOut('fast');
				$submitButton.removeAttr('disabled');
			});
		} else {
			// show the warning message // validation was not sucessful
			$loading.hide();
			$submitButton.removeAttr('disabled');

			$("#{!$htmlId} .attention").fadeIn('fast').hover(function(){
				$(this).fadeOut('slow');
			});
		}

		return false;	// prevent the page from refreshing
	});
})(jQuery);
</script>
