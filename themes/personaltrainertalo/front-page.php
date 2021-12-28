<?php
/**
 * Front page template.
 *
 * @package Lahdensivunkoti
 */

get_header();

while ( have_posts() ) :
    the_post();
    get_template_part( 'partials/page/content', 'page' );
endwhile;

get_footer();
