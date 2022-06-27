<?php  if(have_posts()): the_post();  ?>

<header class="site-header site-about-header">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12 mx-auto">
                <h1 class="text-white"><?php the_title();   ?></h1>

                <strong class="text-white"><?php  echo get_field('crispy_description')  ?></strong>
            </div>

        </div>
    </div>

    <div class="overlay"></div>
</header>

<?php  endif;  ?>