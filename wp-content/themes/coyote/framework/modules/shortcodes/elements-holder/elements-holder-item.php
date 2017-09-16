<?php
namespace CoyoteEdge\Modules\Shortcodes\ElementsHolderItem;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolderItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_elements_holder_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Elements Holder Item', 'coyote'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_elements_holder'),
					'as_parent' => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider'),
					'content_element' => true,
					'category' => esc_html__('by EDGE', 'coyote'),
					'icon' => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view' => 'VcColumnView',
					'params' => array(
						array(
							'type' => 'colorpicker',
							'class' => '',
							'heading' => esc_html__('Background Color', 'coyote'),
							'param_name' => 'background_color',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'attach_image',
							'class' => '',
							'heading' => esc_html__('Background Image', 'coyote'),
							'param_name' => 'background_image',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => esc_html__('Padding', 'coyote'),
							'param_name' => 'item_padding',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__('Horizontal Alignment', 'coyote'),
							'param_name' => 'horizontal_aligment',
							'value' => array(
								esc_html__('Left', 'coyote') => 'left',
								esc_html__('Right', 'coyote') => 'right',
								esc_html__('Center', 'coyote') => 'center'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__('Vertical Alignment', 'coyote'),
							'param_name' => 'vertical_alignment',
							'value' => array(
								esc_html__('Middle', 'coyote') => 'middle',
								esc_html__('Top', 'coyote') => 'top',
								esc_html__('Bottom', 'coyote') => 'bottom'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Enable Border','coyote'),
							'param_name' => 'enable_border',
							'value' => array(
								esc_html__('No','coyote')    => 'no',
								esc_html__('Yes','coyote')   => 'yes'
							)
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Border Color','coyote'),
							'param_name' => 'border_color',
							'dependency' => array('element' => 'enable_border', 'value' => 'yes')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Border Size (px)','coyote'),
							'param_name' => 'border_size',
							'dependency' => array('element' => 'enable_border', 'value' => 'yes')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Make Whole Item Clickable','coyote'),
							'param_name' => 'clickable',
							'value' => array(
								esc_html__('No','coyote')    => 'no',
								esc_html__('Yes','coyote')   => 'yes'
							)
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Link','coyote'),
							'param_name' => 'link',
							'dependency' => array('element' => 'clickable', 'value' => 'yes')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Link Target','coyote'),
							'param_name' => 'target',
							'save_always' => true,
							'dependency' => array('element' => 'link', 'not_empty' => true),
							'value' => array(
								esc_html__('Same Window','coyote')    => '_self',
								esc_html__('New Window','coyote')     => '_blank',
							)
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__('Animation Name', 'coyote'),
							'param_name' => 'animation_name',
							'value' => array(
								esc_html__('No Animation', 'coyote') => '',
								esc_html__('Flip In', 'coyote')    => 'flip-in',
								esc_html__('Grow In', 'coyote')	=> 'grow-in',
								esc_html__('X Rotate', 'coyote') 	=> 'x-rotate',
								esc_html__('Z Rotate', 'coyote')   => 'z-rotate',
								esc_html__('Y Translate', 'coyote') => 'y-translate',
								esc_html__('Fade In', 'coyote')	=> 'fade-in',
								esc_html__('Fade In Down','coyote') => 'fade-in-down',
								esc_html__('Fade In Left X Rotate','coyote') => 'fade-in-left-x-rotate'
							),
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => esc_html__('Animation Delay (ms)', 'coyote'),
							'param_name' => 'animation_delay',
							'value' => '',
							'description' => '',
							'dependency' => array('element' => 'animation_name', 'not_empty' => true)
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','coyote'),
							'heading' => esc_html__('Padding on screen size between 1280px-1440px', 'coyote'),
							'param_name' => 'item_padding_1280_1440',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','coyote'),
							'heading' => esc_html__('Padding on screen size between 1024px-1280px', 'coyote'),
							'param_name' => 'item_padding_1024_1280',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','coyote'),
							'heading' => esc_html__('Padding on screen size between 768px-1024px', 'coyote'),
							'param_name' => 'item_padding_768_1024',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','coyote'),
							'heading' => esc_html__('Padding on screen size between 600px-768px', 'coyote'),
							'param_name' => 'item_padding_600_768',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','coyote'),
							'heading' => esc_html__('Padding on screen size between 480px-600px', 'coyote'),
							'param_name' => 'item_padding_480_600',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness','coyote'),
							'heading' => esc_html__('Padding on Screen Size Bellow 480px', 'coyote'),
							'param_name' => 'item_padding_480',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'coyote'),
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color' => '',
			'background_image' => '',
			'item_padding' => '',
			'horizontal_aligment' => '',
			'vertical_alignment' => '',
			'enable_border' => '',
			'border_color' => '',
			'border_size' => '',
			'clickable'	=> '',
			'link'	=> '',
			'target' => '_self',
			'animation_name' => '',
			'animation_delay' => '',
			'item_padding_1280_1440' => '',
			'item_padding_1024_1280' => '',
			'item_padding_768_1024' => '',
			'item_padding_600_768' => '',
			'item_padding_480_600' => '',
			'item_padding_480' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;

		$rand_class = 'edgtf-elements-holder-custom-' . mt_rand(100000,1000000);

		$params['elements_holder_item_style'] = $this->getElementsHolderItemStyle($params);
		$params['elements_holder_item_content_style'] = $this->getElementsHolderItemContentStyle($params);
		$params['elements_holder_item_class'] = $this->getElementsHolderItemClass($params);
		$params['elements_holder_item_content_class'] = $rand_class;
		$params['elements_holder_item_content_responsive'] = $this->getElementsHolderItemContentResponsiveStyle($params);
		$params['elements_holder_item_data'] = $this->getData($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/elements-holder-item-template', 'elements-holder', '', $params);

		return $html;
	}


	/**
	 * Return Elements Holder Item style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemStyle($params) {

		$element_holder_item_style = array();

		if ($params['background_color'] !== '') {
			$element_holder_item_style[] = 'background-color: ' . $params['background_color'];
		}
		if ($params['background_image'] !== '') {
			$element_holder_item_style[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}
		if ($params['animation_delay'] !== '') {
			$element_holder_item_style[] = 'transition-delay:' . $params['animation_delay'] .'ms;'. '-webkit-transition-delay:' . $params['animation_delay'] .'ms';
		}
		if ($params['border_color'] !== '') {
			$element_holder_item_style[] = 'border-color:' . $params['border_color'];
		}
		if ($params['border_size'] !== '') {
			$element_holder_item_style[] = 'border-width:' . coyote_edge_filter_px($params['border_size']). 'px';
		}
		return implode(';', $element_holder_item_style);

	}

	/**
	 * Return Elements Holder Item Content style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentStyle($params) {

		$element_holder_item_content_style = array();

		if ($params['item_padding'] !== '') {
			$element_holder_item_content_style[] = 'padding: ' . $params['item_padding'];
		}

		return implode(';', $element_holder_item_content_style);

	}

	/**
	 * Return Elements Holder Item Content Responssive style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentResponsiveStyle($params) {

		$element_holder_item_responsive_style = array();

		if ($params['item_padding_1280_1440'] !== '') {
			$element_holder_item_responsive_style['item_padding_1280_1440'] = $params['item_padding_1280_1440'];
		}
		if ($params['item_padding_1024_1280'] !== '') {
			$element_holder_item_responsive_style['item_padding_1024_1280'] = $params['item_padding_1024_1280'];
		}
		if ($params['item_padding_768_1024'] !== '') {
			$element_holder_item_responsive_style['item_padding_768_1024'] = $params['item_padding_768_1024'];
		}
		if ($params['item_padding_600_768'] !== '') {
			$element_holder_item_responsive_style['item_padding_600_768'] = $params['item_padding_600_768'];
		}
		if ($params['item_padding_480_600'] !== '') {
			$element_holder_item_responsive_style['item_padding_480_600'] = $params['item_padding_480_600'];
		}
		if ($params['item_padding_480'] !== '') {
			$element_holder_item_responsive_style['item_padding_480'] = $params['item_padding_480'];
		}

		return $element_holder_item_responsive_style;

	}

	/**
	 * Return Elements Holder Item classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemClass($params) {

		$element_holder_item_class = array();

		if ($params['vertical_alignment'] !== '') {
			$element_holder_item_class[] = 'edgtf-vertical-alignment-'. $params['vertical_alignment'];
		}

		if ($params['horizontal_aligment'] !== '') {
			$element_holder_item_class[] = 'edgtf-horizontal-alignment-'. $params['horizontal_aligment'];
		}

		if ($params['enable_border'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-eh-with-border';
		}

		if ($params['clickable'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-eh-clickable';
		}

		if ($params['animation_name'] !== '') {
			$element_holder_item_class[] = 'edgtf-'. $params['animation_name'];
		}

		return implode(' ', $element_holder_item_class);

	}

	private function getData($params) {
		$data = array();

		if($params['animation_name'] !== '') {
			$data['data-animation'] = 'edgtf-'.$params['animation_name'];
		}

        $data['data-item-class'] = $params['elements_holder_item_content_class'];

        if ($params['item_padding_1280_1440'] !== '') {
            $data['data-1280-1440'] = $params['item_padding_1280_1440'];
        }

        if ($params['item_padding_1024_1280'] !== '') {
            $data['data-1024-1280'] = $params['item_padding_1024_1280'];
        }

        if ($params['item_padding_768_1024'] !== '') {
            $data['data-768-1024'] = $params['item_padding_768_1024'];
        }

        if ($params['item_padding_600_768'] !== '') {
            $data['data-600-768'] = $params['item_padding_600_768'];
        }

        if ($params['item_padding_480_600'] !== '') {
            $data['data-480-600'] = $params['item_padding_480_600'];
        }

        if ($params['item_padding_480'] !== '') {
            $data['data-480'] = $params['item_padding_480'];
        }

		return $data;
	}
}
