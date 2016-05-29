<?php

	function load_scripts(){
		wp_enqueue_style('klara', get_stylesheet_uri() );
	}
	add_action('wp_enqueue_scripts','load_scripts');

	function menu(){
		register_nav_menu('mymenu', 'Menu123');

	
	}
	add_action('init','menu'); 


	function sidebars(){
		register_sidebar([
			'name' => "Sidebar",
			'id' => "sidebar"
			]);
		register_sidebar([
			'name' => "Footer sidebar",
			'id' => "footer-sidebar"
			]);
		register_sidebar([
			'name' => "Header Sidebar",
			'id' => "header-sidebar"
			]);

	}
	add_action('widgets_init','sidebars'); 
	//param 1 är en hook som vi valt
	//param 2 är en funktion som ska användas på hooken

	function add_custom_taxonomies() {
	  // Add new "Locations" taxonomy to Posts
	  register_taxonomy('location', 'post', array(
	    // Hierarchical taxonomy (like categories)
	    'hierarchical' => true,
	    // This array of options controls the labels displayed in the WordPress Admin UI
	    'labels' => array(
	      'name' => 'Locations', 'taxonomy general name',
	      'singular_name' => 'Location', 'taxonomy singular name',
	      'search_items' =>  'Search Locations',
	      'all_items' => 'All Locations',
	      'parent_item' => 'Parent Location',
	      'parent_item_colon' => 'Parent Location:',
	      'edit_item' => 'Edit Location',
	      'update_item' => 'Update Location',
	      'add_new_item' => 'Add New Location',
	      'new_item_name' => 'New Location Name',
	      'menu_name' => 'Locations',
	    ),
	    // Control the slugs used for this taxonomy
	    'rewrite' => array(
	    	'slug' => 'locations', // This controls the base slug that will display before each term
	    	'with_front' => false, // Don't display the category base before "/locations/"
	    	'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
	    ),
	  ));
	}
	add_action( 'init', 'add_custom_taxonomies', 0 );

	function my_custom_post_case() {
		$labels = array(
		'name' => 'Cases', 'post type general name',
		'singular_name' => 'Case', 'post type singular name',
		'add_new' => 'Add New', 'case',
		'add_new_item' => 'Add New Case',
		'edit_item' => 'Edit Case',
		'new_item' => 'New Case',
		'all_items' => 'All Cases',
		'view_item' => 'View Case',
		'search_items' => 'Search Cases',
		'not_found' => 'No cases found',
		'not_found_in_trash' => 'No cases found in the Trash', 
		'parent_item_colon' => '',
		'menu_name' => 'Cases'
		);
		$args = array(
		'labels' => $labels,
		'description' => 'Holds our cases and case specific data',
		'public' => true,
		'menu_position' => 5,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'has_archive' => true,
		'register_meta_box_cb' => 'add_case_metaboxes'
		);
		register_post_type( 'case', $args ); 
		}
	add_action( 'init', 'my_custom_post_case' );
	

	// Add the Events Meta Boxes
	function add_case_metaboxes() {
		add_meta_box('wpt_employer_field', 'Employer', 'wpt_employer_field', 'case', 'normal', 'default');
		add_meta_box('wpt_employer_field', 'Year of employment', 'wpt_employer_field', 'case', 'normal', 'default');
	}


	// The Event Location Metabox
	function wpt_employer_field() {
		global $post;
		// Noncename needed to verify where the data originated
		echo '<input type="hidden" name="casemeta_noncename" id="casemeta_noncename" value="' . 
		wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		
		// Get the location data if its already been entered
		$employer = get_post_meta($post->ID, 'employer', true);
		$year = get_post_meta($post->ID, 'year', true);

		
		// Echo out the field
		echo '<p>Enter the employer:</p>';
		echo '<input type="text" name="employer" value="' . $employer  . '" class="widefat" />';
 		echo '<p>Year of employment</p>';
        echo '<input type="text" name="year" value="' . $year  . '" class="widefat" />';

	}


	// Save the Metabox Data

	function wpt_save_case_meta($post_id, $post) {
	
		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times
		if ( !wp_verify_nonce( $_POST['casemeta_noncename'], plugin_basename(__FILE__) )) {
		return $post->ID;
		}

		// Is the user allowed to edit the post or page?
		if ( !current_user_can( 'edit_post', $post->ID ))
			return $post->ID;

		// OK, we're authenticated: we need to find and save the data
		// We'll put it into an array to make it easier to loop though.
		
		$case_meta['employer'] = $_POST['employer'];
		$case_meta['year'] = $_POST['year'];

		
		// Add values of $events_meta as custom fields
		
		foreach ($case_meta as $key => $value) { // Cycle through the $events_meta array!
			if( $post->post_type == 'revision' ) return; // Don't store custom data twice
			$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
			if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
			} else { // If the custom field doesn't have a value
				add_post_meta($post->ID, $key, $value);
			}
			if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
		}
	}
	add_action('save_post', 'wpt_save_case_meta', 1, 2); // save the custom fields


	function my_custom_post_education() {
		$labelsEducation = array(
		'name' => 'Educations', 'post type general name',
		'singular_name' => 'Education', 'post type singular name',
		'add_new' => 'Add New', 'education',
		'add_new_item' => 'Add New Education',
		'edit_item' => 'Edit Education',
		'new_item' => 'New Education',
		'all_items' => 'All Educations',
		'view_item' => 'View Education',
		'search_items' => 'Search Educations',
		'not_found' => 'No educations found',
		'not_found_in_trash' => 'No educations found in the Trash', 
		'parent_item_colon' => '',
		'menu_name' => 'Educations'
		);
		$argsEducation = array(
		'labels' => $labelsEducation,
		'description' => 'Holds our educations and education specific data',
		'public' => true,
		'menu_position' => 5,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'has_archive' => true,
		);
		register_post_type( 'education', $argsEducation ); 
		}
	add_action( 'init', 'my_custom_post_education' );

	function my_custom_post_employment() {
		$labels = array(
		'name' => 'Employments', 'post type general name',
		'singular_name' => 'Employment', 'post type singular name',
		'add_new' => 'Add New', 'employment',
		'add_new_item' => 'Add New Employment',
		'edit_item' => 'Edit Employment',
		'new_item' => 'New Employment',
		'all_items' => 'All Employments',
		'view_item' => 'View Employment',
		'search_items' => 'Search Employments',
		'not_found' => 'No employments found',
		'not_found_in_trash' => 'No employments found in the Trash', 
		'parent_item_colon' => '',
		'menu_name' => 'Employments'
		);
		$args = array(
		'labels' => $labels,
		'description' => 'Holds our employments and employment specific data',
		'public' => true,
		'menu_position' => 5,
		'supports' => array( 'title', 'editor', 'thumbnail'  ),
		'has_archive' => true,
		);
		register_post_type( 'employment', $args ); 
		}
	add_action( 'init', 'my_custom_post_employment' );


	function klara_customize_css(){
	    ?>
	         <style type="text/css">
	            body { background:<?php echo get_theme_mod('background'); ?>; }
	            main { background:<?php echo get_theme_mod('mainBKG'); ?>; }
				.sidebar h2{ color: <?php echo get_theme_mod('sidebarheadings'); ?>; }
	            h1, h2, h3, h4 { color:<?php echo get_theme_mod('headingcolor'); ?>; }
	            h1 { font-size:<?php echo get_theme_mod('1hsize'); ?>; }
	            h2 { font-size:<?php echo get_theme_mod('2hsize'); ?>; }
	            h3 { font-size:<?php echo get_theme_mod('3hsize'); ?>; }
	            h4 { font-size:<?php echo get_theme_mod('4hsize'); ?>; }
	            .locationsVisibility{ visibility: <?php echo get_theme_mod('locationsVisibility'); ?>; }
	            a:link, a:visited, a:hover, a:active { color:<?php echo get_theme_mod('linkcolor'); ?>; }

	         </style>
	    <?php
	}
	add_action( 'wp_head', 'klara_customize_css');
	

	function klara_customize_register( $wp_customize ){

		$wp_customize->add_setting('background', ['default' => "#fff", 'transport' => 'refresh']);
		$wp_customize->add_section('klara_colors', ['title' => "Theme colors", 'priority' => 10]);
		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, 'background', [
					'label' => "Background",
					'section' => 'klara_colors',
					'setting' => 'background'
				])
		);


		$wp_customize->add_setting('headingcolor', ['default' => "black", 'transport' => 'refresh']);
		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, 'headingcolor', [
					'label' => "Heading color",
					'section' => 'klara_colors',
					'setting' => 'headingcolor'
				])
		);
		

		$wp_customize->add_setting('mainBKG', ['default' => "white", 'transport' => 'refresh']);
		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, 'mainBKG', [
					'label' => "Content background color",
					'section' => 'klara_colors',
					'setting' => 'mainBKG'
				])
		);

		$wp_customize->add_setting('sidebarheadings', ['default' => "black", 'transport' => 'refresh']);
		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, 'sidebarheadings', [
					'label' => "Sidebar heading color",
					'section' => 'klara_colors',
					'setting' => 'sidebarheadings'
				])
		);


		$wp_customize->add_setting('linkcolor', ['default' => "blue", 'transport' => 'refresh']);
		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, 'linkcolor', [
					'label' => "Link color",
					'section' => 'klara_colors',
					'setting' => 'linkcolor'
				])
		);

		$wp_customize->add_setting('1hsize', ['default' => "20px", 'transport' => 'refresh']);
		$wp_customize->add_section('klara_heading', ['title' => "Theme heading sizes", 'priority' => 10]);
		$wp_customize->add_control(
			new WP_Customize_Control($wp_customize, '1hsize', [
					'label' => "Heading 1 Size",
					'section' => 'klara_heading',
					'setting' => '1hsize',
					'type' => 'radio',
           			'choices' => array(
	                '22px'  => "Large",
	                '18px'  => "Medium",
	                '12px'  => "Small"
				)]
		));


		$wp_customize->add_setting('2hsize', ['default' => "20px", 'transport' => 'refresh']);
		$wp_customize->add_control(
			new WP_Customize_Control($wp_customize, '2hsize', [
					'label' => "Heading 2 Size",
					'section' => 'klara_heading',
					'setting' => '2hsize',
					'type' => 'radio',
           			'choices' => array(
	                '22px'  => "Large",
	                '18px'  => "Medium",
	                '12px'  => "Small"
				)]
		));		

		$wp_customize->add_setting('3hsize', ['default' => "20px", 'transport' => 'refresh']);
		$wp_customize->add_control(
			new WP_Customize_Control($wp_customize, '3hsize', [
					'label' => "Heading 3 Size",
					'section' => 'klara_heading',
					'setting' => '3hsize',
					'type' => 'radio',
           			'choices' => array(
	                '22px'  => "Large",
	                '18px'  => "Medium",
	                '12px'  => "Small"
				)]
		));		


		$wp_customize->add_setting('4hsize', ['default' => "20px", 'transport' => 'refresh']);
		$wp_customize->add_control(
			new WP_Customize_Control($wp_customize, '4hsize', [
					'label' => "Heading 4 Size",
					'section' => 'klara_heading',
					'setting' => '4hsize',
					'type' => 'radio',
           			'choices' => array(
	                '22px'  => "Large",
	                '18px'  => "Medium",
	                '12px'  => "Small"
				)]
		));	

		$wp_customize->add_setting('locationsVisibility', ['default' => "visible", 'transport' => 'refresh']);
		$wp_customize->add_section('klara_visibility', ['title' => "Theme Show/Hide locations", 'priority' => 10]);
		$wp_customize->add_control(
			new WP_Customize_Control($wp_customize, 'locationsVisibility', [
					'label' => "Show/Hide Location",
					'section' => 'klara_visibility',
					'setting' => 'locationsVisibility',
					'type' => 'radio',
           			'choices' => array(
	                'visible'  => "Show",
	                'hidden'  => "Hide"
			)]
		));		

		
	}
	add_action('customize_register','klara_customize_register');


	function create_tech_taxonomy() {
		register_taxonomy(
	    'tech',
	    array( 'education', 'post', 'case', 'employment' ),
	    array(
	      'label' => 'Tech',
	      'rewrite' => array( 'slug' => 'tech' ),
	      'hierarchical' => true,
	    )
	  );
	}
	add_action( 'init', 'create_tech_taxonomy' );


	function create_bransch_taxonomy() {
		register_taxonomy(
	    'bransch',
	    array( 'education', 'post', 'case', 'employment' ),
	    array(
	      'label' => 'Bransch',
	      'rewrite' => array( 'slug' => 'bransch' ),
	      'hierarchical' => true,
	    )
	  );
	}
	add_action( 'init', 'create_bransch_taxonomy' );

?>