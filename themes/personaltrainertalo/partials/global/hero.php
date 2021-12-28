<?php
/**
 * Partial for displaying hero.
 * Is called also from meomblocks.
 *
 * @package Lahdensivunkoti
 */

use function Kala\display_svg;

$image_id    = Kala\get_variable( $image_id );
$content     = Kala\get_variable( $content );
$extra_class = Kala\get_variable( $extra_class );
$class       = 'hero cover-bg content-row alignfull ' . $extra_class;

if ( $content ) : ?>
    <div class="<?php echo esc_html( $class ); ?>">
        <div class="hero__container container x-padding ">
            <div class="hero__content top-margin">
                <?php echo do_blocks( $content ); // phpcs:ignore ?>
            </div>
            <?php if ( $image_id ) : ?>
                <figure class="hero__image">
                    <?php echo wp_get_attachment_image( $image_id, 'kala-hero', '', [ 'loading' => 'eager', 'class' => 'cover-img' ] ); ?>
                </figure>
            <?php endif; ?>
        </div>
    </div>
    <?php
endif;
