<?php $hero = get_field('hero'); ?>
<section class="fp-hero fp-hero--video">
     <video autoplay loop muted playsinline onloadeddata="this.play();" poster="<?php echo esc_url($hero['background_image']['url']); ?>">
        <source 
            src="<?php echo esc_url($hero['video']['url']); ?>" 
            type="<?php echo esc_attr($hero['video']['mime_type']); ?>">
        Your browser does not support the video tag.
    </video> 
    <div class="fp-hero__overlay"></div>
    <div class="fp-hero__content container">
        <h2><?php echo wp_kses_post($hero['primary_heading']); ?></h2>
        <button type="button" class="fp-button" id="playFpVideo">Watch the Video</button>
    </div>
</section>