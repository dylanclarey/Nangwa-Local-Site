<?php

if(!function_exists('coyote_edge_map_blog_meta_fields')) {

	function coyote_edge_map_blog_meta_fields() {

		$edgt_blog_categories = array();
		$categories = get_categories();
		foreach($categories as $category) {
		    $edgt_blog_categories[$category->term_id] = $category->name;
		}

		$blog_meta_box = coyote_edge_add_meta_box(
		    array(
		        'scope' => array('page'),
		        'title' => esc_html__('Blog', 'coyote'),
		        'name' => 'blog_meta'
		    )
		);

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        =>'edgtf_blog_category_meta',
	            'type'        => 'selectblank',
	            'label'       => esc_html__('Blog Category', 'coyote'),
	            'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'coyote'),
	            'parent'      => $blog_meta_box,
	            'options'     => $edgt_blog_categories
	        )
	    );

	    coyote_edge_add_meta_box_field(
	        array(
	            'name'        => 'edgtf_show_posts_per_page_meta',
	            'type'        => 'text',
	            'label'       => esc_html__('Number of Posts', 'coyote'),
	            'description' => esc_html__('Enter the number of posts to display', 'coyote'),
	            'parent'      => $blog_meta_box,
	            'options'     => $edgt_blog_categories,
	            'args'        => array("col_width" => 3)
	        )
	    );
	}
	
	add_action('coyote_edge_meta_boxes_map', 'coyote_edge_map_blog_meta_fields');
}

