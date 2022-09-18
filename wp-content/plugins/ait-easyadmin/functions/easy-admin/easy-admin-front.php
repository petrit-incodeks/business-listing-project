<?php
$html = '';

$html .= '<div id="avada-easy-admin-branding-header" class="avada-easy-admin-branding-header">';
$html .= '<div id="easyAdmin_menu_holder" class="easyAdmin_menu_holder">
			<ul class="easyAdminHeader" id="menu">';
$html .= '<li><a href="'. wp_logout_url( get_permalink() ).'" class="button-primary" title="Logout">'. __('Log Out') .'</a></li>';
$html .= '<li><a href="'.admin_url("profile.php").'" class="button-primary" >'. __('Profile') .'</a></li>';


$args = array(
   'public'   => true,
   '_builtin' => false
);


$postTypes = get_post_types($args , 'objects');

//var_dump($postTypes);

foreach($postTypes as $postType){
	if(current_user_can( 'edit_'.$postType->name )){
		$html .= '<li><a href="'.admin_url("edit.php?post_type=".$postType->name).'" class="button-primary" >'.$postType->label.'</a></li>';
	}
}

if(current_user_can( 'edit_pages' )){
	$html .= '<li><a href="'.admin_url("edit.php?post_type=page").'" class="button-primary" >'. __('Pages') .'</a></li>';
}
if(current_user_can( 'edit_posts' )){
	$html .= '<li><a href="'.admin_url("edit.php?post_type=post").'" class="button-primary">'. __('Posts') .'</a></li>';
}
if(current_user_can( 'moderate_comments' )){
	$html .= '<li><a href="'.admin_url("edit-comments.php").'" class="button-primary">'. __('Comments') .'</a></li>';
}
if(current_user_can( 'upload_files' )){
	$html .= '<li><a href="'.admin_url("upload.php").'" class="button-primary">'. __('Media') .'</a></li>';
}
$html .= '</ul></div></div>';

echo $html;

?>