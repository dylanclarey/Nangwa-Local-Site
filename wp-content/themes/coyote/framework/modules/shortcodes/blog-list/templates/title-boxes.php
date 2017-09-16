<li class="edgtf-blog-list-item clearfix edgtf-blog-list-title">
	<div class="edgtf-blog-list-item-table">
		<div class="edgtf-blog-list-item-table-cell">
			<?php if ($list_title !== '') {
				echo coyote_edge_execute_shortcode('edgtf_section_title', array('title_text' => $list_title,'highlighted_text' => $list_highlighted));
			} ?>
		</div>
	</div>
</li>