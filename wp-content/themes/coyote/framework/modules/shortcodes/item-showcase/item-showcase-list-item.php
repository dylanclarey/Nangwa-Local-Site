<?php
namespace CoyoteEdge\Modules\Shortcodes\ItemShowcaseListItem;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ItemShowcaseListItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_item_showcase_list_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Item Showcase List Item', 'coyote'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_item_showcase'),
					'as_parent' => array('except' => 'vc_row, vc_accordion'),
					'content_element' => true,
					'category' => esc_html__('by EDGE','coyote'),
					'icon' => 'icon-wpb-showcase-list-item extended-custom-icon',
					'show_settings_on_create' => true,
					'params' => array_merge(
						\CoyoteEdgeIconCollections::get_instance()->getVCParamsArray(),
						array(
							array(
								'type'        => 'dropdown',
								'admin_label' => true,
								'heading'     => esc_html__('Item Position','coyote'),
								'param_name'  => 'item_position',
								'value'       => array(
									esc_html__('Left','coyote')  => 'left',
									esc_html__('Right','coyote') => 'right'
								),
								'save_always' => true
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Item Title','coyote'),
								'admin_label' => true,
								'param_name'  => 'item_title',
							),
							array(
								'type'        => 'textarea',
								'heading'     => esc_html__('Item Text','coyote'),
								'admin_label' => true,
								'param_name'  => 'item_text',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Item Link','coyote'),
								'param_name' => 'item_link',
								'dependency' => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type' => 'colorpicker',
								'heading' => esc_html__('Icon Color','coyote'),
								'param_name' => 'icon_color',
								'group' => esc_html__('Design Options','coyote')
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Icon Size (px)','coyote'),
								'param_name' => 'icon_size',
								'group' => esc_html__('Design Options','coyote')
							),
							array(
								'type' => 'colorpicker',
								'heading' => esc_html__('Border Color','coyote'),
								'param_name' => 'border_color',
								'description' => esc_html__('This color will affect border around icon and line down form it','coyote'),
								'group' => esc_html__('Design Options','coyote')
							),
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'item_position' => '',
			'icon_color' => '',
			'item_title' => '',
			'item_text' => '',
			'item_link' => '',
			'icon_size' => '',
			'border_color' => ''
		);

		$args = array_merge($args, coyote_edge_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		extract($params);

		$iconPackName = coyote_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

		$params['icon'] = $params[$iconPackName];
		$params['icon_attributes']['style'] =  $this->getIconStyle($params);

		$params['item_showcase_list_item_class'] = $this->getItemShowcaseListItemClass($params);
		$params['border_style'] = $this->getBordersStyle($params);


		$html = coyote_edge_get_shortcode_module_template_part('templates/item-showcase-list-item-template', 'item-showcase', '', $params);

		return $html;
	}


	/**
	 * Generates icon styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getIconStyle($params){
		$iconStylesArray = array();

		if(!empty($params['icon_color'])) {
			$iconStylesArray[] = 'color:' . $params['icon_color'];
		}

		if(!empty($params['icon_size'])) {
			$iconStylesArray[] = 'font-size:' . coyote_edge_filter_px($params['icon_size']).'px';
		}

		return implode(';', $iconStylesArray);
	}


	/**
	 * Return Item Showcase List Item Classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getItemShowcaseListItemClass($params) {
		$item_showcase_list_item_class = array();

		if ($params['item_position'] !== '') {
			$item_showcase_list_item_class[] = 'edgtf-item-'. $params['item_position'];
		}

		return implode(' ', $item_showcase_list_item_class);

	}
	/**
	 * Generates icon styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getBordersStyle($params){
		$border_style = array();

		if(!empty($params['border_color'])) {
			$border_style[] = 'color:' . $params['border_color'];
		}

		return implode(';', $border_style);
	}

}
