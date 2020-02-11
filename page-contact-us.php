<?php
/*
    Template Name: Contact Us Page
*/

get_header();
?>

<div id="clearNavHere" class="banner-text-area-all-trips bg-5 bg-black-transparent-layer" style="background-image: url(<?php if(get_field('b_background_image')) the_field('b_background_image'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12">
                <div class="content">
                    <h2 class="banner-head color-yellow"><?php if(get_field('banner_heading')) the_field('banner_heading'); ?></h2>
                    <h3 class="banner-head-2 text-white mt-15"><?php if(get_field('banner_sub_heading')) the_field('banner_sub_heading'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Form End -->

<section class="p-5 pl-0 pr-0">
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php if(get_field('contact_form_heading')) the_field('contact_form_heading'); ?></h2>
                    <h3 class="color-gray"><?php if(get_field('contact_form_sub_heading')) the_field('contact_form_sub_heading'); ?></h3>
                </div>
            </div>

            <?php while( have_posts()) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; ?>

        </div>
    </div>

    <div class="contact-info p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="contact-info-box">
                        <p><i class="fas fa-phone-alt"></i></p>
                        <h3>Phone</h3>
                        <p class="color-gray"><?php if(get_field('p_description')) the_field('p_description'); ?></p>
                        <a class='a-yellow' href='tel:<?php the_field("phone_number_without_format") ?>'>
                            <p><?php the_field('phone_number') ?></p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="contact-info-box">
                        <p><i class="fal fa-envelope"></i></p>
                        <h3>Email</h3>
                        <p class="color-gray"><?php if(get_field('e_description')) the_field('e_description'); ?></p>
                        <a class='a-yellow' target='_blank' href='mailto:<?php the_field("email") ?>'>
                            <p><?php the_field('email') ?></p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="contact-info-box">
                        <p><i class="fas fa-location-arrow"></i></p>
                        <h3>Location</h3>
                        <p class="color-gray"><?php if(get_field('location')) the_field('location'); ?></p>
                        <a class='a-yellow' target='_blank' href=<?php the_field('location_link') ?>>
                            <p><?php the_field('location_link_text') ?></p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-70">
                <?php if(get_field('map_code')) the_field('map_code'); ?>
            </div>

        </div>
    </div>

</section>
<?php

get_footer();
