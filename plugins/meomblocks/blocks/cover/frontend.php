<?php

namespace MEOM\Blocks;

$image   = attr( 'image', $attributes, null );
$content = remove_empty_tags_recursive( $content );

$class_names = [
    'cover',
    'cover-bg',
    'alignfull',
    'content-row',
    'x-padding',
    'has-background',
];

// Adds all the default attributes like `className` or `align`.
$wrapper_attributes = get_block_wrapper_attributes( [ 'class' => implode( ' ', $class_names ) ] );

if ( ! $content ) :
    return;
endif;
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore ?>>
    <div class="cover__container container alignregular">
        <div class="cover__content top-margin">
            <?php echo do_blocks( $content ); // phpcs:ignore ?>
        </div>

        <?php if ( $image ) : ?>
            <figure class="cover__image">
                <?php echo wp_get_attachment_image( $image['id'], 'kala-hero', '', [ 'class' => 'cover-img' ] ); // phpcs:ignore ?>
            </figure>
        <?php endif; ?>
    </div>
</div>
