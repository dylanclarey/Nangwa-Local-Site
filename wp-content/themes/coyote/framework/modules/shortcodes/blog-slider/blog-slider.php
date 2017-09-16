<?php
namespace CoyoteEdge\Modules\Shortcodes\BlogSlider;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Blog Slider
 */
class BlogSlider implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_blog_slider';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgtf_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		$categories_array = array();

		vc_map( array(
			'name' => esc_html__('Blog Slider', 'coyote'),
			'base' => $this->getBase(),
			'icon'  => 'icon-wpb-blog-slider extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Slider Type', 'coyote'),
                    'param_name'	=> 'slider_type',
                    'value'			=> array(
						esc_html__('Carousel', 'coyote') => 'carousel',
						esc_html__('Slider', 'coyote') => 'slider',
                    ),
                    'admin_label'	=> true,
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Number of Posts', 'coyote'),
					'param_name' => 'number_of_posts',
					'description' => esc_html__('Leave empty for all posts', 'coyote'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Selected Posts', 'coyote'),
					'param_name'	=> 'selected_posts',
					'description'	=> esc_html__('Selected Posts (leave empty for all, delimit by comma)', 'coyote'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Order by', 'coyote'),
					'param_name'	=> 'order_by',
					'value'			=> array(
						esc_html__('Date', 'coyote') => 'date',
						esc_html__('Title', 'coyote') => 'title'
					),
					'admin_label'	=> true,
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Order', 'coyote'),
					'param_name'	=> 'order',
					'value'			=> array(
						esc_html__('DESC','coyote') => 'desc',
						esc_html__('ASC', 'coyote') => 'asc'
					),
					'admin_label'	=> true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Category', 'coyote'),
					'param_name' => 'category',
					'value' => '',
					'description' => esc_html__('Leave empty for all or use comma for list', 'coyote'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Image', 'coyote'),
					'param_name'	=> 'show_image',
					'value'			=> array(
						esc_html__('No', 'coyote')	=> 'no',
						esc_html__('Yes','coyote')	=> 'yes',
					),
					"dependency" => array("element" => "slider_type", "value" => array("carousel"))
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Image Size', 'coyote'),
					'param_name'	=> 'image_size',
					'value'			=> array(
						esc_html__('Default','coyote') => 'default',
						esc_html__('Square','coyote') => 'square',
					),
                    "dependency" => array("element" => "show_image", "value" => array("yes"))
				),
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Image Size', 'coyote'),
                    'param_name'	=> 'image_size_slider',
                    'value'			=> array(
						esc_html__('Default', 'coyote') => 'default',
						esc_html__('Square', 'coyote')	=> 'square',
						esc_html__('Custom',	'coyote')	=> 'custom',
                    ),
                    "dependency" => array("element" => "slider_type", "value" => array("slider"))
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Image Width", 'coyote'),
                    "param_name" => "image_width",
                    "value" => "",
                    "description" => esc_html__("Set custom image width", 'coyote'),
                    "dependency" => array("element" => "image_size_slider", "value" => array("custom"))
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Image Height", 'coyote'),
                    "param_name" => "image_height",
                    "value" => "",
                    "description" => esc_html__("Set custom image height", 'coyote'),
                    "dependency" => array("element" => "image_size_slider", "value" => array("custom"))
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Text length', 'coyote'),
					'param_name' => 'text_length',
					'description' => esc_html__('Number of characters', 'coyote'),
				),
			)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'number_of_posts'	=> -1,
			'order_by'		 	=> 'date',
			'order'				=> 'DESC',
			'category'			=> '',
			'image_size'		=> 'full',
			'image_size_slider'	=> 'full',
			'slider_type'	 	=> 'carousel',
			'show_image'	 	=> 'no',
			'image_height'	 	=> '',
            'image_width'	 	=> '',
            'selected_posts' 	=> '',
            'text_length' 		=> '90'
		);

		$params = shortcode_atts($args, $atts);

		extract($params);
		
		
		$args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $number_of_posts,
			'orderby'			=> $order_by,
			'order'				=> $order
		);
		if($category != '' && $category !== 0){
			$args['category_name'] = $category;
		}

		$slider_class = 'edgtf-blog-slider-type-'.$slider_type;
		$post_ids = null;
		
		if($selected_posts != ''){
			$post_ids = explode(',', $selected_posts);
			$args['post__in'] = $post_ids;
		}

        if($slider_type == 'slider'){
           if($image_size_slider == 'custom' && $image_width != '' && $image_height != ''){
                $params['image_size'] = 'custom';
                $params['image_width'] = $image_width;
                $params['image_height'] = $image_height;
            }elseif($image_size_slider == 'square') {
               $params['image_size'] = 'coyote_edge_square';
           }
           $params['show_image'] = 'yes'; //for slider image is always shown

        }elseif($image_size == 'square') {
            $params['image_size'] = 'coyote_edge_square';
        }

		$query = new \WP_Query($args);

		if ( $query->have_posts() ) {

			$html = '';

			$html .= '<div class="edgtf-blog-slider-outer">';
			

			$html .= '<div class="edgtf-blog-slider edgtf-slick-slider-navigation-style '. $slider_class .'" data-type="'.$slider_type.'">';

			while ( $query->have_posts() ) {

				$query->the_post();

				//Get slide HTML from template
				$html .= coyote_edge_get_shortcode_module_template_part('templates/blog-slider-template', 'blog-slider', '', $params);

			}

			$html .= '</div></div>';


		} else {

			$html = esc_html__('There is no posts!', 'coyote');

		}

		wp_reset_postdata();

		return $html;

	}
}