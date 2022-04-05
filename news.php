<section class="news-events--custom-st">
	<div class="st-row">
		<div class="st-col st-col-8">
			<?php
			$args = array('category__not_in' => 63 ,'order' => 'DESC','orderby' => 'date','posts_per_page' => 2);
			$recent_posts_query = new WP_Query($args);
			if($recent_posts_query->have_posts()) : 
			    while($recent_posts_query->have_posts()) : 
			    $recent_posts_query->the_post();
			?>
			
			<?php if (has_post_thumbnail()) {?>
				<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');?>
				<a href="<?php echo the_permalink();?>" class="news-item--st news-item--st--half news-item--st--img" style="background-image:url(<?php echo esc_url($featured_img_url);?>);">
			<?php } else {?>
				<a href="<?php echo the_permalink();?>" class="news-item--st news-item--st--half news-item--st--no-img">
			<?php }?>
			
			
			
			
				<div class="news-item--st__cat news-item--st__cat--<?php $category = get_the_category(); echo $category[0]->slug;?>"><?php $category = get_the_category(); echo $category[0]->cat_name;?></div>
				<div class="news-item--st__caption news-item--st__caption--bottom">
					<div class="news-item--st__caption__inner">
						<h3 class="news-item--st__title"><?php the_title();?></h3>
						<div class="news-item--st__date">Posted on <?php echo the_date('m/d');?></div>
					</div>
				</div>
			</a>
			
			<?php
				endwhile;
				else:
			?>
			
			<div class="alert">Sorry, No posts to show.</div>
			
			<?php
				endif;
				wp_reset_query();
			?>
			
			
			<?php
			$args = array( 'category__not_in' => 63, 'order' => 'DESC','orderby' => 'date','posts_per_page' => 1, 'offset' => 2);
			$recent_posts_query = new WP_Query($args);
			if($recent_posts_query->have_posts()) : 
			    while($recent_posts_query->have_posts()) : 
			    $recent_posts_query->the_post();
			?>
			
			<?php if (has_post_thumbnail()) {?>
				<a href="<?php echo the_permalink();?>" class="news-item--st news-item--st--long news-item--st--long--w-img">
			<?php } else {?>
				<a href="<?php echo the_permalink();?>" class="news-item--st news-item--st--long">
			<?php }?>
			
				<div class="news-item--st__cat news-item--st__cat--<?php $category = get_the_category(); echo $category[0]->slug;?>"><?php $category = get_the_category(); echo $category[0]->cat_name;?></div>
				<div class="news-item--st__caption news-item--st__caption--top">
					<div class="news-item--st__caption__inner">
						<h3 class="news-item--st__title"><?php the_title();?></h3>
						<div class="news-item--st__date">Posted on <?php echo the_date('m/d');?></div>
					</div>
				</div>
				
				<?php if (has_post_thumbnail()) {?>
					<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');?>
					<div class="news-item--st__side-img" style="background-image:url(<?php echo esc_url($featured_img_url);?>);"></div>
				<?php } else {?>
				<?php }?>
			
			</a>
			
			<?php endwhile;?>
			
			<?php
				endif;
				wp_reset_query();
			?>
			
			
			
			
		</div>
		<div class="st-col st-col-4">
			
			<?php
			$args = array('cat'=> 63,'order' => 'DESC','orderby' => 'date','posts_per_page' => 1);
			$recent_posts_query = new WP_Query($args);
			if($recent_posts_query->have_posts()) : 
			    while($recent_posts_query->have_posts()) : 
			    $recent_posts_query->the_post();
			?>
			
			<a href="<?php echo the_permalink();?>" class="news-item--st news-item--st--featured">
				<h5 class="news-item--st__cat-label">Featured</h5>
				<h3 class="news-item--st__title news-item--st__title--light news-item--st__title--featured"><?php the_title();?></h3>
				<!--<div class="news-item--st__ex"><?php echo libby_excerpt(20);?></div>-->
				<div class="news-item--st__btn btn btn-primary">Learn More</div>
			</a>
			
			
			
			<?php
				endwhile;
				else:
			?>
			
			<div class="alert">Sorry, No featured post to show.</div>
			
			<?php
				endif;
				wp_reset_query();
			?>
		</div>
	</div>
</section>