<?php /* Template Name: Home */ ?>
<?php  require get_template_directory() . '/include/library.php';   ?>

<?php  get_header();   ?>
        <main>

           <?php  get_template_part('template_part/home/slide');   ?>

           <?php get_template_part('template_part/home/specials_menu'); ?>

            <section class="BgImage"></section>
           
            <?php get_template_part('template_part/home/news'); ?>
       

        </main>

       


<?php  get_footer();   ?>