<?php
namespace CoyoteEdge\Modules\Shortcodes\ImageGallery;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_image_gallery';

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
	 */
	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('Image Gallery', 'coyote'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by EDGE', 'coyote'),
			'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_images',
					'heading'		=> esc_html__('Images', 'coyote'),
					'param_name'	=> 'images',
					'description'	=> esc_html__('Select images from media library', 'coyote')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Gallery Type', 'coyote'),
					'admin_label' => true,
					'param_name'  => 'type',
					'value'       => array(
						esc_html__('Slider', 'coyote')		=> 'slider',
						esc_html__('Carousel', 'coyote')	=> 'carousel',
						esc_html__('Image Grid', 'coyote')	=> 'image_grid',
						esc_html__('Masonry', 'coyote')	=> 'masonry',
						esc_html__('Pinterest', 'coyote')	=> 'pinterest',
					),
					'description' => esc_html__('Select gallery type', 'coyote'),
					'save_always' => true
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Image Size', 'coyote'),
					'param_name'	=> 'image_size',
					'description'	=> esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'coyote'),
					'dependency'	=> array('element' => 'type', 'value' => array('slider','image_grid','carousel'))
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide duration', 'coyote'),
					'admin_label'	=> true,
					'param_name'	=> 'autoplay',
					'value'			=> array(
						'3'			=> '3',
						'5'			=> '5',
						'10'		=> '10',
						esc_html__('Disable','coyote')	=> 'disable'
					),
					'save_always'	=> true,
					'dependency'	=> array('element'	=> 'type','value'=> array('slider','carousel')),
					'description' => esc_html__('Auto rotate slides each X seconds', 'coyote'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide Animation', 'coyote'),
					'admin_label'	=> true,
					'param_name'	=> 'slide_animation',
					'value'			=> array(
						esc_html__('Slide', 'coyote')	=> 'slide',
						esc_html__('Fade','coyote')	=> 'fade'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Column Number', 'coyote'),
					'param_name'	=> 'column_number',
					'value'			=> array(2, 3, 4, 5),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' 	=> 'type',
						'value'		=> array(
							'image_grid',
							'masonry',
							'pinterest'
						)
					),
				),
                array(
                    'type'           => 'dropdown',
                    'heading'        => esc_html__('Spaces between images','coyote'),
                    'param_name'     => 'images_space',
                    'value'          => array(
                        esc_html__('Yes','coyote') => 'yes',
                        esc_html__('No','coyote') => 'no',
                    ),
                    'dependency'     => array(
                        'element'    => 'type',
                        'value'      => array(
                            'image_grid',
                            'carousel',
                            'masonry',
							'pinterest'
                        )
                    )
                ),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Open PrettyPhoto on click', 'coyote'),
					'param_name'	=> 'pretty_photo',
					'value'			=> array(
						esc_html__('No', 'coyote')		=> 'no',
						esc_html__('Yes', 'coyote')	=> 'yes'
					),
					'save_always'	=> true,
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Grayscale Images', 'coyote'),
					'param_name' => 'grayscale',
					'value' => array(
						esc_html__('No', 'coyote') => 'no',
						esc_html__('Yes', 'coyote') => 'yes'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid',
                            'masonry',
							'pinterest'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Navigation Arrows', 'coyote'),
					'param_name' 	=> 'navigation',
					'value' 		=> array(
						esc_html__('Default', 'coyote') => '',
						esc_html__('Yes', 'coyote') => 'yes',
						esc_html__('No', 'coyote')	=> 'no'
					),
					'dependency' 	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Navigation Arrows Position', 'coyote'),
					'param_name' 	=> 'navigation_position',
					'value' 		=> array(
						esc_html__('Default', 'coyote') => '',
						esc_html__('Above Images', 'coyote') => 'above-images',
						esc_html__('In the Middle', 'coyote')	=> 'middle',
						esc_html__('In the Bottom', 'coyote')	=> 'bottom',
					),
					'dependency' 	=> array(
						'element' => 'navigation',
						'value' => array(
							'yes',
							''
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Navigation Arrows Skin', 'coyote'),
					'param_name' 	=> 'navigation_skin',
					'value' 		=> array(
						esc_html__('Default', 'coyote') => '',
						esc_html__('Light', 'coyote') => 'light',
						esc_html__('Dark', 'coyote')	=> 'dark'
					),
					'dependency' 	=> array(
						'element' => 'navigation',
						'value' => array(
							'yes',
							''
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Pagination', 'coyote'),
					'param_name' 	=> 'pagination',
					'value' 		=> array(
						esc_html__('Default', 'coyote') => '',
						esc_html__('Yes', 'coyote') => 'yes',
						esc_html__('No', 'coyote')	=> 'no',
					),
					'dependency'	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel'
						)
					)
				)
			)
		));

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
			'images'			=> '',
			'image_size'		=> 'thumbnail',
			'type'				=> 'slider',
			'autoplay'			=> '5000',
			'slide_animation'	=> 'slide',
			'images_space'		=> 'yes',
			'pretty_photo'		=> '',
			'column_number'		=> '',
			'grayscale'			=> '',
			'navigation'		=> 'yes',
			'navigation_position' => 'middle',
			'navigation_skin' 	=> '',
			'pagination'		=> 'no'
		);

		$params = shortcode_atts($args, $atts);
		$params['slider_data'] = $this->getSliderData($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		$params['classes'] = $this->getClasses($params);

		$template = $this->getTemplatePath($params);

		$html = coyote_edge_get_shortcode_module_template_part('templates/' . $template, 'imagegallery', '', $params);

		return $html;

	}


	/**
	 * Return part of template path for gallery
	 *
	 * @param $params
	 * @return string
	 */
	private function getTemplatePath($params){
		$type = $params['type'];
		$template = '';

		switch ($type) {
			case 'image_grid':
				$template = 'gallery-grid';
				break;
			case 'slider':
			case 'carousel':
				$template = 'gallery-slider';
				break;
			case 'masonry':
			case 'pinterest':
				$template = 'gallery-masonry';
				break;
			default:
				$template = 'gallery-slider';
				break;
		}

		return $template;
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image['class'] = '';
			if ($params['type'] == 'masonry') {
		        $size = get_post_meta($id,'_gallery_masonry_image_size', true);
		        $size = ($size)?$size:'edgtf-default-masonry-item';
		        switch($size){
			        case 'edgtf-large-height-masonry-item' :
				        $img_size = 'coyote_edge_large_height';
				        $image['class'] = 'edgtf-size-portrait';
				        break;
			        case 'edgtf-large-width-masonry-item' :
				        $img_size = 'coyote_edge_large_width';
				        $image['class'] = 'edgtf-size-landscape';
				        break;
			        case 'edgtf-large-width-height-masonry-item' :
				        $img_size = 'coyote_edge_large_width_height';
				        $image['class'] = 'edgtf-size-big-square';
				        break;
			        default:
				        $img_size = 'coyote_edge_square';
				        $image['class'] = 'edgtf-size-square';
				        break;
		        }
			}
			else{
				$img_size = 'full';
				$image['class'] = 'edgtf-size-default';
			}
			$image_original = wp_get_attachment_image_src($id, $img_size);
			$image['masonry_size'] = $img_size;
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			$image['link'] = get_post_meta($id,'_attachment_image_custom_link', true);
			$image['link_target'] = get_post_meta($id,'_attachment_image_link_target', true);

			if ($image['link_target'] == ''){
				$image['link_target'] = '_self';
			}

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
					$matches[0][0],
					$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-animation'] = ($params['slide_animation'] !== '') ? $params['slide_animation'] : '';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;

	}

    /**
     * Generates css classes
     *
     * @param $params
     *
     * @return string
     */
    private function getClasses($params){    	
		$type = $params['type'];
		$classes = array();

		switch ($type) {
			case 'image_grid':
				$classes[] = 'edgtf-image-gallery-grid';
				$classes[] = 'clearfix';				
				break;
			case 'slider':
				$classes[] = 'edgtf-gallery-image-slider';
				$classes[] = 'edgtf-image-gallery-sliding';
				break;
			case 'carousel':
        		$classes[] = 'edgtf-gallery-image-carousel';
				$classes[] = 'edgtf-image-gallery-sliding';
				break;
			case 'masonry':
        		$classes[] = 'edgtf-image-gallery-masonry';
        		$classes[] = 'edgtf-masonry-image-size-set';
				break;
			case 'pinterest':
        		$classes[] = 'edgtf-image-gallery-masonry';
				break;
			default:
				$classes[] = 'edgtf-gallery-image-slider';
				$classes[] = 'edgtf-image-gallery-sliding';
				break;
		}

		if ($type !== 'slider'){

			if ($params['images_space'] == 'no'){
			    $classes[] = 'edgtf-gallery-no-space';
			}
			else{
			    $classes[] = 'edgtf-gallery-with-space';
			}

		}

		if ( in_array( $type, array('slider','carousel') ) ) {
			if ($params['navigation_position'] !== ''){
				$classes[] = 'edgtf-igs-nav-pos-'.$params['navigation_position'];
			}

			if ($params['navigation_skin'] !== ''){
				$classes[] = 'edgtf-igs-nav-skin-'.$params['navigation_skin'];				
			}
		}

		if ( in_array( $type, array('image_grid','masonry','pinterest') ) ) {

			if ($params['grayscale'] == 'yes'){
			    $classes[] = 'edgtf-grayscale';
			}

			$classes[] = 'edgtf-gallery-columns-' . $params['column_number'];
		}

		return implode(' ', $classes);
    }

}