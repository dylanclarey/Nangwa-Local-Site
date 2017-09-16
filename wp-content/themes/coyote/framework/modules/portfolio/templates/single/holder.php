<div <?php coyote_edge_class_attribute($holder_class); ?>>
<?php if(have_posts()): while(have_posts()) : the_post(); ?>
	<?php if($fullwidth) : ?>
		<div class="edgtf-full-width">
		    <div class="edgtf-full-width-inner">
		<?php else: ?>
		<div class="edgtf-container">
		    <div class="edgtf-container-inner clearfix">
		<?php endif; ?>
	            <?php if(post_password_required()) {
	                echo get_the_password_form();
	            } else {
	                //load proper portfolio template
	                coyote_edge_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);
	            } ?>
				<?php 
					if(coyote_edge_options()->getOptionValue('portfolio_single_show_related') === 'yes' && !in_array($portfolio_template, array('custom','full-width-custom','split-screen','full-screen-slider'))){
						//load portfolio related
						coyote_edge_get_module_template_part('templates/single/parts/related', 'portfolio',$related_slug,'');
					}
					
					if (!in_array($portfolio_template, array('full-screen-slider'))){
						//load portfolio navigation
						coyote_edge_get_module_template_part('templates/single/parts/navigation', 'portfolio');

						//load portfolio comments
						coyote_edge_get_module_template_part('templates/single/parts/comments', 'portfolio');
					}
				?>
	        </div>
	    </div>
	</div>
<?php
	
	if (in_array($portfolio_template, array('full-screen-slider'))){
		//load portfolio navigation
		coyote_edge_get_module_template_part('templates/single/parts/navigation', 'portfolio');
		
		//load portfolio comments
		coyote_edge_get_module_template_part('templates/single/parts/comments', 'portfolio');
	}

	endwhile;
	endif;
?>