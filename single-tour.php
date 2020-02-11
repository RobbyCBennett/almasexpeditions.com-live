<?php
/*
    Template Name: Tour Page
*/

get_header();
?>

<?php $bg_image = wp_get_attachment_image_url(get_field('thumbnail _image'), 'full'); ?>
<section id="clearNavHere" class='tour-banner-image text-center' style='background-image: url(<?php echo $bg_image ?>)'>
    <div class='tour-banner-image-overlay d-flex align-items-center'>
        <div class='container'>
            <h2 class='banner-head color-yellow'><?php the_field('d_duration') ?> DAYS &#8211; <?php the_field('title') ?></h2>
            <h3 class='banner-head-2 text-white mt-15'>
                <?php
                    $firstSentence = explode('.', get_field('overview'))[0];
                    $firstExclamation = explode('!', get_field('overview'))[0];
                    if (strlen($firstSentence) < strlen($firstExclamation)) {
                        echo $firstSentence . '.';
                    } else {
                        echo $firstExclamation . '!';
                    }
                ?>
            </h3>
            <a href="#requestItinerary"><button>Request Itinerary</button></a>
        </div>
    </div>
</section>

<section id='scrollAnimation' class='tour'>
    <div id='sidebar' class='sidebar' style='background-image: url(<?php echo $bg_image ?>)'>
        <div class='overlay'>
            <div class='text-center'>
                <a href="#introduction"><button class='sidebarButton'>Introduction</button></a>
                <a href="#photosAndVideos"><button class='sidebarButton'>Photos and Videos</button></a>
                <a href="#tripOverview"><button class='sidebarButton'>Trip Overview</button></a>
                <a href="#datesAndPrices"><button class='sidebarButton'>Dates and Prices</button></a>
                <?php if($embed = get_field('book_now_embed')){ ?>
                    <?php echo $embed; ?>
                <?php } ?>
                <h3 class='text-white text-center'>SHARE THIS TRIP</h3>
                <a href="https://www.facebook.com/almasexpeditions" target="_blank" class='social a-yellow' style='float: left'><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.instagram.com/almasexpeditions" target="_blank" class='social a-yellow'><i class="fab fa-instagram"></i></a>
                <a href="mailto:?to=&body=Check out this breathtaking vacation in paradise!%0D%0A<?php echo get_permalink() ?>&subject=Alma's Expeditions: <?php the_field('d_duration') ?> Days - <?php the_field('title') ?>" target="_blank" class='social a-yellow' style='float: right'><i class="far fa-envelope"></i></a>
            </div>
        </div>
    </div>

    <div class='tour-info'>
        <div class="container">
            <div id='introduction' class="row tourInfoBox">
                <div class="col-12">
                    <h1 class='text-center heading'><?php the_field('title') ?></h1>
                </div>
                <div class="col-md-6">
                    <ul>
                        <?php
                            if (have_rows('expectations')){
                                while(have_rows('expectations')) : the_row() ?>
                                <li><?php the_sub_field('list'); ?></li>
                            <?php endwhile;
                            }
                         ?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <p><?php the_field('overview') ?></p>
                </div>
            </div>

            <div id='photosAndVideos' class="row tourInfoBox">
                <div class="col-12">
                    <h1 class='text-center heading'>Photos and Videos</h1>
                    <?php if (have_rows('photos')) {
                        $i = 0;
                        while (have_rows('photos')) {
                            the_row();
                            $i++;
                            echo '<div id="mainImage' . $i . '" class="mainImage" style="background-image: url(' . get_sub_field('photo')['url'] . ')"></div>';
                        }
                    } ?>
                </div>
                <div class="col-12">
                    <div class="smallImageContainerContainer">
                        <button class='smallImageNav left' onclick='scrollImageNav("left")'><i class="fas fa-caret-left"></i></button>
                        <button class='smallImageNav right' onclick='scrollImageNav("right")'><i class="fas fa-caret-right"></i></button>
                        <div class="smallImageContainer">
                            <?php if (have_rows('photos')) {
                                $i = 0;
                                while (have_rows('photos')) {
                                    the_row();
                                    $i++; ?>
                                    <button onclick='changeImage("mainImage<?php echo $i ?>")' class='smallImage' style='background-image: url(<?php echo get_sub_field("photo")["url"] ?>)'></button>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id='tripOverview' class="row tourInfoBox">
                <div class="col-12">
                    <h1 class='text-center heading'>Trip Overview</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <?php if(get_field('map')) the_field('map'); ?>
                        </div>
                        <div class="col-md-7">
                            <?php
                                if(have_rows('itinerary')){
                                    $i = 0;
                                    while(have_rows('itinerary')) : the_row(); $i++; ?>
                                        <div class='day'>
                                            <p class='yellow text-right'>Day<br><?php echo explode(' ', get_sub_field('heading'))[1];?></p>
                                            <p>
                                                <span class="dayCircle"></span>
                                                <span class='dayDescription' id='dayDescription<?php echo $i ?>'><?php the_sub_field('description'); ?></span>
                                                <span class="a-yellow readMore" id='dayDescriptionButton<?php echo $i ?>' onclick="readMore(<?php echo $i ?>)"">Read more...</span>
                                            </p>
                                        </div>
                                    <?php endwhile;
                                }
                            ?>
                        </div>
                        <div class="col-12 text-center">
                            <a href="#requestItinerary"><button class='tourButton'>Request Itinerary</button></a>
                        </div>
                        <script>
                            var readMoreInit = true;
                            readMoreClass = 'dayDescription';
                            readMoreButtonClass = 'dayDescriptionButton';
                            readMoreLines = 3;
                        </script>
                    </div>
                </div>
            </div>

            <div id='datesAndPrices' class="row tourInfoBox">
                <div class="col-12">
                    <h1 class='text-center heading'>Dates and Prices</h1>
                </div>
                <div class="col-md-8">
                    <?php
                        $featureRows = [1, 2, 3];

                        $featureRowI = 0;
                        if (have_rows('overview_feature')) {
                            while (have_rows('overview_feature')) {
                                the_row();
                                $featureRowI++;
                                if (in_array($featureRowI, $featureRows)) {
                                    echo '<p><strong>' . get_sub_field('title') . '</strong><br>';
                                    if (!empty(get_sub_field('sub_title'))) {
                                        echo get_sub_field('sub_title') . '<br>';
                                    }
                                    if (have_rows('details')) {
                                        while (have_rows('details')) {
                                            the_row();
                                            if (!empty(get_sub_field('bold_text'))) {
                                                echo get_sub_field('bold_text') . '<br>';
                                            }
                                            if (!empty(get_sub_field('normal_text'))) {
                                                echo get_sub_field('normal_text') . '<br>';
                                            }
                                        }
                                    }
                                    echo '</p>';
                                }
                            }
                        }
                    ?>
                    <!-- <p>
                        <strong>Shared Group Pricing</strong><br>
                        Join our scheduled dates for a discounted price<br>
                        $ 1,590.00 US per person*<br>
                        *Based on double occupancy<br>
                        Single Supplement - Required for "Solo" travellers<br>
                        $350.00
                    </p>
                    <p>
                        <strong>Private Group Pricing</strong><br>
                        Travel with your own group<br>
                        2 - 3 People<br>
                        $2,315 USD per person (double or triple occupancy based)<br>
                        4 - 7 People<br>
                        $1,984 USD per person (double or triple occupancy based)<br>
                        8 - 11 People<br>
                        $1,795 USD per person (double or triple occupancy based)<br>
                        12 - 17 People<br>
                        $1,590 USD per person (double or triple occupancy based)
                    </p>
                    <p>
                        <strong>Dates</strong><br>
                        April 5th &#8212; April 11th 2019<br>
                        May 1st &#8212; May 7th 2019
                    </p> -->
                </div>
                <div class="col-md-4">
                    <?php
                        $featureRows = [4, 5];

                        $featureRowI = 0;
                        if (have_rows('overview_feature')) {
                            while (have_rows('overview_feature')) {
                                the_row();
                                $featureRowI++;
                                if (in_array($featureRowI, $featureRows)) {
                                    echo '<p><strong>' . get_sub_field('title') . '</strong></p>';
                                    echo '<ul>';
                                    if (have_rows('details')) {
                                        while (have_rows('details')) {
                                            the_row();
                                            echo '<li>';
                                                if (!empty(get_sub_field('bold_text'))) {
                                                    the_sub_field('bold_text');
                                                } else {
                                                    the_sub_field('normal_text');
                                                }
                                            echo '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                            }
                        }
                    ?>
                </div>
                <div class="col-12 text-center">
                    <a target="_blank" href="<?php the_field('button_link') ?>"><button class='tourButton bookThisTripButton'>Book this Trip</button></a>
                </div>
            </div>

            <div id='requestItinerary' class="row tourInfoBox">
                <div class="col-lg-12">
                    <h1 class='text-center heading'>Request Itinerary</h1>
                    <div class="row">
                        <?php add_filter( 'wpcf7_autop_or_not', '__return_false' ); ?>

                        <?php echo do_shortcode( '[contact-form-7 id="628" title="Request Itinerary"]' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php

get_footer();
