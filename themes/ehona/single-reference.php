<?php
/**
 * Single template.
 *
 * @package Kala
 */

get_header();

while ( have_posts() ) :
    the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'content-area entry' ); ?>>
        <h1 class="entry__title has-text-align-center alignwide"><?php the_title(); ?></h1>
        <div class="entry__meta has-text-align-center">
            <?php Kala\display_terms( [ 'taxonomy' => 'reference_category', 'sep' => '' ] ) ?>
        </div>
        <?php
            the_content();
        ?>
    </article>

    <?php
endwhile;
get_footer();
