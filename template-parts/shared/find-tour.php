<section class="find-tours bg-color-yellow p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2  class="color-balck-h">FIND YOUR NEXT TOUR</h2>
                <form action="<?php echo site_url() . '/tour-search-results'; ?>" method="get">
                    <div class="form-container">
                        <div class="box-select">
                            <div class="select">
                                <select name="destination">
                                    <option disabled selected>Destination</option>
                                    <option value="mexico">MEXICO</option>
                                    <option value="guatemala">GUATEMALA</option>
                                    <option value="belize">BELIZE</option>
                                </select>
                            </div>
                            <div class="select">
                                <select name="duration">
                                    <option disabled selected>Duration</option>
                                    <option value="1">1 Day</option>
                                    <option value="2">2 Days</option>
                                    <option value="3">3 Days</option>
                                    <option value="4">4 Days</option>
                                    <option value="5">5 Days</option>
                                    <option value="6">6 Days</option>
                                    <option value="7">7 Days</option>
                                    <option value="8">8 Days</option>
                                    <option value="9">9 Days</option>
                                    <option value="10">10 Days</option>
                                </select>
                            </div>
                            <div class="select">
                                <select name="style">
                                    <option disabled selected>Style</option>
                                    <option value="family ">Family fun</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="cultural">Cultural</option>
                                    <option value="holiday">Holiday & Seasonal</option>
                                    <option value="book">Book of Mormon Tours</option>
                                </select>
                            </div>
                            <div class="select">
                                <button type="submit">find tours</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


