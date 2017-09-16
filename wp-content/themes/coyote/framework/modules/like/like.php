<?php
class CoyoteEdgeLike {

	private static $instance;

	private function __construct() {
		add_action('wp_enqueue_scripts', array( $this, 'enqueue_scripts'));
		add_action('wp_ajax_coyote_edge_like', array( $this, 'ajax'));
		add_action('wp_ajax_nopriv_coyote_edge_like', array( $this, 'ajax'));
	}

	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	function enqueue_scripts() {

		wp_enqueue_script( 'edgtf-like', EDGE_ASSETS_ROOT . '/js/like.min.js', 'jquery', '1.0', TRUE );

		wp_localize_script( 'edgtf-like', 'edgtfLike', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}

	function ajax(){

		//update
		if( isset($_POST['likes_id']) ) {

			$post_id = str_replace('edgtf-like-', '', $_POST['likes_id']);
			$post_id = substr($post_id, 0, -4);
			$type    = isset($_POST['type']) ? $_POST['type'] : '';

			echo wp_kses($this->like_post($post_id, 'update', $type), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				),
				'i' => array(
					'class' => true,
					'style' => true,
					'id' => true
				)
			));
		}

		//get
		else {
			$post_id = str_replace('edgtf-like-', '', $_POST['likes_id']);
			$post_id = substr($post_id, 0, -4);
			echo wp_kses($this->like_post($post_id, 'get'), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				),
				'i' => array(
					'class' => true,
					'style' => true,
					'id' => true
				)
			));
		}
		exit;
	}

	public function like_post($post_id, $action = 'get', $type = ''){
		if(!is_numeric($post_id)) return;

		switch($action) {

			case 'get':
				$like_count = get_post_meta($post_id, '_edgt-like', true);
				$like_text = '';

				if(isset($_COOKIE['edgtf-like_'. $post_id])){
					$icon = '<i class="icon_heart" aria-hidden="true"></i>';
				}else{
					$icon = '<i class="icon_heart_alt" aria-hidden="true"></i>';
				}
				if( !$like_count ){
					$like_count = 0;
					add_post_meta($post_id, '_edgt-like', $like_count, true);
					$icon = '<i class="icon_heart_alt" aria-hidden="true"></i>';
				}

				$like_text = '<span class="edgtf-like-text">';
				switch ($like_count) {
					case 0:
						$like_text .= esc_html__(' Likes','coyote');
						break;
					case 1:
						$like_text .= esc_html__(' Like','coyote');
						break;
					default:
						$like_text .= esc_html__(' Likes','coyote');
						break;
				}
				$like_text .= '</span>';

				$return_value = $icon . "<span>" . $like_count . $like_text .  "</span>";

				return $return_value;
				break;

			case 'update':
				$like_count = get_post_meta($post_id, '_edgt-like', true);
				$like_text = '';

				if($type != 'portfolio_list' && isset($_COOKIE['edgtf-like_'. $post_id])) {
					return $like_count;
				}

				$like_count++;

				update_post_meta($post_id, '_edgt-like', $like_count);
				setcookie('edgtf-like_'. $post_id, $post_id, time()*20, '/');

				switch ($like_count) {
					case 0:
						$like_text = esc_html__(' Likes','coyote');
						break;
					case 1:
						$like_text = esc_html__(' Like','coyote');
						break;
					default:
						$like_text = esc_html__(' Likes','coyote');
						break;
				}

				if($type != 'portfolio_list') {
					$return_value = "<i class='icon_heart' aria-hidden='true'></i><span>" . $like_count . $like_text . "</span>";

					$return_value .= '</span>';
					return $return_value;
				}

				return '';
				break;
			default:
				return '';
				break;
		}
	}

	public function add_like() {
		global $post;

		$output = $this->like_post($post->ID);

		$class = 'edgtf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'coyote');
		if( isset($_COOKIE['edgtf-like_'. $post->ID]) ){
			$class = 'edgtf-like liked';
			$title = esc_html__('You already like this!', 'coyote');
		}

		return '<a href="#" class="'. $class .'" id="edgtf-like-'. $post->ID .'-'. $rand_number.'" title="'. $title .'">'. $output .'</a>';
	}

	public function add_blog_single_like() {
		global $post;

		$output = $this->like_post($post->ID);

		$class = 'edgtf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'coyote');
		if( isset($_COOKIE['edgtf-like_'. $post->ID]) ){
			$class = 'edgtf-like liked';
			$title = esc_html__('You already like this!', 'coyote');
		}

		return '<a href="#" class="'. $class .'" data-type="blog_single" id="edgtf-like-'. $post->ID .'-'. $rand_number.'" title="'. $title .'">'. $output .'</a>';
	}

	public function add_like_portfolio_list($portfolio_project_id){

		$class = 'edgtf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'coyote');
		if( isset($_COOKIE['edgtf-like_'. $portfolio_project_id]) ){
			$class = 'edgtf-like liked';
			$title = esc_html__('You already like this!', 'coyote');
		}

		return '<a class="'. $class .'" data-type="portfolio_list" id="edgtf-like-'. $portfolio_project_id .'-'. $rand_number.'" title="'. $title .'"></a>';
	}

	public function add_like_blog_list($blog_id){

		$output = $this->like_post($blog_id);

		$class = 'edgtf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'coyote');
		if( isset($_COOKIE['edgtf-like_'. $blog_id]) ){
			$class = 'edgtf-like liked';
			$title = esc_html__('You already like this!', 'coyote');
		}

		return '<a class="hover_icon '. $class .'" data-type="portfolio_list" id="edgtf-like-'. $blog_id .'-'. $rand_number.'" title="'. $title .'">'. $output .'</a>';
	}

}

if ( !function_exists( 'coyote_edge_create_like' ) ) {

	function coyote_edge_create_like() {
		CoyoteEdgeLike::get_instance();
	}

	add_action('after_setup_theme', 'coyote_edge_create_like');
}
