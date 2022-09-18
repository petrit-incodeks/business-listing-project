<?php //netteCache[01]000593a:2:{s:4:"time";s:21:"0.58564500 1663238108";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:104:"/home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/price-table/price-table.latte";i:2;i:1662654480;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:6:"3.1.10";}}}?><?php

// source file: /home/www/npik.online/wp-content/themes/businessfinder2/ait-theme/elements/price-table/price-table.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'afezi1tt80')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['afezi1tt80'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>
 layout-<?php echo NTemplateHelpers::escapeHtml($el->option('layout'), ENT_COMPAT) ?>">

<?php $query = WpLatteMacros::prepareCustomWpQuery(array('type' => 'price-table',
		'tax' => 'tables',
		'cat' => $el->option('category'),
		'limit' => -1,
		'orderby' => $el->option('orderby'),
		'order' => $el->option('order'),)) ?>

<?php if ($query->havePosts) { ?>
		<div class="ptable-container">
			<div class="ptable-wrap">
<?php $maxRows = 0 ;foreach ($iterator = new WpLatteLoopIterator($query) as $table): $meta = $table->meta('table-data') ;if ($maxRows < count($meta->rows)) { $maxRows = count($meta->rows) ;} endforeach; wp_reset_postdata() ?>

<?php foreach ($iterator = new WpLatteLoopIterator($query) as $table): $meta = $table->meta('table-data') ;if ($meta->rows == "") { $meta->rows = array() ;} $aRow = $maxRows - count($meta->rows) ?>
				<div class="ptable-item<?php if ($meta->featured) { ?> table-featured<?php } ?>">
					<div class="ptable-item-wrap">
						<div class="table-header">
						<?php if ($meta->title != "") { ?><h3><span class="ptab-title"><?php echo $meta->title ?>
</span></h3><?php } ?>

						<?php if ($meta->description != "") { ?><div class="table-description"><?php echo $meta->description ?>
</div><?php } ?>

						<?php if ($meta->price != "") { ?><div class="table-price"><?php echo $meta->price ?>
</div><?php } ?>

						<?php if ($meta->subtitle !== "") { ?><div class="table-subtitle"><?php echo $meta->subtitle ?>
</div><?php } ?>

						</div>
						<div class="table-body">
<?php $iterations = 0; foreach ($meta->rows as $row) { ?>
							<div class="table-row"><?php if ($row['description'] != "") { echo $row['description'] ;} else { ?>
&nbsp;<?php } ?></div>
<?php $iterations++; } for ($i = 0; $i < $aRow; $i++) { ?>
							<div class="table-row empty-row">&nbsp;</div>
<?php } ?>
						</div>
						<div class="table-footer">
						<?php if (!empty($meta->buttonText) && !empty($meta->buttonLink)) { ?><div class="table-button"><div class="table-button-wrap"><a href="<?php echo NTemplateHelpers::escapeHtml($meta->buttonLink, ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($meta->buttonText, ENT_NOQUOTES) ?></a></div></div><?php } ?>

						</div>
					</div>
				</div>
<?php endforeach; wp_reset_postdata() ?>

			</div>
		</div>
<?php } else { ?>
		<div class="ptable-container">
			<div class="alert alert-info">
				<?php echo NTemplateHelpers::escapeHtml(_x('Price tables', 'name of element', 'wplatte'), ENT_NOQUOTES) ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml(__('Info: There are no items created, add some please.', 'wplatte'), ENT_NOQUOTES) ?>

			</div>
		</div>
<?php } ?>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/price-table/javascript", ""), array() + get_defined_vars(), $_l->templates['afezi1tt80'])->render() ?>

