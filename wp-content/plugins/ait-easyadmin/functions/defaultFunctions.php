<?php

	function easyAdminActivation() {

		$appearance = array(
			"pageBackground"		=> "#e8e8e8",
			"contentBackround"		=> "#ffffff",
			"fontColor"				=> "#000000",
			"mainFont"				=> "#000000",
			'headerColor1'			=> '#D05756',
			'headerColor2'			=> '#D05756',
			'menuBackgroundColor'	=> '#3f3f3f',
			'menuFontColor'			=> '#ffffff',
			"buttonColor"			=> "#D05756",
			"buttonTextColor"		=> "#f7f7f7",
			"tableMain"				=> "#ffffff",
			"headerh2"				=> "#000000",
			"postboxBackground"		=> "#fafafa",
			"postboxFont"			=> "#000000",
			"postboxBorderColor"	=> "#d4d4d4",
			"postboxfontColor"  	=> "#000000",
			"postboxLabelColor"		=> "#000000",
			"textareaInput"			=> "#ffffff",
			"footerColor"			=> "#3b3b3b",
			"postboxBorder"			=> "0",
			"maxWidth"				=> "1000"
		);

		$settings = array(
			"easy_admin" 			=> true,
			"easyAdminLogo" 			=> '',
		);

		add_option('ait_easy_admin_appearance',$appearance);
		add_option('ait_easy_admin_settings',$settings);
	}

	global $easyAdminSettings;

	$easyAdminSettings = get_option('ait_easy_admin_settings');

	if($easyAdminSettings['easy_admin']){

		function redirectEasyAdminLgoin( $redirect_to, $request, $user ) {

			global $user;
			if ( isset( $user->roles ) && is_array( $user->roles ) ) {
				if ( in_array( 'administrator', $user->roles ) ) {
					return $redirect_to;
				} else {
					return admin_url('profile.php');

				}
			} else {
				return admin_url('profile.php');
			}
		}

		add_action('admin_init', 'easyAdminRedirect', 999);

		function easyAdminRedirect($easyAdminSettings){
			global $easyAdminSettings;
			global $current_user;
			if ( !current_user_can('manage_options') ) {
				add_action('in_admin_header', 'avadaEasyAdminHeader',1);
				//add_action('in_admin_footer', 'avadaEasyAdminFooter',2);
				add_action( 'admin_enqueue_scripts', 'easy_adminStyles' );
				add_filter('show_admin_bar', '__return_false');
				remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
				add_action( 'personal_options', 'disablePersonalOptions');
				show_admin_bar(false);
				//removeMetaBoxes($easyAdminSettings);
			}

			add_action('do_meta_boxes', 'removeReviewMetaBoxes');
			add_action('do_meta_boxes', 'removeItemMetaBoxes');

		}


		function removeReviewMetaBoxes()
		{
			remove_meta_box('postexcerpt', 'ait-review', 'normal');
			remove_meta_box('commentstatusdiv', 'ait-review', 'normal');
			remove_meta_box('pll-tagsdiv-ait-reviews', 'ait-review', 'side');
			remove_meta_box('postimagediv', 'ait-review', 'side');
			remove_meta_box('mymetabox_revslider_0', 'ait-review', 'normal');
		}

		function removeItemMetaBoxes()
		{
			remove_meta_box('mymetabox_revslider_0', 'ait-item', 'normal');
			remove_meta_box('pageparentdiv', 'ait-item', 'side');
			remove_meta_box('commentstatusdiv', 'ait-item', 'normal');
			remove_meta_box('commentsdiv', 'ait-item', 'normal');
		}


		add_action('wp_head', 'addfavicon', 1);

		function addfavicon() {
			if ( !current_user_can('manage_options') && is_user_logged_in()) {
				//include('easy-admin/easy-admin-front.php');
				//wp_enqueue_style( 'frontEndScript', plugin_dir_url( __FILE__ ) . '../css/front-style.css' );
				remove_action('wp_head', '_admin_bar_bump_cb');
				show_admin_bar(false);
			}
		}


		function disablePersonalOptions() {
			?>
			<style type="text/css">
				.show-admin-bar {display: none !important;}
			</style>
			
			<?php
		}

		add_filter( 'login_redirect', 'redirectEasyAdminLgoin', 10, 3 );


		function avadaEasyAdminHeader() {
			echo '<div id="ait-easy-admin-branding-header" class="ait-easy-admin-branding-header">
					<style type="text/css">
						html.wp-toolbar { padding-top: 0 !important;}
						#wpadminbar {display: none !important;}
						#wpbody{margin: 0px auto 0px !important;}
					</style>';
			include('easy-admin/easy-admin-header.php');
			echo '</div>';
		}


		function avadaEasyAdminFooter() {
			echo '<div id="ait-easy-admin-branding-footer" class="ait-easy-admin-branding-footer">';
			include('easy-admin/easy-admin-footer.php');
			echo '</div>';
		}

		function easy_adminStyles() {
			wp_enqueue_style( 'easyAdminStyle', plugin_dir_url( __FILE__ ) . '../css/easy-admin.css' );
		}
/*
		if($easyAdminSettings['email_create']) {

			function postSaveSendMail( $post_id ) {
				if ( wp_is_post_revision( $post_id ) )
					return;

				$post_title = get_the_title( $post_id );
				$post_url = get_permalink( $post_id );
				$subject = $easyAdminSettings['email_subject'];

				$message = $easyAdminSettings['email_content']."\n\n";
				$message .= 'On' . $post_title . ": " . $post_url;

				wp_mail( $easyAdminSettings['email_field'], $subject, $message );
				echo 'email sent';
			}
			add_action( 'wp_insert_post', 'postSaveSendMail' );
		}*/
	}

    add_action( 'admin_init', 'my_plugin_admin_init' );

    function my_plugin_admin_init() {
        /* Register our script. */
        wp_register_style( 'my-plugin-script', plugin_dir_url( __FILE__ ) . '../css/jquery.colorpicker.css' );
    }

    function my_plugin_admin_scripts() {
        /* Link our already registered script to a page */
        wp_enqueue_style( 'my-plugin-script' );
    }

	function loadScript() {
			wp_enqueue_script( 'defaultScript', plugin_dir_url( __FILE__ ) . '../scripts/script.js' );
			wp_enqueue_script( 'colorPickerScript', plugin_dir_url( __FILE__ ) . '../scripts/jquery.colorpicker.js' );
			//wp_enqueue_style( 'colorPickerStyle', plugin_dir_url( __FILE__ ) . '../css/jquery.colorpicker.css' );
			wp_enqueue_script('thickbox');
        	wp_enqueue_style('thickbox');

        	wp_enqueue_script('media-upload');
        	wp_enqueue_script('wptuts-upload');
		}

	add_action( 'admin_enqueue_scripts', 'loadScript' );

	add_action( 'wp_ajax_deleteRole', 'deleteRole' );

	function deleteRole(){

		if(isset($_POST['role'])){
			echo $_POST['role'];
			remove_role( $_POST['role'] );
			echo true;
		} else {
			echo false;
		}

		die();

	}

	add_action( 'wp_ajax_addCustomRole', 'addCustomRole' );

	function addCustomRole(){

		$defaultCapability = array(
			'read' => true,
			'upload_files' => true
		);
		if(isset($_POST['role'])){
			$role = str_replace(" ","_",$_POST['role']);
			echo $role;
			add_role( $role, $_POST['role'], $defaultCapability );
		}
		die();

	}

?>