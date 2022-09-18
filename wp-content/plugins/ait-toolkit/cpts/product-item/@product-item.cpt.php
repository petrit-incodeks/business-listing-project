<?php

return array(
	'cpt' => array(
		'labels' => array(
			'name'               => _x('Products', 'post type general name', 'ait-toolkit'),
			'singular_name'      => _x('Product', 'post type singular name', 'ait-toolkit'),
			'menu_name'          => _x('Products', 'post type menu name', 'ait-toolkit'),
			'add_new'            => _x('Add New', 'Product', 'ait-toolkit'),
			'add_new_item'       => __('Add New Product', 'ait-toolkit'),
			'edit_item'          => __('Edit Product', 'ait-toolkit'),
			'new_item'           => __('New Product', 'ait-toolkit'),
			'view_item'          => __('View Product', 'ait-toolkit'),
			'search_items'       => __('Search Products', 'ait-toolkit'),
			'not_found'          => __('No Products found', 'ait-toolkit'),
			'not_found_in_trash' => __('No products found in Trash', 'ait-toolkit'),
			'all_items'          => __('All Products', 'ait-toolkit'),
		),

		'args' => array(
			'supports' => array(
				'title',
				'thumbnail',
				'page-attributes',
			),
			'capabilities' => array(
				'edit_post'              => 'ait_toolkit_product-item_edit_post',
				'read_post'              => 'ait_toolkit_product-item_read_post',
				'delete_post'            => 'ait_toolkit_product-item_delete_post',
				'edit_posts'             => 'ait_toolkit_product-item_edit_posts',
				'edit_others_posts'      => 'ait_toolkit_product-item_edit_others_posts',
				'publish_posts'          => 'ait_toolkit_product-item_publish_posts',
				'read_private_posts'     => 'ait_toolkit_product-item_read_private_posts',
				'read'                   => 'ait_toolkit_product-item_read_posts',
				'delete_posts'           => 'ait_toolkit_product-item_delete_posts',
				'delete_private_posts'   => 'ait_toolkit_product-item_delete_private_posts',
				'delete_published_posts' => 'ait_toolkit_product-item_delete_published_posts',
				'delete_others_posts'    => 'ait_toolkit_product-item_delete_others_posts',
				'edit_private_posts'     => 'ait_toolkit_product-item_edit_private_posts',
				'edit_published_posts'   => 'ait_toolkit_product-item_edit_published_posts',
			),
		),
	),

	'taxonomies' => array(
		'products' => array(
			'labels' => array(
				'name'              => _x('Product Categories', 'taxonomy general name', 'ait-toolkit'),
				'menu_name'         => _x('Categories', 'taxonomy menu name', 'ait-toolkit'),
				'singular_name'     => _x('Category', 'taxonomy singular name', 'ait-toolkit'),
				'search_items'      => __('Search Categories', 'ait-toolkit'),
				'all_items'         => __('All Categories', 'ait-toolkit'),
				'parent_item'       => __('Parent Category', 'ait-toolkit'),
				'parent_item_colon' => __('Parent Cateogry:', 'ait-toolkit'),
				'edit_item'         => __('Edit Category', 'ait-toolkit'),
				'view_item'         => __('View Category', 'ait-toolkit'),
				'update_item'       => __('Update Category', 'ait-toolkit'),
				'add_new_item'      => __('Add New Category', 'ait-toolkit'),
				'new_item_name'     => __('New Category Name', 'ait-toolkit'),
			),
			'args' => array(
				'capabilities' => array(
					'manage_terms' => 'ait_toolkit_product-item_category_manage_terms',
					'edit_terms'   => 'ait_toolkit_product-item_category_edit_terms',
					'delete_terms' => 'ait_toolkit_product-item_category_delete_terms',
					'assign_terms' => 'ait_toolkit_product-item_category_assign_terms',
				),
			),
		),
	),

	'metaboxes' => array(
		'product-item-options' => array(
			'title'  => _x('Product Options', 'custom metabox title', 'ait-toolkit'),
			'config' => 'product-item-options',
		),
	),

	'featuredImageMetabox' => array(
		'labels' => array(
			'title'           => _x('Product Image', 'featured image metabox', 'ait-toolkit'),
			'linkSetTitle'    => _x('Set Product Image', 'featured image metabox', 'ait-toolkit'),
			'linkRemoveTitle' => _x('Remove Product Image', 'featured image metabox', 'ait-toolkit'),
		),
		'context' => 'normal',
		'priority' => 'default',
	),
);
