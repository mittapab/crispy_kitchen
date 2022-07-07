<?php  
$args = array(
    'posts_per_page' => 5
);
$post_new = new WP_Query($args);  
$count_post = 1;
?>

<section class="news section-padding">
                <div class="container">
                    <div class="row">

                        <h2 class="text-center mb-lg-5 mb-4">News &amp; Events</h2>
                        <?php   while( $post_new->have_posts()): $post_new->the_post();    ?>

                        <?php  if($count_post <= 2 ){   ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="news-thumb mb-4">
                                <a href="<?php the_permalink();  ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info news-text-info-large">
                                    <span class="category-tag bg-danger"><?php echo get_the_terms($post->ID, 'category')[0]->name;    ?></span>

                                    <h5 class="news-title mt-2">
                                        <a href="<?php the_permalink();  ?>" class="news-title-link"><?php  the_title();    ?></a>
                                    </h5>
                                </div>
                            </div> 
                        </div>
                       <?php  }else{ ?>
                              
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="news-thumb mb-lg-0 mb-lg-4 mb-0">
                                <a href="<?php the_permalink();  ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info">
                                    <span class="category-tag me-3 bg-info"><?php echo get_the_terms($post->ID, 'category')[0]->name;    ?></span>

                                    <strong><?php  the_time('d M Y');   ?></strong>

                                    <h5 class="news-title mt-2">
                                        <a href="<?php the_permalink();  ?>" class="news-title-link"><?php  the_title();    ?></a>
                                    </h5>
                                </div>
                            </div> 
                        </div>

                      <?php }
                        $count_post++;
                        endwhile;  wp_reset_postdata();  ?>
                    

                    </div>
                </div>
            </section>