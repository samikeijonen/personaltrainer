<?php
/**
 * Partial for displaying page content.
 *
 * @package Kala
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-area' ); ?>>

    <?php the_content(); ?>

</article>
