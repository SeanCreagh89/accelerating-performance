<?php
	/*---Include External Styles & Scripts---*/
	function resources() {
		wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
		wp_enqueue_script('script', get_template_directory_uri() . '/script.js');
	}
	
	add_action('wp_enqueue_scripts', 'resources');



	/*---Custom Posts---*/
	add_theme_support('post-thumbnails', array('post', 'page'));

	function custom_excerpt_length($length) { return 20; }
	add_filter('excerpt_length', 'custom_excerpt_length', 999);



	/*---Add Filter To The End Of Excerpt---*/
	function the_excerpt_elipsis($more) { $post; return ' ...'; }
	add_filter('excerpt_more', 'the_excerpt_elipsis');



	/*---Header Widgets---*/
	/*---Header Widgets: Top Bar---*/
	function top_bar_widget_init() {
		register_sidebar(array(
			'name' => __('Email Widget Section', 'email_section'),
			'id' => 'email_top_bar_widget',
			'description' => __('Add your email address to this widget e.g. <a href="mailto:example@email.com">example:email.com</a>.', 'email_section')
		));

		register_sidebar(array(
			'name' => __('Mobile Widget Section', 'mobile_section'),
			'id' => 'mobile_top_bar_widget',
			'description' => __('Add your mobile number to this widget e.g. <a href="tel:00353871234567">087 123 4567</a>.', 'mobile_section')
		));
	}

	add_action('widgets_init', 'top_bar_widget_init' );

	/*---Header Widgets: Main Bar---*/
	function main_bar_widget_init() {
		$home_page_url = get_home_url();
		
		register_sidebar(array(
			'name' => __('Logo Widget Section', 'logo_section'),
			'id' => 'logo_main_bar_widget',
			'description' => __('Add your site logo to this widget e.g. <img src="logo_url" alt="Site Logo" />.', 'logo_section'),
			'before_widget' => '<a href="'.$home_page_url.'">',
			'after_widget' => '</a>'
		));

		register_sidebar(array(
			'name' => __('Mobile Icon Widget Section', 'icon_section'),
			'id' => 'icon_main_bar_widget',
			'description' => __('Add the icon you want to appear when on mobile e.g. <img src="icon_url" alt="Mobile Icon" />.', 'icon_section')
		));
	}

	add_action('widgets_init', 'main_bar_widget_init');



	/*---Sidebar Widgets---*/
	function sidebar_widget_init() {
		register_sidebar(array(
			'name' => __('Sidebar Widget Section', 'sidebar_section'),
			'id' => 'sidebar_widget',
			'description' => __('Add widgets to your blog section here.', 'sidebar_section')
		));
	}

	add_action('widgets_init', 'sidebar_widget_init');



	/*---Footer Widgets---*/
	/*---Footer Widgets: Primary Bar---*/
	function primary_footer_bar_widget_init() {
		register_sidebar(array(
			'name' => __('Contact Details Widget Section', 'contact_details_section'),
			'id' => 'contact_details_widget',
			'description' => __('Please add your contact details here. For email and phone links please use the following HTML code: <a href="mailto/tel:...">...</a>', 'contact_details_section')
		));

		register_sidebar(array(
			'name' => __('Social Media Widget Section', 'social_media_section'),
			'id' => 'social_media_widget',
			'description' => __('Please add your social media here; facebook, twitter, youtube, instagram, etc...', 'social_media_section')
		));

		register_sidebar(array(
			'name' => __('Twitter Widget Section', 'tweets_section'),
			'id' => 'tweets_widget',
			'description' => __('Please add your tweets here', 'tweets_section')
		));

		register_sidebar(array(
			'name' => __('Contact Form Widget Section', 'contact_form_section'),
			'id' => 'contact_form_widget',
			'description' => __('Please add your contact form here.', 'contact_form_section')
		));
	}

	add_action('widgets_init', 'primary_footer_bar_widget_init');

	/*---Footer Widgets: Secondary Bar---*/
	function secondary_footer_bar_widget_init() {
		register_sidebar(array(
			'name' => __('Foot Note Widget Section', 'foot_note_section'),
			'id' => 'foot_note_widget',
			'description' => __('Please add your sites foot note here.', 'foot_note_section')
		));

		register_sidebar(array(
			'name' => __('Developer Widget Section', 'developer_section'),
			'id' => 'developer_widget',
			'description' => __('Please add your sites developer here, e.g. <a href="link_to_developers_site">Name of Developer</a>.', 'developer_section')
		));
	}

	add_action('widgets_init', 'secondary_footer_bar_widget_init');



	/*---Menu Function---*/
	function wpb_custom_new_menu() {
		register_nav_menus(
			array(
				'primary_menu' => __('Primary Menu'),
				'secondary_menu' => __('Secondary Menu')
			)
		);
	}

	add_action('init', 'wpb_custom_new_menu');



	/*---Theme Color Customizer---*/
	function customize_color_palette($wp_customize) {
		/*---Header Theme Color Setting---*/
		$wp_customize->add_setting('top_bar_background_color', array(
			'default' => '#1f3a4f',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('top_bar_link_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('top_bar_link_hover_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('current_menu_item_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('main_bar_background_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('main_bar_link_color', array(
			'default' => '#333333',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('main_bar_link_hover_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('navigation_background_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('navigation_outline_color', array(
			'default' => '#e3e3e3',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('navigation_link_hover_color', array(
			'default' => '#f6f6f6',
			'transport' => 'refresh'
		));



		/*---Content Theme Color Setting---*/
		$wp_customize->add_setting('content_background_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('content_text_color', array(
			'default' => '#333333',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_link_background_color', array(
			'default' => '#333333',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_link_text_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_link_background_hover_color', array(
			'default' => '#1f3a4f',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_link_text_hover_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_excerpt_background_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('pagination_link_background_color', array(
			'default' => '#e3e3e3',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('pagination_link_color', array(
			'default' => '#333333',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('pagination_link_background_hover_color', array(
			'default' => '#1f3a4f',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('pagination_link_hover_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('pagination_span_background_color', array(
			'default' => '#1f3a4f',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('pagination_span_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_featured_image_background_color', array(
			'default' => '#1f3a4f',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_title_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_details_border_color', array(
			'default' => '#e3e3e3',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('post_excerpt_text_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sidebar_background_color', array(
			'default' => '#333333',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sidebar_text_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sidebar_button_background_color', array(
			'default' => '#a0ce4e',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sidebar_button_text_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sidebar_link_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sidebar_link_hover_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));



		/*---Footer Theme Color Setting---*/
		$wp_customize->add_setting('primary_footer_bar_background_color', array(
			'default' => '#1f3a4f',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('primary_footer_bar_border_color', array(
			'default' => '#e9eaee',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('primary_footer_bar_text_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('primary_footer_bar_link_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('primary_footer_bar_link_hover_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('primary_footer_bar_button_text_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('primary_footer_bar_button_background_color', array(
			'default' => '#a0ce4e',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('secondary_footer_bar_background_color', array(
			'default' => '#282a2b',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('secondary_footer_bar_text_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('secondary_footer_bar_link_color', array(
			'default' => '#ffffff',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('secondary_footer_bar_link_hover_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('scroll_to_top_color', array(
			'default' => '#12222f',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('scroll_to_top_hover_color', array(
			'default' => '#27a9e1',
			'transport' => 'refresh'
		));



		/*---Theme Customize Color Section---*/
		$wp_customize->add_section('theme_color_palette', array(
			'title' => __('Theme Color Scheme', 'Accelerating Performance'),
			'priority' => 30
		));



		/*---Header Theme Color Controller---*/
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_bar_background_color_controller', array(
			'label' => __('Top Bar Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'top_bar_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_bar_link_color_controller', array(
			'label' => __('Top Bar Link Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'top_bar_link_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_bar_link_hover_color_controller', array(
			'label' => __('Top Bar Link Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'top_bar_link_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'current_menu_item_color_controller', array(
			'label' => __('Current Menu Item Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'current_menu_item_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_bar_background_color_controller', array(
			'label' => __('Main Bar Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'main_bar_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_bar_link_color_controller', array(
			'label' => __('Main Bar Link Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'main_bar_link_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_bar_link_hover_color_controller', array(
			'label' => __('Main Bar Link Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'main_bar_link_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navigation_background_color_controller', array(
			'label' => __('Navigation Drop Down Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'navigation_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navigation_outline_color_controller', array(
			'label' => __('Navigation Drop Down Outline Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'navigation_outline_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navigation_link_hover_color_controller', array(
			'label' => __('Navigation Links Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'navigation_link_hover_color'
		)));



		/*---Content Theme Color Controller---*/
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color_controller', array(
			'label' => __('Content Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'content_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color_controller', array(
			'label' => __('Content Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'content_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_link_background_color_controller', array(
			'label' => __('Post Link Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_link_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_link_text_color_controller', array(
			'label' => __('Post Link Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_link_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_link_background_hover_color_controller', array(
			'label' => __('Post Link Background Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_link_background_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_link_text_hover_color_controller', array(
			'label' => __('Post Link Text Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_link_text_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_excerpt_background_color_controller', array(
			'label' => __('Post Excerpt Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_excerpt_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_excerpt_text_color_controller', array(
			'label' => __('Post Excerpt Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_excerpt_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pagination_link_background_color_controller', array(
			'label' => __('Pagination Link Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'pagination_link_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pagination_link_color_controller', array(
			'label' => __('Pagination Link Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'pagination_link_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pagination_link_background_hover_color_controller', array(
			'label' => __('Pagination Link Background Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'pagination_link_background_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pagination_link_hover_color_controller', array(
			'label' => __('Pagination Link Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'pagination_link_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pagination_span_background_color_controller', array(
			'label' => __('Pagination Span Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'pagination_span_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pagination_span_color_controller', array(
			'label' => __('Pagination Span Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'pagination_span_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_featured_image_background_color_controller', array(
			'label' => __('Post Featured Image Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_featured_image_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_title_color_controller', array(
			'label' => __('Post Title Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_title_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_details_border_color_controller', array(
			'label' => __('Post Details Border Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'post_details_border_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_background_color_controller', array(
			'label' => __('Sidebar Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'sidebar_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_text_color_controller', array(
			'label' => __('Sidebar Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'sidebar_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_button_background_color_controller', array(
			'label' => __('Sidebar Button Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'sidebar_button_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_button_text_color_controller', array(
			'label' => __('Sidebar Button Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'sidebar_button_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_color_controller', array(
			'label' => __('Sidebar Link Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'sidebar_link_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_hover_color_controller', array(
			'label' => __('Sidebar Link Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'sidebar_link_hover_color'
		)));



		/*---Footer Theme Color Controller---*/
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_footer_bar_background_color_controller', array(
			'label' => __('Primary Footer Bar Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'primary_footer_bar_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_footer_bar_border_color_controller', array(
			'label' => __('Primary Footer Bar Border Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'primary_footer_bar_border_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_footer_bar_text_color_controller', array(
			'label' => __('Primary Footer Bar Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'primary_footer_bar_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_footer_bar_link_color_controller', array(
			'label' => __('Primary Footer Bar Link Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'primary_footer_bar_link_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_footer_bar_link_hover_color_controller', array(
			'label' => __('Primary Footer Bar Link Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'primary_footer_bar_link_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_footer_bar_button_text_color_controller', array(
			'label' => __('Primary Footer Bar Button Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'primary_footer_bar_button_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_footer_bar_button_background_color_controller', array(
			'label' => __('Primary Footer Bar Button Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'primary_footer_bar_button_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_footer_bar_background_color_controller', array(
			'label' => __('Secondary Footer Bar Background Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'secondary_footer_bar_background_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_footer_bar_text_color_controller', array(
			'label' => __('Secondary Footer Bar Text Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'secondary_footer_bar_text_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_footer_bar_link_color_controller', array(
			'label' => __('Secondary Footer Bar Link Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'secondary_footer_bar_link_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_footer_bar_link_hover_color_controller', array(
			'label' => __('Secondary Footer Bar Link Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'secondary_footer_bar_link_hover_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'scroll_to_top_color_controller', array(
			'label' => __('Scroll To Top Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'scroll_to_top_color'
		)));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'scroll_to_top_hover_color_controller', array(
			'label' => __('Scroll To Top Hover Color', 'Accelerating Performance'),
			'section' => 'theme_color_palette',
			'settings' => 'scroll_to_top_hover_color'
		)));
	}

	add_action('customize_register', 'customize_color_palette');

	function output_customized_theme_color_palette() { ?>

		<style type="text/css">
			/*---Header Styles---*/
			/*---Top Bar---*/
			#top_bar { background-color: <?php echo get_theme_mod('top_bar_background_color'); ?>; }
			#top_bar li, #top_bar a { color: <?php echo get_theme_mod('top_bar_link_color'); ?>; }
			#top_bar a:hover { color: <?php echo get_theme_mod('top_bar_link_hover_color'); ?>; }

			/*---Main Bar---*/
			#main_bar, #hidden_bar { background-color: <?php echo get_theme_mod('main_bar_background_color'); ?>; }
			.sub-menu a, .navigation a { color: <?php echo get_theme_mod('main_bar_link_color'); ?>; }
			.sub-menu a:hover, .navigation a:hover { color: <?php echo get_theme_mod('main_bar_link_hover_color'); ?>; }
			.sub-menu, .responsive_dropdown { background-color: <?php echo get_theme_mod('navigation_background_color'); ?>; }
			.responsive_dropdown { outline: 2px solid <?php echo get_theme_mod('navigation_outline_color'); ?>; }

			.sub-menu {
				border-right: 1px solid <?php echo get_theme_mod('navigation_outline_color'); ?>;
				border-bottom: 1px solid <?php echo get_theme_mod('navigation_outline_color'); ?>;
				border-left: 1px solid <?php echo get_theme_mod('navigation_outline_color'); ?>;
			}

			.sub-menu a:hover, .responsive_dropdown a:hover { background-color: <?php echo get_theme_mod('navigation_link_hover_color'); ?>; }
			.current-menu-item a { color: <?php echo get_theme_mod('current_menu_item_color'); ?>; }

			/*---Content Styles---*/
			#content {
				color: <?php echo get_theme_mod('content_text_color'); ?>;
				background-color: <?php echo get_theme_mod('content_background_color'); ?>;
			}

			#content h1:after,
			#content h2:after,
			#content h3:after,
			#content h4:after,
			#content h5:after,
			#content .title:after { border-bottom: 3px solid <?php echo get_theme_mod('content_text_color'); ?>; }

			.post_title_wrapper a {
				color: <?php echo get_theme_mod('post_link_text_color'); ?>;
				background-color: <?php echo get_theme_mod('post_link_background_color'); ?>;
			}

			.post_title_wrapper a:hover {
				color: <?php echo get_theme_mod('post_link_text_hover_color'); ?>;
				background-color: <?php echo get_theme_mod('post_link_background_hover_color'); ?>;
			}

			.post_excerpt_wrapper {
				color: <?php echo get_theme_mod('post_excerpt_text_color'); ?>;
				background-color: <?php echo get_theme_mod('post_excerpt_background_color'); ?>;
			}

			.pagination_wrapper a {
				color: <?php echo get_theme_mod('pagination_link_color'); ?>;
				background-color: <?php echo get_theme_mod('pagination_link_background_color'); ?>;
			}

			.pagination_wrapper a:hover {
				color: <?php echo get_theme_mod('pagination_link_hover_color'); ?>;
				background-color: <?php echo get_theme_mod('pagination_link_background_hover_color'); ?>;
			}

			.pagination_wrapper span {
				color: <?php echo get_theme_mod('pagination_span_color'); ?>;
				background-color: <?php echo get_theme_mod('pagination_span_background_color'); ?>;
			}

			#post_featured_image_container { background-color: <?php echo get_theme_mod('post_featured_image_background_color'); ?>; }
			#post_featured_image_container h2 { color: <?php echo get_theme_mod('post_title_color'); ?>; }
			#post_featured_image_container h2:after { border-bottom: 3px solid <?php echo get_theme_mod('post_title_color'); ?>; }
			#post_details_container:after { border: 1px solid <?php echo get_theme_mod('post_details_border_color'); ?>; }

			#sidebar_container {
				color: <?php echo get_theme_mod('sidebar_text_color'); ?>;
				background-color: <?php echo get_theme_mod('sidebar_background_color'); ?>;
			}

			#sidebar_container h1:after,
			#sidebar_container h2:after,
			#sidebar_container h3:after,
			#sidebar_container h4:after,
			#sidebar_container h5:after { border-bottom: 3px solid <?php echo get_theme_mod('sidebar_text_color'); ?>; }

			#sidebar_container a { color: <?php echo get_theme_mod('sidebar_link_color'); ?>; }
			#sidebar_container a:hover { color: <?php echo get_theme_mod('sidebar_link_hover_color'); ?>; }

			#sidebar_container input[type="submit"] {
				color: <?php echo get_theme_mod('sidebar_button_text_color'); ?>;
				background-color: <?php echo get_theme_mod('sidebar_button_background_color'); ?>;
			}

			/*---Footer Styles---*/
			/*---Primary Bar---*/
			#primary_footer_bar {
				color: <?php echo get_theme_mod('primary_footer_bar_text_color'); ?>;
				background-color: <?php echo get_theme_mod('primary_footer_bar_background_color'); ?>;
				border-top: 12px solid <?php echo get_theme_mod('primary_footer_bar_border_color'); ?>;
			}

			#primary_footer_bar .widgettitle:after { border-bottom: 3px solid <?php echo get_theme_mod('primary_footer_bar_text_color'); ?>; }
			#primary_footer_bar a { color: <?php echo get_theme_mod('primary_footer_bar_link_color'); ?>; }
			#primary_footer_bar a:hover { color: <?php echo get_theme_mod('primary_footer_bar_link_hover_color'); ?>; }

			#primary_footer_bar input[type="submit"] {
				color: <?php echo get_theme_mod('primary_footer_bar_button_text_color'); ?>;
				background-color: <?php echo get_theme_mod('primary_footer_bar_button_background_color'); ?>;
			}

			/*---Secondary Bar---*/
			#secondary_footer_bar {
				color: <?php echo get_theme_mod('secondary_footer_bar_text_color'); ?>;
				background-color: <?php echo get_theme_mod('secondary_footer_bar_background_color'); ?>;
			}

			#secondary_footer_bar a { color: <?php echo get_theme_mod('secondary_footer_bar_link_color'); ?>; }
			#secondary_footer_bar a:hover { color: <?php echo get_theme_mod('secondary_footer_bar_link_hover_color'); ?>; }
			#scroll_to_top { background-color: <?php echo get_theme_mod('scroll_to_top_color'); ?>; }
			#scroll_to_top:hover { background-color: <?php echo get_theme_mod('scroll_to_top_hover_color'); ?>; }
		</style>

	<?php }

	add_action('wp_head', 'output_customized_theme_color_palette');
?>