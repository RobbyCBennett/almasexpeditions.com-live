<?php
/*
Template Name: About Us Page
*/

get_header();
?>
<div id="clearNavHere" class="banner-text-area bg-5 bg-black-transparent-layer" style="background-image: url(<?php if(get_field('banner_background')) the_field('banner_background'); ?>); background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12">
                <div class="content">
                    <h2 class="banner-head color-yellow"><?php if(get_field('banner_heading')) the_field('banner_heading'); ?></h2>
                    <h3 class="banner-head-2 text-white max-w-450 mt-15"><?php if(get_field('b_sub_heading')) the_field('b_sub_heading'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Form End -->


<section class="about-section p-5 pr-0 pl-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                    $our_story = get_field('our_story');
                    echo '<h3 class="about-us-head color-head-black">' . $our_story['heading'] . '</h3>';
                    echo '<p class="about-us-head-2 color-gray mt-20">' . $our_story['content'] . '</p>';
                ?>
            </div>
        </div>
    </div>
</section>

<section class="about-section gray-background p-5 pr-0 pl-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $our_team = get_field('our_team');
                    echo '<h3 class="about-us-head color-head-black text-center">' . $our_team['heading'] . '</h3>';

                    echo '<div class="row guideButtons">';
                        while (have_rows('our_team')) {
                            the_row();
                            $i = 0;
                            while (have_rows('guides')) {
                                the_row();

                                $i++;

                                // Button
                                echo '<div class="col-md-3 col-6">';
                                    echo '<div value="' . $i . '" class="guideButton">';
                                        echo '<div>';
                                            echo '<img src="' . wp_get_attachment_image_url(get_sub_field('small_picture'), 'profile-thumb') . '">';
                                        echo '</div>';
                                        echo '<p class="about-us-head-2 color-gray">' . get_sub_field('name') . '</p>';
                                    echo '</div>';
                                echo '</div>';

                                // Guide info
                                echo '<div value="' . $i . '" class="row guideBoxInfo">';
                                    echo '<div class="col-md-5">';
                                        echo '<img src="' . wp_get_attachment_image_url(get_sub_field('large_picture'), 'large') . '">';

                                        echo '<h4>' . get_sub_field('name') . '</h4>';
                                        echo '<p>' . get_sub_field('title') . '</p>';
                                    echo '</div>';
                                    echo '<div class="col-md-7">';
                                        echo '<p>' . get_sub_field('bio') . '</p>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                    echo '</div>';
                ?>
            </div>
        </div>
    </div>
</section>

<section class="about-section p-5 pr-0 pl-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                    $our_philosophy = get_field('our_philosophy');
                    echo '<h3 class="about-us-head color-head-black">' . $our_philosophy['heading'] . '</h3>';
                    echo '<img class="large-image" src="' . $our_philosophy['image'] . '"></img>';
                    echo '<p class="about-us-head-2 color-gray mt-20">' . $our_philosophy['content'] . '</p>';
                ?>
            </div>
        </div>
    </div>
</section>

<div class='clickToClose guideBoxContainer'>
    <div class="clickToClose container">
        <div class="clickToClose row justify-content-center">
            <div class="col-lg-10 guideBox">
                <div class="cross-brn"><button class="btn close-btn">X</button></div>
                <!-- main.js moves the guideBoxInfo here -->
            </div>
        </div>
    </div>
</div>


<?php include(TEMPLATEPATH . '/template-parts/shared/find-tour.php') ?>

<?php

get_footer();
