<?php /* Template Name: Home Page v1 */ ?>

<?php get_header(); ?>

<div id="main-content">
    <?php add_revslider('home-page-hero-1'); ?>
    <?php get_template_part('partials/home/hero'); ?>
    <div class="relative bg-white overflow-hidden z-1">
        <div class="relative z-3">
            <?php get_template_part('partials/home/intro'); ?>
            <?php get_template_part('partials/home/programs'); ?>
        </div>
        <div class="absolute left-0 bottom-0 z-0 w-100 h-100 text-left">
            <svg class="absolute w-100" style="top:4rem;left:-20%;" width="100%" height="1381" viewBox="0 0 1280 1381" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.6" d="M1424 1381L-8 0V1381H1424Z" fill="#DDE5ED"/>
            </svg>
        </div>
    </div>
    <?php get_template_part('partials/home/respite'); ?>
	<?php if( get_field('cta_title') ): ?>
	<section class="featured-cta text-white bg-purple pb-4">
		<div class="container">
			<div class="d-md-flex flex-justify-center mb-8 flex-items-center text-center text-md-left">
				<?php if( get_field('cta_image') ): ?>
					<?php $image = get_field('cta_image');?>
					<div class="w-md-50">
						<img src="<?php echo esc_url($image['url']); ?>" 
							 alt="<?php echo esc_attr($image['alt']); ?>" 
							 class="w-auto mb-2 mx-auto px-4 pr-md-8" style="height:400px;border-radius:8px;object-fit: cover;" />
					</div>
				<?php endif; ?>
				<div class="w-md-50">
					<?php if( get_field('cta_title') ): ?>
						<h3 class="text-white px-4"><?php the_field('cta_title'); ?></h3>
					<?php endif; ?>
					<?php if( get_field('cta_content') ): ?>
						<div class="px-4">
							<?php the_field('cta_content'); ?>
						</div>
					<?php endif; ?>
					<?php if( get_field('cta_link') ): ?>
					<div class="mt-2 px-4">
						<br/>
						<?php 
						$link = get_field('cta_link');
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="mt-4 mt-md-0 transition opacity-1 opacity-075-hover d-inline-block border border-white uppercase bg-white text-purple py-3 px-4 fw-bold" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					</div>
					<br/>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
    <?php get_template_part('partials/home/news'); ?>
    <?php get_template_part('partials/home/testimonials'); ?>
    <?php get_template_part('partials/home/cta-blocks'); ?>
	
	
</div>


<?php get_footer();
