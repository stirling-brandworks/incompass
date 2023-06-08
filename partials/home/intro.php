<?php $btn1 = get_field('intro_button_1');?>
<?php $btn2 = get_field('intro_button_2');?>


<section class="py-8 border-t-4 border-teal">
    <div class="container">
        <div class="d-md-flex flex-items-center">
            <div class="w-md-50 text-center">
                <?php 
                $image = get_field('intro_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-100 h-auto" />
                <?php endif; ?>
            </div>
            <div class="w-md-50 text-center text-md-left">
                <div class="px-8 mt-4">
                    <?php if( get_field('intro_title') ): ?>
                        <h1 class="text-deep-purple text-xl"><?php the_field('intro_title'); ?></h1>
                    <?php endif; ?>
                    <?php if( get_field('intro_content') ): ?>
                        <div class="my-4 text-dark"><?php the_field('intro_content'); ?></div>
                    <?php endif; ?>
                    <div class="mt-2">

                    <?php if($btn1):?>
                        <a href="<?php echo $btn1['url']; ?>" class="border border-purple bg-purple uppercase text-white py-2 px-4 fw-bold text-xs">
                            <span class="mr-1"><?php echo $btn1['title']; ?></span>
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.46648 4.29655C5.85216 4.68622 5.85216 5.31378 5.46648 5.70345L1.87346 9.33371C1.245 9.96868 0.162719 9.52365 0.162719 8.63025L0.16272 1.36974C0.16272 0.476352 1.245 0.0313211 1.87346 0.666293L5.46648 4.29655Z" fill="#fff"/>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if($btn2):?>
                        <a href="<?php echo $btn2['url']; ?>" class="border border-deep-purple uppercase text-deep-purple py-2 px-4 fw-bold text-xs ml-4">
                            <span class="mr-1"><?php echo $btn2['title']; ?></span>
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.46648 4.29655C5.85216 4.68622 5.85216 5.31378 5.46648 5.70345L1.87346 9.33371C1.245 9.96868 0.162719 9.52365 0.162719 8.63025L0.16272 1.36974C0.16272 0.476352 1.245 0.0313211 1.87346 0.666293L5.46648 4.29655Z" fill="#211747"/>
                            </svg>
                        </a>
                    <?php endif; ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>