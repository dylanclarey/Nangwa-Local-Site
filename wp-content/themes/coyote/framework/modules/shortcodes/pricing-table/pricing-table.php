<?php
namespace CoyoteEdge\Modules\Shortcodes\PricingTable;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Pricing Table', 'coyote'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-table extended-custom-icon',
			'category' => esc_html__('by EDGE', 'coyote'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'edgtf_pricing_tables'),
			'params' => array(
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Background Color', 'coyote'),
                    'param_name'  => 'background_color',
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
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'coyote'),
					'param_name' => 'title',
					'value' => 'Basic Plan',
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price', 'coyote'),
					'param_name' => 'price',
					'description' => esc_html__('Default value is 100', 'coyote'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Currency', 'coyote'),
					'param_name' => 'currency',
					'description' => esc_html__('Default mark is $', 'coyote'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Price Period', 'coyote'),
					'param_name' => 'price_period',
					'description' => esc_html__('Default label is "per month"', 'coyote')
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Show Button', 'coyote'),
					'param_name' => 'show_button',
					'value' => array(
						esc_html__('Default', 'coyote') => '',
						esc_html__('Yes', 'coyote') => 'yes',
						esc_html__('No', 'coyote') => 'no'
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Text', 'coyote'),
					'param_name' => 'button_text',
					'dependency' => array('element' => 'show_button',  'value' => 'yes') 
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Link', 'coyote'),
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Active', 'coyote'),
					'param_name' => 'active',
					'value' => array(
						esc_html__('No', 'coyote') => 'no',
						esc_html__('Yes', 'coyote') => 'yes'
					),
					'save_always' => true,
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Content', 'coyote'),
					'param_name' => 'content',
					'value' => '<li>content content content</li><li>content content content</li><li>content content content</li>',
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
		    'background_color'             => '',
            'skin'                         => 'dark',
			'title'         			   => 'Basic Plan',
			'price'         			   => '100',
			'currency'      			   => '$',
			'price_period'  			   => 'Per Month',
			'active'        			   => 'no',
			'show_button'				   => 'yes',
			'link'          			   => '',
			'button_text'   			   => 'button'
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';
		$pricing_table_clasess		= 'edgtf-price-table';
		
		if($active == 'yes') {
			$pricing_table_clasess .= ' edgtf-active';
		}

        if($skin !== '') {
            $pricing_table_clasess .= ' edgtf-price-table-'.$skin;
        }

        $pricing_table_style = '';

        if($background_color != ''){
            $pricing_table_style = 'background-color:'. $background_color . ';';
        }

        $params['pricing_table_style'] = $pricing_table_style;
		$params['pricing_table_classes'] = $pricing_table_clasess;
        $params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content);
		
		$html .= coyote_edge_get_shortcode_module_template_part('templates/pricing-table-template','pricing-table', '', $params);
		return $html;

	}

}
