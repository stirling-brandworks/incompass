
<section class="bg-white py-8 mb-8">
    <div class="container mb-8">
        <div class="d-md-flex mb-4 pb-4">

            <?php
                $cat = $atts['category'];
                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'cat' => $cat,
            );
            $featuredNews = new WP_Query($args);?>
        
            <?php if ($featuredNews->have_posts()):?>
                <?php while ($featuredNews->have_posts()): $featuredNews->the_post();?>
                    <div class="w-md-33">

                        <?php include('news-card.php'); ?>
                       
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php
                wp_reset_postdata();
            ?>

        </div>
    </div>
</section>