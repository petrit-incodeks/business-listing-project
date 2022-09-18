<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

function easyAdminRoleSettings(){

	if(isset($_GET['tab'])) {
		$user = $_GET['tab'];
	} if(isset($_POST['tab'])) {
		$user = $_POST['tab'];
	}if(isset($_REQUEST['tab'])) {
		$user = $_REQUEST['tab'];
	} else {
		$user = 'editor';
	}

	if(isset($_POST['saveOptions'])){
		$role = get_role( $user );
		$capabilities = defaultCapabilities();
		//var_dump($capabilities);
		$keys = array_keys($capabilities);
		foreach($keys as $key){
			foreach($capabilities[$key] as $value => $name){
				if(isset($_POST[$value])){
					$role->add_cap($value);
				}else {
					$role->remove_cap($value);
				}
			}
		}
	}
	createUserTabs($user);
	createOptions($user);
	formEnd();
}

function createUserTabs($user){

	$editableRoles = get_editable_roles();
	$roleKeys = array_keys($editableRoles);
	foreach($roleKeys as $rKeys){
		if($rKeys != 'administrator'){
			$tabs[$rKeys] = ucfirst($rKeys);
		}
	}

	$html .= '<form action="'. admin_url( 'admin.php?page=easyAdminRoles&tab='.$user ) .'" method="post">';
	$html .= '<input type="hidden" name="saveOptions" value="save">';
	$html .= '<div class="inside-options_box">';
	$html .= '<h1>Roles and capabilities</h1>';
	$html .= '<h2 class="nav-tab-wrapper">';

	//displaying tabs
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $user ) ? ' nav-tab-active' : '';
        $html .= "<a class='nav-tab$class' href='?page=easyAdminRoles&tab=$tab'>$name</a>";
    }
    $html .= '</h2>';
	echo $html;
	//return $user;
}

function createOptions($user){

	$roles = get_role( $user );
	$capabilities = defaultCapabilities();
	$keys = array_keys($capabilities);
	$postType = '';

	//var_dump($capabilities);

	foreach($keys as $key){
		$postType = $capabilities[$key]->name;
		$html .= '<div class="import-settings metabox-holder">
							<div class="import-options postbox">
								<div class="handlediv" title="Click to toggle"><br></div>
								<h3 class="hndle"><span>'.$key.'</span></h3>
								<div class="inside">
								<a class="checkAll button-primary" id="role_cap_' . str_replace(" ","_",$key) . '" >Check all</a>
								<a class="unCheckAll button-primary" id="role_cap_' . str_replace(" ","_",$key) . '" >Uncheck all</a>';

		$html .= '<table>';
		foreach($capabilities[$key] as $value => $name){
			$html .= '<tr><td>';
			if(isset($roles->capabilities[$value])){
				$checked = 'checked';
			} else {
				$checked = '';
			}
			$html .= '<input type="checkbox" class="role_cap_' . str_replace(" ","_",$key) . '" name="'.$value.'" '.$checked.'></td><td>'.$name;
			$html .= '</td></tr>';
		}
		$html .= '</table>';

		$html .= '</div></div></div>';
	}

	echo $html;

}

function formEnd(){
	$html .= '</form>';
	$html .= '<div class="btn" ><button type="submit" class="button-primary ait-save-options">Save settings</button></div></div>';
	echo $html;
}
?>