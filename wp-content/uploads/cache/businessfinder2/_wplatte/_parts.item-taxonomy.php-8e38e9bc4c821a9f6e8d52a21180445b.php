<?php //netteCache[01]000574a:2:{s:4:"time";s:21:"0.19600200 1663238107";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:86:"/home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/item-taxonomy.php";i:2;i:1662654481;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/portal/parts/item-taxonomy.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'inyv6mbkmk')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$terms = get_the_terms($itemID, $taxonomy) ;$categoryDefaultIcon = $options->theme->items->categoryDefaultIcon ;$counter = 0 ?>

<?php if (!empty($onlyFeaturedCat)) { ?>

<?php $categories = $terms ?>
	
<?php $categories = aitOrderTermsByHierarchy($categories) ;$categories = aitFilterTerms($categories, $count) ;$terms = $categories ?>

<?php } ?>


<?php if ($terms) { $listedParents = array() ;if (isset($wrapper)) { ?>
		<div class="item-taxonomy-icon-wrap">
<?php } ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($terms) as $category) { $icons = get_option($category->taxonomy . "_category_" . $category->term_id) ?>

<?php if (isset($onlyParent)) { ?>

<?php $categoryParent = $category->parent ?>

<?php if (!in_array($categoryParent, $listedParents)) { if ($categoryParent != 0) { $icons = get_option($category->taxonomy . "_category_" . $categoryParent) ;$category = get_term($categoryParent, $category->taxonomy) ;} ?>

<?php if (!in_array($category->term_id, $listedParents)) { ?>

<?php if (isset($icons['icon']) && $icons['icon'] != "") { ob_start() ?>
							<?php echo NTemplateHelpers::escapeHtml($icons['icon'], ENT_NOQUOTES) ?>

<?php $categoryIcon = ob_get_clean() ;} else { ob_start() ;if ($category->taxonomy == $taxonomy) { ?>
							<?php echo NTemplateHelpers::escapeHtml($categoryDefaultIcon, ENT_NOQUOTES) ?>

<?php } else { ?>
							<?php echo NTemplateHelpers::escapeHtml($options->theme->items->locationDefaultIcon, ENT_NOQUOTES) ?>

<?php } $categoryIcon = ob_get_clean() ;} ?>

<?php $iconColor = !empty($icons['icon_color']) ? $icons['icon_color'] : "" ;$style = "" ;if (!empty($iconColor)) { $style = 'style="background: '.$iconColor.';"' ;} ?>


						<a href="<?php echo NTemplateHelpers::escapeHtml(get_term_link($category->term_id, $category->taxonomy), ENT_COMPAT) ?>
" class="taxonomy-icon"  <?php echo $style ?>>
<?php if (isset($categoryIcon)) { ?>
								<img src="<?php echo NTemplateHelpers::escapeHtml($categoryIcon, ENT_COMPAT) ?>
" alt="<?php echo $category->name ?>" />
<?php } ?>
							<div class="taxonomy-wrap">
								<div class="taxonomy-name"><?php echo $category->name ?></div>
							</div>
						</a>


<?php $listedParents[] = $category->term_id ?>

<?php $counter++ ?>

<?php } ?>

<?php if (isset($count) and ($count === $counter)) { break ;} } ?>

<?php } elseif (isset($onlyChild)) { ?>

<?php if ($category->parent != 0) { $counter = $iterator->counter ?>

<?php if (isset($icons['icon']) && $icons['icon'] != "") { ob_start() ?>
						<?php echo NTemplateHelpers::escapeHtml($icons['icon'], ENT_NOQUOTES) ?>

<?php $categoryIcon = ob_get_clean() ;} else { global $wp_query ;$categoryParent = get_term($category->parent, $category->taxonomy) ;$icons = get_option($categoryParent->taxonomy . "_category_" . $categoryParent->term_id) ;if (isset($icons['icon']) && $icons['icon'] != "") { ob_start() ?>
							<?php echo NTemplateHelpers::escapeHtml($icons['icon'], ENT_NOQUOTES) ?>

<?php $categoryIcon = ob_get_clean() ;} else { ob_start() ;if ($categoryParent->taxonomy == $taxonomy) { ?>
							<?php echo NTemplateHelpers::escapeHtml($categoryDefaultIcon, ENT_NOQUOTES) ?>

<?php } else { ?>
							<?php echo NTemplateHelpers::escapeHtml($options->theme->items->locationDefaultIcon, ENT_NOQUOTES) ?>

<?php } $categoryIcon = ob_get_clean() ;} } ?>

<?php $iconColor = !empty($icons['icon_color']) ? $icons['icon_color'] : "" ;$style = "" ;if (!empty($iconColor)) { $style = 'style="background: '.$iconColor.';"' ;} ?>

				<li class="has-title has-icon">
					<a href="<?php echo NTemplateHelpers::escapeHtml(get_term_link($category->term_id, $category->taxonomy), ENT_COMPAT) ?>
" <?php echo $style ?>>
<?php if (isset($categoryIcon)) { ?>
							<img src="<?php echo NTemplateHelpers::escapeHtml($categoryIcon, ENT_COMPAT) ?>
" alt="<?php echo $category->name ?>" />
<?php } ?>
						<span><?php echo $category->name ?></span>
					</a>
				</li>

<?php if (isset($count) and ($count === $counter)) { break ;} } ?>

<?php } else { ?>

<?php $counter = $iterator->counter ?>

<?php if (isset($icons['icon']) && $icons['icon'] != "") { ob_start() ?>
					<?php echo NTemplateHelpers::escapeHtml($icons['icon'], ENT_NOQUOTES) ?>

<?php $categoryIcon = ob_get_clean() ;} else { if ($category->parent != 0) { global $wp_query ;$category = get_term($category->parent, $category->taxonomy) ;$icons = get_option($category->taxonomy . "_category_" . $category->term_id) ;if (isset($icons['icon']) && $icons['icon'] != "") { ob_start() ?>
							<?php echo NTemplateHelpers::escapeHtml($icons['icon'], ENT_NOQUOTES) ?>

<?php $categoryIcon = ob_get_clean() ;} else { ob_start() ;if ($category->taxonomy == $taxonomy) { ?>
							<?php echo NTemplateHelpers::escapeHtml($categoryDefaultIcon, ENT_NOQUOTES) ?>

<?php } else { ?>
							<?php echo NTemplateHelpers::escapeHtml($options->theme->items->locationDefaultIcon, ENT_NOQUOTES) ?>

<?php } $categoryIcon = ob_get_clean() ;} } else { ob_start() ;if ($category->taxonomy == $taxonomy) { ?>
						<?php echo NTemplateHelpers::escapeHtml($categoryDefaultIcon, ENT_NOQUOTES) ?>

<?php } else { ?>
						<?php echo NTemplateHelpers::escapeHtml($options->theme->items->locationDefaultIcon, ENT_NOQUOTES) ?>

<?php } $categoryIcon = ob_get_clean() ;} } ?>

<?php $iconColor = !empty($icons['icon_color']) ? $icons['icon_color'] : "" ;$style = "" ;if (!empty($iconColor)) { $style = 'style="background: '.$iconColor.';"' ;} ?>

			<a href="<?php echo NTemplateHelpers::escapeHtml(get_term_link($category->term_id, $category->taxonomy), ENT_COMPAT) ?>
" class="taxonomy-icon"  <?php echo $style ?>>
<?php if (isset($categoryIcon)) { ?>
				<img src="<?php echo NTemplateHelpers::escapeHtml($categoryIcon, ENT_COMPAT) ?>
" alt="<?php echo $category->name ?>" />
<?php } ?>
				<div class="taxonomy-wrap">
					<div class="taxonomy-name"><?php echo $category->name ?></div>
				</div>
			</a>

<?php if (isset($count) and ($count === $counter)) { break ;} ?>

<?php } ?>

<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ;if (isset($wrapper)) { ?>
	</div>
<?php } } 