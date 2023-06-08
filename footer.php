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
    <footer id="main-footer" class="bg-deep-purple ic-footer">
        <div class="container relative z-3">
            <div class="d-md-flex flex-items-start flex-justify-between mb-2">
                
                <div class="w-md-25 text-center text-md-left relative z-3">
                    <a class="mb-2">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/icons/logo-arc.svg'; ?>" alt="Incompass Logo" class="w-100 h-auto" />
                    </a>
                    <div class="my-4">
                        <?php
                            wp_nav_menu( array(
                                'menu'          => 61,
                                'depth'         => '1',
                                'menu_class'    => 'ic-footer-social__nav text-center text-md-left',
                                'container'     => '',
                                'fallback_cb'   => '',
                            ) );
                        ?>
                    </div>
                    <div class="my-4">
                        <address style="font-style:normal;" class="fw-bold">
                        4 Omni Way<br/>
                        Chelmsford, MA 01824
                        </address>
                    </div>
                    <div class="my-4">
                        <a href="tel:978-349-3000" class="fw-bold">978-349-3000</a>
                    </div>
                    <div class="my-4">
                        <a href="mailto:info@incompasshs.org" class="fw-bold">info@incompasshs.org</a>
                    </div>
                </div>

                <div class="w-md-70 relative z-3">
                    <?php get_sidebar( 'footer' ); ?>
                    <div class="w-100 ic-footer-socket__subscribe mt-8">
                        <!-- Begin Constant Contact Inline Form Code -->
                        <div class="ctct-inline-form" data-form-id="5f688ae2-2aa3-426b-800f-941aaa5dd485"></div>
                        <!-- End Constant Contact Inline Form Code -->
                    </div>
                </div>
            </div>
        </div>
        <div class="relative z-3">
                <div class="container clearfix text-white fw-light border-t border-white">
                    <div class="d-md-flex flex-items-center flex-justify-between py-6">
                        <div class="w-md-70">    
                            ©<?php echo date('Y'); ?> Incompass Human Services, All Rights Reserved. <a href="https://stirlingbrandworks.com" target="_blank">Website Design and Development by Stirling Brandworks.</a>
                        </div>

                        <div class="w-md-30 text-center text-md-right">
                            <a href="#" class="ml-2">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/carf.png" alt="Carf Accredited Logo" style="height:88px;width:88px;"/>
                            </a>
                            <a href="#" class="ml-2">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nehsco.png" alt="NEHSCO Affiliate Logo" style="height:88px;width:88px;"/>
                            </a>
                        </div> 
                    
                    </div>
                </div>	<!-- .container -->
        </div>
    </footer> <!-- #main-footer -->
</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

</div> <!-- #page-container -->

<?php wp_footer(); ?>
</body>
</html>
