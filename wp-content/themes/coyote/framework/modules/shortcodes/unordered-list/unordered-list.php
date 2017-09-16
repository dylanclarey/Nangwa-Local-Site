<?php
namespace CoyoteEdge\Modules\Shortcodes\UnorderedList;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface{

	private $base;

	function __construct() {
		$this->base='edgtf_unordered_list';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**\
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('List - Unordered', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-unordered-list extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'			=> 'dropdown',
					'admin_label'	=> true,
					'heading'		=> esc_html__('Style', 'coyote'),
					'param_name'	=> 'style',
					'value'			=> array(
						esc_html__('Circle', 'coyote') => 'circle',
						esc_html__('Line', 'coyote')	 => 'line',
						esc_html__('Arrow', 'coyote')  => 'arrow'
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Animate List', 'coyote'),
					'param_name'	=> 'animate',
					'value'			=> array(
						esc_html__('No', 'coyote') => 'no',
						esc_html__('Yes', 'coyote') => 'yes'
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Hover Effect','coyote'),
					'param_name'	=> 'hover',
					'value'			=> array(
						esc_html__('No', 'coyote') => 'no',
						esc_html__('Yes', 'coyote') => 'yes'
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Font Weight', 'coyote'),
					'param_name' => 'font_weight',
					'value' => array(
						esc_html__('Default', 'coyote') => '',
						esc_html__('Light', 'coyote') => 'light',
						esc_html__('Normal', 'coyote') => 'normal',
						esc_html__('Bold', 'coyote') => 'bold'
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Padding left (px)', 'coyote'),
					'param_name' => 'padding_left',
					'value' => ''
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__('Content', 'coyote'),
					'param_name' => 'content',
					'value' => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
            'style' => '',
            'animate' => '',
            'hover' => '',
            'font_weight' => '',
            'padding_left' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		
		$list_item_classes = "";

        if ($style != '') {
			$list_item_classes .= ' edgtf-'.$style;
        }

		if ($animate == 'yes') {
			$list_item_classes .= ' edgtf-animate-list';
		}

		if ($hover == 'yes') {
			$list_item_classes .= ' edgtf-hover-list';
		}
		
		$list_style = '';
		if($padding_left != '') {
			$list_style .= 'padding-left: ' . $padding_left .'px;';
		}
		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
        $html = '<div class="edgtf-unordered-list '.$list_item_classes.'" '.  coyote_edge_get_inline_style($list_style).'>'.do_shortcode($content).'</div>';
        return $html;
	}
}