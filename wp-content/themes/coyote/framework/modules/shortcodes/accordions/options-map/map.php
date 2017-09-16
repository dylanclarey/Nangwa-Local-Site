<?php 
if(!function_exists('coyote_edge_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function coyote_edge_accordions_map() {
		
       $panel = coyote_edge_add_admin_panel(array(
           'title' => esc_html__('Accordions', 'coyote'),
           'name'  => 'panel_accordions',
           'page'  => '_elements_page'
       ));

       //Typography options
       coyote_edge_add_admin_section_title(array(
           'name' => 'typography_section_title',
           'title' => esc_html__('Typography', 'coyote'),
           'parent' => $panel
       ));

       $typography_group = coyote_edge_add_admin_group(array(
           'name' => 'typography_group',
           'title' => esc_html__('Typography', 'coyote'),
			'description' => esc_html__('Setup typography for accordions navigation', 'coyote'),
           'parent' => $panel
       ));

       $typography_row = coyote_edge_add_admin_row(array(
           'name' => 'typography_row',
           'next' => true,
           'parent' => $typography_group
       ));

       coyote_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'fontsimple',
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family', 'coyote'),
       ));

       coyote_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform', 'coyote'),
           'options'       => coyote_edge_get_text_transform_array()
       ));

       coyote_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style', 'coyote'),
           'options'       => coyote_edge_get_font_style_array()
       ));

       coyote_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
           'default_value' => '',
           'label'         => esc_html__('Letter Spacing', 'coyote'),
           'args'          => array(
               'suffix' => 'px'
           )
       ));

       $typography_row2 = coyote_edge_add_admin_row(array(
           'name' => 'typography_row2',
           'next' => true,
           'parent' => $typography_group
       ));		
		
       coyote_edge_add_admin_field(array(
           'parent'        => $typography_row2,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight', 'coyote'),
           'options'       => coyote_edge_get_font_weight_array()
       ));
		
		//Initial Accordion Color Styles
		
		coyote_edge_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Basic Accordions Color Styles', 'coyote'),
           'parent' => $panel
       ));
		
		$accordions_color_group = coyote_edge_add_admin_group(array(
           'name' => 'accordions_color_group',
           'title' => esc_html__('Accordion Color Styles', 'coyote'),
			'description' => esc_html__('Set color styles for accordion title', 'coyote'),
           'parent' => $panel
       ));
		$accordions_color_row = coyote_edge_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
       ));
		coyote_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title/Icon Color', 'coyote'),
       ));

		coyote_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_back_color',
           'default_value' => '',
           'label'         => esc_html__('Background Color', 'coyote'),
       ));
		
		$active_accordions_color_group = coyote_edge_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html__('Active and Hover Accordion Color Styles', 'coyote'),
			'description' => esc_html__('Set color styles for active and hover accordions', 'coyote'),
           'parent' => $panel
       ));
		$active_accordions_color_row = coyote_edge_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
       ));
		coyote_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title/Icon Color', 'coyote'),
       ));

		coyote_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_back_color_active',
           'default_value' => '',
           'label'         => esc_html__('Background Color', 'coyote'),
       ));
       
   }
   add_action('coyote_edge_options_elements_map', 'coyote_edge_accordions_map');
}