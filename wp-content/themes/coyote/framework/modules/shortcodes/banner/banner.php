<?php
namespace CoyoteEdge\Modules\Shortcodes\Banner;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ItemShowcase
 */
class Banner implements ShortcodeInterface	{
	private $base; 
	
	function __construct() {
		$this->base = 'edgtf_banner';

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
			'name' => esc_html__('Banner', 'coyote'),
			'base' => $this->base,
			'category' => esc_html__('by EDGE','coyote'),
			'icon' => 'icon-wpb-banner extended-custom-icon',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image','coyote'),
                    'param_name' => 'item_image'
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Link','coyote'),
					'param_name' => 'link'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Link Target','coyote'),
					'param_name' => 'link_target',
					'value' => array(
						'' => '',
						esc_html__('Self','coyote') => '_self',
						esc_html__('Blank','coyote') => '_blank'
					)
				),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title','coyote'),
                    'admin_label' => true,                    
                    'param_name' => 'banner_title',
                ),
                array(
                	'type' => 'dropdown',
                	'heading' => esc_html__('Title Tag','coyote'),
                	'param_name' => 'title_tag',
                	'value' => array(
                		'' => '',
                		'h2' => 'h2',
                		'h3' => 'h3',
                		'h4' => 'h4',
                		'h5' => 'h5',
                		'h6' => 'h6',
            		)
            	),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Image Hover','coyote'),
					'param_name' => 'image_hover',
					'value' => array(
						esc_html__('No Hover','coyote') => '',
						esc_html__('Zoom','coyote') => 'zoom'
					),
					'dependency' => array('element' => 'item_image', 'not_empty' => true),
				)
            )
		) );

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
            'item_image' => '',
            'banner_title' => '',
            'title_tag' => 'h2',
			'link' => '',
			'link_target' => '',
			'image_hover' => ''

        );

		$params = shortcode_atts($args, $atts);
        $params['banner_classes'] = $this->getBannerClass($params);

        extract($params);

		if($params['link_target'] == ''){
			$params['link_target'] = '_self';
		}

        $html = coyote_edge_get_shortcode_module_template_part('templates/banner-template', 'banner', '', $params);

        return $html;

	}

    /**
     * Return Separator classes
     *
     * @param $params
     * @return array
     */
    private function getBannerClass($params) {

        $banner_classes = array();

		if($params['image_hover'] != '') {
            $banner_classes[] = 'edgtf-bih-'.$params['image_hover'];
        }

        return implode(' ', $banner_classes);

    }

  }
