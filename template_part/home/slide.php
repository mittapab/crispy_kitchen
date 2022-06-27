<?php  require get_template_directory() . '/include/library.php';   ?>
<section class="hero">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-12 m-auto">
                            <div class="heroText">

                                <h1 class="text-white mb-lg-5 mb-3">Delicious Steaks</h1>

                                <div class="c-reviews my-3 d-flex flex-wrap align-items-center">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <h4 class="text-white mb-0 me-3">4.4/5</h4>

                                        <div class="reviews-stars">
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star reviews-icon"></i>
                                        </div>
                                    </div>

                                    <p class="text-white w-100">From <strong>1,206+</strong> Customer Reviews</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-12">
                            <div id="carouselExampleCaptions" class="carousel carousel-fade hero-carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="carousel-image-wrap">
                                            <img src="<?php echo get_field('home_slide_1');   ?>" class="img-fluid carousel-image" alt="">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <span class="text-white">
                                                <i class="bi-geo-alt me-2"></i>
                                                Manhattan, New York
                                            </span>
                                            <div class="d-flex align-items-center">
                                            <h4 class="hero-text"><?php echo get_field('slide_name_1');   ?></h4>
                                            <span class="price-tag ms-4"><small>$</small><?php echo get_field('price_1');   ?></span>
                                           </div>
                                            <div class="d-flex flex-wrap align-items-center">
                                                <h5 class="reviews-text mb-0 me-3"><?php echo get_field('rating_1');   ?>/5</h5>

                                                <div class="reviews-stars">
                                                    <?php rating_count(get_field('rating_1') ); ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="carousel-image-wrap">
                                            <img src="<?php echo get_field('home_slide_2'); ?>" class="img-fluid carousel-image" alt="">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hero-text"><?php echo get_field('slide_name_2');   ?></h4>

                                                <span class="price-tag ms-4"><small>$</small><?php echo get_field('price_2');   ?></span>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center">
                                                <h5 class="reviews-text mb-0 me-3"><?php echo get_field('rating_2');   ?>/5</h5>

                                                <div class="reviews-stars">
                                                <?php rating_count(get_field('rating_2') ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="carousel-image-wrap">
                                            <img src="<?php echo get_field('home_slide_3'); ?>" class="img-fluid carousel-image" alt="">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hero-text"><?php echo get_field('slide_name_3');   ?></h4>

                                                <span class="price-tag ms-4"><small>$</small><?php echo get_field('price_3');   ?></span>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center">
                                                <h5 class="reviews-text mb-0 me-3"><?php echo get_field('rating_3');   ?>/5</h5>

                                                <div class="reviews-stars">
                                                <?php rating_count(get_field('rating_3') ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="<?php echo get_field('home_video_slide'); ?>" type="video/mp4">
                        	Your browser does not support the video tag.
                    	</video>
                </div>

                <div class="overlay"></div>
            </section>


    