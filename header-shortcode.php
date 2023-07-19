<?php


//Shortcode for the Main Menu Buttons
function ic_header_menu_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <nav>
        <?php
        // Output the navigation menu assigned to "secondary_nav" menu location
        wp_nav_menu(array(
            'theme_location' => 'main_menu_actions',
            'container' => false,
            'menu_class' => 'menu',
        ));
        ?>
    </nav>
    <button class="js-toggle-search" id="search-toggle">Toggle Search</button>
    <button class="js-toggle-mega-menu" id="mm-toggle">Toggle Menu</button>
    <?php
    return ob_get_clean(); // Return the buffered output
}
add_shortcode('ic_header_menu', 'ic_header_menu_shortcode');

//Shortcode for the top menu links
