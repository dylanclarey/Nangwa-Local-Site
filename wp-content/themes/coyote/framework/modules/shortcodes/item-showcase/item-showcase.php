<?php
namespace CoyoteEdge\Modules\Shortcodes\ItemShowcase;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ItemShowcase
 */
class ItemShowcase implements ShortcodeInterface	{
	private $base; 
	
	function __construct() {
		$this->base = 'edgtf_item_showcase';

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
			'name' => esc_html__('Item Showcase', 'coyote'),
			'base' => $this->base,
			'category' => esc_html__('by EDGE','coyote'),
			'icon' => 'icon-wpb-showcase extended-custom-icon',
            'as_parent' => array('only' => 'edgtf_item_showcase_list_item'),
            'js_view' => 'VcColumnView',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => 'Image',
                    'param_name' => 'item_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => 'Image Top Offset',
                    'admin_label' => true,
                    'value' => '0',
                    'save_always' => true,
                    'param_name' => 'image_top_offset',
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'item_image'    => '',
            'image_top_offset' => '',
        );

		$params = shortcode_atts($args, $atts);

        extract($params);

        $html = '';

        $item_showcase_classes = array();
        $item_showcase_classes[] = 'clearfix edgtf-item-showcase';
        $item_showcase_class = implode(' ', $item_showcase_classes);

        $item_image_style = '';
        $item_image_style .= 'margin-top:' . coyote_edge_filter_px($image_top_offset) . 'px;';

        $html .= '<div '. coyote_edge_get_class_attribute($item_showcase_class) . '>';
            $html .= '<div class="edgtf-item-image" '. coyote_edge_get_inline_style($item_image_style)  .'>';
	        	$html .= '<div class="edgtf-it-image-table">';
		        	$html .= '<div class="edgtf-it-image-table-cell">';
			        	$html .= '<div class="edgtf-it-image-content">';
			                if ($item_image != '') {
			                    $html .= wp_get_attachment_image($item_image,'full');
			                }
			            $html .= '</div>';
			        $html .= '</div>';
		        $html .= '</div>';
	        $html .= '</div>';
            $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;

	}

}