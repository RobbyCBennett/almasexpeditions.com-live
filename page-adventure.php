<?php
/*
Template Name: Adventure
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
                    $meta_query = [
                        'relation' => 'AND', 
                        [
                            'key' => 'style',
                            'value' => 'adventure',
                            'compare' => 'LIKE'
                        ]
                    ];
                    ?>
                    <?php load_include('related-trips', ['meta_query' => $meta_query]); ?>
                </div>
            </div>
        </div>
    </section>


<?php

get_footer();
