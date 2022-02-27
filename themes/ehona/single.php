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
        <?php
            get_template_part( 'partials/post/entry-meta' );

            the_content();
        ?>

        <div class="entry__meta">
            <?php Kala\display_terms( [ 'sep' => '' ] ) ?>
        </div>
    </article>

    <?php
endwhile;
get_footer();
