<?php
namespace CoyoteEdge\Modules\Shortcodes\Counter;

use CoyoteEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Countdown
 */
class Countdown implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_countdown';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Countdown', 'coyote'),
			'base' => $this->getBase(),
			'category' => esc_html__('by EDGE', 'coyote'),
			'admin_enqueue_css' => array(coyote_edge_get_skin_uri().'/assets/css/edgtf-vc-extend.css'),
			'icon' => 'icon-wpb-countdown extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Year', 'coyote'),
					'param_name' => 'year',
					'value' => array(
						'' => '',
						'2015' => '2015',
						'2016' => '2016',
						'2017' => '2017',
						'2018' => '2018',
						'2019' => '2019',
						'2020' => '2020'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Month', 'coyote'),
					'param_name' => 'month',
					'value' => array(
						'' => '',
						esc_html__('January', 'coyote')  => '1',
						esc_html__('February', 'coyote') => '2',
						esc_html__('March', 'coyote') 	  => '3',
						esc_html__('April', 'coyote')    => '4',
						esc_html__('May', 'coyote')      => '5',
						esc_html__('June', 'coyote')     => '6',
						esc_html__('July', 'coyote')     => '7',
						esc_html__('August', 'coyote')   => '8',
						esc_html__('September', 'coyote') => '9',
						esc_html__('October', 'coyote')  => '10',
						esc_html__('November', 'coyote') => '11',
						esc_html__('December', 'coyote') => '12'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Day', 'coyote'),
					'param_name' => 'day',
					'value' => array(
						'' => '',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24',
						'25' => '25',
						'26' => '26',
						'27' => '27',
						'28' => '28',
						'29' => '29',
						'30' => '30',
						'31' => '31',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Hour', 'coyote'),
					'param_name' => 'hour',
					'value' => array(
						'' => '',
						'0' => '0',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Minute', 'coyote'),
					'param_name' => 'minute',
					'value' => array(
						'' => '',
						'0' => '0',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24',
						'25' => '25',
						'26' => '26',
						'27' => '27',
						'28' => '28',
						'29' => '29',
						'30' => '30',
						'31' => '31',
						'32' => '32',
						'33' => '33',
						'34' => '34',
						'35' => '35',
						'36' => '36',
						'37' => '37',
						'38' => '38',
						'39' => '39',
						'40' => '40',
						'41' => '41',
						'42' => '42',
						'43' => '43',
						'44' => '44',
						'45' => '45',
						'46' => '46',
						'47' => '47',
						'48' => '48',
						'49' => '49',
						'50' => '50',
						'51' => '51',
						'52' => '52',
						'53' => '53',
						'54' => '54',
						'55' => '55',
						'56' => '56',
						'57' => '57',
						'58' => '58',
						'59' => '59',
						'60' => '60',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Month Label', 'coyote'),
					'param_name' => 'month_label',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Day Label', 'coyote'),
					'param_name' => 'day_label',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Hour Label', 'coyote'),
					'param_name' => 'hour_label',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Minute Label', 'coyote'),
					'param_name' => 'minute_label',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Second Label', 'coyote'),
					'param_name' => 'second_label',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Digit Font Size (px)', 'coyote'),
					'param_name' => 'digit_font_size',
					'group' => esc_html__('Design Options','coyote'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Label Font Size (px)', 'coyote'),
					'param_name' => 'label_font_size',
					'group' => esc_html__('Design Options','coyote'),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Digit Color', 'coyote'),
					'param_name' => 'digit_color',
					'group' => esc_html__('Design Options','coyote'),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Label Color', 'coyote'),
					'param_name' => 'label_color',
					'group' => esc_html__('Design Options','coyote'),
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
	public function render($atts, $content = null)
	{

		$args = array(
			'year' => '',
			'month' => '', 
			'day' => '',
			'hour' => '',
			'minute' => '',
			'month_label' => 'Months',
			'day_label' => 'Days',
			'hour_label' => 'Hours',
			'minute_label' => 'Minutes',
			'second_label' => 'Seconds',
			'digit_font_size' => '',
			'label_font_size' => '',
			'digit_color' => '',
			'label_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['id'] = mt_rand(1000, 9999);

		$params['data_array'] = $this->getCountdownData($params);

		//Get HTML from template
		$html = coyote_edge_get_shortcode_module_template_part('templates/countdown-template', 'countdown', '', $params);

		return $html;

	}

	/**
	 * Return Countdown Data Attr
	 *
	 * @param $params
	 * @return string
	 */
	private function getCountdownData($params) {
		$data_array = array();

		if ($params['year'] !== '') {
			$data_array[] = 'data-year= '.$params['year'];
		}

		if ($params['month'] !== '') {
			$data_array[] = 'data-month= '.$params['month'];
		}

		if ($params['day'] !== '') {
			$data_array[] = 'data-day= '.$params['day'];
		}

		if ($params['hour'] !== '') {
			$data_array[] = 'data-hour= '.$params['hour'];
		}

		if ($params['minute'] !== '') {
			$data_array[] = 'data-minute= '.$params['minute'];
		}

		$data_array[] = 'data-timezone= '.get_option('gmt_offset');

		if ($params['month_label'] !== '') {
			$data_array[] = 'data-month-label= '.$params['month_label'];
		}

		if ($params['day_label'] !== '') {
			$data_array[] = 'data-day-label= '.$params['day_label'];
		}

		if ($params['hour_label'] !== '') {
			$data_array[] = 'data-hour-label= '.$params['hour_label'];
		}

		if ($params['minute_label'] !== '') {
			$data_array[] = 'data-minute-label= '.$params['minute_label'];
		}

		if ($params['second_label'] !== '') {
			$data_array[] = 'data-second-label= '.$params['second_label'];
		}

		if ($params['digit_font_size'] !== '') {
			$data_array[] = 'data-digit-size= '.$params['digit_font_size'];
		}

		if ($params['label_font_size'] !== '') {
			$data_array[] = 'data-label-size= '.$params['label_font_size'];
		}

		if ($params['digit_color'] !== '') {
			$data_array[] = 'data-digit-color= '.$params['digit_color'];
		}

		if ($params['label_color'] !== '') {
			$data_array[] = 'data-label-color= '.$params['label_color'];
		}

		return implode(' ', $data_array);
	}
}