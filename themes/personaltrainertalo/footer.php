<?php
/**
 * Footer template.
 *
 * @package Kala
 */

?>
    </div>
        </main><!-- .site-content -->

        <section id="contact" class="contact x-padding" aria-label="<?php esc_attr_e( 'Contact', 'kala' ); ?>">
            <div class="contact__container container top-margin">
            <?php
                    // Echo from reusable blocks `/wp-admin/edit.php?post_type=wp_block`.
                    // Needs to have slug `alapalkki`.
                    $form_post = get_page_by_path( 'lomake', '', 'wp_block' );
                    if ( $form_post ) :
                        echo apply_filters( 'the_content', get_the_content( null, false, absint( $form_post->ID )) ); // phpcs:ignore
                    endif;
                ?>
            </div>
        </section>

        <footer class="site-footer x-padding">
            <div class="site-footer__container container top-margin top-margin--xl">
                <div class="site-footer__text top-margin">
                    <?php
                        // Echo from reusable blocks `/wp-admin/edit.php?post_type=wp_block`.
                        // Needs to have slug `alapalkki`.
                        $footer_post = get_page_by_path( 'alapalkki', '', 'wp_block' );
                        if ( $footer_post ) :
                            echo apply_filters( 'the_content', get_the_content( null, false, absint( $footer_post->ID )) ); // phpcs:ignore
                        endif;
                    ?>
                </div>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
