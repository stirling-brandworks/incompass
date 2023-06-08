<?php

add_action(
    'wp_enqueue_scripts',
    function () {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'utilities-css', get_stylesheet_directory_uri() . '/utilities.css' );

        wp_enqueue_style(
            'typekit',
            'https://use.typekit.net/ebb5eod.css',
        );

        if (is_front_page()) {
            wp_enqueue_style(
                'incompass-fp', 
                get_stylesheet_directory_uri() . '/style-home.css',
                [],
                filemtime(get_stylesheet_directory() . '/style-home.css'),
                'all'
            );

            wp_enqueue_script(
                'countup.js',
                get_stylesheet_directory_uri() . '/js/countUp.umd.js',
                [],
                '2.0.0',
                true
            );

            wp_enqueue_script(
                'incompass-fp',
                get_stylesheet_directory_uri() . '/js/front-page.js',
                ['jquery', 'countup.js'],
                filemtime(get_stylesheet_directory() . '/js/front-page.js'),
                true
            );
        }
    }
);


//Custom News
function STNewsEvents($atts) {
	ob_start();
  	get_template_part('news');
  	return ob_get_clean();
}

add_shortcode('news-events-feed', 'STNewsEvents');

//Shortcode for Section Titles
function st_section_title($atts, $title = null) {
 extract( shortcode_atts( array(
          'title' => 'Title',
          'subtitle' => 'Subtitle'
), $atts ) );
return '<div class="section-title"><h5 class="section-title__subtitle">'. $subtitle .'</h5><h1 class="section-title__title">'. do_shortcode($title) .'</h1></div>';
}
add_shortcode('section-title', 'st_section_title');


//Shortcode for Stats
function st_stats($atts, $title = null) {
 extract( shortcode_atts( array(
          'number' => '0',
          'title' => 'title',
          'icon' => 'heart'
), $atts ) );
return '<section class="st-stat-item">
		<div class="st-stat-item__inner">
			<div class="st-stat-item__icon"><i class="fa fa-'.$icon.'"></i></div>
			<div class="st-stat-item__number counter-value counter" data-count="'.$number.'">0</div>
			<div class="st-stat-item__title">'.$title.'</div>
		</div></section>';
}
add_shortcode('stat-number', 'st_stats');


//Custom Excerpt
function libby_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
      return $excerpt;
}

function custom_truncate($text, $length, $suffix = '...') {
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length);
        $text = substr($text, 0, strrpos($text, ' '));
        $text .= $suffix;
    }
    return $text;
}

/**
 * Add Google Tag code after opening body tag.
 */
add_action(
    'wp_body_open', function () {
        echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5LGH8B" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
    }
);

// Need to make sure the posts have featured media
add_filter(
    'acf/fields/post_object/query/key=field_5f9c434bf666f',
    function ($args, $field, $post_id) {
        $args['meta_key'] = '_thumbnail_id';
        return $args;
    },
10, 3);


//Add Second Footer Menu
function register_new_menu() {
    register_nav_menu('footer-secondary-menu',__( 'Footer Secondary Menu' ));
    }
add_action( 'init', 'register_new_menu' );