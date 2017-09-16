<?php
namespace CoyoteEdge\Modules\Shortcodes\CustomFont;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class CustomFont
 */
class CustomFont implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_custom_font';

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

		vc_map( array(
				'name' => esc_html__('Custom Font', 'coyote'),
				'base' => $this->getBase(),
				'category' => esc_html__('by EDGE','coyote'),
				'icon' => 'icon-wpb-custom-font extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Custom Font Tag", 'coyote'),
						"param_name" => "custom_font_tag",
						"value" => array(
							"" => "",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
							"p" => "p",
							"div" => "div",
						)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Font family", 'coyote'),
						"param_name" => "font_family",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Font size (px)", 'coyote'),
						"param_name" => "font_size",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Line height (px)", 'coyote'),
						"param_name" => "line_height",
						"value" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Font Style", 'coyote'),
						"param_name" => "font_style",
						"value" => coyote_edge_get_font_style_array(),
					),
					array(
						"type" => "dropdown",
						"heading" => "Font weight",
						"param_name" => esc_html__("font_weight", 'coyote'),
						"value" => coyote_edge_get_font_weight_array(),
						"save_always" => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Letter Spacing (px)", 'coyote'),
						"param_name" => "letter_spacing",
						"value" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Text transform", 'coyote'),
						"param_name" => "text_transform",
						"value" => array_flip(coyote_edge_get_text_transform_array()),
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Text decoration", 'coyote'),
						"param_name" => "text_decoration",
						"value" => array(
							esc_html__("None", 'coyote') => "",
							esc_html__("Underline", 'coyote') => "underline",
							esc_html__("Overline", 'coyote') => "overline",
							esc_html__("Line Through",'coyote') => "line-through"
						),
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__("Color", 'coyote'),
						"param_name" => "color",
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Text Align", 'coyote'),
						"param_name" => "text_align",
						"value" => array(
							"" => "",
							esc_html__("Left", 'coyote') => "left",
							esc_html__("Center",'coyote') => "center",
							esc_html__("Right", 'coyote') => "right",
							esc_html__("Justify", 'coyote') => "justify"
						),
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Content", 'coyote'),
						"param_name" => "content_custom_font",
						"value" => "<ins>Custom Font Content</ins>",
						"save_always" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Enable Type Out Effect", 'coyote'),
						"param_name" => "type_out_effect",
						"value" => array(
							esc_html__("No", 'coyote') => "no",
							esc_html__("Yes", 'coyote') => "yes",
						),
						"description" => esc_html__("Adds a Type Out effect to the Custom Font Content. 
													Use HTML <ins> tags to wrap individual Type Out lines.
													Use HTML <em> tags to wrap parts of the last Type Out line for strikethrough animation after the Type Out effect.", 'coyote'),
					),
					array(
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Strikethrough Color','coyote'),
						'param_name'	=> 'strikethrough_color',
						'dependency'	=> array('element' => 'type_out_effect', 'value' => array('yes')),
						"description" => esc_html__("This field is used to set the font and line color for strikethrough elements.", 'coyote'),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Type Out Delay','coyote'),
						'param_name'	=> 'type_out_delay',
						'dependency'	=> array('element' => 'type_out_effect', 'value' => array('yes')),
						"description" => esc_html__("Type Out delay in miliseconds.", 'coyote'),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Highlighted Text','coyote'),
						'param_name'	=> 'highlighted_text',
						'description'   =>esc_html__('Highlighted text will be appended to content','coyote'),
						'dependency'	=> array('element' => 'type_out_effect', 'value' => array('no')),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Highlighted Color','coyote'),
						'param_name'  => 'highlighted_color',
						'dependency'  => array('element' => 'highlighted_text', 'not_empty' => true)
					),
				)
		));
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'custom_font_tag' => 'div',
			'font_family' => '',
			'font_size' => '',
			'line_height' => '',
			'font_style' => '',
			'font_weight' => '',
			'letter_spacing' => '',
			'text_transform' => '',
			'text_decoration' => '',
			'text_align' => '',
			'color' => '',
			'content_custom_font' => '',
			'type_out_effect' => '',
			'type_out_delay' => '',
			'strikethrough_color' => '',
			'highlighted_text' => '',
			'highlighted_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['custom_font_style'] = $this->getCustomFontStyle($params);
		$params['custom_font_tag'] = $this->getCustomFontTag($params,$args);
		$params['custom_font_data'] = $this->getCustomFontData($params);
		$params['highlighted_style'] = $this->getHighlightedStyle($params);
		$params['type_out_random_class'] = $this->getTypeOutRandomClass($params);

		//Get HTML from template
		$html = coyote_edge_get_shortcode_module_template_part('templates/custom-font-template', 'customfont', '', $params);

		return $html;

	}

	/**
	 * Return Style for Custom Font
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontStyle($params) {
		$custom_font_style = array();

		if ($params['font_family'] !== '') {
			$custom_font_style[] = 'font-family: '.$params['font_family'];
		}

		if ($params['font_size'] !== '') {
			$font_size = strstr($params['font_size'], 'px') ? $params['font_size'] : $params['font_size'].'px';
			$custom_font_style[] = 'font-size: '.$font_size;
		}

		if ($params['line_height'] !== '') {
			$line_height = strstr($params['line_height'], 'px') ? $params['line_height'] : $params['line_height'].'px';
			$custom_font_style[] = 'line-height: '.$line_height;
		}

		if ($params['font_style'] !== '') {
			$custom_font_style[] = 'font-style: '.$params['font_style'];
		}

		if ($params['font_weight'] !== '') {
			$custom_font_style[] = 'font-weight: '.$params['font_weight'];
		}

		if ($params['letter_spacing'] !== '') {
			$letter_spacing = strstr($params['letter_spacing'], 'px') ? $params['letter_spacing'] : $params['letter_spacing'].'px';
			$custom_font_style[] = 'letter-spacing: '.$letter_spacing;
		}

		if ($params['text_transform'] !== '') {
			$custom_font_style[] = 'text-transform: '.$params['text_transform'];
		}

		if ($params['text_decoration'] !== '') {
			$custom_font_style[] = 'text-decoration: '.$params['text_decoration'];
		}

		if ($params['text_align'] !== '') {
			$custom_font_style[] = 'text-align: '.$params['text_align'];
		}

		if ($params['color'] !== '') {
			$custom_font_style[] = 'color: '.$params['color'];
		}

		return implode(';', $custom_font_style);
	}

	/**
	 * Return Custom Font Tag. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontTag($params,$args) {
		$tag_array = array('h2', 'h3', 'h4', 'h5', 'h6','p','div');
		return (in_array($params['custom_font_tag'], $tag_array)) ? $params['custom_font_tag'] : $args['custom_font_tag'];
	}

	/**
	 * Return Custom Font Data Attr
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontData($params) {
		$data_array = array();

		if ($params['font_size'] !== '') {
			$data_array[] = 'data-font-size= '.$params['font_size'];
		}

		if ($params['line_height'] !== '') {
			$data_array[] = 'data-line-height= '.$params['line_height'];
		}

		if ($params['strikethrough_color'] !== '') {
			$data_array[] = 'data-strikethrough-color= '. $params['strikethrough_color'];
		}

		if ($params['type_out_delay'] !== '') {
			$data_array[] = 'data-type-out-delay= '. $params['type_out_delay'];
		}

		return implode(' ', $data_array);
	}

    /**
     * Generates style for highlighted text
     *
     * @param $params
     *
     * @return string
     */
	private function getHighlightedStyle($params){
		$highlighted_style = array();

		if ($params['highlighted_color'] != ''){
			$highlighted_style[] = 'color: '.$params['highlighted_color'];
		}

		return implode(';', $highlighted_style);
	}


	/**
	 * Return Type Out Random Class
	 *
	 * @param $params
	 * @return array
	 */
	private function getTypeOutRandomClass($params) {

		$type_out_class = '';

		if ($params['type_out_effect'] === 'yes') {
			$type_out_class = 'edgtf-typed-element-'. mt_rand(100000,1000000);
		}

		return $type_out_class;
	}

}