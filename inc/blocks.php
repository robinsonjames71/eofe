<?php
/**
 * ACF Blocks Setup
 */

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('A custom testimonial block.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));
		acf_register_block(array(
			'name'				=> 'opener',
			'title'				=> __('EoE Opener'),
			'description'		=> __('Opening Animation.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'opener', 'animation' ),
		));
		acf_register_block(array(
			'name'				=> 'text',
			'title'				=> __('EoE Text Block'),
			'description'		=> __('Centered Text block with background.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'text', 'background' ),
		));
		acf_register_block(array(
			'name'				=> 'columns',
			'title'				=> __('EoE Text Columns'),
			'description'		=> __('Text and image columns centered in the page, with background, title vertically aligned with the image.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'text', 'image', 'background' ),
		));
		acf_register_block(array(
			'name'				=> 'wide_columns',
			'title'				=> __('EoE Wide Text Columns'),
			'description'		=> __('Text and image columns centered in the page, with background.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'text', 'image', 'background' ),
		));
		acf_register_block(array(
			'name'				=> 'logos',
			'title'				=> __('EoE Client Logos'),
			'description'		=> __('Repeatable images that automatically display in a grid.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'grid', 'image', 'background' ),
		));
		acf_register_block(array(
			'name'				=> 'contact',
			'title'				=> __('EoE Contact Us'),
			'description'		=> __('Email link with the animated gif.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'link', 'image', 'background' ),
		));
		acf_register_block(array(
			'name'				=> 'text-grid',
			'title'				=> __('EoE Text Grid'),
			'description'		=> __('Text grid w/ title and images.'),
			'render_callback'	=> 'block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'keywords'			=> array( 'text', 'image', 'grid' ),
		));
	}
}
function block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/blocks/block-{$slug}.php") ) ) {
		include( get_theme_file_path("/blocks/block-{$slug}.php") );
	}
}