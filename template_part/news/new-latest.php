<?php   
   $args = array(  'posts_per_page' => 4,  );
   $news = new WP_Query($args);

?>

<section class="news section-padding bg-white">
    <div class="container">
        <div class="row">

            <h2 class="mb-lg-5 mb-4">Latest Updates</h2>
            <?php  if($news->have_posts()):    ?>
                <?php while($news->have_posts()): $news->the_post(); ?>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="news-thumb mb-4">
                    <a href="<?php the_permalink();  ?>">
                        <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid news-image" alt="">
                    </a>
                    
                    <div class="news-text-info news-text-info-large">
                        <span class="category-tag bg-danger"><?php echo get_the_terms($post->ID, 'category')[0]->name;    ?></span>

                        <h5 class="news-title mt-2">
                            <a href="<?php the_permalink();  ?>" class="news-title-link"><?php  the_title();   ?></a>
                        </h5>
                    </div>
                </div> 
            </div>

            
            <?php endwhile;   ?>
            <?php  endif;  
            
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>