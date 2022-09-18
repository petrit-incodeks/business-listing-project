<?php

$html = '';
$logo = get_option('ait_easy_admin_settings');
$html .= '<div id="avada-easy-admin-branding-header" class="avada-easy-admin-branding-header">
			<div class="LogoWithNawButtonsWrap">
				<div class="LogoWithNawButtons">
					<img class="easyAdminLogoImage" src="'.$logo['easyAdminLogo'].'"/>
					<ul class="mainNawButtons" id="menu">
						<li><a href="'.get_site_url().'" class="button-primary viewsite" >'. __("View Site") .'</a></li>
						<li><a href="'.admin_url("profile.php").'" class="button-primary profile" >'. __("Profile") . '</a></li>
						<li><a href="'. wp_logout_url( get_permalink() ).'" class="button-primary logout">' . __("Log Out") .'</a></li>
					</ul>
				</div>
			</div>';
$html .= '	<div id="easyAdmin_SubNawButtons_Holder" class="easyAdmin_menu_holder">
				<ul class="subNawButtons" id="menu">';

$args = array(
   //'public'   => false,
   '_builtin' => false
);


$postTypes = get_post_types($args , 'objects');

$aitPostTypes = array();

// get only ait- cpts
foreach($postTypes as $postType){
	if (substr( $postType->name, 0, 4 ) === "ait-") {
		array_push($aitPostTypes, $postType->name);
	}
}


// $allowed = array('ait-ad-space' , 'ait-event' , 'ait-faq' , 'ait-job-offer' , 'ait-member' , 'ait-partner' , 'ait-portfolio-item' , 'ait-price-table' ,
// 	'ait-product-item', 'ait-service-box' , 'ait-testimonial' , 'ait-toggle', 'ait-match', 'ait-tour');

// hotfix for blogtheme - default Author role shouldn't see any cpt
$aitAllowed = apply_filters( 'ait-easyadmin-allowed-cpts', $aitPostTypes );

foreach($postTypes as $postType){
	if($postType->name == 'ait-item'){
		if(current_user_can( 'ait_toolkit_items_edit_items' )){
			$html .= '	<li><a href="'.admin_url("edit.php?post_type=".$postType->name).'" class="button-primary" >'.$postType->label.'</a></li>';
		}
	} elseif($postType->name == 'ait-event-pro'){
		if(current_user_can( 'ait_toolkit_eventspro_edit_events' )){
			$html .= '	<li><a href="'.admin_url("edit.php?post_type=".$postType->name).'" class="button-primary" >'.$postType->label.'</a></li>';
		}
	} elseif($postType->name == 'ait-review'){
		if(current_user_can( 'ait_item_reviews_edit_posts' )){
			$html .= '	<li><a href="'.admin_url("edit.php?post_type=".$postType->name).'" class="button-primary" >'.$postType->label.'</a></li>';
		}

	} else if(in_array($postType->name , $aitAllowed)){
		if(current_user_can( 'edit_posts' )){
			$html .= '	<li><a href="'.admin_url("edit.php?post_type=".$postType->name).'" class="button-primary" >'.$postType->label.'</a></li>';
		}
	// add other than AIT cpts
	} else if(!in_array($postType->name , $aitPostTypes)){
		if(current_user_can( 'edit_posts' )){
			$html .= '	<li><a href="'.admin_url("edit.php?post_type=".$postType->name).'" class="button-primary" >'.$postType->label.'</a></li>';
		}
	}

}

if(current_user_can( 'edit_pages' )){
	$html .= '		<li><a href="'.admin_url("edit.php?post_type=page").'" class="button-primary" >'. __('Pages') .'</a></li>';
}
if(current_user_can( 'edit_posts' )){
	$html .= '		<li><a href="'.admin_url("edit.php?post_type=post").'" class="button-primary">'. __('Posts') .'</a></li>';
}
if(current_user_can( 'moderate_comments' )){
	$html .= '		<li><a href="'.admin_url("edit-comments.php").'" class="button-primary">'. __('Comments') .'</a></li>';
}
if(current_user_can( 'upload_files' )){
	$html .= '		<li><a href="'.admin_url("upload.php").'" class="button-primary">'. __('Media') .'</a></li>';
}



$html .= '		</ul>
			</div>
		</div>';

echo $html;

?>