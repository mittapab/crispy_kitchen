

<?php


$args = array(
    'post_type' => 'food',
    'posts_per_page' => 6
);
$special_menu_query = new WP_Query($args); 
?>


<section class="menu section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="text-center mb-lg-5 mb-4">Special Menus</h2>
                        </div>
                        <?php  while($special_menu_query->have_posts()): $special_menu_query->the_post();  ?>
                              
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="menu-thumb">
                                <div class="menu-image-wrap">
                                    <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid menu-image" alt="">

                                    <span class="menu-tag bg-warning" style="color:#ffffff;"><?php echo get_the_terms($post->ID, 'Categories_Menus')[0]->name;    ?></span>
                                </div>

                                <div class="menu-info d-flex flex-wrap align-items-center">
                                    <h4 class="mb-0"><?php  the_title();  ?></h4>

                                    <span class="price-tag bg-white shadow-lg ms-4"><small>$</small><?php echo get_field('price_menu')   ?></span>

                                    <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                        <h6 class="reviews-text mb-0 me-3"><?php echo get_field('rating_menu'); ?>/5</h6>

                                        <div class="reviews-stars">
                                            <?php rating_count(get_field('rating_menu') ); ?>
                                        </div>

                                        <p class="reviews-text mb-0 ms-4"><?php echo get_field('review_menu'); ?> Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  endwhile;  wp_reset_postdata(); ?>

                    </div>
                </div>
            </section>