<?php
namespace CoyoteEdge\Modules\Shortcodes\TextSlider;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class TextSlider
 */
class TextSlider implements ShortcodeInterface	{
	private $base; 
	
	function __construct() {
		$this->base = 'edgtf_text_slider';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
		* Returns base for shortcode
		* @return string
	 */
	public function getBase() {
		return $this->base;
	}	
	public function vcMap() {
						
		vc_map( array(
			'name' => esc_html__('Text Slider', 'coyote'),
			'base' => $this->base,
			'category' => esc_html__('by EDGE', 'coyote'),
			'icon' => 'icon-wpb-text-slider extended-custom-icon',
            'as_parent' => array('only' => 'edgtf_text_slider_item'),
            'js_view' => 'VcColumnView',
			'params' =>	array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Slider Alignment','coyote'),
					'param_name' => 'alignment',
					'value' => array(
						esc_html__('Left','coyote') => 'left',
						esc_html__('Center','coyote') => 'center',
						esc_html__('Right','coyote') => 'right',
					)
				),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show Bullets', 'coyote'),
                    'param_name' => 'bullets',
                    'value' => array(
                    	esc_html__('Yes','coyote') => 'yes',
                    	esc_html__('No','coyote') => 'no',
                	)
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
			'alignment' => 'left',
            'bullets' => 'yes',
        );

		$params = shortcode_atts($args, $atts);

        extract($params);
        $data = $this->getDataParams($params);

        $html = '';

        $text_slider_class = $this->getClasses($params);

        $html .= '<div '. coyote_edge_get_class_attribute($text_slider_class) .' '.esc_attr($data). '>';
            $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;

	}


	private function getDataParams($params){
		$data_array = array();

		if ($params['bullets'] !== ''){
			$data_array[] = 'data-bullets='.$params['bullets'];
		}

		return implode(' ', $data_array);
	}

	private function getClasses($params){
		$classes = array();
		$classes[] = 'clearfix';
		$classes[] = 'edgtf-text-slider';

		if ($params['alignment'] !== ''){
			$classes[] = 'edgtf-text-slider-align-'.$params['alignment'];
		}

		return implode(' ', $classes);
	}
}