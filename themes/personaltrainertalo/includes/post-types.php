<?php
/**
 * Register post types and taxonomies.
 *
 * @package Kala
 */

namespace Kala;

function post_type_professional() {
    $labels = [
        'name'               => _x( 'Professional', 'Post Type General Name', 'kala' ),
        'singular_name'      => _x( 'Professional', 'Post Type Singular Name', 'kala' ),
        'menu_name'          => __( 'Professionals', 'kala' ),
        'name_admin_bar'     => __( 'Professional', 'kala' ),
        'parent_item_colon'  => __( 'Parent Professional:', 'kala' ),
        'all_items'          => __( 'All Professionals', 'kala' ),
        'add_new_item'       => __( 'Add New Professional', 'kala' ),
        'add_new'            => __( 'Add New', 'kala' ),
        'new_item'           => __( 'New Professional', 'kala' ),
        'edit_item'          => __( 'Edit Professional', 'kala' ),
        'update_item'        => __( 'Update Professional', 'kala' ),
        'view_item'          => __( 'View Professional', 'kala' ),
        'search_items'       => __( 'Search Professional', 'kala' ),
        'not_found'          => __( 'Not found', 'kala' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'kala' ),
    ];

    $rewrite = [
        'slug'       => 'asiantuntija',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true,
    ];

    $args = [
        'label'               => __( 'Professional', 'kala' ),
        'description'         => __( 'The Professional post type.', 'kala' ),
        'labels'              => $labels,
        'supports'            => [ 'title', 'editor', 'excerpt', 'thumbnail' ],
        'taxonomies'          => [],
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    ];

    register_post_type( 'professional', $args );
}
add_action( 'init', 'Kala\post_type_professional' );

function post_type_reference() {
    $labels = [
        'name'               => _x( 'Reference', 'Post Type General Name', 'kala' ),
        'singular_name'      => _x( 'Reference', 'Post Type Singular Name', 'kala' ),
        'menu_name'          => __( 'References', 'kala' ),
        'name_admin_bar'     => __( 'Reference', 'kala' ),
        'parent_item_colon'  => __( 'Parent Reference:', 'kala' ),
        'all_items'          => __( 'All References', 'kala' ),
        'add_new_item'       => __( 'Add New Reference', 'kala' ),
        'add_new'            => __( 'Add New', 'kala' ),
        'new_item'           => __( 'New Reference', 'kala' ),
        'edit_item'          => __( 'Edit Reference', 'kala' ),
        'update_item'        => __( 'Update Reference', 'kala' ),
        'view_item'          => __( 'View Reference', 'kala' ),
        'search_items'       => __( 'Search Reference', 'kala' ),
        'not_found'          => __( 'Not found', 'kala' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'kala' ),
    ];

    $rewrite = [
        'slug'       => 'asiantuntija',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true,
    ];

    $args = [
        'label'               => __( 'Reference', 'kala' ),
        'description'         => __( 'The Reference post type.', 'kala' ),
        'labels'              => $labels,
        'supports'            => [ 'title', 'editor', 'excerpt', 'thumbnail' ],
        'taxonomies'          => [],
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-clipboard',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    ];

    register_post_type( 'reference', $args );
}
add_action( 'init', 'Kala\post_type_reference' );
