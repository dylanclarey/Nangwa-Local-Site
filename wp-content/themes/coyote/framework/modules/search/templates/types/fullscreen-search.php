<div class="edgtf-fullscreen-search-holder">
	<div class="edgtf-fullscreen-search-close-container">
		<div class="edgtf-search-close-holder">
			<a class="edgtf-fullscreen-search-close" href="javascript:void(0)">
				<?php print $search_icon_close; ?>
			</a>
		</div>
	</div>
	<div class="edgtf-fullscreen-search-table">
		<div class="edgtf-fullscreen-search-cell">
			<?php if ( $search_in_grid ) { ?>
				<div class="edgtf-container">
				<div class="edgtf-container-inner clearfix">
			<?php } ?>
				<div class="edgtf-fullscreen-search-inner">
					<form action="<?php echo esc_url(home_url('/')); ?>" class="edgtf-fullscreen-search-form" method="get">
						<div class="edgtf-form-holder">
							<div class="edgtf-field-holder">
								<input type="text"  name="s" class="edgtf-search-field" autocomplete="off" placeholder="<?php esc_html_e('Search','coyote');?>"/>
								<div class="edgtf-line"></div>
								<input type="submit" class="edgtf-search-submit" value="&#x55;" />
							</div>
						</div>
					</form>
				</div>
			<?php if ( $search_in_grid ) { ?>
				</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>