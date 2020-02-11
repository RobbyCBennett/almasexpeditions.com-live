<?php
/*
    Template Name: Holiday & Seasonal Page
*/

get_header();
?>
    <div id="clearNavHere" class="banner-text-area-all-trips bg-5 bg-black-transparent-layer" style="background-image: url(<?php if(get_field('background_image')) the_field('background_image'); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12">
                    <div class="content">
                        <h2 class="banner-head color-yellow"><?php if(get_field('page_title')) the_field('page_title'); ?></h2>
                        <h3 class="banner-head-2 text-white mt-15"><?php if(get_field('page_sub_title')) the_field('page_sub_title'); ?> </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-section p-5 pr-0 pl-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="about-us-head color-head-balck"><?php if(get_field('tour_list_heading')) the_field('tour_list_heading'); ?></h3>
                </div>
            </div>

            <div class="next-tour mt-50">
                <div class="row">

                    <?php

                    $array = array('relation' => 'AND');
                    array_push($array, array(
                        'key' => 'style',
                        'value' => 'holiday',
                        'compare' => 'LIKE'
                    ));

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type'		=> 'tour',
                        'posts_per_page' => 20,
                        'paged' => $paged,
                        'meta_query'	=> $array
                    );

                    ?>

                    <?php $loop = new WP_Query($args); ?>

                    <?php while($loop->have_posts()) : $loop->the_post(); ?>
                        <div class="col-md-4 col-lg-4 col-sm-4 pb-30">
                            <a href="<?php the_permalink(); ?>">
                                <div class="place-card">
                                    <div class="img-text-holder">
                                        <?php $src = wp_get_attachment_image_url(get_field('thumbnail _image'), 'original'); ?>
                                        <img src="<?php echo $src; ?>" alt="<?php echo $image['alt']; ?>">
                                        <div class="img-text">
                                            <p><?php the_field('title'); ?></p>
                                        </div>
                                    </div>
                                    <ul class="place-detail">
                                        <li><p class="time"><?php the_field('d_duration'); ?> Days</p></li>
                                        <li><p class="price">Starting From $<?php the_field('price'); ?> per person</p></li>
                                    </ul>
                                </div>
                            </a>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>

                    <!-- row ended -->

                </div>
            </div>
        </div>
    </section>


<?php

get_footer();
