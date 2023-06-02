<?php

function mchigh_register_custom_post_types(){

     // Register Staff CPT
     $labels = array(
        'name'                  => _x( 'Staff', 'post type general name' ),
        'singular_name'         => _x( 'Staff', 'post type singular name'),
        'menu_name'             => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'        => _x( 'Staff', 'add new on admin bar' ),
        'add_new'               => _x( 'Add Staff', 'staff' ),
        'add_new_item'          => __( 'Add New Staff' ),
        'new_item'              => __( 'New Staff' ),
        'edit_item'             => __( 'Edit Staff' ),
        'view_item'             => __( 'View Staff' ),
        'all_items'             => __( 'All Staff' ),
        'search_items'          => __( 'Search Staff' ),
        'parent_item_colon'     => __( 'Parent Staff:' ),
        'not_found'             => __( 'No staff found.' ),
        'not_found_in_trash'    => __( 'No staff found in Trash.' ),
        'archives'              => __( 'Staff Archives'),
        'insert_into_item'      => __( 'Insert into staff'),
        'uploaded_to_this_item' => __( 'Uploaded to this staff'),
        'filter_item_list'      => __( 'Filter staff list'),
        'items_list_navigation' => __( 'Staff list navigation'),
        'items_list'            => __( 'Staff list'),
        'featured_image'        => __( 'Staff featured image'),
        'set_featured_image'    => __( 'Set staff featured image'),
        'remove_featured_image' => __( 'Remove staff featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array( 'title'),
    );

    register_post_type( 'mchigh-staff', $args );


    // Register Student CPT
    $labels = array(
        'name'                  => _x( 'Students', 'post type general name' ),
        'singular_name'         => _x( 'Student', 'post type singular name'),
        'menu_name'             => _x( 'Students', 'admin menu' ),
        'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'student' ),
        'add_new_item'          => __( 'Add New Student' ),
        'new_item'              => __( 'New Student' ),
        'edit_item'             => __( 'Edit Student' ),
        'view_item'             => __( 'View Student' ),
        'all_items'             => __( 'All Students' ),
        'search_items'          => __( 'Search Students' ),
        'parent_item_colon'     => __( 'Parent Students:' ),
        'not_found'             => __( 'No students found.' ),
        'not_found_in_trash'    => __( 'No students found in Trash.' ),
        'archives'              => __( 'Student Archives'),
        'insert_into_item'      => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'      => __( 'Filter student list'),
        'items_list_navigation' => __( 'Student list navigation'),
        'items_list'            => __( 'Student list'),
        'featured_image'        => __( 'Student featured image'),
        'set_featured_image'    => __( 'Set student featured image'),
        'remove_featured_image' => __( 'Remove student featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'student' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'template' => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Add a Short Biography...',
            ) ),
            array( 'core/button', array(
                'placeholder' => 'Link to Portfolio...',
            ) ),
        ),
        'template_lock'      => 'all',
    );

    register_post_type( 'mchigh-student', $args );

}
add_action('init', 'mchigh_register_custom_post_types');

function mchigh_register_taxonomy() {

    //Register Staff Type taxonomy
    $labels = array(
        'name'              => _x( 'Staff Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Type' ),
        'all_items'         => __( 'All Staff Type' ),
        'parent_item'       => __( 'Parent Staff Type' ),
        'parent_item_colon' => __( 'Parent Staff Type:' ),
        'edit_item'         => __( 'Edit Staff Type' ),
        'update_item'       => __( 'Update Staff Type' ),
        'add_new_item'      => __( 'Add New Staff Type' ),
        'new_item_name'     => __( 'New Work Staff Type' ),
        'menu_name'         => __( 'Staff Type' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-type' ),
    );
    register_taxonomy( 'mchigh-staff-type', array( 'mchigh-staff' ), $args );

    //Register Student Type taxonomy
    $labels = array(
        'name'              => _x( 'Student Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Types' ),
        'all_items'         => __( 'All Student Types' ),
        'parent_item'       => __( 'Parent Student Type' ),
        'parent_item_colon' => __( 'Parent Student Type:' ),
        'edit_item'         => __( 'Edit Student Type' ),
        'update_item'       => __( 'Update Student Type' ),
        'add_new_item'      => __( 'Add New Student Type' ),
        'new_item_name'     => __( 'New Student Type' ),
        'menu_name'         => __( 'Student Types' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-types' ),
    );
    register_taxonomy( 'mchigh-student-type', array( 'mchigh-student' ), $args );

}
add_action('init', 'mchigh_register_taxonomy');

function fwd_rewrite_flush() {
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );