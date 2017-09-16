<?php

namespace CoyoteEdge\Modules\Shortcodes\BlogList;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Blog List', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Type', 'coyote'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Simple', 'coyote') => 'simple',
							esc_html__('Boxes', 'coyote') => 'boxes',
							esc_html__('Minimal', 'coyote') => 'minimal',
							esc_html__('Image in box', 'coyote') => 'image_in_box'
						),
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number of Posts', 'coyote'),
						'param_name' => 'number_of_posts'
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Show Posts with Listed IDs','coyote'),
						'param_name' => 'selected_posts',
						'value' => '',
						'admin_label' => true,
						'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)','coyote')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Number of Columns', 'coyote'),
						'param_name' => 'number_of_columns',
						'value' => array(
							esc_html__('One', 'coyote')=> '1',
							esc_html__('Two', 'coyote') => '2',
							esc_html__('Three', 'coyote') => '3',
							esc_html__('Four', 'coyote') => '4'
						),
						'dependency' => Array('element' => 'type', 'value' => array('boxes','simple')),
                        'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order By', 'coyote'),
						'param_name' => 'order_by',
						'value' => array(
							esc_html__('Title', 'coyote') => 'title',
							esc_html__('Date', 'coyote') => 'date'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order', 'coyote'),
						'param_name' => 'order',
						'value' => array(
							esc_html__('ASC', 'coyote') => 'ASC',
							esc_html__('DESC', 'coyote') => 'DESC'
						),
						'save_always' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category Slug', 'coyote'),
						'param_name' => 'category',
						'admin_label' => true,
						'description' => esc_html__('Leave empty for all or use comma for list', 'coyote')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('List Title', 'coyote'),
						'param_name' => 'list_title',
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('List Highlighted Text', 'coyote'),
						'param_name' => 'list_highlighted',
						'description' => esc_html__('Highlighted text will be appended to title', 'coyote'),
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Show Image', 'coyote'),
						'param_name' => 'show_image',
						'value' => array(
							esc_html__('No', 'coyote') => 'no',
							esc_html__('Yes', 'coyote') => 'yes'
						),
						'dependency' => Array('element' => 'type', 'value' => array('simple')),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Image Size', 'coyote'),
						'param_name' => 'image_size',
						'value' => array(
							esc_html__('Original', 'coyote') => 'original',
							esc_html__('Landscape', 'coyote') => 'landscape',
							esc_html__('Square', 'coyote') => 'square'
						),
						'dependency' => Array('element' => 'show_image', 'value' => array('yes')),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text length', 'coyote'),
						'param_name' => 'text_length',
						'description' => esc_html__('Number of characters', 'coyote')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Title Tag', 'coyote'),
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						)
					)
				)
		) );

	}
	public function render($atts, $content = null) {
		
		$default_atts = array(
			'type' 					=> 'simple',
            'number_of_posts' 		=> '',
            'selected_posts'		=> '',
            'number_of_columns'		=> '',
            'show_image'			=> 'no',
            'image_size'			=> 'original',
            'order_by'				=> '',
            'order'					=> '',
            'category'				=> '',
            'title_tag'				=> 'h3',
			'text_length'			=> '90',
			'list_title'			=> '',
			'list_highlighted'		=> ''
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getBlogHolderClasses($params);
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	
     
		
        $thumbImageSize = $this->generateImageSize($params);
		$params['thumb_image_size'] = $thumbImageSize;

		$html ='';
        $html .= coyote_edge_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		return $html;
		
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';
		
		$columnNumber = $this->getColumnNumberClass($params);
		
		if(!empty($params['type'])){
			switch($params['type']){
				case 'image_in_box':
					$holderClasses = 'edgtf-image-in-box';
				break;
				case 'simple' : 
					$holderClasses = 'edgtf-simple';
				break;	
				case 'boxes' : 
					$holderClasses = 'edgtf-boxes';
				break;	
				case 'masonry' : 
					$holderClasses = 'edgtf-masonry';
				break;
				case 'minimal' :
					$holderClasses = 'edgtf-minimal';
				break;
				default: 
					$holderClasses = 'edgtf-simple';
			}
		}
		
		$holderClasses .= ' '.$columnNumber;
		
		return $holderClasses;
		
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getColumnNumberClass($params){
		
		$columnsNumber = '';
		$type = $params['type'];
		$columns = $params['number_of_columns'];
		
        if ($type == 'boxes' || $type == 'simple') {
            switch ($columns) {
                case 1:
                    $columnsNumber = 'edgtf-one-column';
                    break;
                case 2:
                    $columnsNumber = 'edgtf-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'edgtf-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'edgtf-four-columns';
                    break;
                default:
					$columnsNumber = 'edgtf-one-column';
                    break;
            }
        }
		return $columnsNumber;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);

		$post_ids = null;
		if (!empty($params['selected_posts'])) {
			$post_ids = explode(',', $params['selected_posts']);
			$queryArray['post__in'] = $post_ids;
		}

		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];
		
		if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'coyote_edge_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'coyote_edge_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
		return $thumbImageSize;
	}
	
}
