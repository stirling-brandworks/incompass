<section class="bg-deep-purple text-white pt-4 pb-8 border-t-4 border-teal relative">
    <div class="container text-center relative z-3">
        <?php if( get_field('respite_subtitle') ): ?>
            <h4 class="text-white text-md mb-2"><?php the_field('respite_subtitle'); ?></h4>
        <?php endif; ?>
        <?php if( get_field('respite_title') ): ?>
            <h1 class="text-white text-3xl mb-6"><?php the_field('respite_title'); ?></h1>
        <?php endif; ?>
        <?php if( get_field('respite_content') ): ?>
            <div class="text-white mt-1 mb-6 w-md-50 mx-auto"><?php the_field('respite_content'); ?></div>
        <?php endif; ?>

        <?php if( have_rows('quicklinks') ): ?>
        <div class="d-md-flex flex-justify-center my-8 text-center">
        
                
            <?php while( have_rows('quicklinks') ): the_row(); 
                $image = get_sub_field('icon');
                $link = get_sub_field('link');
            ?>
                <div class="w-md-30 mb-4 text-center">
                    <a href="<?php echo $link['url']; ?>" class="text-white">
                        <?php if($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-auto h-4 mb-2 mx-auto" />
                        <?php endif; ?>
                        <h5 class="text-white uppercase mx-0">
                            <span class="mr-1"><?php echo $link['title']; ?></span>
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.46648 4.29655C5.85216 4.68622 5.85216 5.31378 5.46648 5.70345L1.87346 9.33371C1.245 9.96868 0.162719 9.52365 0.162719 8.63025L0.16272 1.36974C0.16272 0.476352 1.245 0.0313211 1.87346 0.666293L5.46648 4.29655Z" fill="white"/>
                            </svg>
                        </h5>
                    </a>
                </div>
            <?php endwhile; ?>

        </div>
        <?php endif; ?>

    </div>

    <?php 
    $image = get_field('respite_bg_img');
    if( !empty( $image ) ): ?>
        <div class="w-100 h-100 bg-deep-purple opacity-075 absolute left-0 top-0 z-1"></div>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-100 h-100 object-fit-cover absolute opacity-05 left-0 top-0 z-0" />
    <?php endif; ?>
</section>