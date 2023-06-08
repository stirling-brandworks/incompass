<?php /* Template Name: Home Page v1 */ ?>

<?php get_header(); ?>

<div id="main-content">
    <?php add_revslider('homepage-hero'); ?>
    <?php get_template_part('partials/home/hero'); ?>
    <div class="relative bg-white overflow-hidden">
        <div class="relative z-3">
            <?php get_template_part('partials/home/intro'); ?>
            <?php get_template_part('partials/home/programs'); ?>
        </div>
        <div class="absolute left-0 bottom-0 z-0 w-100 h-100 text-left">
            <svg class="absolute" style="top:4rem" width="1280" height="1381" viewBox="0 0 1280 1381" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.6" d="M1424 1381L-8 0V1381H1424Z" fill="#DDE5ED"/>
            </svg>
        </div>
    </div>
    <?php get_template_part('partials/home/respite'); ?>
    <?php get_template_part('partials/home/news'); ?>
    <?php get_template_part('partials/home/testimonials'); ?>
    <?php get_template_part('partials/home/cta-blocks'); ?>
</div>


<?php get_footer();