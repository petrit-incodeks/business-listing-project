<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

function easyAdminSettingsPage(){

	if(isset($_POST['saveOptions'])){
		$settings = customOption();
		$keys = array_keys($settings);
		foreach($keys as $key){
			if($settings[$key]['type'] == 'checkbox'){
				if(isset($_POST[$key])){
					$option[$key] = true;
				} else {
					$option[$key] = false;
				}
				
			} else {
				if(isset($_POST[$key])){
					$option[$key] = $_POST[$key];
				}
			}
		}
		update_option('ait_easy_admin_settings', $option);
	}
		
	$html = '';
	$html .= '<form action="'. admin_url( 'admin.php?page=easyAdminSettings' ) .'" method="post">';
	$html .= '<input type="hidden" name="saveOptions" value="save">';
	$html .= '<div class="inside-options_box">';
	$html .= '<h1>'. __( "Easy admin options", 'ait-easyadmin') . '</h1>';
	
	$easyAdminSettings = get_option('ait_easy_admin_settings','no options');
	// Easy Admin base settings
	$html .= '<div class="import-settings metabox-holder">
							<div class="import-options postbox">
								<div class="handlediv" title="Click to toggle"><br></div>
								<h3 class="hndle"><span>'. __( "Easy Admin settings", 'ait-easyadmin') . '</span></h3>
								<div class="inside">';
	
		$html .= '<table>';
		
	$customOptions = customOption();
	$keys = array_keys($customOptions);
	foreach($keys as $key){
		$html .= '<tr><td>';
		$checked = '';
		$value = '';
		switch($customOptions[$key]['type']){
			case 'checkbox':	if($easyAdminSettings[$key]){
									$checked = 'checked';
								}
								break;
			case 'text':		if(isset($easyAdminSettings[$key])){
									$value = $easyAdminSettings[$key];
								}
								break;
		}	
		$html .= $customOptions[$key]['label'].'</td><td><input type="'.$customOptions[$key]['type'].'" id="'.$key.'" name="'.$key.'" '.$checked.' value="'.$value.'"/>'; if($customOptions[$key]['type'] == 'text') $html .='<a class="load-logo button-primary" id="upload_logo">'. __( "Add logo", 'ait-easyadmin') .'</a>'; $html .= '</td>';
		$html .= '</tr>';
	}
	$html .= '</table>';
	$html .= '</div></div></div>';
	
	$html .= '</form>';
	$html .= '<div class="btn" ><button type="submit" class="button-primary ait-save-options">'. __( "Save settings", 'ait-easyadmin') .'</button></div></div>';
	
	echo $html;
}


?>