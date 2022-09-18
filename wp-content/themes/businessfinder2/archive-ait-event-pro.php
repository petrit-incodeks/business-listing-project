{block content}
{? global $wp_query}

	{* template for page title is in parts/page-title.php *}

	{if $wp->havePosts}

		<div class="ajax-container">
			<div class="events-container elm-item-organizer">
				<div class="elm-item-organizer-container carousel-disabled layout-list column-1">
					<div class="content">

						{loop as $post}
							{includePart portal/parts/event-container}
						{/loop}

						{includePart parts/pagination, location => pagination-below, max => $wp_query->max_num_pages}

					</div>
					<div class="loading hidden" style="display: none;"><span class="ait-preloader">{!__ 'Loading&hellip;'}</span></div>
				</div>
			</div>
		</div>

	{else}
		{includePart parts/none, message => no-posts}
	{/if}
