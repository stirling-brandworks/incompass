<div class="card shadow rounded overflow-hidden bg-white mb-4 h-100 border-gray">
    <a href="<?php echo the_permalink();?>" class="relative" style="height:250px;" >
        <?php if (has_post_thumbnail()):?>
            <img src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_title();?>" class="w-100 object-fit-cover" style="height:250px;" />
        <?php else:?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.png" alt="<?php the_title();?>" class="w-100 object-fit-cover" style="height:250px;" />
        <?php endif;?>
    </a>
    <div class="pt-4 pb-4 px-4">
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