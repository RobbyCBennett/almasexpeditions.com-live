<?php
/*
    Template Name: Tour Search Page
*/

$destination = '';
$duration = '';
$style = '';
$message = 'Search Results For';

$meta_query = array();

if(!empty($_GET['destination'])){
    $destination = $_GET['destination'];
    array_push($meta_query ,array(
        'key' => 'destination',
        'value' => $destination,
        'compare' => 'LIKE'
    ));

    $message = $message . " Destination : <span>".$destination.",</span>";
}

if(!empty($_GET['duration'])){
    $duration = $_GET['duration'];

    if ($duration == '1-3') {
        array_push($meta_query, array(
            'key' => 'd_duration',
            'value' => array(1,3),
            'type'    => 'numeric',
            'compare' => 'BETWEEN'
        ));
    }
    elseif ($duration == '4-7') {
        array_push($meta_query, array(
            'key' => 'd_duration',
            'value' => array(4,7),
            'type'    => 'numeric',
            'compare' => 'BETWEEN'
        ));
    }
    elseif ($duration == '8-12') {
        array_push($meta_query, array(
            'key' => 'd_duration',
            'value' => array(8,12),
            'type'    => 'numeric',
            'compare' => 'BETWEEN'
        ));
    }

    $message = $message . " Duration : <span>".$duration." Days,</span>";
}

if(!empty($_GET['style'])){
    $style = $_GET['style'];
    array_push($meta_query, array(
        'key' => 'style',
        'value' => $style,
        'compare' => 'LIKE'
    ));

    if($style == "family"){
        $style = "Family fun";
    }else if($style == "holiday"){
        $style = "Holiday & Seasonal";
    }else if($style == "book"){
        $style = "Book of Mormon Tours";
    }

    $message = $message . " Style : <span>".$style."</span>";
}

if( !empty($meta_query) ){
    $meta_query['relation'] = 'AND';
}

get_header();
?>
    <div class="banner-text-area-all-trips bg-5 bg-black-transparent-layer" style="background-image: url(<?php if(get_field('background_image')) the_field('background_image'); ?>);">
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
                    <h3 class="about-us-head color-head-balck result-text">
                      <?php echo $message; ?>
                    </h3>
                </div>
            </div>

            <div class="next-tour mt-50">
                <div class="row">

                    <?php load_include('related-trips', ['meta_query' => $meta_query, 'showNotFound' => true]); ?>

                </div>
            </div>
        </div>
    </section>

    <?php load_include('shared/find-tour') ?>

<?php

get_footer();
