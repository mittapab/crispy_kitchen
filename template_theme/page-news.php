<?php   /** Template Name: News */

        get_header();
?>


<main>

<?php  get_template_part('template_part/layout/breadcrumb');  ?>

<?php  get_template_part('template_part/news/new-latest');  ?>
             

<section class="news section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="mb-lg-5 mb-4">News &amp; Events</h2>
            </div>

            <?php   
                 $args_event = array('posts_per_page' => 3,);
                 $post_event = new WP_Query($args_event);
              
               if($post_event->have_posts()):    ?>
                <?php while($post_event->have_posts()): $post_event->the_post(); ?>  

            <div class="col-lg-4 col-md-6 col-12">
                <div class="news-thumb mb-4">
                    <a href="<?php the_permalink();  ?>">
                        <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid news-image" alt="">
                    </a>
                    
                    <div class="news-text-info">
                        <span class="category-tag me-3 bg-info"><?php echo get_the_terms($post->ID , 'category')[0]->name;    ?></span>

                        <strong><?php   the_time('d M Y'); ?></strong>

                        <h5 class="news-title mt-2">
                            <a href="<?php the_permalink();  ?>" class="news-title-link"><?php the_title();   ?></a>
                        </h5>
                    </div>
                </div> 
            </div>
            <?php endwhile;   ?>
            <?php  endif;  ?>
           
        </div>
    </div>
</section>
<?php   echo paginate_links( ); ?>
</main>

<?php get_footer(); ?>



