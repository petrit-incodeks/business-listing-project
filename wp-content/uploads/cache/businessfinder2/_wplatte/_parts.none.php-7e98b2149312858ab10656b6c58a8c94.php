<?php //netteCache[01]000558a:2:{s:4:"time";s:21:"0.23845800 1663243092";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:70:"/home/www/npik.online/wp-content/themes/businessfinder2/parts/none.php";i:2;i:1663151124;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/parts/none.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'lptunlq8do')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title">
<?php if ($wp->canCurrentUser('edit_posts') and $message == 'empty-site') { ?>
				<?php echo NTemplateHelpers::escapeHtml(__('No posts to display', 'wplatte'), ENT_NOQUOTES) ?>

<?php } else { ?>
				<?php echo NTemplateHelpers::escapeHtml(__('Nothing Found', 'wplatte'), ENT_NOQUOTES) ?>

<?php } ?>
			</h1>
		</header>

		<div class="entry-content">
			<p>
<?php if ($wp->canCurrentUser('edit_posts') and $message == 'empty-site') { ?>

				<?php echo $template->printf(__('Ready to publish your first post? <a href="%s">Get started here</a>.', 'wplatte'), $wp->adminUrl('post-new.php')) ?>


<?php } elseif ($message == 'nothing-found') { ?>

				<?php echo NTemplateHelpers::escapeHtml(__('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'wplatte'), ENT_NOQUOTES) ?>


<?php } elseif ($message == 'no-posts' or (!$wp->canCurrentUser('edit_posts') and $message == 'empty-site')) { ?>

				<?php echo NTemplateHelpers::escapeHtml(__('Apologies, but no results were found. Perhaps searching will help find a related post.', 'wplatte'), ENT_NOQUOTES) ?>


<?php } ?>
			</p>

<?php if ($wp->isSearch && !empty($_REQUEST['a']) == false) { get_search_form() ;} ?>

		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
