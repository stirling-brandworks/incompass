<?php get_header(); ?>

    <div id="main-content">
        <?php get_template_part('partials/front-page-hero', $hero['background_type'] ?: 'image'); ?>

        <?php if (get_field('careers')['section_title']) {
            ?>
            <section class="fp-careers">
                <div class="container">
                    <h2><?php echo get_field('careers')['section_title'] ?></h2>
                    <?php if(get_field('careers')['section_body']){ ?><div class="careers-body"><?php echo get_field('careers')['section_body'] ?></div><?php }?>
                    <?php if (get_field('careers')['career_card']) {
                        ?>
                        <ul class="fp-hero-links">
                            <?php foreach (get_field('careers')['career_card'] as $card) {
                                ?>
                                <li class="fp-card career-card">
                                    <span class="fp-card__border"></span>
                                    <div>
                                        <h3><?php echo $card['position_title'] ?></h3>
                                        <?php if($card['position_description']) { ?><p><?php echo $card['position_description'] ?></p><?php } ?>
                                        <a href="<?php echo esc_url($card['link_to_posting']); ?>"
                                           class="fp-card__title fp-stretched-link" aria-describedby="fpHeroLink1">Learn
                                            More <span class="fp-link-arrow"></span></a>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
            </section>
            <?php
        } ?>
        <!--
    <?php $section1 = get_field('section_1'); ?>
    <section class="fp-virtual">
        <img class="fp-virtual__bg" src="<?php echo esc_url($section1['background_image']['url']); ?>" alt="<?php echo esc_url($section1['background_image']['alt']); ?>">
        <div class="fp-container">
            <div class="fp-virtual__content fp-card">
                <h2><?php echo wp_kses_post($section1['section_heading']); ?></h2>
                <p><?php echo wp_kses_post($section1['section_content']); ?></p>
                <ul class="fp-virtual-bullets">
                    <?php foreach ($section1['section_bullets'] as $key => $bullet) : ?>
                    <li><?php echo $bullet['label']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url($section1['section_link']['url']); ?>" class="fp-button"><?php echo esc_html($section1['section_link']['title']); ?></a>
            </div>
        </div>
    </section>
    -->

        <?php $contentHubData = get_field('content_hub'); ?>
        <section class="fp-hub">
            <div class="container">
                <div class="fp-hub__header">
                    <h2>Content Hub</h2>
                    <?php $categories = get_categories(['orderby' => 'count', 'order' => 'DESC', 'number' => 4, 'parent' => 0]); ?>
                    <select class="fp-hub__select">
                        <option selected disabled>Select a Category</option>
                        <?php foreach ($contentHubData['categories'] as $row) : ?>
                            <option value="<?php echo $row['category']; ?>"
                                    class="fp-hub__nav-item"><?php echo get_cat_name($row['category']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <ul class="fp-hub__nav">
                        <?php foreach ($contentHubData['categories'] as $key => $row) : ?>
                            <li class="fp-hub__nav-item <?php echo $key === 0 ? 'fp-hub__nav-item--active' : ''; ?>">
                                <button type="button"
                                        data-category-id="<?php echo $row['category']; ?>"><?php echo get_cat_name($row['category']); ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="fp-hub__content">
                    <div class="fp-hub__feature">
                        <img src="" alt=""/>
                        <div class="fp-hub__feature-overlay"></div>
                        <div class="fp-hub__feature-content">
                            <span></span>
                            <h3 id="featureTitle"></h3>
                            <a href="#" class="fp-link-underline" aria-describedby="featureTitle">Learn More <span
                                        class="fp-link-arrow"></span></a>
                        </div>
                    </div>
                    <div class="fp-hub__list">
                        <div class="fp-hub__loader">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <ul></ul>
                        <a href="<?php echo esc_url('/blog') ?>" class="fp-link-underline">View All <span
                                    class="fp-link-arrow"></span></a>
                    </div>
                </div>
            </div>
        </section>

        <?php $stats = get_field('statistics'); ?>
        <section class="fp-stats">
            <div class="container">
                <h2><?php the_field('statistic_header') ?></h2>
                <div class="stats-section__container">
                    <ul class="fp-stats__row">
                        <?php foreach ($stats as $stat) : ?>
                            <li>
                                <?php echo wp_get_attachment_image($stat['icon']['ID'], 'thumbnail'); ?>
                                <span class="fp-stat__number counter"
                                      data-count="<?php echo $stat['value']; ?>"><?php echo esc_html($stat['value']); ?></span>
                                <span class="fp-stat__label"><?php echo esc_html($stat['label']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>

        <section class="fp-programs-abi">
            <?php $programAbi = get_field('program_cards'); ?>
            <div class="container">
                <h2 class="color-purple"><?php echo wp_kses_post($programAbi['section_heading']); ?></h2>
                <div class="fp-programs-abi__content">
                    <p class="text-bold"><?php echo wp_kses_post($programAbi['section_content']); ?>
                    </p>
                </div>
            </div>
            <div class="fp-virtual">
                <?php if($programAbi['section_hero_image']){ ?><img class="fp-virtual__bg" src=<?php echo esc_url($programAbi['section_hero_image']['url']); ?>" alt="<?php echo esc_url($programAbi['section_hero_image']['alt']); ?>"><?php } ?>
                <div class="container">

                    <div class="fp-programs__cards-container fp-flex fp-flex-wrap fp-align-stretch fp-flex-col fp-flex-md-row">

                        <?php foreach ($programAbi['section_cards'] as $card) : ?>
                            <div class="fp-programs-card">
                                <h2 class="color-purple title"><?php echo $card['title']; ?></h2>
                                <p><?php echo $card['content']; ?></p>
                                <?php if ($card['link']) : ?>
                                    <a class="fp-button" href="<?php echo $card['link']['url'] ?>">
                                        <?php echo $card['link']['title']; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </section>

        <section class="fp-connect">
            <h2>Connect with Us</h2>
            <?php
            wp_nav_menu([
                'menu' => 61,
                'container' => null,
                'menu_class' => 'fp-social'
            ]);
            ?>
            <?php $galleryItems = get_field('gallery'); ?>
            <div class="fp-gallery">
                <?php foreach ($galleryItems as $galleryItem) : ?>
                    <figure class="fp-gallery__item">
                        <?php echo wp_get_attachment_image($galleryItem['ID'], 'large'); ?>
                    </figure>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

<?php

get_footer();