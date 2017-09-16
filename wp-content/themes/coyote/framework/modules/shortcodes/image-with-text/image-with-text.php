<?php
namespace CoyoteEdge\Modules\Shortcodes\ImageWithText;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageWithText implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_image_with_text';

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
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('Image With Text', 'coyote'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by EDGE', 'coyote'),
			'icon'                      => 'icon-wpb-image-with-text extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_image',
					'heading'		=> esc_html__('Image', 'coyote'),
					'param_name'	=> 'image',
					'description'	=> esc_html__('Select image from media library', 'coyote')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Image Size', 'coyote'),
					'param_name'	=> 'image_size',
					'description'	=> esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'coyote'),
				),
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Text Alignment','coyote'),
                    'param_name'	=> 'text_alignment',
                    'value'			=> array(
                        esc_html__('Default','coyote') => '',
                        'Left' => 'left',
                        'Center' => 'center',
                    ),
                ),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title','coyote'),
					'param_name'	=> 'title'
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Title Style','coyote'),
					'param_name'	=> 'title_tag',
					'value'			=> array(
						esc_html__('Default','coyote') => '',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
						esc_html__('Section Title','coyote') => 'span',
					),
					'dependency'	=> array('element' => 'title', 'not_empty' => true)
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__('Title Color','coyote'),
					'param_name'	=> 'title_color',
					'dependency'	=> array('element' => 'title', 'not_empty' => true)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Separator','coyote'),
					'param_name'	=> 'show_separator',
					'value'			=> array(
						esc_html__('Yes','coyote') => 'yes',
						esc_html__('No','coyote') => 'no',
					)
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Text','coyote'),
					'param_name'	=> 'text'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Link','coyote'),
					'param_name'	=> 'link'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Link Text','coyote'),
					'param_name'	=> 'link_text',
                    'dependency' => array('element' => 'link', 'not_empty' => true),
                    'description' => esc_html__('If link text not set, link will be around image','coyote')
				),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Target', 'coyote'),
                    'param_name' => 'target',
                    'value'      => array(
						esc_html__('Self', 'coyote')  => '_self',
						esc_html__('Blank','coyote') => '_blank'
                    ),
                    'dependency' => array('element' => 'link', 'not_empty' => true),
                ),
			)
		));

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'image'				=> '',
			'image_size'		=> 'thumbnail',
            'text_alignment'    => 'center',
			'title'				=> '',
			'title_tag'			=> 'h5',
			'title_color'		=> '',
			'show_separator'	=> 'yes',
			'text'				=> '',
			'link'				=> '',
			'link_text'			=> '',
			'target'			=> '_self'
		);

		$params = shortcode_atts($args, $atts);
		$params['image_size'] = $this->getImageSize($params['image_size']);
        $params['holder_class'] = $this->getTextClass($params);
		$params['title_style'] = $this->getTitleStyle($params);
		$params['separator_params'] = $this->getSeparatorParams($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/image-with-text-template' , 'image-with-text', '', $params);

		return $html;

	}


	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
					$matches[0][0],
					$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	private function getTitleStyle($params) {
		$style = array();

		if ($params['title_color'] !== ''){
			$style[] = 'color: '.$params['title_color'];
		}

		return implode(';', $style);
	}

	private function getTextClass($params) {

	    $text_class = array();

        $text_class[] = 'edgtf-image-with-text';

        if($params['text_alignment'] == 'left') {
            $text_class[] = 'edgtf-iwt-text-left-aligned';
        }

        return $text_class;
    }

	private function getSeparatorParams($params) {
		$separator_params = array();

		$separator_params['type'] = 'normal';
		$separator_params['position'] = 'center';
		$separator_params['border_style'] = 'solid';

		return $separator_params;

	}

}