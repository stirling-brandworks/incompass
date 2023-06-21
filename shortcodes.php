<?php 

// Recent News Shortcode
function ic_recent_news($atts) {
    // Extract the attributes
    $atts = shortcode_atts(array(
        'category' => '', // Default category value if not provided
    ), $atts);

    ob_start();
    // Modify the arguments to include the category attribute
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'cat' => $atts['category'],
    );
    $featuredNews = new WP_Query($args);

    if ($featuredNews->have_posts()) {
        echo '<div class="news-slider-wrapper">';
            echo '<div class="news-slider">';
            while ($featuredNews->have_posts()) {
                $featuredNews->the_post();
                echo '<div class="news-slide mx-2 my-3">';
                include('partials/news-card.php');
                echo '</div>';
            }
            echo '</div>';
        echo '</div>';

        // Add CSS styles for slide spacing
        echo '<style>
                .news-slider-wrapper {
                    position: relative;
                }
                .slick-prev,
                .slick-next {
                    position: absolute;
                    bottom: -2rem;
                    cursor: pointer;
                    width: 2rem;
                    height: 2rem;
                    line-height: 2.25rem;
                    border-radius: 2rem;
                    text-align: center;
                    background: #DDE5ED;
                    opacitY: 0.5;
                    transition: 0.25s all ease;
                }

                .slick-prev:hover,
                .slick-next:hover{
                    opacity: 1;
                }
                .slick-prev {
                    left: auto;
                    right: 10px;
                }
                .slick-next {
                    left: auto;
                    right: -30px;
                }
                .slick-dots {
                    position: absolute;
                    bottom: -3rem;
                    left: 0;
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    justify-content: start;
                    align-items: start;
                }
                .slick-dots li {
                    margin: 0 0.5rem;
                    list-style: none;
                }
                .slick-dots li button {
                    background: #DDE5ED;
                    width: 1rem;
                    height: 1rem;
                    border: none;
                    border-radius: 100%;
                    padding: 0;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }
                .slick-dots li.slick-active button {
                    background: #00bab3;
                }
            </style>';

        // Initialize the slider using JavaScript
        echo '<script>
                jQuery(document).ready(function($) {
                    $(".news-slider").slick({
                        slidesToShow: 3, // Number of slides to show on large screens
                        slidesToScroll: 1,
                        centerMode: true, // Enable center mode
                        responsive: [
                            {
                                breakpoint: 1024, // Tablet breakpoint
                                settings: {
                                    slidesToShow: 2, // Number of slides to show on tablet
                                    centerMode: false, // Disable center mode on tablet
                                }
                            },
                            {
                                breakpoint: 768, // Mobile breakpoint
                                settings: {
                                    slidesToShow: 1, // Number of slides to show on mobile
                                    centerMode: false, // Disable center mode on tablet
                                }
                            }
                        ],
                        prevArrow: \'<a class="slick-prev"><svg width="18" height="18" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.3732 20.1275C10.1218 20.3788 9.78092 20.52 9.42549 20.52C9.07005 20.52 8.72917 20.3788 8.47781 20.1275L3.1161 14.7658C2.86481 14.5145 2.72365 14.1736 2.72365 13.8181C2.72365 13.4627 2.86481 13.1218 3.1161 12.8705L8.47781 7.50876C8.73061 7.26459 9.06921 7.12949 9.42066 7.13254C9.77212 7.1356 10.1083 7.27657 10.3568 7.52509C10.6054 7.77362 10.7463 8.10981 10.7494 8.46127C10.7524 8.81272 10.6173 9.15132 10.3732 9.40413L7.29957 12.4777L22.8297 12.4777C23.1852 12.4777 23.5262 12.6189 23.7776 12.8703C24.0289 13.1217 24.1702 13.4626 24.1702 13.8181C24.1702 14.1737 24.0289 14.5146 23.7776 14.766C23.5262 15.0174 23.1852 15.1586 22.8297 15.1586L7.29957 15.1586L10.3732 18.2322C10.6245 18.4835 10.7656 18.8244 10.7656 19.1798C10.7656 19.5353 10.6245 19.8762 10.3732 20.1275V20.1275Z" fill="#211747"/></svg></a>\',
                        nextArrow: \'<a class="slick-next"><svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17.444 7.50876C17.6953 7.25747 18.0362 7.1163 18.3917 7.1163C18.7471 7.1163 19.088 7.25747 19.3393 7.50876L24.701 12.8705C24.9523 13.1218 25.0935 13.4627 25.0935 13.8181C25.0935 14.1736 24.9523 14.5145 24.701 14.7658L19.3393 20.1275C19.0865 20.3717 18.7479 20.5068 18.3965 20.5037C18.045 20.5007 17.7088 20.3597 17.4603 20.1112C17.2118 19.8627 17.0708 19.5265 17.0677 19.175C17.0647 18.8236 17.1998 18.485 17.444 18.2322L20.5176 15.1586H4.9874C4.6319 15.1586 4.29095 15.0173 4.03957 14.766C3.7882 14.5146 3.64697 14.1736 3.64697 13.8181C3.64697 13.4626 3.7882 13.1217 4.03957 12.8703C4.29095 12.6189 4.6319 12.4777 4.9874 12.4777H20.5176L17.444 9.40412C17.1927 9.15276 17.0515 8.81187 17.0515 8.45644C17.0515 8.10101 17.1927 7.76013 17.444 7.50876V7.50876Z" fill="#211747"/></svg></a>\',
                        dots: true, // Enable dots
                        appendDots: $(".news-slider-wrapper"), // Append dots to the wrapper element
                        customPaging: function(slider, i) {
                            return \'<button type="button"></button>\'; // Customize dot appearance
                        }
                    });
                });
            </script>';
    } else {
        echo 'No posts.';
    }
    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('news-posts', 'ic_recent_news');


