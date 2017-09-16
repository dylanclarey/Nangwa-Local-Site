<?php
namespace CoyoteEdge\Modules\Shortcodes\ProgressBar;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Progress Bar', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'coyote'),
					'param_name' => 'title',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Skin','coyote'),
					'param_name' => 'skin',
					'value' => array(
						esc_html__('Dark','coyote') => 'dark',
						esc_html__('Light','coyote') => 'light',
					)
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Title Tag', 'coyote'),
					'param_name' => 'title_tag',
					'value' => array(
						''   => '',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',	
						'h5' => 'h5',	
						'h6' => 'h6',	
					),
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Percentage', 'coyote'),
					'param_name' => 'percent',
				),	
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Percentage Type', 'coyote'),
					'param_name' => 'percentage_type',
					'value' => array(
						esc_html__('Floating', 'coyote')  => 'floating',
						esc_html__('Static', 'coyote') => 'static'
					),
					'dependency' => Array('element' => 'percent', 'not_empty' => true)
				)
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'title_tag' => 'h5',
            'percent' => '100',
            'percentage_type' => 'floating',
            'skin' => 'dark'
        );
		$params = shortcode_atts($args, $atts);

		//Extract params for use in method
		extract($params);
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
		
		$params['percentage_classes'] = $this->getPercentageClasses($params);
		$params['progress_bar_classes'] = $this->getProgressBarClasses($params);

        //init variables
		$html = coyote_edge_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}
	/**
    * Generates css classes for progress bar
    *
    * @param $params
    *
    * @return array
    */
	private function getPercentageClasses($params){
		
		$percentClassesArray = array();
		
		if($params['percentage_type'] !=''){
			
			if($params['percentage_type'] == 'floating'){
				
				$percentClassesArray[]= 'edgtf-floating';


			}
			elseif($params['percentage_type'] == 'static'){
				
				$percentClassesArray[] = 'edgtf-static';
				
			}
		}
		return implode(' ', $percentClassesArray);
	}

	/**
	 * Generates css classes for Progress Bar
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getProgressBarClasses($params){

		$progress_bar_classes = array();
		$progress_bar_classes[] = 'edgtf-progress-bar';


		if($params['skin'] !== ''){
			$progress_bar_classes[] = 'edgtf-progress-bar-'.$params['skin'];
		}

		return implode(' ', $progress_bar_classes);
	}
}