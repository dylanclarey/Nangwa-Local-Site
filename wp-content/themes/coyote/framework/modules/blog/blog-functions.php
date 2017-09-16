<?php
if( !function_exists('coyote_edge_get_blog') ) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function coyote_edge_get_blog($type) {

		$sidebar = coyote_edge_sidebar_layout();

		$params = array(
			"blog_type" => $type,
			"sidebar" => $sidebar
		);
		coyote_edge_get_module_template_part('templates/lists/holder', 'blog', '', $params);
	}

}

if( !function_exists('coyote_edge_get_blog_type') ) {

	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */

	function coyote_edge_get_blog_type($type) {
		
		$blog_query = coyote_edge_get_blog_query();
		
		$paged = coyote_edge_paged();
		$blog_classes = '';

		if(coyote_edge_options()->getOptionValue('blog_page_range') != ""){
			$blog_page_range = esc_attr(coyote_edge_options()->getOptionValue('blog_page_range'));
		} else{
			$blog_page_range = $blog_query->max_num_pages;
		}
		$show_load_more = coyote_edge_enable_load_more();
		
		if($show_load_more){
			$blog_classes .= ' edgtf-blog-load-more';
		}

		$params = array(
			'blog_query' => $blog_query,
			'paged' => $paged,
			'blog_page_range' => $blog_page_range,
			'blog_type' => $type,
			'blog_classes' => $blog_classes,
		);

		coyote_edge_get_module_template_part('templates/lists/' .  $type, 'blog', '', $params);
	}

}

if(!function_exists('coyote_edge_get_blog_query')){
	/**
	* Function which create query for blog lists
	*
	* @return wp query object
	*/
	function coyote_edge_get_blog_query(){
		global $wp_query;
		
		$id = coyote_edge_get_page_id();
		$category = esc_attr(get_post_meta($id, "edgtf_blog_category_meta", true));
		if(esc_attr(get_post_meta($id, "edgtf_show_posts_per_page_meta", true)) != ""){
			$post_number = esc_attr(get_post_meta($id, "edgtf_show_posts_per_page_meta", true));
		}else{			
			$post_number = esc_attr(get_option('posts_per_page'));
		} 
		
		$paged = coyote_edge_paged();
		$query_array = array(
			'post_type' => 'post',
			'paged' => $paged,
			'cat' 	=> $category,
			'posts_per_page' => $post_number
		);
		if(is_archive()){
			$blog_query = $wp_query;
		}else{
			$blog_query = new WP_Query($query_array);
		}
		return $blog_query;
		
	}
}

if(!function_exists('coyote_edge_get_post_format')){
	/**
	* Function which return post format of post
	*
	* @return string
	*/
	function coyote_edge_get_post_format($type){

		$post_format = get_post_format();

		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');


		if($type == 'masonry-gallery'){

			$standard_post_formats	= array('audio', 'video', 'standard', 'gallery');
			$custom_post_formats	= array('link','quote');

			if(in_array($post_format,$custom_post_formats)) {
				$post_format = $post_format;
			} elseif(in_array($post_format,$standard_post_formats)) {
				$post_format = 'standard';
			} else {
				$post_format = 'standard';
			}

		}

		return $post_format;
	}
}

if( !function_exists('coyote_edge_get_post_format_html') ) {

	/**
	 * Function which return html for post formats
	 * @param $type
	 * @return post hormat template
	 */

	function coyote_edge_get_post_format_html($type = "", $ajax = '') {

		$post_format = coyote_edge_get_post_format($type);

		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
		if(in_array($post_format,$supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		$slug = '';
		if($type !== ""){
			$slug = $type;
		}

		$params = array();
		$params['read_more'] = 'no';
		$params['background_image'] = '';
		$params['type'] = $type;
		$params['show_author'] = 'yes';
		$params['show_category'] = 'yes';

		$chars_array = coyote_edge_blog_lists_number_of_chars();
		if(isset($chars_array[$type])) {
			$params['excerpt_length'] = $chars_array[$type];
		} else {
			$params['excerpt_length'] = '';
		}

		if($type == 'masonry' || $type == 'masonry-full-width'){
			$params['read_more'] = 'yes';
		}

		if ($type == 'masonry' || $type == 'masonry-full-width'){
			$params['show_author'] = 'no';
			$params['show_category'] = 'no';
		}


		if($type == 'masonry-gallery'){
			$size = 'default';

			if (get_post_meta(get_the_ID(), 'edgtf_blog_masonry_gallery_dimensions', true) !== '') {
				$size = get_post_meta(get_the_ID(), 'edgtf_blog_masonry_gallery_dimensions', true);
			}
			$params['post_class'] = array('edgtf-post-size-'. $size);

			$params['image_size'] =  coyote_edge_get_masonry_gallery_image_size(get_the_ID(), $size);
		}

		if (has_post_thumbnail()){
			$params['background_image'] = 'background-image: url('.get_the_post_thumbnail_url(get_the_ID(),'full').')';
		}

		if($ajax == ''){
			coyote_edge_get_module_template_part('templates/lists/post-formats/' . $post_format, 'blog', $slug, $params);
		}
		if($ajax == 'yes'){
			return coyote_edge_get_blog_module_template_part('templates/lists/post-formats/' . $post_format, $slug, $params);
		}

	}

}

if( !function_exists('coyote_edge_get_masonry_gallery_image_size') ) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function coyote_edge_get_masonry_gallery_image_size($post_id, $size) {

		$image_size = 'coyote_edge_square';

		switch($size):

			case 'large-width':
				$image_size = 'coyote_edge_large_width';
				break;
			case 'large-height':
				$image_size = 'coyote_edge_large_height';
				break;
			case 'large-width-height':
				$image_size = 'coyote_edge_large_width_height';
				break;
		endswitch;

		return $image_size;
	}

}

if( !function_exists('coyote_edge_get_default_blog_list') ) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function coyote_edge_get_default_blog_list() {

		$blog_list = coyote_edge_options()->getOptionValue('blog_list_type');
		return $blog_list;

	}

}


if (!function_exists('coyote_edge_pagination')) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */

	function coyote_edge_pagination($pages = '', $range = 4, $paged = 1){

		$showitems = $range+1;

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}
		
		$show_load_more = coyote_edge_enable_load_more();
		$masonry_template = coyote_edge_is_masonry_template();
		
		$search_template = 'no';
		if(is_search()){
			$search_template = 'yes';
		}
		
		
		if($pages != 1){
			if($show_load_more == 'yes'  && $search_template !== 'yes' && !$masonry_template){
				$params = array(
					'text' => esc_html__('Load More', 'coyote')
				);
				echo '<div class="edgtf-load-more-ajax-pagination">';
				echo coyote_edge_get_button_html($params);
				echo '</div>';
			}else{
				echo '<div class="edgtf-pagination-holder">';
				echo '<div class="edgtf-pagination">';
				echo '<ul>';
					if($paged > 2 && $paged > $range+1 && $showitems < $pages){
						echo '<li class="edgtf-pagination-first-page"><a href="'.esc_url(get_pagenum_link(1)).'"><span class="lnr lnr-chevron-left"></span><span class="lnr lnr-chevron-left"></span></a></li>';
					}
					echo '<li class="edgtf-pagination-prev';
					if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
						echo ' edgtf-pagination-prev-first';
					}
					echo '"><a href="'.esc_url(get_pagenum_link($paged - 1)).'"><span class="lnr lnr-chevron-left"></span></a></li>';

					for ($i=1; $i <= $pages; $i++){
						if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
							echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
						}
					}

					echo '<li class="edgtf-pagination-next';
					if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
						echo ' edgtf-pagination-next-last';
					}
					echo '"><a href="';
					if($pages > $paged){
						echo esc_url(get_pagenum_link($paged + 1));
					} else {
						echo esc_url(get_pagenum_link($paged));
					}
					echo '"><span class="lnr lnr-chevron-right"></span></a></li>';
					if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
						echo '<li class="edgtf-pagination-last-page"><a href="'.esc_url(get_pagenum_link($pages)).'"><span class="lnr lnr-chevron-right"></span><span class="lnr lnr-chevron-right"></span></a></li>';
					}
				echo '</ul>';
				echo "</div>";
				echo "</div>";
			}
		}
	}
}

if(!function_exists('coyote_edge_post_info')){
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 */
	function coyote_edge_post_info($config, $slug = ''){
		$default_config = array(
			'date' => '',
			'category' => '',
			'author' => '',
			'comments' => '',
			'like' => '',
			'share' => ''
		);

		extract(shortcode_atts($default_config, $config));

		if($date == 'yes'){
			coyote_edge_get_module_template_part('templates/parts/post-info-date', 'blog');
		}
		if($author == 'yes'){
			coyote_edge_get_module_template_part('templates/parts/post-info-author', 'blog');
		}
		if($category == 'yes'){
			coyote_edge_get_module_template_part('templates/parts/post-info-category', 'blog');
		}

		if($comments == 'yes'){
			coyote_edge_get_module_template_part('templates/parts/post-info-comments', 'blog', $slug);
		}
		if($like == 'yes'){
			coyote_edge_get_module_template_part('templates/parts/post-info-like', 'blog', $slug);
		}
		if($share == 'yes'){
			coyote_edge_get_module_template_part('templates/parts/post-info-share', 'blog');
		}
	}
}

if(!function_exists('coyote_edge_excerpt')) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in edgt_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function coyote_edge_excerpt($excerpt_length = '') {
		global $post;

		if(post_password_required()) {
			echo get_the_password_form();
		}

		//does current post has read more tag set?
		elseif(coyote_edge_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content(true);
		}

		//is word count set to something different that 0?
		elseif($excerpt_length != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = '45';
			if(isset($excerpt_length) && $excerpt_length != ""){
				$word_count = $excerpt_length;

			} elseif(coyote_edge_options()->getOptionValue('number_of_chars') != '') {
				$word_count = esc_attr(coyote_edge_options()->getOptionValue('number_of_chars'));
			}
			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
			$clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode (' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);

				//add exerpt postfix
				$excert_postfix		= apply_filters('coyote_edge_excerpt_postfix', '...');

				//and finally implode words together
				$excerpt 			= implode (' ', $excerpt_word_array).$excert_postfix;

				//is excerpt different than empty string?
				if($excerpt !== '') {
					echo '<p class="edgtf-post-excerpt">'.wp_kses_post($excerpt).'</p>';
				}
			}
		}
	}
}

if(!function_exists('coyote_edge_get_blog_single')) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function coyote_edge_get_blog_single() {
		$sidebar = coyote_edge_sidebar_layout();

		$params = array(
			"sidebar" => $sidebar
		);

		coyote_edge_get_module_template_part('templates/single/holder', 'blog', '', $params);
	}
}

if( !function_exists('coyote_edge_get_single_html') ) {

	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */

	function coyote_edge_get_single_html() {

		$post_format = get_post_format();
		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
		if(in_array($post_format,$supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		//Related posts
		$related_posts_params = array();
		$show_related = (coyote_edge_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
		if ($show_related) {
			$hasSidebar = coyote_edge_sidebar_layout();
			$post_id = get_the_ID();
			$related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? 4 : 3;
			$related_posts_options = array(
				'posts_per_page' => $related_post_number
			);
			$related_posts_params = array(
				'related_posts' => coyote_edge_get_related_post_type($post_id, $related_posts_options)
			);
		}

		coyote_edge_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog');
		coyote_edge_get_module_template_part('templates/single/parts/single-navigation', 'blog');

		coyote_edge_get_module_template_part('templates/single/parts/author-info', 'blog');
		if ($show_related) {
			coyote_edge_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
		}
		comments_template('', true);
	}

}
if( !function_exists('coyote_edge_container_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function coyote_edge_container_additional_post_items() {

		$query = coyote_edge_get_blog_query();

		if(get_page_template_slug(coyote_edge_get_page_id()) == 'blog-standard.php' || get_page_template_slug(coyote_edge_get_page_id()) == 'blog-split.php' || ((is_home() || (is_archive() && !coyote_edge_is_woocommerce_page())) && coyote_edge_options()->getOptionValue('blog_list_type') == 'standard')) {
			if (coyote_edge_options()->getOptionValue('pagination') == 'yes') {
				coyote_edge_pagination($query->max_num_pages, coyote_edge_get_blog_page_range($query), coyote_edge_paged());
			}
		}
		if(get_page_template_slug(coyote_edge_get_page_id()) == 'blog-masonry.php' || ((is_home() || (is_archive() && !coyote_edge_is_woocommerce_page())) && coyote_edge_options()->getOptionValue('blog_list_type') == 'masonry')) {
			$pagination_type = coyote_edge_options()->getOptionValue('masonry_pagination');
			if (coyote_edge_options()->getOptionValue('pagination') == 'yes' && ($pagination_type != 'load-more' && $pagination_type != 'infinite-scroll')) {
				coyote_edge_pagination($query->max_num_pages, coyote_edge_get_blog_page_range($query), coyote_edge_paged());
			}
		}
	}
	add_action('coyote_edge_after_container_close', 'coyote_edge_container_additional_post_items');
}

if( !function_exists('coyote_edge_full_width_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function coyote_edge_full_width_additional_post_items() {

		$query = coyote_edge_get_blog_query();

		if(get_page_template_slug(coyote_edge_get_page_id()) == 'blog-masonry-full-width.php'|| ((is_home() || is_archive()) && coyote_edge_options()->getOptionValue('blog_list_type') == 'blog-masonry-full-width')) {
			$pagination_type = coyote_edge_options()->getOptionValue('masonry_pagination');
			if (coyote_edge_options()->getOptionValue('pagination') == 'yes' && ($pagination_type != 'load-more' && $pagination_type != 'infinite-scroll')) {
				coyote_edge_pagination($query->max_num_pages, coyote_edge_get_blog_page_range($query), coyote_edge_paged());
			}
		}

		if(get_page_template_slug(coyote_edge_get_page_id()) == 'blog-masonry-gallery.php') {
			$pagination_type = coyote_edge_options()->getOptionValue('masonry_gallery_pagination');
			if (coyote_edge_options()->getOptionValue('pagination') == 'yes' && $pagination_type == 'standard' && $query->max_num_pages != 1) { ?>
				<div class="edgtf-container edgtf-container-bottom-navigation">
					<?php coyote_edge_pagination($query->max_num_pages, coyote_edge_get_blog_page_range($query), coyote_edge_paged()); ?>
				</div>
			<?php }
		}
	}
	add_action('coyote_edge_after_full_width_container_close', 'coyote_edge_full_width_additional_post_items');
}


if (!function_exists('coyote_edge_comment')) {

	/**
	 * Function which modify default WordPress comments
	 *
	 * @return comments html
	 */

	function coyote_edge_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment  = $post->post_author == $comment->user_id;

		$comment_class = 'edgtf-comment clearfix';

		if($is_author_comment) {
			$comment_class .= ' edgtf-post-author-comment';
		}

		if($is_pingback_comment) {
			$comment_class .= ' edgtf-pingback-comment';
		}

		?>

		<li <?php comment_class(); ?>>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if(!$is_pingback_comment) { ?>
				<div class="edgtf-comment-image"> <?php echo coyote_edge_kses_img(get_avatar($comment, 75)); ?> </div>
			<?php } ?>
			<div class="edgtf-comment-text">
				<div class="edgtf-comment-info">
					<h5 class="edgtf-comment-name">
						<?php if($is_pingback_comment) { esc_html_e('Pingback:', 'coyote'); } ?>
						<?php echo wp_kses_post(get_comment_author_link()); ?>
						<?php if($is_author_comment) { ?>
							<i class="fa fa-user post-author-comment-icon"></i>
						<?php } ?>
					</h5>
					<span class="edgtf-comment-date"><?php comment_time(get_option('date_format')); ?> <?php comment_time(get_option('time_format')); ?></span>
				</div>
			<?php if(!$is_pingback_comment) { ?>
				<div class="edgtf-text-holder" id="comment-<?php echo comment_ID(); ?>">
					<?php comment_text(); ?>
				</div>
			<?php } ?>
			<div class="edgtf-reply-edit-holder">
				<?php
				edit_comment_link();
				comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) );
				?>
			</div>
            <div class="edgtf-separator-holder clearfix edgtf-separator-left">
                <div class="edgtf-separator"></div>
            </div>
		</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>

		<?php
	}
}

if( !function_exists('coyote_edge_blog_archive_pages_classes') ) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */

	function coyote_edge_blog_archive_pages_classes($blog_type) {

		$classes = array();
		if(in_array($blog_type, coyote_edge_blog_full_width_types())){
			$classes['holder'] = 'edgtf-full-width';
			$classes['inner'] = 'edgtf-full-width-inner';
		} elseif(in_array($blog_type, coyote_edge_blog_grid_types())){
			$classes['holder'] = 'edgtf-container';
			$classes['inner'] = 'edgtf-container-inner clearfix';
		}

		return $classes;

	}

}

if( !function_exists('coyote_edge_blog_full_width_types') ) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */

	function coyote_edge_blog_full_width_types() {

		$types = array('masonry-full-width','masonry-gallery');

		return $types;

	}

}

if( !function_exists('coyote_edge_blog_grid_types') ) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function coyote_edge_blog_grid_types() {

		$types = array('standard', 'masonry', 'standard-whole-post','split');

		return $types;

	}

}

if( !function_exists('coyote_edge_blog_types') ) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */

	function coyote_edge_blog_types() {

		$types = array_merge(coyote_edge_blog_grid_types(), coyote_edge_blog_full_width_types());

		return $types;

	}

}

if( !function_exists('coyote_edge_blog_templates') ) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */

	function coyote_edge_blog_templates() {

		$templates = array();
		$grid_templates = coyote_edge_blog_grid_types();
		$full_templates = coyote_edge_blog_full_width_types();
		foreach($grid_templates as $grid_template){
			array_push($templates, 'blog-'.$grid_template);
		}
		foreach($full_templates as $full_template){
			array_push($templates, 'blog-'.$full_template);
		}

		return $templates;

	}

}

if( !function_exists('coyote_edge_blog_lists_number_of_chars') ) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */

	function coyote_edge_blog_lists_number_of_chars() {

		$number_of_chars = array();

		if(coyote_edge_options()->getOptionValue('standard_number_of_chars')) {
			$number_of_chars['standard'] = coyote_edge_options()->getOptionValue('standard_number_of_chars');
		}
		if(coyote_edge_options()->getOptionValue('masonry_number_of_chars')) {
			$number_of_chars['masonry'] = coyote_edge_options()->getOptionValue('masonry_number_of_chars');
		}

		return $number_of_chars;

	}

}

if (!function_exists('coyote_edge_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 * @param $length int original value
	 * @return int changed value
	 */
	function coyote_edge_excerpt_length( $length ) {

		if(coyote_edge_options()->getOptionValue('number_of_chars') !== ''){
			return esc_attr(coyote_edge_options()->getOptionValue('number_of_chars'));
		} else {
			return 45;
		}
	}

	add_filter( 'excerpt_length', 'coyote_edge_excerpt_length', 999 );
}

if (!function_exists('coyote_edge_excerpt_more')) {
	/**
	 * Function that adds three dotes on the end excerpt
	 * @param $more
	 * @return string
	 */
	function coyote_edge_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'coyote_edge_excerpt_more');
}

if(!function_exists('coyote_edge_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function coyote_edge_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if(!function_exists('coyote_edge_post_has_title')) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function coyote_edge_post_has_title() {
		return get_the_title() !== '';
	}
}

if (!function_exists('coyote_edge_modify_read_more_link')) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function coyote_edge_modify_read_more_link() {
		$link = '<div class="edgtf-more-link-container">';

		if (shortcode_exists('edgtf_button')) {
			$link .= coyote_edge_get_button_html(array(
				'link' => get_permalink().'#more-'.get_the_ID(),
				'text' => esc_html__('Continue reading', 'coyote')
			));
		} else {
			$link .= '<a href="'.get_permalink().'#more-'.get_the_ID().'" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid"><span class="edgtf-btn-text">'.esc_html__('Continue reading', 'coyote').'</span></a>';
		}

		$link .= '</div>';

		return $link;
	}

	add_filter( 'the_content_more_link', 'coyote_edge_modify_read_more_link');
}


if(!function_exists('coyote_edge_has_blog_widget')) {
	/**
	 * Function that checks if latest posts widget is added to widget area
	 * @return bool
	 */
	function coyote_edge_has_blog_widget() {
		$widgets_array = array(
			'edgt_latest_posts_widget'
		);

		foreach ($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('coyote_edge_has_blog_shortcode')) {
	/**
	 * Function that checks if any of blog shortcodes exists on a page
	 * @return bool
	 */
	function coyote_edge_has_blog_shortcode() {
		$blog_shortcodes = array(
			'edgtf_blog_list',
			'edgtf_blog_slider',
			'edgtf_blog_carousel'
		);

		$slider_field = get_post_meta(coyote_edge_get_page_id(), 'edgtf_page_slider_meta', true); //TODO change

		foreach ($blog_shortcodes as $blog_shortcode) {
			$has_shortcode = coyote_edge_has_shortcode($blog_shortcode) || coyote_edge_has_shortcode($blog_shortcode, $slider_field);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}


if(!function_exists('coyote_edge_load_blog_assets')) {
	/**
	 * Function that checks if blog assets should be loaded
	 *
	 * @see is_home()
	 * @see is_single()
	 * @see edgt_has_blog_shortcode()
	 * @see is_archive()
	 * @see is_search()
	 * @see edgt_has_blog_widget()
	 * @return bool
	 */
	function coyote_edge_load_blog_assets() {
		return coyote_edge_is_blog_template() || is_home() || is_single() || coyote_edge_has_blog_shortcode() || is_archive() || is_search() || coyote_edge_has_blog_widget();
	}
}

if(!function_exists('coyote_edge_is_blog_template')) {
	/**
	 * Checks if current template page is blog template page.
	 *
	 *@param string current page. Optional parameter.
	 *
	 *@return bool
	 *
	 * @see coyote_edge_get_page_template_name()
	 */
	function coyote_edge_is_blog_template($current_page = '') {

		if($current_page == '') {
			$current_page = coyote_edge_get_page_template_name();
		}

		$blog_templates = coyote_edge_blog_templates();

		return in_array($current_page, $blog_templates);
	}
}

if(!function_exists('coyote_edge_read_more_button')) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function coyote_edge_read_more_button($option = '', $class = '') {
		if($option != '') {
			$show_read_more_button = coyote_edge_options()->getOptionValue($option) == 'yes';
		}else {
			$show_read_more_button = 'yes';
		}
		if($show_read_more_button && !coyote_edge_post_has_read_more() && !post_password_required()) {
			echo coyote_edge_get_button_html(array(
				'size'         => 'small',
				'link'         => get_the_permalink(),
				'text'         => esc_html__('Read More', 'coyote'),
				'custom_class' => $class
			));
		}
	}
}

if(!function_exists('coyote_edge_set_blog_holder_data_params')){
	/**
	 * Function which set data params on blog holder div
	 */
	function coyote_edge_set_blog_holder_data_params(){
		
		$show_load_more = coyote_edge_enable_load_more();
		if($show_load_more){
			$current_query = coyote_edge_get_blog_query();
			
			$data_params = array();
			$data_return_string = '';
			
			$paged = coyote_edge_paged();
			
			$posts_number =  '';
			if(get_post_meta(get_the_ID(), "edgtf_show_posts_per_page_meta", true) != ""){
				$posts_number = get_post_meta(get_the_ID(), "edgtf_show_posts_per_page_meta", true);
			}else{			
				$posts_number = get_option('posts_per_page');
			} 
			$category = get_post_meta(coyote_edge_get_page_id(), 'edgtf_blog_category_meta', true);
			
			
			//set data params
			$data_params['data-next-page'] = $paged+1;
			$data_params['data-max-pages'] =  $current_query->max_num_pages;

			if($posts_number !=''){
				$data_params['data-post-number'] = $posts_number;
			}

			if($category !=''){
				$data_params['data-category'] = $category;
			}
			if(is_archive()){
				if(is_category()){
					$cat_id = get_queried_object_id();
					$data_params['data-archive-category'] = $cat_id;
				}
				if(is_author()){
					$author_id = get_queried_object_id();
					$data_params['data-archive-author'] = $author_id;
 				}
				if(is_tag()){
					$current_tag_id = get_queried_object_id();
					$data_params['data-archive-tag'] = $current_tag_id;
				}
				if(is_date()){
					$day  = get_query_var('day');
					$month = get_query_var('monthnum');
					$year = get_query_var('year');
					
					$data_params['data-archive-day'] = $day;
					$data_params['data-archive-month'] = $month;
					$data_params['data-archive-year'] = $year;
				}				
			}
			if(is_search()){
				$search_query = get_search_query();
				$data_params['data-archive-search-string'] = $search_query; // to do, not finished
			}
			
			foreach($data_params as $key => $value) {
				if($key !== '') {
					$data_return_string .= $key.'= '.esc_attr($value).' ';
				}
			}
			
			return $data_return_string;
			
		}
	}
}

if(!function_exists('coyote_edge_enable_load_more')){
	/**
	 * Function that check if load more is enabled
	 * 
	 * return boolean
	 */
	function coyote_edge_enable_load_more(){
		$enable_load_more = false;
		
		if(coyote_edge_options()->getOptionValue('enable_load_more_pag') == 'yes'){
			$enable_load_more = true;
		}
		return $enable_load_more;
	}
}
if(!function_exists('coyote_edge_is_masonry_template')){
	/**
     * Check if is masonry template enabled
     * return boolean
     */ 
	function coyote_edge_is_masonry_template(){
			
			$page_id = coyote_edge_get_page_id();
			$page_template = get_page_template_slug($page_id);
			$page_options_template = coyote_edge_options()->getOptionValue('blog_list_type');

			if(!is_archive()){
				if($page_template == 'blog-masonry.php' ||  $page_template =='blog-masonry-full-width.php' ||  $page_template =='blog-masonry-gallery.php'){
					return true;
				}
			}elseif(is_archive() || is_home()){
				if($page_options_template == 'masonry' || $page_options_template == 'masonry-full-width' || $page_options_template == 'masonry-gallery'){
					return true;
				}
			}			
			else{
				return false;
			}
	}
	
	
}

if(!function_exists('coyote_edge_set_ajax_url')){
	/**
     * load themes ajax functionality
     * 
     */
	function coyote_edge_set_ajax_url() {
		echo '<script type="application/javascript">var EdgefAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'coyote_edge_set_ajax_url');
	
}

/**
	 * Loads more function for blog posts.
	 *
	 */
if(!function_exists('coyote_edge_blog_load_more')){
	
	function coyote_edge_blog_load_more(){
	
	$return_obj = array();
	$paged = $post_number = $category = $blog_type = '';
	$archive_category = $archive_author = $archive_tag = $archive_day = $archive_month = $archive_year = '';
	
	if (!empty($_POST['nextPage'])) {
        $paged = $_POST['nextPage'];
    }
	if (!empty($_POST['number'])) {
        $post_number = $_POST['number'];
    }
	if (!empty($_POST['category'])) {
        $category = $_POST['category'];
    }
	if (!empty($_POST['blogType'])) {
        $blog_type = $_POST['blogType'];
    }
	if (!empty($_POST['archiveCategory'])) {
        $archive_category = $_POST['archiveCategory'];
    }
	if (!empty($_POST['archiveAuthor'])) {
        $archive_author = $_POST['archiveAuthor'];
    }
	if (!empty($_POST['archiveTag'])) {
        $archive_tag = $_POST['archiveTag'];
    }
	if (!empty($_POST['archiveDay'])) {
        $archive_day = $_POST['archiveDay'];
    }
	if (!empty($_POST['archiveMonth'])) {
        $archive_month = $_POST['archiveMonth'];
    }
	if (!empty($_POST['archiveYear'])) {
        $archive_year = $_POST['archiveYear'];
    }
	
	
	$html = '';
	$query_array = array(
		'post_type' => 'post',
		'paged' => $paged,
		'posts_per_page' => $post_number
	);
	if($category != ''){
		$query_array['cat'] = $category;
	}
	if($archive_category != ''){
		$query_array['cat'] = $archive_category;
	}
	if($archive_author != ''){
		$query_array['author'] = $archive_author;
	}
	if($archive_tag != ''){
		$query_array['tag'] = $archive_tag;
	}
	if($archive_day !='' && $archive_month != '' && $archive_year !=''){
		$query_array['day'] = $archive_day;
		$query_array['monthnum'] = $archive_month;
		$query_array['year'] = $archive_year;
	}
	$query_results = new \WP_Query($query_array);
	
	if($query_results->have_posts()):			
		while ( $query_results->have_posts() ) : $query_results->the_post();
			$html .=  coyote_edge_get_post_format_html($blog_type, 'yes');
		endwhile;
		else:
			$html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.', 'coyote') .'</p>';
		endif;
		
	$return_obj = array(
		'html' => $html,
	);
	
	echo json_encode($return_obj); exit;
}
}


add_action('wp_ajax_nopriv_coyote_edge_blog_load_more', 'coyote_edge_blog_load_more');
add_action( 'wp_ajax_coyote_edge_blog_load_more', 'coyote_edge_blog_load_more' );

if(!function_exists('coyote_edge_get_max_number_of_pages')) {
    /**
     * Function that return max number of posts/pages for pagination
     * @return int
     *
     * @version 0.1
     */
    function coyote_edge_get_max_number_of_pages() {
        global $wp_query;

        $max_number_of_pages = 10; //default value
        
        if($wp_query) {
            $max_number_of_pages = $wp_query->max_num_pages;
        }

        return $max_number_of_pages;
    }
}

if(!function_exists('coyote_edge_get_blog_page_range')) {
    /**
     * Function that return current page for blog list pagination
     * @return int
     *
     * @version 0.1
     */
    function coyote_edge_get_blog_page_range($query = '') {
        global $wp_query;

		if($query == ''){
			$query = $wp_query;
		}

        if(coyote_edge_options()->getOptionValue('blog_page_range') != ""){
            $blog_page_range = esc_attr(coyote_edge_options()->getOptionValue('blog_page_range'));
        } else{
            $blog_page_range = $query->max_num_pages;
        }
        return $blog_page_range;
    }
}

if ( ! function_exists('coyote_edge_comment_form_submit_button')) {
    /**
     * Override comment form submit button
     *
     * @return mixed|string
     */
    function coyote_edge_comment_form_submit_button() {
    	$comment_form_button = '';

		if (shortcode_exists('edgtf_button')) {

			$comment_form_button = coyote_edge_get_button_html(array(
				'html_type'     => 'input',
				'type'          => 'solid',
				'size'			=> 'large',
				'input_name'    => 'submit',
				'text'          => esc_html__('Submit','coyote')
			));
		} else {
			$comment_form_button .= '<input type="submit" name="submit" value="'.esc_html__('Submit','coyote').'" class="edgtf-btn edgtf-btn-large edgtf-btn-solid">';
		}

        return $comment_form_button;
    }

    add_filter('comment_form_submit_button', 'coyote_edge_comment_form_submit_button');

}

if ( ! function_exists('coyote_edge_get_quote_standard')) {

    function coyote_edge_get_quote_standard($id = false) {
    	if (!$id) {
    		$id = get_the_ID();
    	}

    	$quote_text = get_the_title($id);

    	$quote_field = get_post_meta($id, "edgtf_post_quote_text_meta", true);

		if ($quote_field !== '') {
			$quote_text = $quote_field;
		}

        return $quote_text;
    }

}

if ( ! function_exists('coyote_edge_get_post_link_single_link')) {

    function coyote_edge_get_post_link_single_link($id = false) {
    	if (!$id) {
    		$id = get_the_ID();
    	}

    	$link = get_the_permalink($id);

    	$link_field = get_post_meta($id, "edgtf_post_link_link_meta", true);

		if ($link_field !== '') {
			$link = $link_field;
		}

        return $link;
    }

}
?>