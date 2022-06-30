<?php if (!defined('ABSPATH')) { exit; }?>
<?php
get_header();
while ( have_posts() ) : the_post();
    the_content();
endwhile; // End of the loop.
get_footer(); ?>