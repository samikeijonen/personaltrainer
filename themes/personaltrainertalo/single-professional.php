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
            <?php Kala\display_terms( [ 'taxonomy' => 'professional_category', 'sep' => '' ] ) ?>
        </div>
        <?php
        if ( has_post_thumbnail() ) :
            ?>
            <figure class="entry__image"><?php the_post_thumbnail( 'large' ); ?></figure>
            <?php
        endif;
        the_content();
        ?>
    </article>

    <?php
endwhile;
get_footer();
