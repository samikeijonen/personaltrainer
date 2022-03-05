<?php

namespace MEOM\Blocks;

$image_position = attr( 'imagePosition', $attributes, 'left' );
$image_full     = attr( 'imageFull', $attributes, false );
$bg_color       = attr( 'backgroundColor', $attributes, 'green-light' );
$image          = attr( 'image', $attributes, null );
$class_name     = attr( 'className', $attributes, '' );
$content        = remove_empty_tags_recursive( $content );

$image_full_class = $image_full ? 'has-full-img' : 'has-not-full-img';
$align_class      = $image_full ? 'alignfull' : 'alignwide';

$class_names = [
    'image-and-text',
    'image-and-text--position-' . $image_position,
    $image_full_class,
    $align_class,
    'content-row',
];

// Adds all the default attributes like `className` or `align`.
$wrapper_attributes = get_block_wrapper_attributes( [ 'class' => implode( ' ', $class_names ) ] );

if ( $content ) : ?>
    <div <?php echo $wrapper_attributes; // phpcs:ignore ?>>
        <div class="image-and-text__container grid has-2-columns has-no-gap top-margin">
            <?php if ( $image ) : ?>
                <figure class="image-and-text__image">
                    <?php echo wp_get_attachment_image( $image['id'], 'large' ); // phpcs:ignore ?>
                </figure>
            <?php endif; ?>
            <div class="image-and-text__content top-margin">
                <?php echo do_blocks( $content ); // phpcs:ignore ?>
            </div>
        </div>
    </div>
<?php endif;
