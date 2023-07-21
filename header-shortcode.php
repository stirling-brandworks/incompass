<?php


//Shortcode for the Main Menu Buttons
function ic_header_menu_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <nav class="menu--actions-wrapper d-flex flex-items-center flex-justify-end">
        <?php
        // Output the navigation menu assigned to "secondary_nav" menu location
        wp_nav_menu(array(
            'theme_location' => 'main_menu_actions',
            'menu_class' => 'menu menu--actions m-0 p-0',
            'container' => false,
        ));
        ?>
        <button class="js-toggle-search bg-transparent border-none btn-search d-flex ml-4" id="search-toggle"> 
            <svg width="20" height="20" class="mr-1" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 9C9 8.46957 9.21071 7.96086 9.58579 7.58579C9.96086 7.21071 10.4696 7 11 7C11.5304 7 12.0391 7.21071 12.4142 7.58579C12.7893 7.96086 13 8.46957 13 9C13 9.53043 12.7893 10.0391 12.4142 10.4142C12.0391 10.7893 11.5304 11 11 11C10.4696 11 9.96086 10.7893 9.58579 10.4142C9.21071 10.0391 9 9.53043 9 9Z" fill="#00BAB3"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM11 5C10.2947 4.9999 9.60184 5.18631 8.99178 5.54032C8.38172 5.89434 7.87612 6.40338 7.52624 7.01582C7.17636 7.62826 6.99465 8.32232 6.99952 9.02764C7.0044 9.73296 7.19569 10.4245 7.554 11.032L5.293 13.292C5.10536 13.4795 4.99989 13.7339 4.9998 13.9991C4.99975 14.1305 5.02558 14.2606 5.0758 14.3819C5.12602 14.5033 5.19966 14.6136 5.2925 14.7065C5.38534 14.7994 5.49558 14.8731 5.61691 14.9234C5.73824 14.9737 5.8683 14.9997 5.99965 14.9997C6.26492 14.9998 6.51936 14.8945 6.707 14.707L8.968 12.446C9.49785 12.7583 10.0926 12.9442 10.7059 12.9892C11.3193 13.0343 11.9348 12.9373 12.5046 12.7058C13.0744 12.4743 13.5832 12.1146 13.9913 11.6545C14.3994 11.1944 14.696 10.6464 14.8579 10.0531C15.0198 9.45975 15.0428 8.83708 14.9249 8.23345C14.807 7.62982 14.5516 7.0615 14.1783 6.57266C13.8051 6.08382 13.3242 5.68763 12.773 5.41487C12.2217 5.14212 11.615 5.00015 11 5Z" fill="#00BAB3"/>
            </svg>
            Search
        </button>
        <button class="js-toggle-mega-menu btn-toggle d-flex ml-4" id="mm-toggle">
            <span>
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M38.75 11.75C38.75 11.1533 38.5129 10.581 38.091 10.159C37.669 9.73705 37.0967 9.5 36.5 9.5H9.5C8.90326 9.5 8.33097 9.73705 7.90901 10.159C7.48705 10.581 7.25 11.1533 7.25 11.75C7.25 12.3467 7.48705 12.919 7.90901 13.341C8.33097 13.7629 8.90326 14 9.5 14H36.5C37.0967 14 37.669 13.7629 38.091 13.341C38.5129 12.919 38.75 12.3467 38.75 11.75ZM38.75 23C38.75 22.4033 38.5129 21.831 38.091 21.409C37.669 20.9871 37.0967 20.75 36.5 20.75H9.5C8.90326 20.75 8.33097 20.9871 7.90901 21.409C7.48705 21.831 7.25 22.4033 7.25 23C7.25 23.5967 7.48705 24.169 7.90901 24.591C8.33097 25.0129 8.90326 25.25 9.5 25.25H36.5C37.0967 25.25 37.669 25.0129 38.091 24.591C38.5129 24.169 38.75 23.5967 38.75 23ZM38.75 34.25C38.75 33.6533 38.5129 33.081 38.091 32.659C37.669 32.2371 37.0967 32 36.5 32H23C22.4033 32 21.831 32.2371 21.409 32.659C20.9871 33.081 20.75 33.6533 20.75 34.25C20.75 34.8467 20.9871 35.419 21.409 35.841C21.831 36.2629 22.4033 36.5 23 36.5H36.5C37.0967 36.5 37.669 36.2629 38.091 35.841C38.5129 35.419 38.75 34.8467 38.75 34.25Z" fill="white"/>
                </svg>
            </span>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </nav>
    <?php
    return ob_get_clean(); // Return the buffered output
}
add_shortcode('ic_header_menu', 'ic_header_menu_shortcode');

//Shortcode for the top menu links
function ic_top_nav_menu_shortcode() {
    ob_start(); // Start output buffering
    ?>

    <nav class="top-nav-menu d-flex flex-items-center flex-justify-end">
        <?php
        // Output the navigation menu assigned to "secondary_nav" menu location
        wp_nav_menu(array(
            'theme_location' => 'top_nav_menu',
            'menu_class' => 'menu m-0 p-0',
            'container' => false,
        ));
        ?>
    </nav>

    <?php
    return ob_get_clean(); // Return the buffered output
}
add_shortcode('ic_top_nav_menu', 'ic_top_nav_menu_shortcode');
