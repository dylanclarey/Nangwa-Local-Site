<?php
namespace CoyoteEdge\Modules\Shortcodes\ScatteredImages;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ScatteredImages implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_scattered_images';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Scattered Images', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-scattered-images extended-custom-icon',
			'category' => 'by EDGE',
			'allowed_container_element' => 'vc_row',
			'params' => array(
                array(
                    'type'       => 'dropdown',
                    'heading'    =>esc_html__( 'Layout', 'coyote'),
                    'param_name' => 'layout',
                    'value'      => array(
			            esc_html__( 'Images on the left' , 'coyote') => 'left',
			            esc_html__( 'Images on the right' ,'coyote') => 'right'
                    ),
					'admin_label' => true,
                ),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title','coyote'),
					'param_name' => 'title',
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Title Color','coyote'),
					'param_name' => 'title_color',
					'dependency' => Array('element' => 'title', 'not_empty' => true),
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Subtitle','coyote'),
					'param_name' => 'subtitle',
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Subtitle Color','coyote'),
					'param_name' => 'subtitle_color',
					'dependency' => Array('element' => 'subtitle', 'not_empty' => true),
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__('Text','coyote'),
					'param_name' => 'text',
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Text Color','coyote'),
					'param_name' => 'text_color',
					'dependency' => Array('element' => 'text', 'not_empty' => true),
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Text', 'coyote'),
					'param_name' => 'button_text',
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Link', 'coyote'),
					'param_name' => 'button_link',
					'dependency' => array('element' => 'button_text', 'not_empty' => true),
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Button Target', 'coyote'),
					'param_name' => 'button_target',
					'value' => array(
						esc_html__('Self', 'coyote') => '_self',
						esc_html__('Blank', 'coyote') => '_blank'
					),
					'dependency' => array('element' => 'button_text', 'not_empty' => true),
					'group' => esc_html__('Typography','coyote'),
				),
				array(
					'type'			=> 'attach_image',
					'heading'		=>  esc_html__('Hero Image', 'coyote'),
					'param_name'	=> 'hero_image',
					'description'	=> esc_html__( 'This image along with the textual content will set the overall shortcode height.', 'coyote'),
					'group' => esc_html__('Images','coyote'),
				),
				array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__('Hero Image Link', 'coyote'),
                    'param_name' => 'hero_image_link',
                    'dependency' => array('element' => 'hero_image', 'not_empty' => true),
					'group' => esc_html__('Images','coyote'),
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__( 'Hero Image Link Target', 'coyote'),
                    'param_name' => 'hero_image_link_target',
                    'value'      => array(
			            esc_html__(  'Self' , 'coyote') => '_self',
			            esc_html__( 'Blank' ,'coyote') => '_blank'
                    ),
                    'dependency' => array('element' => 'hero_image_link', 'not_empty' => true),
					'group' => esc_html__('Images','coyote'),
                ),
                array(
					'type'			=> 'attach_image',
					'heading'		=>  esc_html__('Aux Image 1', 'coyote'),
					'param_name'	=> 'aux_image_1',
                    'dependency' => array('element' => 'hero_image', 'not_empty' => true),
					'group' => esc_html__('Images','coyote'),
				),
                array(
					'type'			=> 'attach_image',
					'heading'		=>  esc_html__('Aux Image 2', 'coyote'),
					'param_name'	=> 'aux_image_2',
                    'dependency' => array('element' => 'hero_image', 'not_empty' => true),
					'group' => esc_html__('Images','coyote'),
				),
				array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__( 'Enable Parallax', 'coyote'),
                    'param_name' => 'enable_parallax',
                    'value'      => array(
			            esc_html__(  'Yes' , 'coyote') => 'yes',
			            esc_html__( 'No' ,'coyote') => 'no'
                    ),
					'group' => esc_html__('Additional Options','coyote'),
                ),
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
			'layout' => 'left',
            'title' => '',
            'title_color' => '',
            'subtitle' => '',
            'subtitle_color' => '',
            'text' => '',
            'text_color' => '',
            'button_text' => '',
            'button_link' => '',
            'button_target' => '',
            'hero_image' => '',
            'hero_image_link' => '',
            'hero_image_link_target' => '_self',
            'aux_image_1' => '',
            'aux_image_2' => '',
            'enable_parallax' => 'yes'
        );
		
		//Extract params for use in method
		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['si_slasses'] = $this->getSIClasses($params);
		$params['title_styles'] = $this->getTitleStyles($params);
		$params['subtitle_styles'] = $this->getSubtitleStyles($params);
		$params['text_styles'] = $this->getTextStyles($params);
		$params['button_params'] = $this->getButtonParameters($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/scattered-images', 'scattered-images', '', $params);
		
        return $html;
		
	}


	private function getTitleStyles($params) {
		$title_styles = array();

        if ($params['title_color'] !== '') {
            $title_styles[] = 'color: '.$params['title_color'];
        }

		return implode(';', $title_styles);
	}

	private function getSubtitleStyles($params) {
		$subtitle_styles = array();

        if ($params['subtitle_color'] !== '') {
            $subtitle_styles[] = 'color: '.$params['subtitle_color'];
        }

		return implode(';', $subtitle_styles);
	}

	private function getTextStyles($params) {
		$text_styles = array();

        if ($params['text_color'] !== '') {
            $text_styles[] = 'color: '.$params['text_color'];
        }

		return implode(';', $text_styles);
	}

    private function getSIClasses($params) {
        $si_classes = array('edgtf-scattered-images');

        if(!empty($params['layout'])) {
            $si_classes[] = 'edgtf-si-'. $params['layout'];
        }

        if(!empty($params['enable_parallax'])) {
            $si_classes[] = 'edgtf-si-parallax-'. $params['enable_parallax'];
        }
        
        return $si_classes;
    }

	private function getButtonParameters($params) {
		$button_params_array = array();

        $button_params_array['type'] = 'outline';
        $button_params_array['hover_type'] = 'shuffle';

        if(!empty($params['button_text'])) {
        	$button_params_array['text'] = $params['button_text'];
        }
		
		if(!empty($params['button_link'])) {
			$button_params_array['link'] = $params['button_link'];
		}

		if(!empty($params['button_target'])) {
			$button_params_array['target'] = $params['button_target'];
		}
		
		return $button_params_array;
	}
}