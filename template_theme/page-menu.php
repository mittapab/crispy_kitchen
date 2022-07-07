<?php  /* Template Name: Menu */  ?>
<?php  require get_template_directory() . '/include/library.php';   ?>
<?php  get_header(); ?>
<main>
<?php  get_template_part('template_part/layout/breadcrumb');  ?>

<?php get_template_part('template_part/menu/breakfast');?>
<?php get_template_part('template_part/menu/lunch');?>
<?php get_template_part('template_part/menu/dinner');?>


</main>

<?php  get_footer(); ?>