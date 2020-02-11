<div class='clickToClose customizeContainer'>
    <div class="clickToClose container">
        <div class="clickToClose row justify-content-center">
            <div class="col-lg-10 customize">
                <div class="cross-brn"><button class="btn close-btn">X</button></div>

                <h4>Personalize your travel</h4>
                <p>Custom itineraries tailored just for you. Receive a quote within 24 hours</p>

                <?php

                    // query for the about page
                    $your_query = new WP_Query( 'pagename=home' );
                    // "loop" through query (even though it's just one page)
                    while ( $your_query->have_posts() ) : $your_query->the_post();
                        the_content();
                    endwhile;
                    // reset post data (important!)
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>
