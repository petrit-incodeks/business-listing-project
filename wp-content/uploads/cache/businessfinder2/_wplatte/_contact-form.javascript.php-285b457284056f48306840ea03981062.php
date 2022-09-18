<?php //netteCache[01]000591a:2:{s:4:"time";s:21:"0.00063000 1663237083";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:102:"/home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/contact-form/javascript.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/contact-form/javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'dzcepzettr')
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
<script type="text/javascript">
;(function($, undefined){
	//$(function(){
	jQuery(window).on('load', function() {

		var langCode = <?php echo NTemplateHelpers::escapeJs($currentLang->slug) ?>;

		if(langCode === 'br'){
			langCode = 'pt-BR';
		}else if(langCode === 'cn'){
			langCode = 'zh-CN';
		}else if(langCode === 'tw'){
			langCode = 'zh-TW';
		}

		// set the center of the messages
		var datepickerOptions = {
			firstDay: <?php echo get_option('start_of_week') ?>

		};
		if(langCode != 'en' && $.datepicker.regional[langCode]){
			$.extend(datepickerOptions, $.datepicker.regional[langCode]);
		}
		$('#<?php echo $htmlId ?> form .input-datepicker').datepicker(datepickerOptions);

		$('#<?php echo $htmlId ?> form select').selectbox();

<?php if ($options->theme->general->progressivePageLoading) { ?>
			if(!isResponsive(1024)){
				jQuery("#<?php echo $htmlId ?>-main").waypoint(function(){
					jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
				}, { triggerOnce: true, offset: "95%" });
			} else {
				jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
			}
<?php } else { ?>
			jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
<?php } ?>

		/* new captcha */
		var $captchaContainer = $("#<?php echo $htmlId ?> form input[name=captcha-check]").parent();
		if($captchaContainer.find('img').length == 0){
			// ajax load new captcha
			ait.ajax.get('send-email:getCaptcha', null).done(function(xhr){
					var $container = jQuery('#<?php echo $htmlId ?> form');
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
		var $captchaContainer = $("#<?php echo $htmlId ?> form input[name=captcha-check]").parent();
		if($captchaContainer.find('img').length > 0){
			var $captchaImage = $captchaContainer.find('img');
			$captchaImage.fadeTo("slow", 0);
			// ajax load new captcha
			ait.ajax.get('send-email:getCaptcha', null).done(function(xhr){
					var $container = jQuery('#<?php echo $htmlId ?> form');
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


	$("#<?php echo $htmlId ?> form input[type=reset]").click(function(){
		$("#<?php echo $htmlId ?> form")[0].reset();
		$('#<?php echo $htmlId ?> form select option').each(function(){
			$(this).removeAttr('selected');
		});
		$('#<?php echo $htmlId ?> form select option:first-child').attr("selected", "selected");
		$('#<?php echo $htmlId ?> form .input-select .sbSelector').html($('#<?php echo $htmlId ?> form .input-select .sbOptions li:first-child').text())
		$("#<?php echo $htmlId ?> form .input-warning").removeClass("input-warning");
		regenerateCaptcha();
	});

	var $submitButton = $("#<?php echo $htmlId ?> form input[type=submit]");

	$("#<?php echo $htmlId ?> form").submit(function(){
		$("#<?php echo $htmlId ?> .ait-sc-notification").fadeOut('fast');
		// disable submit button
		$submitButton.attr('disabled', true);

		var ignored = new Array("submit", "reset", 'button', 'file');	// ignored from validation
		var data = {};
		var sendTheForm = true;
		var checkdata = {};
		// do the validation process for text inputs
		$('#<?php echo $htmlId ?> form input[type=text], #<?php echo $htmlId ?> form textarea, #<?php echo $htmlId ?>
 form input[type=email], #<?php echo $htmlId ?> form input[type=url]').each(function(){
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
		$('#<?php echo $htmlId ?> form input[type=radio], #<?php echo $htmlId ?> form input[type=checkbox]').each(function(){
			if($(this).hasClass('input-required')){
				checkdata["'"+$(this).attr('name')+"'"] = false;
			}
		});
		$('#<?php echo $htmlId ?> form input[type=radio], #<?php echo $htmlId ?> form input[type=checkbox]').each(function(){
			if($(this).hasClass('input-required')){
				if($(this).is(':checked')){
					checkdata["'"+$(this).attr('name')+"'"] = true;
				}
			}
		});

		var counter = 0;
		$.each(checkdata, function(k, v){ if(v == true){ counter++; } else {
			var elem = jQuery("#<?php echo $htmlId ?> form input[name="+k+"]");
			elem.parent().parent().parent().parent().parent().addClass('input-warning');
		} });
		var mCheckArray = $.map(checkdata, function(k, v) { return [k]; });
		if(counter != mCheckArray.length){ sendTheForm = false; }

		var $loading = $("#<?php echo $htmlId ?> .loading");

		// check the multiinputs
		if(sendTheForm){
			// build the data
			var multiinputs = {};
			$('#<?php echo $htmlId ?> form :input').each(function(){
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

			var oldErrorMsg = $("#<?php echo $htmlId ?> .error p").html();

			// after validation send the form througth ajax
			ait.ajax.post('send-email:send', data).done(function(response){
				if(response.success == true){
					$loading.fadeOut("slow");
					regenerateCaptcha();
					$("#<?php echo $htmlId ?> form").each(function(){
						this.reset();
					});
					$submitButton.removeAttr('disabled');
					$("#<?php echo $htmlId ?> .success").fadeIn('fast').delay(5000).fadeOut('fast');
				} else {
					$loading.fadeOut("slow");
					$("#<?php echo $htmlId ?> .error p").html(response.data.message);
					$("#<?php echo $htmlId ?> .error").fadeIn('fast').delay(5000).fadeOut('fast');
					$submitButton.removeAttr('disabled');
					$("#<?php echo $htmlId ?> .error p").html(oldErrorMsg); // restore old error msg
				}
			}).fail(function(){
				$loading.fadeOut("slow");
				$("#<?php echo $htmlId ?> .error").fadeIn('fast').delay(5000).fadeOut('fast');
				$submitButton.removeAttr('disabled');
			});
		} else {
			// show the warning message // validation was not sucessful
			$loading.hide();
			$submitButton.removeAttr('disabled');

			$("#<?php echo $htmlId ?> .attention").fadeIn('fast').hover(function(){
				$(this).fadeOut('slow');
			});
		}

		return false;	// prevent the page from refreshing
	});
})(jQuery);
</script>
