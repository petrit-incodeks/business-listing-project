jQuery( document ).ready(function( $ ) {
  // Code that uses jQuery's $ can follow here.

  jQuery.fn.cp = function(){
		return this.each(function(){
			var $input = jQuery(this),
				myColor = $input.val();

			$input.css({'border-left-width': '15px'});
			$input.css({'border-left-color': myColor});

			$input.ColorPicker({
				color: myColor,
				onSubmit: function(hsb, hex, rgb, el) {
					jQuery(el).val( '#' + hex);
					jQuery(el).ColorPickerHide();
				},
				onBeforeShow: function () {
					jQuery(this).ColorPickerSetColor(this.value);
					$input.css({'border-left-color': this.value});
				},
				onChange: function (hsb, hex, rgb){
					$input.val('#' + hex);
					$input.css({'border-left-color': '#' + hex});
				}
			}).bind('keyup', function(){
				jQuery(this).ColorPickerSetColor('#' + this.value);
			});
		});
	}

	jQuery('.colorPickerField').cp();
	
	jQuery('.delete_role').click(function () {
		$role = jQuery(this).attr('name');
		
		var data = {
						'action'		: 'deleteRole',
						'role'		: $role
					};
		
		jQuery.post(
					ajaxurl,
					data,
					function(response) {
						console.log(response);
						if(response){
							location.reload();
						}
					}
				);
	});
	
	jQuery('.add_role').click(function () {
	
		$role = jQuery('#newRole').val();
		
		var data = {
						'action'		: 'addCustomRole',
						'role'		: $role
					};
		
		jQuery.post(
					ajaxurl,
					data,
					function(response) {
						console.log(response);
						location.reload();
					}
				);
	});
	
	jQuery('.checkAll').click(function () {
		var checkAll = jQuery(this).attr('id');
		jQuery('.'+checkAll).prop('checked', true);
	});
	
	jQuery('.unCheckAll').click(function () {
		var checkAll = jQuery(this).attr('id');
		jQuery('.'+checkAll).prop('checked', false);
	});

	jQuery('#upload_logo').click(function () {
        tb_show('Upload a logo', 'media-upload.php?referer=wptuts-settings&type=image&TB_iframe=true&post_id=0', false);
        window.send_to_editor = function(html) {
    		var image_url = $('img',html).attr('src');
    		jQuery('#easyAdminLogo').val(image_url);
    		tb_remove();
		}
        return false;
	});
	
	
	
	
});