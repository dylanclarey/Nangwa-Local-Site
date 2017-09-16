<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-image">
            <?php coyote_edge_get_module_template_part('templates/parts/video', 'blog'); ?>
        </div>
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
                <?php
                $title_param = array();
                $title_param['title_tag'] = 'h3';
                coyote_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>

                <?php  if ($type == 'standard-whole-post') {
                    the_content();
                }
                else{
                    coyote_edge_excerpt($excerpt_length);
                }
                ?>
                <?php coyote_edge_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>

				<?php 
				if (shortcode_exists('edgtf_separator')) {
					echo coyote_edge_execute_shortcode('edgtf_separator',array('position' => 'left')); 
				} else { ?>
					<div class="edgtf-separator-holder clearfix  edgtf-separator-left">
						<div class="edgtf-separator"></div>
					</div>
				<?php } ?>
                <div class="edgtf-post-info-bottom">
                    <div class="edgtf-post-info-bottom-left">
                        <?php coyote_edge_post_info(array(
                            'date' => 'yes',
                            'author' => $show_author,
                            'category' => $show_category,
                            'comments' => 'no',
                            'like' => 'no'
                        )) ?>
                    </div>
                    <div class="edgtf-post-info-bottom-right">
                        <?php echo coyote_edge_get_button_html(array(
                            'type' => 'transparent',
                            'link' => get_the_permalink(),
                            'text' => esc_html__('Read More', 'coyote'),
                            'custom_class' => 'edgtf-blog-btn-read-more'
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>