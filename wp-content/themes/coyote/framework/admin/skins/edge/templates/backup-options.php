<div class="edgtf-tabs-content">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="import">
            <div class="edgtf-tab-content">
                <h2 class="edgtf-page-title"><?php esc_html_e('Backup Options', 'coyote'); ?></h2>
                <form method="post" class="edgt_ajax_form edgtf-backup-options-page-holder">
                    <div class="edgtf-page-form">
                        <div class="edgtf-page-form-section-holder">
                            <h3 class="edgtf-page-section-title"><?php esc_html_e('Export/Import Options', 'coyote'); ?></h3>
                            <div class="edgtf-page-form-section">
                                <div class="edgtf-field-desc">
                                    <h4><?php esc_html_e('Export', 'coyote'); ?></h4>
                                    <p><?php esc_html_e('Copy the code from this field and save it to a textual file to export your options. Save that textual file somewhere so you can later use it to import options if necessary.', 'coyote'); ?></p>
                                </div>
                                <!-- close div.edgtf-field-desc -->

                                <div class="edgtf-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <textarea name="export_options" id="export_options" class="form-control edgtf-form-element" rows="10" readonly><?php echo coyote_edge_export_options(); ?></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- close div.edgtf-section-content -->

                            </div>

                            <div class="edgtf-page-form-section">


                                <div class="edgtf-field-desc">
                                    <h4><?php esc_html_e('Import', 'coyote'); ?></h4>
									<p><?php esc_html_e('To import options, just paste the code you previously saved from the "Export" field into this field, and then click the "Import" button.', 'coyote'); ?></p>
                                </div>
                                <!-- close div.edgtf-field-desc -->



                                <div class="edgtf-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
												<textarea name="import_theme_options" id="import_theme_options" class="form-control edgtf-form-element" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.edgtf-section-content -->

                            </div>
							<div class="edgtf-page-form-section">


								<div class="edgtf-field-desc">
									<button type="button" class="btn btn-primary btn-sm " name="import" id="edgtf-import-theme-options-btn">Import</button>
									<?php wp_nonce_field('edgtf_import_theme_options_secret_value', 'edgtf_import_theme_options_secret', false); ?>
									<span class="edgtf-bckp-message"></span>
								</div>
							</div>
                            <div class="edgtf-page-form-section edgtf-import-button-wrapper">

                                <div class="alert alert-warning">
                                    <strong><?php esc_html_e('Important notes:', 'coyote') ?></strong>
                                    <ul>
                                        <li><?php esc_html_e('Please note that import process will overide all your existing options.', 'coyote'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div><!-- close edgtf-tab-content -->
        </div>
    </div>
</div> <!-- close div.edgtf-tabs-content -->