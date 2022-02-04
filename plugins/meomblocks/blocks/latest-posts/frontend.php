<?php

namespace MEOM\Blocks;

$post_type = attr( 'postType', $attributes, 'post' );
$term_id   = attr( 'termId', $attributes );
$count     = attr( 'count', $attributes, '3' );

// Set taxonomy based on post type.
$taxonomy = 'category';
if ($post_type === 'reference') {
    $taxonomy = 'reference_category';
}
if ($post_type === 'professional') {
    $taxonomy = 'professional_category';
}

$class_names = [
    'latest-posts',
    'alignwide',
];

// Same base arguments for all.
$args = [
    'post_type'              => $post_type,
    'posts_per_page'         => $count,
    'no_found_rows'          => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
];

if ( $term_id && $term_id !== 0 ) :
    $args['tax_query'] = [
        [
            'taxonomy' => esc_attr( $taxonomy ),
            'field'    => 'id',
            'terms'    => absint( $term_id ),
        ],
    ];
endif;

$latest_posts = new \WP_Query( $args );

// Adds all the default attributes like `className` or `align`.
$wrapper_attributes = get_block_wrapper_attributes( [ 'class' => implode( ' ', $class_names ) ] );

?>
<div <?php echo $wrapper_attributes; // phpcs:ignore ?>>
    <div class="grid has-3-columns">
        <?php
            if ( $latest_posts->have_posts() ) :
                while ( $latest_posts->have_posts() ) :
                    $latest_posts->the_post();

                    get_template_part( 'partials/post/post-item' );
                endwhile;
            endif;
        ?>
    </div>
</div>
<?php
wp_reset_postdata();
