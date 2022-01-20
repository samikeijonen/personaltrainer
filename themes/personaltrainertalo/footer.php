<?php
/**
 * Footer template.
 *
 * @package Lahdensivunkoti
 */

?>
    </div>
        </main><!-- .site-content -->

        <section class="contact x-padding" aria-label="<?php esc_attr_e( 'Contact', 'kala' ); ?>">
            <div class="contact__container container top-margin">
            <?php
                    // Echo from reusable blocks `/wp-admin/edit.php?post_type=wp_block`.
                    // Needs to have slug `alapalkki`.
                    $form_post = get_page_by_path( 'lomake', '', 'wp_block' );
                    if ( $form_post ) :
                        echo apply_filters( 'the_content', get_the_content( null, false, absint( $footer_post->ID )) ); // phpcs:ignore
                    endif;
                ?>
            </div>
        </section>

        <svg class="site-footer__wave" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="var(--wp--custom--color--grey--200)" fill-opacity="1" d="M0,160L80,170.7C160,181,320,203,480,192C640,181,800,139,960,138.7C1120,139,1280,181,1360,202.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
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
