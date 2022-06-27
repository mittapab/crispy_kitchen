<?php

function rating_count($rating){

    $fil_rating = 5 - $rating;

    for($i=1 ; $i <= $rating; $i++){ ?>
        <i class="bi-star-fill reviews-icon"></i>
     <?php   }

    for($y=1 ; $y <= $fil_rating; $y++){ ?>
         <i class="bi-star reviews-icon"></i>
    <?php   }


    }



?>