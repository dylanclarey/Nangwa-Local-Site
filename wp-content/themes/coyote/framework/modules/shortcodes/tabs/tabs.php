<?php
namespace CoyoteEdge\Modules\Shortcodes\Tabs;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 */

class Tabs implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'edgtf_tabs';
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
			'name' => esc_html__('Tabs', 'coyote'),
			'base' => $this->getBase(),
			'as_parent' => array('only' => 'edgtf_tab'),
			'content_element' => true,
			'show_settings_on_create' => true,
			'category' => esc_html__('by EDGE', 'coyote'),
			'icon' => 'icon-wpb-tabs extended-custom-icon',
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin-label' => true,
					'heading' => esc_html__('Style','coyote'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Horizontal', 'coyote') => 'horizontal_tab',
						esc_html__('Horizontal Boxed', 'coyote') => 'horizontal_tab_boxed',
						esc_html__('Vertical', 'coyote') => 'vertical_tab',
						esc_html__('Vertical Boxed', 'coyote') => 'vertical_tab_boxed'
					),
					'save_always' => true,
				),
				array(
					'type' => 'dropdown',
					'admin-label' => true,
					'heading' => esc_html__('Title Layout', 'coyote'),
					'param_name' => 'title_layout',
					'value' => array(
						esc_html__('Without Icon', 'coyote') => 'without_icon',
						esc_html__('With Icon', 'coyote') => 'with_icon',
						esc_html__('Only Icon', 'coyote') => 'only_icon'
					),
					'save_always' => true,
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Color Style','coyote'),
					'param_name' => 'color_style',
					'value' => array(
						esc_html__('Default','coyote') => '',
						esc_html__('Grey','coyote') => 'grey',
						esc_html__('White','coyote') => 'white'
					),
					'description' => '',
					'dependency' => array('element' => 'style', 'value' => array('horizontal_tab_boxed','vertical_tab_boxed'))
				),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Skin','coyote'),
                    'param_name' => 'skin',
                    'value' => array(
                        esc_html__('Dark','coyote') => 'dark',
                        esc_html__('Light','coyote') => 'light'
                    ),
                    'description' => '',
                    'dependency' => array('element' => 'style', 'value' => array('horizontal_tab','vertical_tab'))
                )
			)
		));

	}

	public function render($atts, $content = null) {
		$args = array(
			'style' => 'horizontal_tab',
			'title_layout' => 'without_icon',
			'color_style' => '',
            'skin' => '',
		);
		
		$args = array_merge($args, coyote_edge_icon_collections()->getShortcodeParams());
        $params  = shortcode_atts($args, $atts);
		
		extract($params);
		
		// Extract tab titles
		preg_match_all('/tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
		$tab_titles = array();

		/**
		 * get tab titles array
		 *
		 */
		if (isset($matches[0])) {
			$tab_titles = $matches[0];
		}
		
		$tab_title_array = array();
		
		foreach($tab_titles as $tab) {
			preg_match('/tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
			$tab_title_array[] = $tab_matches[1][0];
		}
		
		$params['tabs_titles'] = $tab_title_array;
		$params['tab_class'] = $this->getTabClass($params);
		$params['content'] = $content;

		
		$output = '';
		
		$output .= coyote_edge_get_shortcode_module_template_part('templates/tab-template','tabs', '', $params);
		
		return $output;
		}
		
		/**
	   * Generates tabs class
	   *
	   * @param $params
	   *
	   * @return array
	   */
	private function getTabClass($params){
		$tab_style = $params['style'];
		$tab_title_layout = $params['title_layout'];
		$tab_classes = array();

		$tab_classes[] = 'edgtf-tabs';
		$tab_classes[] = 'clearfix';

		switch ($tab_style) {
			case 'vertical_tab':
				$tab_classes[] = 'edgtf-vertical-tab';
				break;
			case 'vertical_tab_boxed':
				$tab_classes[] = 'edgtf-vertical-tab';
				$tab_classes[] = 'edgtf-tab-boxed';
				break;
			case 'horizontal_tab_boxed':
				$tab_classes[] = 'edgtf-horizontal-tab';
				$tab_classes[] = 'edgtf-tab-boxed';
				break;
			default :
				$tab_classes[] = 'edgtf-horizontal-tab';
				break;
		}

		switch ($tab_title_layout) {
			case 'with_icon':
				$tab_classes[] = 'edgtf-tab-with-icon';
				break;
			case 'only_icon':
				$tab_classes[] = 'edgtf-tab-only-icon';
				break;
			default :
				$tab_classes[] = 'edgtf-tab-without-icon';
				break;
		}

		if ($params['color_style'] !== ''){
            $tab_classes[] = ' edgtf-style-'.$params['color_style'];
        }

        if ($params['skin'] !== '') {
            $tab_classes[] = ' edgtf-style-'.$params['skin'];
        }

		return $tab_classes;
	}

}