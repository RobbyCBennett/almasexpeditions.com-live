<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type'		=> 'tour',
    'posts_per_page' => 20,
    'paged' => $paged,
);
if(!empty($meta_query)){
    $args['meta_query'] = $meta_query;
}

?>

<?php $loop = new WP_Query($args); ?>

<?php if($loop->have_posts()){ ?>
    <?php while($loop->have_posts()) : $loop->the_post(); ?>
        <div class="col-md-4 col-lg-4 col-sm-4 pb-30">
            <a href="<?php the_permalink(); ?>">
                <div class="place-card">
                    <div class="img-text-holder">
                        <?php $src = wp_get_attachment_image_url(get_field('thumbnail _image'), 'tour-thumb'); ?>
                        <img src="<?php echo $src; ?>">
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
<?php }else if( !empty($showNotFound) ) { ?>
    <div class="col-md-12">
        <div class="card alert alert-danger">
            <div class="card-body">
                <h2 style="text-align: Center"><i class="fa fa-meh-o" aria-hidden="true"></i> Oops ! Not Found.</h2>
                <h3 style="text-align: center">Try Another</h3>
            </div>
        </div>
    </div>
<?php } ?>
<?php wp_reset_query(); ?>