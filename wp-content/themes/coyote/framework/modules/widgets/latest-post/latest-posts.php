<?php

class CoyoteEdgeLatestPosts extends CoyoteEdgeWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'edgtf_latest_posts_widget', // Base ID
			esc_html__('Edge Latest Post','coyote'), // Name
			array( 'description' => esc_html__( 'Display posts from your blog', 'coyote' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => esc_html__('Number of posts', 'coyote'),
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => esc_html__('Order By', 'coyote'),
				'options' => array(
					'title' => esc_html__('Title', 'coyote'),
					'date' => esc_html__('Date', 'coyote'),
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => 'Order',
				'options' => array(
					'ASC' => esc_html__('ASC', 'coyote'),
					'DESC' => esc_html__('DESC', 'coyote'),
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => esc_html__('Category Slug', 'coyote'),
			),
			array(
				'name' => 'text_length',
				'type' => 'textfield',
				'title' => esc_html__('Number of characters', 'coyote'),
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => esc_html__('Title Tag','coyote'),
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'minimal';
		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'h6';
		}
		echo '<div class="widget edgtf-latest-posts-widget">';
		
		echo coyote_edge_execute_shortcode('edgtf_blog_list', $params);

		echo '</div>'; //close edgtf-latest-posts-widget
	}
}
