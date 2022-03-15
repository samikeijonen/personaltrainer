<?php
/**
 * Register post types and taxonomies.
 *
 * @package Kala
 */

namespace Kala;

function post_type_professional() {
    $labels = [
        'name'               => _x( 'Professionals', 'Post Type General Name', 'kala' ),
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
        'slug'       => 'asiantuntijat',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true,
    ];

    $args = [
        'label'               => __( 'Professional', 'kala' ),
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

    // https://codex.wordpress.org/Function_Reference/register_taxonomy
    $labels = [
        'name'              => __( 'Professional categories', 'kala' ),
        'singular_name'     => __( 'Professional category', 'kala' ),
        'search_items'      => __( 'Search Professional Categories', 'kala' ),
        'all_items'         => __( 'All Professional Categories', 'kala' ),
        'parent_item'       => __( 'Parent Professional Category', 'kala' ),
        'parent_item_colon' => __( 'Parent Professional Category:', 'kala' ),
        'edit_item'         => __( 'Edit Professional Category', 'kala' ),
        'update_item'       => __( 'Update Professional Category', 'kala' ),
        'add_new_item'      => __( 'Add New Professional Category', 'kala' ),
        'new_item_name'     => __( 'New Professional Category Title', 'kala' ),
        'menu_name'         => __( 'Professional Categories', 'kala' ),
    ];

    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'asiantuntijat-kategoria' ],
        'show_in_rest'      => true,
    ];

    register_taxonomy( 'professional_category', [ 'professional' ], $args );
}
add_action( 'init', 'Kala\post_type_professional' );

function post_type_reference() {
    $labels = [
        'name'               => _x( 'References', 'Post Type General Name', 'kala' ),
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
        'slug'       => 'kokemukset',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true,
    ];

    $args = [
        'label'               => __( 'Reference', 'kala' ),
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

    // https://codex.wordpress.org/Function_Reference/register_taxonomy
    $labels = [
        'name'              => __( 'Reference categories', 'kala' ),
        'singular_name'     => __( 'Reference category', 'kala' ),
        'search_items'      => __( 'Search Reference Categories', 'kala' ),
        'all_items'         => __( 'All Reference Categories', 'kala' ),
        'parent_item'       => __( 'Parent Reference Category', 'kala' ),
        'parent_item_colon' => __( 'Parent Reference Category:', 'kala' ),
        'edit_item'         => __( 'Edit Reference Category', 'kala' ),
        'update_item'       => __( 'Update Reference Category', 'kala' ),
        'add_new_item'      => __( 'Add New Reference Category', 'kala' ),
        'new_item_name'     => __( 'New Reference Category Title', 'kala' ),
        'menu_name'         => __( 'Reference Categories', 'kala' ),
    ];

    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'kokemukset-kategoria' ],
        'show_in_rest'      => true,
    ];

    register_taxonomy( 'reference_category', [ 'reference' ], $args );
}
add_action( 'init', 'Kala\post_type_reference' );
