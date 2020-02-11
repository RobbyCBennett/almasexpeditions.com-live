<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tcf-theme
 */

?>

<div class="footer p-5 bg-black pl-0 pr-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <h4>Newsletter</h4>
                <p>Subscribe to receive exclusive deals and offers!</p>
                <form action="">
                    <input type="text" class="form-control" placeholder="Your Email"> <button type="submit" class="btn submit-btn">Sign Up Now</button>
                </form>
            </div>
            <div class="col-6 col-md-2 mob-mt-20">
                <p class="f-meu-head">Menu</p>
                <ul class="footer-menu">
                    <li><a href="">Home</a></li>
                    <li><a href="">All Trips</a></li>
                    <li><a href="">Destinations</a></li>
                    <li><a href="">About us</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Contact us</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mob-mt-20">
                <p class="f-meu-head">Social Media</p>
                <ul class="footer-menu social-media">
                    <li><a href="https://www.facebook.com/almasexpeditions" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://www.instagram.com/almasexpeditions/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCkXrj9jGsbMtjhktpRKRUWA?view_as=subscriber" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <p class="f-meu-head">Contact Info</p>
                <ul class="footer-menu">
                    <li> <span>Address</span>
                        <p class="pt-0 pb-0">Carretera Costera Sur Km 3.8 Store # 5 <br>
                            Cozumel, Quintana Roo <br>
                            Mexico</p>
                    </li>
                    <li> <span>Email</span>
                        <p class="pt-0 pb-0">info@almasexpeditions.com</p>
                    </li>
                    <li> <span>Phone</span>
                        <p class="pt-0 pb-0"> 1.801.994.6501</p>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</div>

<!-- Start of Footer area -->
<div class="copyright-area text-center ptb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-text">
                                    <span class="text-white block" style="text-align: left;color: #B4A6A6!important;font-size: 20px;font-family: 'Roboto-r"> Copyright © 2019 Alma’s Expeditions. Designed and Developed by <a
                                                href="https://thecodeframe. com"><img style="max-width: 200px;"
                                                                                      src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/Logo-final.png" alt=""></a></span>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- End of Footer area -->
</div>
<!--End of Main Wrapper Area-->

<?php wp_footer(); ?>

</body>
</html>
