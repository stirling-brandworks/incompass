<?php
if ( et_theme_builder_overrides_layout( ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ) || et_theme_builder_overrides_layout( ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ) ) {
    // Skip rendering anything as this partial is being buffered anyway.
    // In addition, avoids get_sidebar() issues since that uses
    // locate_template() with require_once.
    return;
}

/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>
    <footer id="main-footer" class="ic-footer">
        <h2 class="ic-footer__title">Dedicated to Improving Lives</h2>
        
        <?php get_sidebar( 'footer' ); ?>

        <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
        <div class="ic-footer-menu container">
            <div class="ic-footer-menu__logo">
				<img src="<?php echo get_stylesheet_directory_uri() . '/icons/logo-arc.svg'; ?>" alt="Incompass Logo" />
            </div>
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu',
                    'depth'          => '1',
                    'menu_class'     => 'ic-footer-menu__nav',
                    'container'      => '',
                    'fallback_cb'    => '',
                ) );
            ?>
        </div>
        <?php endif; ?>

        <div class="ic-footer-socket container">
            <div class="ic-footer-socket__subscribe">
                <!-- Begin Constant Contact Inline Form Code -->
                <div class="ctct-inline-form" data-form-id="5f688ae2-2aa3-426b-800f-941aaa5dd485"></div>
                <!-- End Constant Contact Inline Form Code -->
            </div>
            <div class="ic-footer-socket__social">
                <?php
                    wp_nav_menu( array(
                        'menu'          => 61,
                        'depth'         => '1',
                        'menu_class'    => 'ic-footer-social__nav',
                        'container'     => '',
                        'fallback_cb'   => '',
                    ) );
                ?>
            </div>
        </div>

        <div id="footer-bottom">
            <div class="container clearfix">
                © <?php echo date('Y'); ?> Incompass Human Services, All Rights Reserved. <a href="https://stirlingbrandworks.com" target="_blank">Website design and development by Stirling Brandworks.</a>
            </div>	<!-- .container -->
        </div>
    </footer> <!-- #main-footer -->
</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

</div> <!-- #page-container -->

<?php wp_footer(); ?>
</body>
</html>
