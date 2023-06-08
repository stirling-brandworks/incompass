<?php $link = get_field('news_button');?>
<?php $event = get_field('featured_event'); ?>

<section class="bg-white py-8 mb-8">
    <div class="container mb-8">
        <div class="d-md-flex mb-4 flex-justify-between">
            <?php if( get_field('news_title') ): ?>
                <h1 class="text-deep-purple mb-2"><?php the_field('news_title'); ?></h1>
            <?php endif; ?>
            <?php if($link):?>
                <a href="<?php echo $link['url']; ?>" class="border transition border-deep-purple uppercase text-deep-purple py-2 px-4 fw-bold text-xs ml-1 mb-2 bg-deep-purple-hover text-white-hover">
                    <span class="mr-1"><?php echo $link['title']; ?></span>
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.46648 4.29655C5.85216 4.68622 5.85216 5.31378 5.46648 5.70345L1.87346 9.33371C1.245 9.96868 0.162719 9.52365 0.162719 8.63025L0.16272 1.36974C0.16272 0.476352 1.245 0.0313211 1.87346 0.666293L5.46648 4.29655Z" fill="#211747"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
        <div class="d-md-flex mb-8 pb-8">

        <?php if ($event):?>
            <div class="w-md-70 d-md-flex">

            <?php
                $cat = get_field('news_category');
                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 2,
                'cat' => $cat,
            );

            $featuredNews = new WP_Query($args);?>
        
        <? else:?>

            <div class="w-md-100 d-md-flex">

            <?php
                $cat = get_field('news_category');
                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'cat' => $cat,
            );

            $featuredNews = new WP_Query($args);?>


        <?php endif;?>
        
            <?php if ($featuredNews->have_posts()):?>
                <?php while ($featuredNews->have_posts()): $featuredNews->the_post();?>
                    <div class="w-md-50">
                        <div class="card shadow rounded overflow-hidden bg-white mb-4 h-100 border-gray mr-4">
                            <?php if (has_post_thumbnail()):?>
                                <a href="<?php echo the_permalink();?>" class="relative" style="height:250px;" >
                                    <img src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_title();?>" class="w-100 object-fit-cover" style="height:250px;" />
                                </a>
                            <?php endif;?>
                            <div class="pt-4 pb-2 px-4">
                                <h4 class="text-md-lg text-deep-purple">
                                    <a class="text-deep-purple text-purple-hover" href="<?php echo the_permalink();?>">
                                        <?php echo the_title();?>
                                    </a>
                                </h4>
                                <div class="mt-1 mb-4 text-dark">
                                    <?php echo the_time('M d, Y');?>
                                </div>
                                <div class="text-xs lh-2 mb-5 text-dark">
                                    <?php echo libby_excerpt(30);?>
                                </div>
                                <a href="<?php echo the_permalink();?>" class="uppercase text-purple text-xs fw-bolder">
                                    <span class="mr-1">Read More</span>
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.37871 4.2797C5.76439 4.66938 5.76439 5.29693 5.37871 5.68661L1.78569 9.31686C1.15723 9.95183 0.0749507 9.5068 0.0749507 8.61341L0.074951 1.3529C0.0749511 0.459506 1.15723 0.0144754 1.78569 0.649447L5.37871 4.2797Z" fill="#72246C"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php
                wp_reset_postdata();
            ?>


                
            </div>

            <?php if ($event):?>

                <div class="w-md-30">

                <?php            
                    $event_title = get_the_title($event);
                    $event_permalink = get_permalink($event);

                    $event_date = get_field('event_date', $event);
                    if ($event_date) {
                        $event_date_object = DateTime::createFromFormat('Y-m-d', $event_date);
                        if ($event_date_object instanceof DateTime) {
                            $event_month = $event_date_object->format('M');
                            $event_day = $event_date_object->format('d');
                        } else {
                            $event_month = '';
                        }
                    } else {
                        $event_month = '';
                    }

                    $event_thumbnail_url = get_the_post_thumbnail_url($event, 'large');
                    $event_excerpt = get_the_excerpt($event);
                    $event_content = custom_truncate($event_excerpt, 120, '...');
                    ?>
                    
                    <div class="card shadow rounded overflow-hidden bg-purple mb-4 h-100  border-gray mr-4">
                        <?php if ($event_thumbnail_url): ?>
                            <a href="<?php echo $event_permalink; ?>" class="relative d-block" style="height:250px;">
                                <?php if ($event_month !== '') : ?>
                                    <div class="absolute bg-white rounded overflow-hidden text-center" style="height:80px;width:80px;left:1rem;top:1rem;">
                                        
                                        <div class="px-2 py-1 text-white bg-purple fw-bold text-md uppercase"><?php echo $event_month; ?></div>
                                        <div class="p-2 text-lg fw-bold text-black bg-white"><?php echo $event_day; ?></div>
                                    </div>
                                <?php endif;?>
                                <img src="<?php echo $event_thumbnail_url; ?>" alt="<?php echo $event_title; ?>" class="w-100 object-fit-cover" style="height:250px;" />
                            </a>
                        <?php else: ?>
                            <?php if ($event_month): ?>
                                <div class="p-4 text-white"><?php echo $event_date; ?></div>
                            <?php endif;?>
                        <?php endif; ?>
                        
                        <div class="pt-4 pb-2 px-4">
                            <h6 class="uppercase text-xs text-white mb-1">Upcoming Event</h6>
                            <h4 class="text-md-lg text-white">
                                <a class="text-white" href="<?php echo $event_permalink; ?>">
                                    <?php echo $event_title; ?>
                                </a>
                            </h4>
                            <div class="text-xs lh-2 mb-5 text-white">
                                <?php echo $event_content; ?>
                            </div>
                            <a href="<?php echo $event_permalink; ?>" class="uppercase text-white text-xs fw-bolder">
                                <span class="mr-1">Read More</span>
                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.37871 4.2797C5.76439 4.66938 5.76439 5.29693 5.37871 5.68661L1.78569 9.31686C1.15723 9.95183 0.0749507 9.5068 0.0749507 8.61341L0.074951 1.3529C0.0749511 0.459506 1.15723 0.0144754 1.78569 0.649447L5.37871 4.2797Z" fill="#FFF"/>
                                </svg>
                            </a>
                        </div>
                    </div> 
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>