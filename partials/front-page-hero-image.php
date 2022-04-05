<?php $hero = get_field('hero'); ?>
<section class="fp-hero fp-hero--image">
    <img class="fp-hero__bg" src="<?php echo esc_url($hero['background_image']['url']); ?>" alt="<?php echo esc_attr($hero['background_image']['alt']); ?>">
    <div class="fp-hero__content">
        <h2><?php echo wp_kses_post($hero['primary_heading']); ?></h2>
        <?php
        if(get_field('hero')['hero_button_link']) {
            ?>
            <a href="<?php echo get_field('hero')['hero_button_link']['url'] ?>" class="fp-button"><?php echo get_field('hero')['hero_button_link']['title'] ?></a>
            <?php
        }
        ?>
    </div>
</section>