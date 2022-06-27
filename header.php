<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Crispy Kitchen </title>

        <!-- CSS FILES -->    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    
       
        <?php  wp_head();   ?>
        
    </head>
    
    <body>
        
        <nav class="navbar navbar-expand-lg bg-white shadow-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <a class="navbar-brand" href="index.html">
                    Crispy Kitchen
                </a>

                <div class="d-lg-none">
                    <button type="button" class="custom-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#BookingModal">Reservation</button>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php  echo (is_front_page()) ? "active":"";  ?>" href="<?php echo site_url("/");  ?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php  echo (is_page('crispy-story')) ? "active":"";  ?>" href="<?php echo site_url("/crispy-story");  ?>">Story</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php  echo (is_page('menu')) ? "active":"";  ?>" href="<?php echo site_url("/menu");  ?>">Menu</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php  echo (is_page('news')) ? "active":""  ?>" href="<?php  echo site_url("/news")  ?>">Our Updates</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?php  echo (is_page('contact')) ? "active":""  ?>" href="<?php  echo site_url("/contact")  ?>">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="d-none d-lg-block">
                    <button type="button" class="custom-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#BookingModal">Reservation</button>
                </div>

            </div>
        </nav>
