<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tcf-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alma's Expeditions</title>
    <meta name="description" content="">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">


    <!--Main Wrapper Start-->
    <div class="as-mainwrapper">
        <!--Header Area Start-->
        <header id="sticky-header" class="header-area clear">
			<div class="top-header">
				<div>
					<span>Mon - Sat 9am - 8pm EST</span>
					<a href="tel:801-994-6501"><button><i class="fal fa-phone-volume"></i>801-994-6501</button></a>
				</div>
			</div>
            <!-- Header Top Start -->
            <div class="container">
                <div class="row">
                    <div class="nav-col-1">
                        <div class="logo"><a href="<?php echo site_url()?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo/Almas.png" alt="Almas Expedition"></a></div>
                    </div>
                    <div class="nav-col-2">
                        <nav id="primary-menu">
                            <ul class="main-menu text-right">
                                <li><a href="">Travel styles</a> <!-- Optional dropdown arrow: <i class="fal fa-chevron-down"></i> -->
                                    <ul class="dropdown">
                                        <li><a href="<?php echo site_url() . '/family-fun'; ?>">Family fun</a></li>
                                        <li><a href="<?php echo site_url() . '/adventure'; ?>">Adventure</a></li>
                                        <li><a href="<?php echo site_url() . '/cultural'; ?>">Cultural</a></li>
                                        <li><a href="<?php echo site_url() . '/holiday-and-seasonal'; ?>">Holiday & Seasonal</a></li>
                                        <li><a href="<?php echo site_url() . '/book-of-mormon-tours'; ?>">Book of Mormon Tours</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo site_url() . '/destinations'; ?>">Destinations</a></li>
                                <li><a href="<?php echo site_url() . '/about-us'; ?>">About US</a></li>
                                <li><a href="<?php echo site_url() . '/blog'; ?>">Blog</a></li>
                                <li><a href="<?php echo site_url() . '/contact-us'; ?>">Contact us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="nav-col-3">
                        <button class="sidebarBtn sidebar-desk toggle-sidebar">REQUEST QUOTE</button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Area start -->
            <div class="mobile-menu-area">

				<div class="logo"><a href="<?php echo site_url()?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo/Almas.png" alt="Almas Expedition"></a></div>

				<a href="tel:801-904-6501"><button class='phone-button'><i class="fal fa-phone-volume"></i></button></a>

                <div class="right-btn">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul>
                                            <li><a href="">Travel styles</a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?php echo site_url() . '/family-fun'; ?>">Family fun</a></li>
                                                    <li><a href="<?php echo site_url() . '/adventure'; ?>">Adventure</a></li>
                                                    <li><a href="<?php echo site_url() . '/cultural'; ?>">Cultural</a></li>
                                                    <li><a href="<?php echo site_url() . '/holiday-and-seasonal'; ?>">Holiday & Seasonal</a></li>
                                                    <li><a href="<?php echo site_url() . '/book-of-mormon-tours'; ?>">Book of Mormon Tours</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo site_url() . '/destinations'; ?>">Destinations</a></li>
                                            <li><a href="<?php echo site_url() . '/about-us'; ?>">About US</a></li>
                                            <li><a href="<?php echo site_url() . '/blog'; ?>">Blog</a></li>
                                            <li><a href="<?php echo site_url() . '/contact-us'; ?>">Contact us</a></li>
											<?php echo do_shortcode('[supsystic-social-sharing id="1"]') ?>
											<button class="toggle-sidebar">REQUEST QUOTE</button>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area end -->
        </header>
        <!-- End of Header Area -->

		<?php include 'template-parts/shared/customize-form.php' ?>
