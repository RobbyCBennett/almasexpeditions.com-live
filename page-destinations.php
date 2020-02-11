<?php
/*
    Template Name: Destination Page
*/

get_header();
?>

    <div id="clearNavHere" class="banner-text-area-all-trips bg-5 bg-black-transparent-layer" style="background-image: url(<?php if(get_field('background_image')) the_field('background_image'); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12">
                    <div class="content">
                        <h2 class="banner-head color-yellow"><?php if(get_field('page_title')) the_field('page_title'); ?></h2>
                        <h3 class="banner-head-2 text-white mt-15"><?php if(get_field('page_sub_title')) the_field('page_sub_title'); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Form End -->


    <section class="about-section p-5 pr-0 pl-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="about-us-head color-head-balck"><?php the_field('page_sub_title'); ?></h3>
                </div>
            </div>

            <div class="next-tour mt-50 destination-tour">
                <div class="row box">
                    <div class="col-lg-4 col-md-4 col-5">
                        <a href="<?php echo site_url() . '/mexico'; ?>">
                            <div class="place-card">
                                <div class="img-text-holder" style="background-image: url(<?php echo get_field('image')['sizes']['tour-thumb'] ?>)">
                                    <div class="img-text">
                                        <p><?php if(get_field('name')) the_field('name'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-7" style='style="margin-bottom: 5rem;"'>
                        <h3 class='destination-heading'><?php the_field('name'); ?></h3>
                        <p id='readMoreText1' class='normal-text color-gray tour-regular readMoreText' style='overflow-y: hidden;'><?php the_field('description'); ?></p>
                        <span class="a-yellow readMore" id="readMoreButton1" onclick="readMore(1)" style="font-size: 20px;">Read more...</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 viewTripsButtonContainer">
                        <a href="<?php echo site_url() . '/mexico'; ?>">
                            <button class='viewTripsButton'>View Trips</button>
                        </a>
                    </div>
                </div>
                <div class="row box">
                    <div class="col-lg-4 col-md-4 col-12 viewTripsButtonContainer">
                        <a href="<?php echo site_url() . '/guatemala'; ?>">
                            <button class='viewTripsButton'>View Trips</button>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-7" style='style="margin-bottom: 5rem;"'>
                        <h3 class='destination-heading'><?php the_field('g_name'); ?></h3>
                        <p id='readMoreText2' class='normal-text color-gray tour-regular readMoreText' style='overflow-y: hidden;'><?php the_field('g_description'); ?></p>
                        <span class="a-yellow readMore" id="readMoreButton2" onclick="readMore(2)" style="font-size: 20px;">Read more...</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-5">
                        <a href="<?php echo site_url() . '/guatemala'; ?>">
                            <div class="place-card">
                                <div class="img-text-holder" style="background-image: url(<?php echo get_field('g_image')['sizes']['tour-thumb'] ?>)">
                                    <div class="img-text">
                                        <p><?php if(get_field('g_name')) the_field('g_name'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row box">
                    <div class="col-lg-4 col-md-4 col-5">
                        <a href="<?php echo site_url() . '/belize'; ?>">
                            <div class="place-card">
                                <div class="img-text-holder" style="background-image: url(<?php echo get_field('b_image')['sizes']['tour-thumb'] ?>)">
                                    <div class="img-text">
                                        <p><?php if(get_field('b_name')) the_field('b_name'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-7" style='style=margin-bottom: 5rem;'>
                        <h3 class='destination-heading'><?php the_field('b_name'); ?></h3>
                        <p id='readMoreText3' class='normal-text color-gray tour-regular readMoreText' style='overflow-y: hidden;'><?php the_field('b_description'); ?></p>
                        <span class="a-yellow readMore" id="readMoreButton3" onclick="readMore(3)" style="font-size: 20px;">Read more...</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 viewTripsButtonContainer">
                        <a href="<?php echo site_url() . '/belize'; ?>">
                            <button class='viewTripsButton'>View Trips</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        var readMoreInit = true;
        readMoreClass = 'readMoreText';
        readMoreButtonClass = 'readMoreButton';
        readMoreLines = 9;
    </script>



<?php

get_footer();
