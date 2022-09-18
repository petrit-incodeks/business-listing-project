<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

function easyAdminAppearance(){

	if(isset($_POST['saveOptions'])){
		$option = array();
		$lessColors = array();
	
		$easyAdminSettings = get_option('ait_easy_admin_appearance');
		
		$colors = easyAdminColors();
		$colorkeys = array_keys($colors);
		foreach($colorkeys as $colKey){
			if(isset($_POST[$colKey])){
				$lessColors[$colKey] = $_POST[$colKey];
				$option[$colKey] = $_POST[$colKey];
			} else {
			}
		}
		
		$params = easyAdminParameters();
		$paramKeys = array_keys($params);
		foreach($paramKeys as $paramKey){
			if(isset($_POST[$paramKey])){
				$lessColors[$paramKey] = $_POST[$paramKey].'px';
				$option[$paramKey] = $_POST[$paramKey];
			} else {
			}
		}
		
		$update = update_option('ait_easy_admin_appearance', $option);
		
		if($update){
			
			require(EASY_ADMIN_PLUGIN_URL.'libs/lessc.inc.php');
			$less = new lessc;
				$less->setVariables($lessColors);
				
			$css = '';
			$less->compileFile(EASY_ADMIN_PLUGIN_URL.'css/style.less', EASY_ADMIN_PLUGIN_URL.'css/style.css');
			
		} else {
			echo 'not updated';
		}
		
		
	}
	
	createAppearancePage();
	
}

function createAppearancePage(){

	$html = '';
	$html .= '<form action="'. admin_url( 'admin.php?page=easyAdminAppearance' ) .'" method="post">';
	$html .= '<input type="hidden" name="saveOptions" value="save">';
	$html .= '<div class="inside-options_box">';
	$html .= '<h1>'. __( "Easy admin appearance", 'ait-easyadmin') . '</h1>';
	
	$easyAdminSettings = get_option('ait_easy_admin_appearance','no options');

	//Easy Admin Color settings
	$colors = easyAdminColors();
	$html .= '<div class="import-settings metabox-holder">
				<div class="import-options postbox">
					<div class="handlediv" title="Click to toggle"><br></div>
					<h3 class="hndle"><span>'. __( "Easy Admin Color", 'ait-easyadmin') . '</span></h3>
						<div class="inside">
							<table>';
	
	foreach($colors as $color => $value){
		if(isset($easyAdminSettings[$color])){
			$colorValue = $easyAdminSettings[$color];
		} else {
			$colorValue = '#';
		}
		$html .= '<tr><td>';
		$html .= '<label>'.$value.'</label></td>';
		$html .= '<td><div id="colorPickerField_'.$color.'" class="colorPickerFieldDiv"><input type="text" name="'.$color.'" id="colorPickerField_'.$color.'" class="colorPickerField" value="'.$colorValue.'"></div>';
		$html .= '</td></tr>';
	}
		
	$html .= '				</table>
						</div>
				</div>
			</div>';
			
	//Easy Admin Parameters settings
	$html .= '<div class="import-settings metabox-holder">
							<div class="import-options postbox">
								<div class="handlediv" title="Click to toggle"><br></div>
								<h3 class="hndle"><span>'. __( "Easy Admin settings", 'ait-easyadmin') . '</span></h3>
								<div class="inside">';
	
		$html .= '<table>';
		
	$parameters = easyAdminParameters();
	
	foreach($parameters as $custOpt => $value){
		$html .= '<tr><td>';
		if($easyAdminSettings != 'no options' && ($easyAdminSettings[$custOpt] == true)){
			$paramValue = $easyAdminSettings[$custOpt];
		} else {
			$paramValue = '';
		}
		$html .= '<label>'.$value.'</label></td>';
		$html .= '<td><input type="text" pattern="[0-9]*" name="'.$custOpt.'" value="'.$paramValue.'"/>px</td><td>';
		$html .= '</td></tr>';
	}
	$html .= '</table>';
	$html .= '</div></div></div>';
	
	$html .= '</form>';
	$html .= '<div class="btn" ><button type="submit" class="button-primary ait-save-options">'. __( "Save settings", 'ait-easyadmin') .'</button></div></div>';
	
	echo $html;

}

?>