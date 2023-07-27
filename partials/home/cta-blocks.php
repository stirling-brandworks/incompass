<?php $link = get_field('block_1_link');?>
<?php $link2 = get_field('block_2_link');?>

<section class="d-md-flex relative">
    
    <div class="w-md-50 text-white text-center bg-purple">
        <div class="py-8">
            <?php 
                $image = get_field('block_1_icon');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="mb-1 mx-auto" />
            <?php endif; ?>
            <?php if( get_field('block_1_title') ): ?>
                <h1 class="text-white mb-8"><?php the_field('block_1_title'); ?></h1>
            <?php endif; ?>
            <div class="mb-4">
                <a href="<?php echo $link['url']; ?>" class="border btn-white-outline uppercase py-2 px-4 fw-bold">
                    <span class="mr-1"><?php echo $link['title']; ?></span>
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.46648 4.29655C5.85216 4.68622 5.85216 5.31378 5.46648 5.70345L1.87346 9.33371C1.245 9.96868 0.162719 9.52365 0.162719 8.63025L0.16272 1.36974C0.16272 0.476352 1.245 0.0313211 1.87346 0.666293L5.46648 4.29655Z" fill="white"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="w-md-50 text-deep-purple text-center bg-teal">
        <div class="py-8">
            <?php 
                $image = get_field('block_2_icon');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="mb-1 mx-auto" />
            <?php endif; ?>
            <?php if( get_field('block_2_title') ): ?>
                <h1 class="text-deep-purple mb-8"><?php the_field('block_2_title'); ?></h1>
            <?php endif; ?>
            <div class="mb-4">
                <a href="<?php echo $link2['url']; ?>" class="border btn-deep-purple-outline uppercase py-2 px-4 fw-bold">
                    <span class="mr-1"><?php echo $link2['title']; ?></span>
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.46648 4.29655C5.85216 4.68622 5.85216 5.31378 5.46648 5.70345L1.87346 9.33371C1.245 9.96868 0.162719 9.52365 0.162719 8.63025L0.16272 1.36974C0.16272 0.476352 1.245 0.0313211 1.87346 0.666293L5.46648 4.29655Z" fill="#211747"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</section>