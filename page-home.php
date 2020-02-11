<?php
/*
Template Name: Home Page
*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<div id="clearNavHere" class="banner" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
			<div class="homeBannerTextContainer">
				<h1><?php the_field('heading') ?></h1>
				<h3><?php the_field('subheading') ?></h3>
				<button type="button" class="toggle-sidebar"><?php the_field('main_banner_button_text') ?></button>
			</div>
			<div class="video-container">
				<video id='videoToLoad' poster="<?php bloginfo('stylesheet_directory'); ?>/assets/images/default-banner.jpg" autoplay loop muted>
					<source src="<?php bloginfo('stylesheet_directory'); ?>/assets/video/video.mp4" type="video/mp4">
				</video>
				<script type="text/javascript">
					var viewPortWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
					videoElement = document.getElementById('videoToLoad');
					if (viewPortWidth < 992) {
						videoElement.preload = 'none';
						videoElement.style.opacity = 0;
					}
				</script>

				</div>

			</div>
			<!-- Search Form End -->


			<?php include(TEMPLATEPATH . '/template-parts/shared/find-tour.php') ?>

			<!-- Destinations Start -->
			<section class="about-section p-5 pr-0 pl-0">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="text-center header-text-1"><?php echo the_field('destinations_title') ?></h2>
							<h3 class="text-center header-text-2"><?php echo the_field('destinations_subtitle') ?></h3>

							<h3 class="about-us-head color-head-balck"><?php if(get_field('d_list_heading', get_page_by_path('destinations'))) the_field('tour_list_heading', get_page_by_path('destinations')); ?></h3>
						</div>
					</div>

					<div class="next-tour mt-50 destination-tour">
						<div class="row">
							<div class="col-md-4 col-lg-4 col-sm-4 pb-30">
								<a href="<?php echo site_url() . '/mexico'; ?>">
									<div class="place-card">
										<div class="img-text-holder" style="background-image: url(<?php echo get_field('image', get_page_by_path('destinations'))['sizes']['tour-thumb'] ?>); height: 250px; background-size: contain;">
											<div class="img-text">
												<p><?php if(get_field('name', get_page_by_path('destinations'))) the_field('name', get_page_by_path('destinations')); ?></p>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-lg-4 col-sm-4 pb-30">
								<a href="<?php echo site_url() . '/guatemala'; ?>">
									<div class="place-card">
										<div class="img-text-holder" style="background-image: url(<?php echo get_field('g_image', get_page_by_path('destinations'))['sizes']['tour-thumb'] ?>); height: 250px;">
											<div class="img-text">
												<p><?php if(get_field('g_name', get_page_by_path('destinations'))) the_field('g_name', get_page_by_path('destinations')); ?></p>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-lg-4 col-sm-4 pb-30">
								<a href="<?php echo site_url() . '/belize'; ?>">
									<div class="place-card">
										<div class="img-text-holder" style="background-image: url(<?php echo get_field('b_image', get_page_by_path('destinations'))['sizes']['tour-thumb'] ?>); height: 250px;">
											<div class="img-text">
												<p><?php if(get_field('b_name', get_page_by_path('destinations'))) the_field('b_name', get_page_by_path('destinations')); ?></p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>

					</div>


				</div>
			</section>
			<!-- Destinations End -->

			<!-- Customize Your Expedition Banner Start -->
			<section class='about-section p-5 pr-0 pl-0 banner-image' style='background-image: url(<?php the_field("banner_image")?>)'>
				<div class="container">
					<div class="row">
						<div class="col-lg-6 align-right">
							<div style='width: max-content; display: inline-block;'>
								<h2 class='header-text-2 banner-image-heading text-left'><?php the_field("line_1")?></h2><br>
								<h2 class='header-text-2 banner-image-heading text-left'><?php the_field("line_2")?></h2>
							</div>
						</div>
						<div class="col-lg-6 align-left">
							<button class='bg-color-yellow customize-btn customize-btn-sm toggle-sidebar'><?php the_field("button_text")?></button>
						</div>
					</div>
				</div>
			</section>

			<!-- Customize Your Expedition Banner End -->

			<!-- Most popular tours Start -->
			<section class="popular-places p-5 pl-0 pr-0">
				<div class="container">
					<h2 class="text-center header-text-1"><?php if(get_field('m_heading')) the_field('m_heading'); ?></h2>
					<h3 class="text-center header-text-2"><?php if(get_field('m_sub_heading')) the_field('m_sub_heading'); ?></h3>

					<!-- tours places -->
					<div class="next-tour mt-50">
						<div class="row">

							<?php

							foreach (get_field('popular_tours') as $i => $tourArray) {
								$tour = $tourArray['tour'];

								$args = array(
									'post_type' => 'tour',
									'title' => $tour,
									'post_status' => 'publish',
									'posts_per_page' => 1,
								);
								$loop = new WP_Query($args);

								if($loop->have_posts()) {
									while($loop->have_posts()) {
										$loop->the_post(); ?>
										<div class="col-md-4 col-lg-4 col-sm-4 pb-30">
											<a href="<?php echo get_permalink(); ?>">
												<div class="place-card">
													<div class="img-text-holder">
														<?php
														$src = wp_get_attachment_image_url(get_field('thumbnail _image'), 'tour-thumb'); 
														?>
														<div class='img' style='background-image: url("<?php echo $src; ?>")'></div>
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
										</div> <?php
									}
								}
								wp_reset_query();
							}
							?>
						</div>

					</div>
				</section>



				<section class="expeditions p-5 pl-0 pr-0">
					<div class="container">
						<h2 class="text-center header-text-1"><?php if(get_field('step_heading')) the_field('step_heading'); ?></h2>
						<h3 class="text-center header-text-2 mt-10"><?php if(get_field('step_sub_head')) the_field('step_sub_head'); ?></h3>
						<p class="text-center mt-20"><button class="bg-color-yellow customize-btn customize-btn-sm toggle-sidebar">Start Customizing</button></p>

						<div class="steps">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-lg-4">
									<div class="img-container">
										<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/post.jpg" alt="">
										<div class="step-img">
											<p>1</p>
										</div>
									</div>
									<div class="step-text">
										<h4><?php if(get_field('step_1_title')) the_field('step_1_title'); ?></h4>
										<p><?php if(get_field('step_1_des')) the_field('step_1_des'); ?></p>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-lg-4 pt-60">
									<div class="img-container img-container-m">
										<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/Group%20124.jpg" alt="">
										<div class="step-img">
											<p>2</p>
										</div>
									</div>
									<div class="step-text">
										<h4><?php if(get_field('step_2_title')) the_field('step_2_title'); ?></h4>
										<p><?php if(get_field('step_2_des')) the_field('step_2_des'); ?></p>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-lg-4 mob-pt-20">
									<div class="img-container img-container-l">
										<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/Mask%20Group%204.jpg" alt="">
										<div class="step-img">
											<p>3</p>
										</div>
									</div>
									<div class="step-text">
										<h4><?php if(get_field('step_3_title')) the_field('step_3_title'); ?></h4>
										<p><?php if(get_field('step_3_des')) the_field('step_3_des'); ?></p>
									</div>
								</div>


							</div>
						</div>

					</div>
				</section>



				<section class="recent-p bg-black p-5 pl-0 pr-0 pb-50">
					<div class="container">
						<h4 class="header-text-1 text-white post-header"><?php if(get_field('r_heading')) the_field('r_heading'); ?></h4>
						<p class="regular-text-1 mt-38" style="max-width: 400px;"><?php if(get_field('r_sub_heading')) the_field('r_sub_heading'); ?></p>
						<div class="row mt-80">

							<?php

							$args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page'=>3,
								'order'=>'DESC',
								'orderby'=>'ID',
							);

							?>

							<?php $loop = new WP_Query($args); ?>

							<?php if($loop->have_posts()){?>

								<?php while($loop->have_posts()) : $loop->the_post(); ?>
									<div class="col-md-4 col-sm-4 col-lg-4 pb-30">
										<div class="posts">
											<div class="post-img">
												<a href="<?php echo get_permalink(); ?>">
													<img src="<?php echo get_the_post_thumbnail_url(null, 'recent-post-thumb'); ?>">
												</a>
											</div>
											<h4 class="mt-20"><a class="post-headline" href="<?php echo get_permalink(); ?>"><?php $title = get_the_title();  echo myTruncate($title,10); ?></a></h4>
											<p><?php $content = get_the_content(); echo myTruncate($content,20); ?></p>
											<a href="<?php echo get_permalink(); ?>" class="read-more-btn a-yellow">Read More...</a>
										</div>
									</div>
								<?php endwhile; ?>
								<?php wp_reset_query(); ?>


							<?php } ?>


						</div>
					</div>
				</section>



				<section class="testimonial p-5 pl-0 pr-0 bg-color-yellow">
					<div class="container">
						<h4 class="testti-head"><?php if(get_field('title')){ the_field('title'); } ?></h4>


						<div class="regular slider">

							<?php

							// check if the repeater field has rows of data
							if( have_rows('testimonial') ):

								// loop through the rows of data
								while ( have_rows('testimonial') ) : the_row(); ?>

								<div>
									<div class="people-text">
										<div>
											<p><?php the_sub_field('message'); ?></p>
										</div>
									</div>
									<ul class="people-details mt-30">
										<li>
											<div class="people-img d-flex align-items-center">
												<img src=<?php the_field('default_testimonial_image') ?>>
											</div>
										</li>
										<li>
											<h5><?php the_sub_field('name'); ?></h5>
											<p><?php the_sub_field('title'); ?><br>
												<?php the_sub_field('short_name'); ?></p>
											</li>
										</ul>
									</div>


								<?php endwhile;

								else :

									// no rows found

								endif;

								?>


							</div>

						</div>
					</section>


				</main><!-- #main -->
			</div><!-- #primary -->

			<?php

			get_footer();
