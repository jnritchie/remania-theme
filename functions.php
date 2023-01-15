<?php


//Custom Login
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/login.css" />';
}

add_action('login_head', 'my_custom_login');


//Custom Post Types

//Custom post type function for testimonials
function create_testmonial_posttype() {
 
    register_post_type( 'testimonials',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonial'),
        )
    );
}
// Hooking up function to theme setup
add_action( 'init', 'create_testmonial_posttype' );


//Custom post type function for Featured Properties
function create_properties_posttype() {
 
    register_post_type( 'properties',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Properties' ),
                'singular_name' => __( 'Property' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'property'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
// Hooking up function to theme setup
add_action( 'init', 'create_properties_posttype' );

