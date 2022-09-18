<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

function easyAdminRoleManager(){

	$html = '';
	
	$html .= '<form action="'. admin_url( 'admin.php?page=easyAdminRoleManager') .'" method="post">';
	$html .= '<input type="hidden" name="saveOptions" value="save">';
	$html .= '<div class="inside-options_box">';
	$html .= '<h1>Roles and capabilities</h1>';
	
	$html .= '<div class="roles metabox-holder">
							<div class="import-options postbox">
								<div class="handlediv" title="Click to toggle"><br></div>
								<h3 class="hndle"><span>Role manager</span></h3>
								<div class="inside">';

	$editableRoles = get_editable_roles();
	$keys = array_keys($editableRoles);
	
	$html .= '<table>';
	
	foreach($keys as $key){
		$html .= '<tr><td>';
		$html .= $key.' </td><td> '.$editableRoles[$key]['name'];
		$html .= '</td><td><a id="'. $key .'_delete_button" name="'. $key .'" class="button-primary delete_role">Delete</a>';
		$html .= '</td></tr>';
	}
	
	$html .= '</table>';
	
	$html .= '</div></div></div>';
	
	$html .= '<div class="newRole metabox-holder">
							<div class="import-options postbox">
								<div class="handlediv" title="Click to toggle"><br></div>
								<h3 class="hndle"><span>Add new role</span></h3>
								<div class="inside">';
	$html .= '<table>';
	$html .= '<tr><td><label>Role name</label></td><td><input type="text" id="newRole" name="new_role"></td>';
	$html .= '<td><a id="add_new_role" class="button-primary add_role">Add</a></td>';
	$html .= '</table>';
	$html .= '</div></div></div>';							
	
	$html .= '</form>';
	$html .= '<div class="btn" ><button type="submit" class="button-primary ait-save-options">Save settings</button></div></div>';
	
	echo $html;
}

?>